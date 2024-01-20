<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
    public function allProperties()
    {
        $properties = Property::latest()->get();
        return view('admin.properties.all_properties', compact('properties'));
    }

    public function addProperties()
    {
        return view('admin.properties.add_properties');
    }
}
