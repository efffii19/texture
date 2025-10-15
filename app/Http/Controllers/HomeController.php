<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        // Featured properties for sale
        $featuredForSale = Property::where('transaction_type', 'sale')
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        // Featured properties for rent
        $featuredForRent = Property::where('transaction_type', 'rent')
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        // Latest properties
        $latestProperties = Property::where('is_published', true)
            ->latest()
            ->take(8)
            ->get();

        return view('pages.home', compact('featuredForSale', 'featuredForRent', 'latestProperties'));
    }
}
