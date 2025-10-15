<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AdminPropertyList extends Component
{
    use WithPagination, WithFileUploads;

    public $title, $description, $price, $transaction_type = 'rent', $property_type;
    public $bedrooms, $images = [], $existingImages = [];
    public $bathrooms, $area, $location, $reference_no, $view, $status = 'available';
    public $description_long, $key_features, $amenities = [];
    public $map_iframe, $company_name, $company_address, $company_phone, $company_email, $company_website;
    public $is_published = false;
    public $editingId = null;
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'description_long' => 'nullable|string',
        'price' => 'nullable|numeric|min:0',
        'transaction_type' => 'required|in:rent,sale',
        'property_type' => 'nullable|string|max:255',
        'bedrooms' => 'nullable|integer|min:0',
        'bathrooms' => 'nullable|integer|min:0',
        'area' => 'nullable|numeric|min:0',
        'location' => 'nullable|string|max:255',
        'reference_no' => 'nullable|string|max:100',
        'view' => 'nullable|string|max:255',
        'status' => 'nullable|string|max:100',
        'key_features' => 'nullable|string',
        // amenities is entered as comma-separated string in the UI — accept string and convert before save
        'amenities' => 'nullable',
        'images.*' => 'nullable|image|max:2048',
        'map_iframe' => 'nullable|string',
        'company_name' => 'nullable|string|max:255',
        'company_address' => 'nullable|string|max:255',
        'company_phone' => 'nullable|string|max:50',
        'company_email' => 'nullable|email|max:255',
        'company_website' => 'nullable|string|max:255',
    ];

    public $deleteId = null;

    protected $listeners = ['deleteConfirmed' => 'deleteConfirmed'];

    // -------------------------
    // Search & Sorting
    // -------------------------
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    // -------------------------
    // CRUD OPERATIONS
    // -------------------------
    public function saveProperty()
    {
        $this->validate();

        $imagePaths = [];
        if (!empty($this->images)) {
            foreach ($this->images as $file) {
                $imagePaths[] = $file->store('properties', 'public');
            }
        }

        // normalize amenities: accept comma-separated string or array
        $amenities = is_array($this->amenities)
            ? $this->amenities
            : array_filter(array_map('trim', explode(',', (string) $this->amenities)));
        // Build payload conditionally depending on which columns exist in DB.
        $saveData = [];
        $has = fn($col) => Schema::hasColumn('properties', $col);

        if ($has('user_id')) {
            $saveData['user_id'] = Auth::id();
        }
        if ($has('title')) {
            $saveData['title'] = $this->title;
        }
        if ($has('description')) {
            $saveData['description'] = $this->description;
        }
        if ($has('description_long')) {
            $saveData['description_long'] = $this->description_long;
        }
        if ($has('price')) {
            $saveData['price'] = $this->price;
        }
        // transaction_type may be a dedicated column or stored in legacy `type` column
        if ($has('transaction_type')) {
            $saveData['transaction_type'] = $this->transaction_type;
        } elseif ($has('type')) {
            $saveData['type'] = $this->transaction_type;
        }

        if ($has('property_type')) {
            $saveData['property_type'] = $this->property_type;
        } elseif ($has('type')) {
            // if legacy table used `type` for property type, populate it when appropriate
            // only set if we haven't already set `type` from transaction_type
            if (!isset($saveData['type'])) {
                $saveData['type'] = $this->property_type;
            }
        }

        if ($has('bedrooms')) {
            $saveData['bedrooms'] = $this->bedrooms;
        }
        if ($has('bathrooms')) {
            $saveData['bathrooms'] = $this->bathrooms;
        }
        if ($has('area')) {
            $saveData['area'] = $this->area;
        }
        if ($has('location')) {
            $saveData['location'] = $this->location;
        }
        if ($has('reference_no')) {
            $saveData['reference_no'] = $this->reference_no;
        }
        if ($has('view')) {
            $saveData['view'] = $this->view;
        }
        if ($has('status')) {
            $saveData['status'] = $this->status;
        }
        if ($has('key_features')) {
            $saveData['key_features'] = $this->key_features;
        }
        if ($has('amenities')) {
            $saveData['amenities'] = $amenities;
        }

        // images handling: prefer JSON 'images' column, fall back to legacy 'image' string
        if ($has('images')) {
            $saveData['images'] = $imagePaths;
        } elseif ($has('image')) {
            $saveData['image'] = $imagePaths[0] ?? null;
        }

        if ($has('map_iframe')) {
            $saveData['map_iframe'] = $this->map_iframe;
        }
        if ($has('company_name')) {
            $saveData['company_name'] = $this->company_name;
        }
        if ($has('company_address')) {
            $saveData['company_address'] = $this->company_address;
        }
        if ($has('company_phone')) {
            $saveData['company_phone'] = $this->company_phone;
        }
        if ($has('company_email')) {
            $saveData['company_email'] = $this->company_email;
        }
        if ($has('company_website')) {
            $saveData['company_website'] = $this->company_website;
        }
        if ($has('is_published')) {
            $saveData['is_published'] = $this->is_published;
        }

        $property = Property::create($saveData);

        $this->resetForm();
        // flash a session message so the Blade alert (session('success')) shows
        session()->flash('success', 'Property added successfully!');
        $this->dispatch('toast', type: 'success', message: 'Property added successfully!');
    }

    public function editProperty($id)
    {
        $property = Property::findOrFail($id);
        $this->editingId = $property->id;
        $this->title = $property->title;
        $this->description = $property->description;
        $this->price = $property->price;
        // transaction_type may exist or be stored in legacy `type` column
        $this->transaction_type = $property->transaction_type ?? null;
        // if transaction_type missing but legacy `type` exists and looks like rent/sale, use it
        if (empty($this->transaction_type) && !empty($property->type)) {
            $lower = strtolower((string) $property->type);
            if (in_array($lower, ['rent', 'sale'])) {
                $this->transaction_type = $lower;
            }
        }
        // property type might be `property_type` or legacy `type`
        $this->property_type = $property->property_type ?? $property->type ?? null;
        $this->bedrooms = $property->bedrooms;
        // images stored as JSON array in `images` or legacy single `image`
        if (!empty($property->images) && is_array($property->images)) {
            $this->existingImages = $property->images;
        } elseif (!empty($property->image)) {
            $this->existingImages = [$property->image];
        } else {
            $this->existingImages = [];
        }
        $this->bathrooms = $property->bathrooms;
        $this->area = $property->area;
        $this->location = $property->location;
        $this->reference_no = $property->reference_no;
        $this->view = $property->view;
        $this->status = $property->status;
        $this->description_long = $property->description_long;
        $this->key_features = $property->key_features;
        // normalize amenities for the input: convert array to comma-separated string
        if (is_array($property->amenities)) {
            $this->amenities = implode(', ', $property->amenities);
        } else {
            $this->amenities = $property->amenities ?? '';
        }
        $this->map_iframe = $property->map_iframe;
        $this->company_name = $property->company_name;
        $this->company_address = $property->company_address;
        $this->company_phone = $property->company_phone;
        $this->company_email = $property->company_email;
        $this->company_website = $property->company_website;
        $this->is_published = (bool) ($property->is_published ?? false);
        // normalize status to match select option values (lowercase)
        $this->status = null;
        if (!empty($property->status)) {
            $this->status = strtolower((string) $property->status);
        }
    }

    public function updateProperty()
    {
        $this->validate();

        $property = Property::findOrFail($this->editingId);

        $newImages = $this->existingImages;
        if (!empty($this->images)) {
            foreach ($this->images as $file) {
                $newImages[] = $file->store('properties', 'public');
            }
        }

        // normalize amenities for update as well
        $amenities = is_array($this->amenities)
            ? $this->amenities
            : array_filter(array_map('trim', explode(',', (string) $this->amenities)));
        // Build update payload conditionally depending on DB columns
        $updateData = [];
        $has = fn($col) => Schema::hasColumn('properties', $col);

        if ($has('user_id')) {
            $updateData['user_id'] = Auth::id();
        }
        if ($has('title')) {
            $updateData['title'] = $this->title;
        }
        if ($has('description')) {
            $updateData['description'] = $this->description;
        }
        if ($has('description_long')) {
            $updateData['description_long'] = $this->description_long;
        }
        if ($has('price')) {
            $updateData['price'] = $this->price;
        }
        if ($has('transaction_type')) {
            $updateData['transaction_type'] = $this->transaction_type;
        } elseif ($has('type')) {
            $updateData['type'] = $this->transaction_type;
        }

        if ($has('property_type')) {
            $updateData['property_type'] = $this->property_type;
        } elseif ($has('type')) {
            if (!isset($updateData['type'])) {
                $updateData['type'] = $this->property_type;
            }
        }

        if ($has('bedrooms')) {
            $updateData['bedrooms'] = $this->bedrooms;
        }
        if ($has('bathrooms')) {
            $updateData['bathrooms'] = $this->bathrooms;
        }
        if ($has('area')) {
            $updateData['area'] = $this->area;
        }
        if ($has('location')) {
            $updateData['location'] = $this->location;
        }
        if ($has('reference_no')) {
            $updateData['reference_no'] = $this->reference_no;
        }
        if ($has('view')) {
            $updateData['view'] = $this->view;
        }
        if ($has('status')) {
            $updateData['status'] = $this->status;
        }
        if ($has('key_features')) {
            $updateData['key_features'] = $this->key_features;
        }
        if ($has('amenities')) {
            $updateData['amenities'] = $amenities;
        }

        if ($has('images')) {
            $updateData['images'] = $newImages;
        } elseif ($has('image')) {
            $updateData['image'] = $newImages[0] ?? null;
        }

        if ($has('map_iframe')) {
            $updateData['map_iframe'] = $this->map_iframe;
        }
        if ($has('company_name')) {
            $updateData['company_name'] = $this->company_name;
        }
        if ($has('company_address')) {
            $updateData['company_address'] = $this->company_address;
        }
        if ($has('company_phone')) {
            $updateData['company_phone'] = $this->company_phone;
        }
        if ($has('company_email')) {
            $updateData['company_email'] = $this->company_email;
        }
        if ($has('company_website')) {
            $updateData['company_website'] = $this->company_website;
        }
        if ($has('is_published')) {
            $updateData['is_published'] = $this->is_published;
        }

        $property->update($updateData);


        $this->resetForm();
        session()->flash('success', 'Property updated successfully!');
        $this->dispatch('toast', type: 'success', message: 'Property updated successfully!');
    }

    // -------------------------
    // DELETE OPERATIONS
    // -------------------------
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dispatch('confirm-delete');
    }

    public function deleteConfirmed()
    {
        if ($this->deleteId) {
            $property = Property::find($this->deleteId);
            if ($property) {
                $property->delete();
                $this->dispatch('toast', type: 'success', message: 'Property deleted successfully!');
            }
            $this->deleteId = null;
        }
    }

    // -------------------------
    // IMAGE HANDLING
    // -------------------------
    public function removeExistingImage($imagePath)
    {
        $this->existingImages = array_filter($this->existingImages, fn($img) => $img !== $imagePath);
        Storage::disk('public')->delete($imagePath);
    }

    // -------------------------
    // RESET FORM
    // -------------------------
    public function resetForm()
    {
        $this->reset([
            'title',
            'description',
            'description_long',
            'price',
            'transaction_type',
            'property_type',
            'bedrooms',
            'bathrooms',
            'area',
            'location',
            'reference_no',
            'view',
            'status',
            'key_features',
            'amenities',
            'images',
            'existingImages',
            'map_iframe',
            'company_name',
            'company_address',
            'company_phone',
            'company_email',
            'company_website',
            'is_published',
            'editingId',
        ]);
    }

    // -------------------------
    // RENDER VIEW
    // -------------------------
    public function render()
    {
        $properties = Property::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('property_type', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5);

        return view('livewire.admin-property-list', compact('properties'));
    }
}
