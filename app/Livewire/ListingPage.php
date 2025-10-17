<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Property;

class ListingPage extends Component
{
    use WithPagination;

    public $transaction_type = '';
    public $property_type = '';
    public $bedrooms = '';
    public $location = '';
    public $min_price = '';
    public $max_price = '';

    public $layout = 'components.layouts.app';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Property::where('is_published', true);

        if ($this->transaction_type) {
            $query->where('transaction_type', $this->transaction_type);
        }

        if ($this->property_type) {
            $query->where('property_type', 'like', '%' . $this->property_type . '%');
        }

        if ($this->bedrooms) {
            $query->where('bedrooms', '>=', $this->bedrooms);
        }

        if ($this->location) {
            $query->where('location', 'like', '%' . $this->location . '%');
        }

        if ($this->min_price) {
            $query->where('price', '>=', $this->min_price);
        }

        if ($this->max_price) {
            $query->where('price', '<=', $this->max_price);
        }

        $properties = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('livewire.listing-page', compact('properties'));
    }
}
