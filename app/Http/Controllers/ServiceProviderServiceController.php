<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceProvider;
use App\Models\ServiceProviderService;
use Illuminate\Http\Request;

class ServiceProviderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $services = Category::all();
        $serviceProvider = ServiceProvider::find($id);
        // $serviceProviderService = array_column($serviceProvider->services->select('id')->toArray(),'id');
        $serviceProviderService =$serviceProvider->services->where('pivot.status', 'Active')->pluck('id')->toArray();

        return view('service_provider.services',compact('services','serviceProvider','serviceProviderService'));
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
        $serviceProvider = ServiceProvider::find($id);
        $activeServices = $serviceProvider->services->where('pivot.status', 'Active')->pluck('id')->toArray();
        $allServices = $serviceProvider->services->pluck('id')->toArray();
        $inActiveServices = $serviceProvider->services->where('pivot.status', '!=','Active')->pluck('id')->toArray();

        $requiredService = $request->services;

        foreach($allServices as $service)
        {
            if(in_array($service,$requiredService??[]))
            {
                $serviceProviderService =  ServiceProviderService::where('service_id',$service)->where('service_provider_id',$id)->first();
                if($serviceProviderService)
                {
                    $serviceProviderService->status = "Active";
                    $serviceProviderService->save();
                }
            }
            else{
                $serviceProviderService =  ServiceProviderService::where('service_id',$service)->where('service_provider_id',$id)->first();
                if($serviceProviderService)
                {
                    $serviceProviderService->status = "InActive";
                    $serviceProviderService->save();
                }
            }

        }
        $newRequiredService = array_diff($requiredService??[],$allServices);
        foreach($newRequiredService as $service)
        {
            $serviceProviderService = new ServiceProviderService();
            $serviceProviderService->service_id = $service;
            $serviceProviderService->service_provider_id = $id;
            $serviceProviderService->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceProviderService $serviceProviderService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceProviderService $serviceProviderService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceProviderService $serviceProviderService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceProviderService $serviceProviderService)
    {
        //
    }
}
