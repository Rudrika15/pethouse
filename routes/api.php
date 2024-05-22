<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\PackageKeyController;
use App\Http\Controllers\Api\PetController;
use App\Http\Controllers\Api\PetMasterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/categories",[CategoryController::class,'index']);


Route::get("/petmasters",[PetMasterController::class,'index']);

Route::get("/pets",[PetController::class,'index']);

Route::get("/packagekeys",[PackageKeyController::class,'index']);

Route::get("/packages",[PackageController::class,'index']);
