@extends('layouts.admin')

@section('content')
    <div class="container-fluid bg-light min-vh-100 py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-primary fw-bold">Admin Dashboard</h1>
                <span class="text-muted">Welcome, {{ Auth::user()->name }}</span>
            </div>

            <!-- Summary Cards -->
            {{-- <div class="row g-4 mb-5">
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase mb-2">Pending Properties</h6>
                            <h3 class="fw-bold text-warning">{{ $pending }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase mb-2">Published Properties</h6>
                            <h3 class="fw-bold text-success">{{ $published }}</h3>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Property Management -->
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-secondary text-white fw-semibold">
                    <i class="bi bi-house-door me-2"></i> Property Listings
                </div>
                <div class="card-body bg-white">
                    <livewire:admin-property-list />
                </div>
            </div>
        </div>
    </div>
@endsection
