<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
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
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();
        return view('admin.properties.add_properties', compact('propertyType', 'amenities', 'activeAgent'));
    }
}
