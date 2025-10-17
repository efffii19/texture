<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;

class LatestProperties extends Component
{
    public function render()
    {
        $latestProperties = Property::where('is_published', true)
            ->latest()
            ->take(12)
            ->get();

        return view('livewire.latest-properties', compact('latestProperties'));
    }
}
