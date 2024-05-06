<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        if($request->hasFile('addGalleryImages'))
        {
            // echo count($request->file("addGalleryImages"));
            PetDetailController::save_images($request->file('addGalleryImages'), $request->petDetailId);
            return redirect()->back()->with("message", "🖼️ Image Added Successfully");
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        if ($request->hasFile("galleryImage")) {
            $file = $request->file("galleryImage");
            $filename = time(). $file->getClientOriginalName();
            $gallery = Gallery::find($request->galleryId);
            $gallery->alt = $file->getClientOriginalName();
            $gallery->image = $filename;
            $gallery->save();
            $file->move(public_path("/petDetailImage"), $filename);

            return redirect()->back()->with("message", "🖼️ Image Updated Successfully");
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->back()->with("message", "🖼️ Image Deleted Successfully");
    }
}
