<div class="container-fluid py-4">
    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-gradient text-primary fw-bold mb-0">
                    <i class="ni ni-building me-2"></i> Property Management
                </h5>
                <button wire:click="resetForm" class="btn bg-gradient-secondary btn-sm">
                    <i class="ni ni-refresh-02 me-1"></i> Reset Form
                </button>
            </div>
        </div>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-white bg-gradient-success shadow-sm border-0"
            role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- DASHBOARD ANALYTICS CARDS --}}
    <div class="row mb-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card shadow-sm border-radius-xl">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Properties</p>
                                <h5 class="font-weight-bolder mb-0 text-primary">
                                    {{ $properties->where('is_published', false)->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card shadow-sm border-radius-xl">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Published</p>
                                <h5 class="font-weight-bolder mb-0 text-success">
                                    {{ $properties->where('is_published', true)->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card shadow-sm border-radius-xl">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">For Rent</p>
                                <h5 class="font-weight-bolder mb-0 text-info">
                                    {{ $properties->where('transaction_type', 'rent')->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card shadow-sm border-radius-xl">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">For Sale</p>
                                <h5 class="font-weight-bolder mb-0 text-danger">
                                    {{ $properties->where('transaction_type', 'sale')->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="property-form" class="my-4">
        {{-- FORM CARD --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0">{{ $editingId ? 'Edit Property' : 'Add New Property' }}</h5>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="{{ $editingId ? 'updateProperty' : 'saveProperty' }}"
                    enctype="multipart/form-data">

                    {{-- ✅ BASIC INFORMATION --}}
                    <h6 class="text-uppercase text-secondary mb-3">Basic Information</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" wire:model="title" class="form-control" placeholder="Property title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Transaction Type</label>
                            <select wire:model="transaction_type" class="form-select">
                                <option value="rent">Rent</option>
                                <option value="sale">Sale</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Property Type</label>
                            <input type="text" wire:model="property_type" class="form-control"
                                placeholder="e.g. Apartment, Villa">
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-md-4">
                            <label class="form-label">Price (AED)</label>
                            <input type="number" wire:model="price" step="0.01" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Area (SQFT)</label>
                            <input type="number" wire:model="area" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Reference No.</label>
                            <input type="text" wire:model="reference_no" class="form-control"
                                placeholder="TP-XXXXXX">
                        </div>
                    </div>

                    {{-- ✅ PROPERTY DETAILS --}}
                    <hr class="my-4">
                    <h6 class="text-uppercase text-secondary mb-3">Property Details</h6>

                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Bedrooms</label>
                            <input type="number" wire:model="bedrooms" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Bathrooms</label>
                            <input type="number" wire:model="bathrooms" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">View</label>
                            <input type="text" wire:model="view" class="form-control"
                                placeholder="e.g. Community">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status</label>
                            <select wire:model="status" class="form-select">
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                                <option value="rented">Rented</option>
                                <option value="under construction">Under Construction</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Short Description</label>
                        <textarea wire:model="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Full Description</label>
                        <textarea wire:model="description_long" class="form-control" rows="6"></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Key Features</label>
                        <textarea wire:model="key_features" class="form-control" rows="4" placeholder="Comma-separated key features"></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Amenities</label>
                        <input type="text" wire:model="amenities" class="form-control"
                            placeholder="e.g. Balcony, Covered Parking, Built-in wardrobes">
                        <small class="text-muted">Separate by commas</small>
                    </div>

                    {{-- ✅ LOCATION --}}
                    <hr class="my-4">
                    <h6 class="text-uppercase text-secondary mb-3">Location</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" wire:model="location" class="form-control"
                                placeholder="e.g. Business Bay, Dubai">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Google Map Embed Iframe</label>
                            <textarea wire:model="map_iframe" class="form-control" rows="2" placeholder="Paste iframe code"></textarea>
                        </div>
                    </div>

                    {{-- ✅ COMPANY INFO --}}
                    <hr class="my-4">
                    <h6 class="text-uppercase text-secondary mb-3">Company Information</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Company Name</label>
                            <input type="text" wire:model="company_name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Company Email</label>
                            <input type="email" wire:model="company_email" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input type="text" wire:model="company_phone" class="form-control">
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <label class="form-label">Company Address</label>
                            <input type="text" wire:model="company_address" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Website</label>
                            <input type="text" wire:model="company_website" class="form-control">
                        </div>
                    </div>

                    {{-- ✅ IMAGES --}}
                    <hr class="my-4">
                    <h6 class="text-uppercase text-secondary mb-3">Property Images</h6>

                    <div class="mb-3">
                        <input type="file" wire:model="images" multiple class="form-control">
                        @error('images.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Preview existing images --}}
                        @if (!empty($existingImages))
                            <div class="row mt-3">
                                @foreach ($existingImages as $img)
                                    <div class="col-md-2 text-center">
                                        <img src="{{ asset('storage/' . $img) }}"
                                            class="img-fluid rounded shadow-sm mb-2">
                                        <button wire:click="removeExistingImage('{{ $img }}')"
                                            type="button" class="btn btn-sm btn-outline-danger">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- ✅ PUBLISH --}}
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" wire:model="is_published">
                        <label class="form-check-label">Publish Property</label>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit"
                            class="btn btn-primary">{{ $editingId ? 'Update Property' : 'Add Property' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>



    {{-- PROPERTY Grid View --}}
    <section id="property-list" class="my-4">
        <div class="container mt-4">
            <div class="row g-4">
                @forelse($properties as $property)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm h-100">
                            @if (!empty($property->images[0]))
                                <img src="{{ asset('storage/' . $property->images[0]) }}" class="card-img-top"
                                    alt="{{ $property->title }}" style="height: 150px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top"
                                    alt="No Image" style="height: 150px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $property->title }}</h5>
                                <p class="mb-1"><strong>Type:</strong> {{ $property->property_type ?? '-' }}</p>
                                <p class="mb-1"><strong>Price:</strong> ${{ number_format($property->price ?? 0) }}
                                </p>
                                <p class="mb-1">
                                    <span
                                        class="badge bg-gradient-info">{{ ucfirst($property->transaction_type) }}</span>
                                    <span
                                        class="badge bg-gradient-{{ $property->is_published ? 'success' : 'secondary' }}">
                                        {{ $property->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </p>
                                <div class="d-flex flex-wrap gap-1 mb-2">
                                    @if (!empty($property->images))
                                        @foreach ($property->images as $img)
                                            <img src="{{ asset('storage/' . $img) }}" width="45" height="45"
                                                class="rounded shadow-sm" style="object-fit: cover;">
                                        @endforeach
                                    @endif
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <button wire:click="editProperty({{ $property->id }})"
                                        class="btn btn-sm btn-warning text-white">Edit</button>
                                    <button wire:click="confirmDelete({{ $property->id }})"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4">
                        No properties found.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $properties->links() }}
            </div>
        </div>
    </section>

</div>
