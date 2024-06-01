<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceProvider;
use App\Models\ServiceProviderFaq;
use App\Models\ServiceProviderGallery;
use App\Models\ServiceProviderService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!empty($request->get('query')))
        {
            $q = $request->get('query');
            $serviceProviders = ServiceProvider::where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('email','like','%'.$q.'%')->orWhere('phone','like','%'.$q.'%')->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $serviceProviders = ServiceProvider::orderBy('id','desc')->paginate(10);
        }

        return view('service_provider.index',compact('serviceProviders'));
    }
    public function trash(Request $request)
    {
        if(!empty($request->get('query')))
        {
            $q = $request->get('query');
            $serviceProviders = ServiceProvider::onlyTrashed()->where('id',$q)->orWhere('name','like','%'.$q.'%')->orWhere('email','like','%'.$q.'%')->orWhere('phone','like','%'.$q.'%')->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $serviceProviders = ServiceProvider::onlyTrashed()->orderBy('id','desc')->paginate(10);
        }

        return view('service_provider.trash',compact('serviceProviders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Category::all();
        return view('service_provider.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $firsttab = Validator::make($request->all(),[
            'name'=>'required',
            'useremail'=>'required|email|unique:service_providers,email',
            'phone'=>'required|min:11|numeric',
            'whatsapp'=>'required|min:11|numeric',
            'password'=>'required',
        ],[
            'name.required'=>'Name is required',
            'useremail.required'=>'Email is required',
            'phone.required'=>'Phone No. is required',
            'whatsapp.required'=>'Whatsapp No. is required',
            'password.required'=>'Password is required',
            'phone.numeric'=>'Phone No. must be numeric',
            'whatsapp.numeric'=>'Whatsapp No. must be numeric',
            'phone.min'=>'Phone No. must be 10 digit',
            'whatsapp.min'=>'Whatsapp No. must be 10 digit',
            'phone.max'=>'Phone No. must be 10 digit',
            'whatsapp.max'=>'Whatsapp No. must be 10 digit',
            'useremail.email'=>'Enter valid email address',
            'useremail.unique'=>'Email already exists',
        ]);
        if($firsttab->fails()){
            return redirect()->back()->withErrors($firsttab,'firsttab')->withInput($request->all());
        }

        $serviceProvider = new ServiceProvider();
        $serviceProvider->name = $request->name;
        $serviceProvider->slug = SlugService::createSlug(ServiceProvider::class, 'slug', $request->name, ['unique' => true]);
        $serviceProvider->email =$request->useremail;
        $serviceProvider->phone = $request->phone;
        $serviceProvider->whatsapp_no = $request->whatsapp;
        $serviceProvider->password = bcrypt($request->password);
        $serviceProvider->description = $request->description;
        $serviceProvider->address = $request->address;
        $serviceProvider->lat = $request->lat;
        $serviceProvider->lng = $request->lng;
        $serviceProvider->facebook_link = $request->facebook_link;
        $serviceProvider->instagram_link = $request->instagram_link;
        $serviceProvider->youtube_link = $request->youtube_link;
        $serviceProvider->twitter_link = $request->twitter_link;
        if($request->hasFile("pro_img")){
            $file = $request->file('pro_img');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('service_provider'), $filename);
            $serviceProvider->image = $filename;
        }
        $serviceProvider->save();

        $serviceProviderId = $serviceProvider->id;

        if($request->has('services') && !empty($request->has('services'))){
            $services = $request->services;
            foreach($services as $service)
            {
                $serviceProviderServices = new ServiceProviderService();
                $serviceProviderServices->service_provider_id = $serviceProviderId;
                $serviceProviderServices->service_id = $service;
                $serviceProviderServices->save();
            }

        }

        if($request->hasFile('gallery') && !empty($request->hasFile('gallery')))
        {
            $files = $request->file('gallery');
            // echo "hi";
            foreach($files as $file)
            {
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('service_provider_gallery/'.$serviceProviderId), $filename);
                $serviceProviderGallery = new ServiceProviderGallery();
                $serviceProviderGallery->service_provider_id = $serviceProviderId;
                $serviceProviderGallery->image = $filename;
                $serviceProviderGallery->alt = $file->getClientOriginalName();
                $serviceProviderGallery->save();
            }
        }

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
                        $serviceProviderFaq->service_provider_id = $serviceProviderId;
                        $serviceProviderFaq->save();

                    }
                }
            }
        }
        return redirect()->route('service.provider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $serviceProvider = ServiceProvider::withTrashed()->find($id);
        $serviceProvider->forceDelete();
        return redirect()->back()->with('message','👷‍♂️ Service Provider Perment Deleted Successfully');
    }

    public function restore($id)
    {
        $serviceProvider = ServiceProvider::withTrashed()->find($id);
        $serviceProvider->restore();
        return redirect()->back()->with('message','👷‍♂️ Service Provider Restored Successfully');
    }

    public function softDelete($id)
    {
        $serviceProvider = ServiceProvider::withTrashed()->find($id);
        $serviceProvider->delete();
        return redirect()->back()->with('message','👷‍♂️ Service Provider Deleted Successfully');
    }
}
