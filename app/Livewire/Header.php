<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class Header extends Component
{
    public Collection $navItems;

    public function render()
    {
        return view('livewire.header');
    }
}
