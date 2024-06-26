<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use App\Models\ServiceProviderFaq;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ServerBag;

class ServiceProviderFaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $serviceProvider = ServiceProvider::withTrashed()->find($id);
        return view('service_provider.faqs',compact('serviceProvider'));
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
        // return $request;
        if($request->has('faq') && !empty($request->has('faq')))
        {
            $faq = $request->faq;
            $que = $faq['que'];
            $ans = $faq['ans'];
            if(!empty($que) && !empty($ans)){
                $count = min(count($ans),count($que));
                for($i=0;$i<$count;$i++){
                    if(!empty($que[$i]) && !empty($ans[$i]))
                    {
                        $serviceProviderFaq = new ServiceProviderFaq();
                        $serviceProviderFaq->question = $que[$i];
                        $serviceProviderFaq->answer = $ans[$i];
                        $serviceProviderFaq->service_provider_id = $id;
                        $serviceProviderFaq->save();

                    }
                }
            }
        }
        return redirect()->back();
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
    public function destroy($id)
    {

        $faq = ServiceProviderFaq::find($id)->delete();
        return redirect()->back();
    }
}
