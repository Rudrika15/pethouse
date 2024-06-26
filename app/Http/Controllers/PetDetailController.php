<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\PetDetail;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PetDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request["query"] != null)
        {
            $q = $request["query"];
            $petDetails = PetDetail::where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('slug','like','%'.$q.'%')->orWhere('origin','like','%'.$q.'%')->orderBy("id","desc")->paginate(10);
        }
        else
        {
            $petDetails = PetDetail::orderBy("id","desc")->paginate(10);
        }
        return view("pets.index", compact('petDetails'));
    }

    public function trashed(Request $request)
    {
        if($request["query"] != null)
        {
            $q = $request["query"];
            $petDetails = PetDetail::where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('slug','like','%'.$q.'%')->orWhere('origin','like','%'.$q.'%')->onlyTrashed()->orderBy("id","desc")->paginate(10);
        }
        else
        {
            $petDetails = PetDetail::onlyTrashed()->orderBy("id","desc")->paginate(10);
        }
        return view("pets.trashedPets", compact('petDetails'));

    }

    public function gallery($id) {
        $petDetail = PetDetail::withTrashed()->find($id);
        return view("pets.petGallery",compact("petDetail"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pets.create");
    }
    public static function save_images($files, $pet_detail_id)
    {
        foreach ($files as $file) {
            $file_name = time() . $file->getClientOriginalName();
            $gallery = new Gallery();
            $gallery->image = $file_name;
            $gallery->alt = $file->getClientOriginalName();
            $gallery->pet_id = $pet_detail_id;
            $gallery->save();
            $file->move(public_path('petDetailImage'), $file_name);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request->all();
        $request->validate([
            'petName' => 'required',
            'petHeight' => 'required',
            'petWeight' => 'required',
            'petOrigin' => 'required',
            'petColor' => 'required',
            'petLifeSpan' => 'required',
            'petAge' => 'required',
            'petMasterId' => 'required',
        ], [
            'petName.required' => 'Pet Name is required',
            'petHeight.required' => 'Pet Height is required',
            'petWeight.required' => 'Pet Weight is required',
            'petOrigin.required' => 'Pet Origin is required',
            'petColor.required' => 'Pet Color is required',
            'petLifeSpan.required' => 'Pet Life Span is required',
            'petAge.required' => 'Pet Age is required',
            'petMasterId.required' => 'Please Select Pet Master is required',
        ]);

        $pet_details = new PetDetail();

        $pet_details->name = $request->petName;
        $pet_details->slug = SlugService::createSlug(PetDetail::class, 'slug', $request->petName, ['unique' => true]);
        $pet_details->height = $request->petHeight;
        $pet_details->weight = $request->petWeight;
        $pet_details->origin = $request->petOrigin;
        $pet_details->color = $request->petColor;
        $pet_details->life_span = $request->petLifeSpan;
        $pet_details->age = $request->petAge;
        $pet_details->petmaster_id = $request->petMasterId;
        $pet_details->description = $request->petDescription;
        $pet_details->save();

        if($request->hasFile('petGallery'))
            PetDetailController::save_images($request->file('petGallery'), $pet_details->id);

        return redirect()->back()->with("message", "🐾 Pet Details Added Successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $petDetail = PetDetail::withTrashed()->find($id);
        return view('pets.show',compact('petDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $petDetail = PetDetail::withTrashed()->find($id);
        return view("pets.update", compact('petDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'petName' => 'required',
            'petHeight' => 'required',
            'petWeight' => 'required',
            'petOrigin' => 'required',
            'petColor' => 'required',
            'petLifeSpan' => 'required',
            'petAge' => 'required',
            'petMasterId' => 'required',
        ], [
            'petName.required' => 'Pet Name is required',
            'petHeight.required' => 'Pet Height is required',
            'petWeight.required' => 'Pet Weight is required',
            'petOrigin.required' => 'Pet Origin is required',
            'petColor.required' => 'Pet Color is required',
            'petLifeSpan.required' => 'Pet Life Span is required',
            'petAge.required' => 'Pet Age is required',
            'petMasterId.required' => 'Please Select Pet Master is required',
        ]);

        $petDetail = PetDetail::withTrashed()->find($id);

        $petDetail->name = $request->petName;
        $petDetail->slug = SlugService::createSlug(PetDetail::class, 'slug', $request->petName, ['unique' => true]);
        $petDetail->height = $request->petHeight;
        $petDetail->weight = $request->petWeight;
        $petDetail->origin = $request->petOrigin;
        $petDetail->color = $request->petColor;
        $petDetail->life_span = $request->petLifeSpan;
        $petDetail->age = $request->petAge;
        $petDetail->petmaster_id = $request->petMasterId;
        $petDetail->description = $request->petDescription;
        $petDetail->save();

        if($request->hasFile('petGallery'))
            PetDetailController::save_images($request->file('petGallery'), $petDetail->id);

        return redirect()->back()->with("message", "🐾 Pet Details Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petDetail = PetDetail::withTrashed()->find($id);
        $petDetail->forceDelete();

        return redirect()->back()->with("message","🐾 Pet Perment Deleted Successfully");

    }

    public function restore($id) {
        $petDetail = PetDetail::withTrashed()->find($id);
        $petDetail->restore();

        return redirect()->back()->with("message","🐾 Pet Restored Successfully");
    }


    public function softDelet($id) {
        $petDetail = PetDetail::withTrashed()->find($id);
        $petDetail->delete();
        return redirect()->back()->with("message","🐾 Pet Deleted Successfully");

    }
}
