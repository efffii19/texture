<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;

class FeaturedPropertiesForSale extends Component
{
    public function render()
    {
        $featuredForSale = Property::where('is_published', true)
            ->where('transaction_type', 'sale')
            ->latest()
            ->take(4)
            ->get();

        return view('livewire.featured-properties-for-sale', compact('featuredForSale'));
    }
}
