<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use App\Utils\ResponseHelper;
use Exception;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $q = $request->input("q") ?? "";
            $order = $request->input('order') ?? "asc"; //asc or desc default asc
            $field = $request->input('field') ?? "";

            $service_providers = ServiceProvider::with("gallery")->with("services")->with("faqs")->where('id',$q)->orWhere('name','like','%'.$q.'%')->get();
            if(!empty($field))
            {
                $service_providers =  ServiceProvider::with("gallery")->with("services")->with("faqs")->where('id',$q)->orWhere('name','like','%'.$q.'%')->orderBy($field,$order)->get();
            }
            if(count($service_providers))
            {
                return ResponseHelper::sendResponse(["ServiceProviders"=>$service_providers],'Service Providers fetched successfully');
            }
            else
            {
                return ResponseHelper::sendError("No service provider found",[],404);
            }
        }
        catch(Exception $e)
        {
            return ResponseHelper::sendError("Internal Server Error");
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}