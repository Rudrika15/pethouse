<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request["query"] != null)
        {
            $q = $request["query"];
            // orWhere('description','like','%'.$q.'%')
            $categories = Category::where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('slug','like','%'.$q.'%')->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $categories = Category::orderBy('id','desc')->paginate(10);
        }
        return view('category.index', compact('categories'));
    }

    function trashed(Request $request)
    {
        if($request["query"] != null)
        {
            $q = $request["query"];
            // orWhere('description','like','%'.$q.'%')
            $trashedCategories = Category::onlyTrashed()->where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('slug','like','%'.$q.'%')->orderBy('id','desc')->paginate(10); // get all trashed categories

        }
        else
        {

            $trashedCategories = Category::onlyTrashed()->orderBy('id','desc')->paginate(10); // get all trashed categories
        }
        return view('category.trashedCategories', compact('trashedCategories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        // $categoriesdisp = Category::with('children')->whereNull('parent_id')->get();
        return view('category.create', compact('categories'));
    }
    function tree()
    {
        $categories = Category::get(['name as title', 'id', 'parent_id']);


        function buildTree($categories, $parentId = 0)
        {
            $tree = array();
            foreach ($categories as $category) {
                if ($category['parent_id'] == $parentId) {
                    $subs = buildTree($categories, $category['id']);
                    if (!empty($subs)) {
                        $category['subs'] = $subs;
                    }
                    $tree[] = $category;
                }
            }
            return $tree;
        }

        // Build the hierarchical data structure
        $treeData = buildTree($categories);

        $jsonData = json_encode($treeData);

        return response()->json($jsonData);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'categoryName' => 'required|unique:categories,name',
        ], [
            'categoryName.required' => 'Please Enter Category Name',
            'categoryName.unique' => 'This Category Already Exists',
        ]);

        $category = new Category();
        $category->name = $request->categoryName;
        $category->slug = SlugService::createSlug(Category::class, 'slug', $request->categoryName, ['unique' => true]);
        if ($request->categoryDescription)
            $category->description = $request->categoryDescription;

        if ($request->parentCategory)
            $category->parent_id = $request->parentCategory;

        if ($request->hasFile("categoryImage")) {
            $file = $request->file('categoryImage');
            $file_name = time() . $file->getClientOriginalName();
            $dest_path = public_path('categoryImage');
            $category->image = $file_name;
            $file->move($dest_path, $file_name);
        }
         $category->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $updateCategory = Category::find($id);
        return view('category.update', compact('categories', 'updateCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // return $request->all();
        $request->validate([
            'categoryName' => 'required|unique:categories,name,'.$id.',id',
        ], [
            'categoryName.required' => 'Please Enter Category Name',
            'categoryName.unique' => 'This Category Already Exists',
        ]);
        $category = Category::find($id);
        $category->name = $request->categoryName;
        $category->slug = SlugService::createSlug(Category::class, 'slug', $request->categoryName, ['unique' => true]);
        $category->description = $request->categoryDescription;
        $category->parent_id = $request->parentCategory;

        if ($request->hasFile("categoryImage")) {
            $file = $request->file('categoryImage');
            $file_name = time() . $file->getClientOriginalName();
            $dest_path = public_path('categoryImage');
            $category->image = $file_name;
            $file->move($dest_path, $file_name);
        }
        $category->save();
        return redirect()->back()->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::withTrashed()->find($id);
        $category->forceDelete();
        return redirect()->back();
    }

    public function softdDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('category/index');
    }
    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);
        $category->restore();
        return redirect()->back();
    }
    // public function subcategory($id)
    // {
    //     return Category::where('id', $id)->with('children')->get();
    // }
}
