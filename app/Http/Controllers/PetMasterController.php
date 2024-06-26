<?php

namespace App\Http\Controllers;

use App\Models\PetDetail;
use App\Models\PetMaster;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PetMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request["query"] != null) {
            $q = $request["query"];
            // orWhere('description','like','%'.$q.'%')
            $petMasters = PetMaster::where('id', $q)->orWhere('name', 'like', '%' . $q . '%')->orWhere('slug', 'like', '%' . $q . '%')->orderBy('id', 'desc')->paginate(10);
        } else {

            $petMasters = PetMaster::orderBy('id', 'desc')->paginate(10);
            // return $petMasters;
        }
        return view('pet_master.index', compact('petMasters'));
    }
    public function trashed(Request $request)
    {
        if($request['query'] != null)
        {
            $q = $request["query"];
            $petMasters = PetMaster::where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('slug','like','%'.$q.'%')->onlyTrashed()->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $petMasters = PetMaster::orderBy('id', 'desc')->onlyTrashed()->paginate(10);
        }
        return view('pet_master.trashedPetmasters', compact('petMasters'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pet_master.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'petMasterName' => 'required',
        ], [
            'petMasterName.required' => 'Pet Master Name is required',
        ]);

        $petMaster = new PetMaster();
        $petMaster->name = $request->petMasterName;
        $petMaster->slug = SlugService::createSlug(PetMaster::class, 'slug', $request->petMasterName, ['unique' => true]);
        if ($request->petMasterDescription)
            $petMaster->description = $request->petMasterDescription;
        if ($request->parentPetMaster)
            $petMaster->parent_id = $request->parentPetMaster;
        if ($request->hasFile('petMasterImage')) {
            $file = $request->file('petMasterImage');
            $fileName = time() . $file->getClientOriginalName();
            $petMaster->image = $fileName;
            $file->move(public_path('petMaster'), $fileName);
        }
        $petMaster->save();
        return redirect()->back()->with('message', '🐶 Pet Master Created Successfully');
    }
    function tree()
    {
        $petMasters = PetMaster::get(['name as title', 'id', 'parent_id']);
        function buildTree($petMasters, $parentId = 0)
        {
            $tree = array();
            foreach ($petMasters as $category) {
                if ($category['parent_id'] == $parentId) {
                    $subs = buildTree($petMasters, $category['id']);
                    if (!empty($subs)) {
                        $category['subs'] = $subs;
                    }
                    $tree[] = $category;
                }
            }
            return $tree;
        }

        // Build the hierarchical data structure
        $treeData = buildTree($petMasters);

        $jsonData = json_encode($treeData);

        return response()->json($jsonData);
    }
    /**
     * Display the specified resource.
     */
    public function show(PetMaster $petMaster)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $updatePetMaster = PetMaster::withTrashed()->find($id);
        return view('pet_master.update', compact('updatePetMaster'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // echo $id;
        // return $request->toArray();
        $request->validate([
            'petMasterName' => 'required',
        ], [
            'petMasterName.require' => 'Pet Master Name is required',
            'petMasterName.unique' => 'Pet Master Name already exists',
        ]);
        $petMaster = PetMaster::withTrashed()->find($id);
        $petMaster->name = $request->petMasterName;
        $petMaster->slug = SlugService::createSlug(PetMaster::class, 'slug', $request->petMasterName, ['unique' => true]);
        $petMaster->description = $request->petMasterDescription;
        $petMaster->parent_id = $request->parentPetMaster;
        if ($request->hasFile('petMasterImage')) {
            $file = $request->file('petMasterImage');
            $file_name = time() . $file->getClientOriginalName();
            $petMaster->image = $file_name;
            $file->move(public_path('petMaster'), $file_name);
        }
        $petMaster->save();

        return redirect()->back()->with('message', '🐶 Pet Master Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petMaster = PetMaster::withTrashed()->find($id);
        $petMaster->forceDelete();
        return redirect()->back()->with('message', '🐶 Pet Master Permently Deleted Successfully');
    }
    public function restore($id)
    {
        $petMaster = PetMaster::withTrashed()->find($id);
        $petMaster->restore();
        return redirect()->back()->with('message', '🐶 Pet Master Restored Successfully');
    }

    public function softDelete($id)
    {
        $petMaster = PetMaster::withTrashed()->find($id);
        $petMaster->delete();
        return redirect()->back()->with('message', '🐶 Pet Master Deleted Successfully');
    }
}
