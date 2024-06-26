<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use App\Models\ServiceProviderGallery;
use Illuminate\Http\Request;

class ServiceProviderGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $serviceProvider = ServiceProvider::withTrashed()->with("gallery")->find($id);
        return view("service_provider.gallery",compact('serviceProvider'));
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
    public function store(Request $request,$id)
    {

        if($request->hasFile('gallery') && !empty($request->hasFile('gallery')))
        {
            $files = $request->file('gallery');
            // echo "hi";
            foreach($files as $file)
            {
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('service_provider_gallery/'.$id), $filename);
                $serviceProviderGallery = new ServiceProviderGallery();
                $serviceProviderGallery->service_provider_id = $id;
                $serviceProviderGallery->image = $filename;
                $serviceProviderGallery->alt = $file->getClientOriginalName();
                $serviceProviderGallery->save();
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceProviderGallery $serviceProviderGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceProviderGallery $serviceProviderGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceProviderGallery $serviceProviderGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = ServiceProviderGallery::find($id);

        $img = public_path('service_provider_gallery\\'.$gallery->service_provider_id.'\\'.$gallery->image);
        if(!empty($img) && file_exists($img) && !is_dir($img) && is_file($img))
        {
            unlink($img);
            // return $img;
        }

        $gallery->delete();
        return redirect()->back();
    }
}
