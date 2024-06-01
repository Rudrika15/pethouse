@extends('layouts.app')
@section('title', 'Service Providers')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>All Service Providers</h1>
            {{-- <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav> --}}
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <div class='row'>
                                <div class="col-lg-10 col-md-10 col-sm-9">
                                    <div class="row mt-3">
                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                            <form action="" name="search" method="get">
                                                <input type="search" id="myInput" name="query" class="form-control"
                                                    value="{{request('query')}}" placeholder="Search...."
                                                    title="Type in a name">
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{route('service.provider.trash')}}"><i
                                                    class="fa-solid fa-arrows-rotate"></i></a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2 col-md-2 col-sm-3'>
                                    <a href="{{route('service.provider.index')}}"
                                        class="btn btn-success mt-3 float-end btn-shadow">Available Service Provider</a>

                                </div>

                            </div>
                            <!-- Table with stripped rows -->
                            <div class="table-responsive mt-3">
                                <table class="table text-center align-middle table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>FAQs</th>
                                            <th>Services</th>
                                            <th>Gallery</th>
                                            <th>Location</th>
                                            <th>Actoin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($serviceProviders as $serviceProvider)
                                            @if($serviceProvider->trashed())
                                            <tr>
                                                <td>
                                                    {{$serviceProvider->id}}
                                                </td>

                                                <td>{{ $serviceProvider->name }}</td>
                                                <td>{{ $serviceProvider->email }}</td>


                                                <td>
                                                    {{ $serviceProvider->phone }}
                                                </td>

                                                <td>
                                                    <a href="{{route('service.provider.faq.index',$serviceProvider->id)}}" class="btn btn-shadow btn-secondary position-relative">
                                                        <i class="fa-solid fa-clipboard-question"></i>
                                                        <span class="position-absolute top-0 start-100 btn-shadow translate-middle badge rounded-pill bg-danger">
                                                            {{$serviceProvider->faqs->count()}}
                                                          </span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('service.provider.service.index',$serviceProvider->id)}}" class="btn btn-shadow btn-secondary position-relative">
                                                        <i class="fa-solid fa-wrench"></i>
                                                        <span class="position-absolute top-0 start-100 btn-shadow translate-middle badge rounded-pill bg-danger">
                                                            {{$serviceProvider->services->where('pivot.status','Active')->count()}}
                                                          </span>
                                                    </a>
                                                </td>
                                                <td>

                                                    <a href="" class="btn btn-secondary position-relative btn-shadow">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span class="position-absolute top-0 start-100 btn-shadow translate-middle badge rounded-pill bg-danger">
                                                            {{$serviceProvider->gallery->count()}}
                                                          </span>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a {{ !empty($serviceProvider->lat) && !empty($serviceProvider->lng) ? "href=https://maps.google.com/?q=$serviceProvider->lat,$serviceProvider->lng" : ""}} target="_blank" class="btn-shadow btn btn-secondary position-relative">
                                                        <i class="fa-solid fa-location-crosshairs"></i>
                                                        @if(!empty($serviceProvider->lat) && !empty($serviceProvider->lng))
                                                        <span class="position-absolute top-0 start-100 btn-shadow translate-middle p-2 bg-success border border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                          </span>
                                                        @endif
                                                    </a>


                                                </td>
                                                <td>
                                                    <a href="{{route('service.provider.restore',$serviceProvider->id)}}"
                                                        class="btn btn-success btn-shadow" title="Restore"><i
                                                            class="fa-solid fa-trash-can-arrow-up"></i></a>
                                                    <a href="{{route('service.provider.destroy',$serviceProvider->id)}}"
                                                        class="btn btn-danger btn-shadow" title="Perment Delete"><i
                                                            class="fa-solid fa-circle-xmark"></i></a>

                                                </td>
                                            </tr>
                                            @endif
                                            @empty
                                        <tr>
                                            <th colspan="9">
                                                <h2 class="text text-danger">🙅 Record Not Available</h2>
                                            </th>
                                        </tr>
                                        @endforelse

                                    </tbody>

                                </table>
                            </div>
                            <!-- End Table with stripped rows -->
                            <div class="d-flex justify-content-center">
                                {!! $serviceProviders->links() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->


@endsection
