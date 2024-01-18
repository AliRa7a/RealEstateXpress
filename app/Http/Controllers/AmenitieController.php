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
    public function storeAmenities(Request $request)
    {
        $request->validate([
            'amenities_name' => 'required|unique:amenities|max:200',
        ]);
        Amenities::insert([
            'amenities_name' => $request->amenities_name,
        ]);
        toastr()->success('New Amenity is added successfully');
        return redirect()->route('all.type');
    }

    public function editAmenities($id)
    {
        $amenityTypes = Amenities::findOrFail($id);
        return view('admin.amenities.edit_type', compact('amenityTypes'));
    }
}
