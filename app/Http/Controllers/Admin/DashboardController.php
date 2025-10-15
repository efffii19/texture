<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $pending = Property::where('is_published', false)->count();
        $published = Property::where('is_published', true)->count();

        return view('admin.dashboard', compact('pending', 'published'));
    }
}
