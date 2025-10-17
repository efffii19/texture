<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;

class FeaturedPropertiesForRent extends Component
{
    public function render()
    {
        $featuredForRent = Property::where('is_published', true)
            ->where('transaction_type', 'rent')
            ->latest()
            ->take(4)
            ->get();

        return view('livewire.featured-properties-for-rent', compact('featuredForRent'));
    }
}
