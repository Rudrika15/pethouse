<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageKey;
use App\Models\PackageLinkKey;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request["query"] != "")
        {
            $q = $request["query"];
            $packages = Package::where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('slug','like','%'.$q.'%')->orderBy("id","desc")->paginate(10);
        }
        else
        {
            $packages = Package::orderBy("id","desc")->paginate(10);
        }
        return view("packages.index",compact('packages'));
    }

    public function trashed(Request $request)
    {
        if($request["query"] != "")
        {
            $q = $request["query"];
            $packages = Package::onlyTrashed()->where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('slug','like','%'.$q.'%')->orderBy("id","desc")->paginate(10);
        }
        else
        {
            $packages = Package::onlyTrashed()->orderBy("id","desc")->paginate(10);
        }
        return view("packages.trashedPackage",compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keys = PackageKey::all();
        return view("packages.create",compact('keys'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'packageName'=>'required',
            'packagePrice'=>'required',
        ],
        [
            'packageName.required' => "Please Enter Package Name",
            'packagePrice.required' =>"Please Enter Package Price",
        ]);

        $package = new Package();
        $package->name = $request->packageName;
        $package->slug = SlugService::createSlug(Package::class, 'slug', $request->packageName, ['unique' => true]);
        $package->price = $request->packagePrice;
        $package->description = $request->packageDescription;
        $package->save();

        if($request->keys)
        {
            foreach($request->keys as $packageKey)
            {
                $key = new PackageLinkKey();
                $key->package_id = $package->id;
                $key->key_id = $packageKey;
                $key->save();
            }

        }

        return redirect()->back()->with('message','📦 Package Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = Package::withTrashed()->with('keys')->find($id);
        $packageKeyIds = array_column($package->keys->toArray(),'id');
        $keys = PackageKey::whereNotIn('id',$packageKeyIds)->get();
        return view("packages.update",compact('package','keys'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // return $request->all();
        $request->validate([
            'packageName'=>'required',
            'packagePrice'=>'required',
        ],
        [
            'packageName.required' => "Please Enter Package Name",
            'packagePrice.required' =>"Please Enter Package Price",
        ]);

        $package = Package::withTrashed()->find($id);
        $package->name = $request->packageName;
        $package->slug = SlugService::createSlug(Package::class, 'slug', $request->packageName, ['unique' => true]);
        $package->price = $request->packagePrice;
        $package->description = $request->packageDescription;
        $package->save();

        PackageLinkKey::whereIn('package_id',[$id])->delete();

        if($request->updatekeys)
        {
            // return $request->all();
            foreach($request->updatekeys as $packageKey)
            {
                $key = new PackageLinkKey();
                $key->package_id = $package->id;
                $key->key_id = $packageKey;
                $key->save();
            }
        }

        if($request->newkeys)
        {
            // echo "newkeys";
            foreach($request->newkeys as $packageKey)
            {
                $key = new PackageLinkKey();
                $key->package_id = $id;
                $key->key_id = $packageKey;
                $key->save();
            }
        }

        return redirect()->back()->with("message","📦 Package Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = Package::withTrashed()->find($id);
        $package->forceDelete();
        return redirect()->back()->with("message","📦 Package Perment Deleted Successfully");
    }

    public function restore($id)
    {
        $package = Package::withTrashed()->find($id);
        $package->restore();
        return redirect()->back()->with("message","📦 Package Restored Successfully");
    }

    public function softDelete($id)
    {
        $package = Package::withTrashed()->find($id);
        $package->delete();
        return redirect()->back()->with('message','📦 Package Deleted Successfully');
    }
}
