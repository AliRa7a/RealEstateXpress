<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;

class AmenitieController extends Controller
{
    public function allAmenities()
    {
        $amenityTypes = Amenities::latest()->get();
        return view('admin.amenities.all_type', compact('amenityTypes'));
    }
    public function addAmenities()
    {
        return view('admin.amenities.add_type');
    }


}
