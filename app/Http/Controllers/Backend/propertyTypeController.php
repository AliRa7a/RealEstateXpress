<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;

class propertyTypeController extends Controller
{
    public function AllType()
    {
        $propertyTypes = PropertyType::latest()->get();
        return view('admin.property_type.all_type', compact('propertyTypes'));
    }
}
