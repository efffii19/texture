<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function home()
    {
        $featuredProperties = Property::where('featured', true)->latest()->take(6)->get();
        return view('pages.home', compact('featuredProperties'));
    }

    public function listing()
    {
        $properties = Property::latest()->paginate(9);
        return view('pages.listing', compact('properties'));
    }

    public function detail($id)
    {
        $property = Property::findOrFail($id);
        $relatedProperties = Property::where('id', '!=', $id)
            ->where('type', $property->type)
            ->take(3)
            ->get();
        return view('pages.detail', compact('property', 'relatedProperties'));
    }
}
