<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
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
        $save_url = 'upload/property/thumbnail/' . $name_gen;

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

            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,

            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,
            'propertytype_id' => $request->propertytype_id,

        ]);
    }
}
