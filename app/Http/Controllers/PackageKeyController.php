<?php

namespace App\Http\Controllers;

use App\Models\PackageKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PackageKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request["query"] != "")
        {
            $q = $request["query"];
            $packageKeys = PackageKey::where('id',$q)->orWhere('key','like','%'.$q.'%')->orWhere('price',$q)->orderBy("id","desc")->paginate(10);
        }
        else
        {
            $packageKeys = PackageKey::orderBy("id","desc")->paginate(10);
        }
        return view("packageKey.index",compact('packageKeys'));
    }
    public function trashed(Request $request)
    {
        if($request["query"] != "")
        {
            $q = $request["query"];
            $packageKeys = PackageKey::where('id',$q)->orWhere('key','like','%'.$q.'%')->orWhere('price',$q)->onlyTrashed()->orderBy("id","desc")->paginate(10);
        }
        else
        {
            $packageKeys = PackageKey::orderBy("id","desc")->onlyTrashed()->paginate(10);
        }
        return view("packageKey.trashedPackageKey",compact('packageKeys'));
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
        // return $request->file('keyIcon')();
        $validator = Validator::make($request->all(),
        [
            "keyTitle"=>"required",
            "keyPrice"=>"required|numeric",
        ],
        [
            "keyTitle.required"=>"Please Enter Key Title",
            "keyPrice.required"=>"Please Enter Key Price",
            "keyPrice.numeric" => "Price Must Be Numeric",
        ],);
        // return $validator->errors();
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator,'AddKeyError')->withInput($request->all());
        }

        $packageKey = new PackageKey();
        $packageKey->key = $request->keyTitle;
        $packageKey->price = $request->keyPrice;
        $packageKey->description = $request->keyDescription;

        if($request->hasFile("keyIcon"))
        {
            $file = $request->file("keyIcon");
            $fileName = time() . $file->getClientOriginalName();
            $packageKey->icon = $fileName;
            $file->move(public_path("packageKeyIcon"),$fileName);
        }

        $packageKey->save();

        return redirect()->back()->with('message','Key Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(PackageKey $packageKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageKey $packageKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            "editKeyTitle"=>"required",
            "editKeyPrice"=>"required|numeric",
        ],
        [
            "editKeyTitle.required"=>"Please Enter Key Title",
            "editKeyPrice.required"=>"Please Enter Key Price",
            "editKeyPrice.numeric" => "Price Must Be Numeric",
        ],);
        // return $validator->errors();
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator,'EditKeyError')->withInput($request->all());
        }
        $packageKey = PackageKey::withTrashed()->find($request->key_id);
        // return $request->all();

        $packageKey->key = $request->editKeyTitle;
        $packageKey->price = $request->editKeyPrice;
        $packageKey->description = $request->editKeyDescription;

        if($request->hasFile('editKeyIcon'))
        {
            $file = $request->file('editKeyIcon');
            $fileName = time() . $file->getClientOriginalName();
            $packageKey->icon = $fileName;
            $file->move(public_path("packageKeyIcon"),$fileName);
        }

        $packageKey->save();

        return redirect()->back()->with('message','Key Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $packageKey = PackageKey::withTrashed()->find($id);
        $packageKey->forceDelete();
        return redirect()->back()->with("message","Package Key Perment Deleted Successfully");

    }
    public function restore($id)
    {
        $packageKey = PackageKey::withTrashed()->find($id);
        $packageKey->restore();
        return redirect()->back()->with("message","Package Key Restored Successfully");
    }
    public function softDelete($id) {
        $packageKey = PackageKey::withTrashed()->find($id);
        $packageKey->delete();
        return redirect()->back()->with("message","Package Key Deleted Successfully");
    }

}
