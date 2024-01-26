<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    public function allProperties()
    {
        $properties = Property::latest()->get();
        return view('admin.properties.all_properties', compact('properties'));
    }

    public function addProperties()
    {
        $propertyTypes = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgents = User::where('status', 'active')->where('role', 'agent')->latest()->get();
        return view('admin.properties.add_properties', compact('propertyTypes', 'amenities', 'activeAgents'));
    }

    public function storeProperties(Request $request)
    {
        $amen = $request->amenities_id;
        $amenities = implode(",", $amen);

        $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code', 'length' => 5, 'prefix' => 'PC']);
        $image = $request->file('property_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save('upload/property/thumbnail/' . $name_gen);
        $property_thumbnail = 'upload/property/thumbnail/' . $name_gen;

        $property_id = Property::insertGetId([
            'propertytype_id' => $request->propertytype_id,
            'amenities_id' => $request->$amenities,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'propertytype_id' => $pcode,

            'property_status' => $request->property_status,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,

            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,

            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,

            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'status' => 1,
            'property_thumbnail' => $property_thumbnail,
            'created_at' => Carbon::now(),

        ]);

        //Multiple Image Insert
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(770, 520)->save('upload/property/multi-image/' . $make_name);
            $multi_images = 'upload/property/multi-image/' . $make_name;

            MultiImage::insert([
                'property_id' => $property_id,
                'photo_name' => $multi_images,
                'created_at' => Carbon::now(),
            ]);
        }

        //Facilities Inert
        $facilities = Count($request->facility_name);
        if ($facilities != NULL) {
            for ($i = 0; $i < $facilities; $i++) {
                $fcount = new Facility();
                $fcount->property_id = $property_id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i];
                $fcount->save();
            }
        }
        toastr()->success('Amenity is updated successfully');
        return redirect()->route('all.properties');
    }
}
