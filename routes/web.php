<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageKeyController;
use App\Http\Controllers\PetDetailController;
use App\Http\Controllers\PetMasterController;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\PetDetail;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('category/delete/{id}',[CategoryController::class,'softdDelete'])->name('category.delete');
Route::get("category/restore/{id}",[CategoryController::class,'restore'])->name('category.restore');
Route::get("category/edit/{id}",[CategoryController::class,'edit'])->name('category.edit');
Route::post("category/update/{id}",[CategoryController::class,'update'])->name('category.update');
Route::get("category/destroy/{id}",[CategoryController::class,'destroy'])->name("category.destroy");
Route::get("/category/trashed",[CategoryController::class,'trashed'])->name('category.trashed');
Route::get("/category/tree",[CategoryController::class,'tree'])->name('category.tree');

Route::get('petmaster/create',[PetMasterController::class,'create'])->name('petmaster.create');
Route::get('petmaster/index',[PetMasterController::class,'index'])->name('petmaster.index');
Route::post('petmaster/store',[PetMasterController::class,'store'])->name('petmaster.store');
Route::get('petmaster/tree',[PetMasterController::class,'tree'])->name("petmaster.tree");
Route::get("petmaster/delete/{id}",[PetMasterController::class,'softDelete'])->name("petmaster.delete");
Route::get("petmaster/trashed",[PetMasterController::class,'trashed'])->name("petmaster.trashed");
Route::get("petmaster/restore/{id}",[PetMasterController::class,'restore'])->name('petmaster.restore');
Route::get("petmaster/destory/{id}",[PetMasterController::class,'destroy'])->name("petmaster.destroy");
Route::get("petmaster/edit/{id}",[PetMasterController::class,'edit'])->name("petmaster.edit");
Route::post("petmaster/update/{id}",[PetMasterController::class,'update'])->name("petmaster.update");




Route::get("pets/index",[PetDetailController::class,'index'])->name("pets.index");
Route::get("pets/create",[PetDetailController::class,'create'])->name('pets.create');
Route::post("pets/store",[PetDetailController::class,'store'])->name('pets.store');
Route::get("pets/edit/{id}",[PetDetailController::class,'edit'])->name("pets.edit");
Route::post("pets/update/{id}",[PetDetailController::class,'update'])->name('pets.update');
Route::get("pets/delete/{id}",[PetDetailController::class,'softDelet'])->name("pets.delete");
Route::get("pets/trashed",[PetDetailController::class,'trashed'])->name('pets.trashed');
Route::get("pets/restore/{id}",[PetDetailController::class,'restore'])->name('pets.restore');
Route::get("pets/destroy/{id}",[PetDetailController::class,'destroy'])->name("pets.destroy");
Route::get("pets/show/{id}",[PetDetailController::class,'show'])->name("pets.show");
Route::get("pets/gallery/{id}",[PetDetailController::class,'gallery'])->name("pets.gallery");

Route::get("gallery/destroy/{id}",[GalleryController::class,'destroy'])->name("gallery.destroy");
Route::post("gallery/update",[GalleryController::class,'update'])->name("galler.update");
Route::post("gallery/store",[GalleryController::class,'store'])->name("gallery.store");

Route::get("packagekey/index",[PackageKeyController::class,'index'])->name("packagekey.index");
Route::get("packagekey/trashed",[PackageKeyController::class,'trashed'])->name("packagekey.trashed");
Route::post('packagekey/store', [PackageKeyController::class,'store'])->name("packagekey.store");
Route::get("packagekey/delete/{id}",[PackageKeyController::class,'softDelete'])->name("packagekey.softdelete");
Route::get("packagekey/restore/{id}",[PackageKeyController::class,'restore'])->name("packagekey.restore");
Route::get("packagekey/destroy/{id}",[PackageKeyController::class,'destroy'])->name("packagekey.destroy");
Route::post("packagekey/update",[PackageKeyController::class,"update"])->name("packagekey.update");


Route::get("package/create",[PackageController::class,"create"])->name("package.create");
Route::post("package/store",[PackageController::class,"store"])->name("package.store");
Route::get("package/index",[PackageController::class,"index"])->name("package.index");
Route::get("package/trashed",[PackageController::class,"trashed"])->name("package.trashed");
Route::get("package/delete/{id}",[PackageController::class,"softDelete"])->name("package.softdelete");
Route::get("package/destroy/{id}",[PackageController::class,"destroy"])->name("package.destroy");
Route::get("package/restore/{id}",[PackageController::class,"restore"])->name("package.restore");
Route::get("package/edit/{id}",[PackageController::class,"edit"])->name('package.edit');
Route::post("package/update/{id}",[PackageController::class,"update"])->name("package.update");
