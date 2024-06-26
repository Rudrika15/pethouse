@extends('layouts.app')
@section('title', 'Update Service Provider')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Service Provider</h1>
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
                            <h3 class="card-title">General Information</h3>
                            <form method="POST" action="{{ route('service.provider.update', $serviceProvider->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Enter Name"
                                                value="{{ $serviceProvider->name }}">
                                            <label for="name">Name</label>
                                        </div>
                                        @error('name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="useremail"
                                                class="form-control @error('useremail') is-invalid @enderror"
                                                value="{{ $serviceProvider->email }}" id="useremail" name="useremail"
                                                placeholder="Enter Email">
                                            <label for="useremail">Email</label>
                                        </div>
                                        @error('useremail')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="{{ $serviceProvider->password }}" id="password" name="password"
                                                placeholder="Password">
                                            <label for="password">Password</label>
                                        </div>
                                        @error('password')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('phone')) is-invalid @enderror" id="phone"
                                                value="{{ $serviceProvider->phone }}" name="phone"
                                                placeholder="Enter Phone No.">
                                            <label for="phone">Phone No.</label>

                                        </div>
                                        @error('phone')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('whatsapp') is-invalid @enderror"
                                                id="whatsapp" name="whatsapp" placeholder="whatsapp"
                                                value="{{ $serviceProvider->whatsapp_no }}">
                                            <label for="whatsapp">Whatsapp No.</label>
                                        </div>
                                        @error('whatsapp')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="description" name="description" id="description" style="height: 70px;">{{ $serviceProvider->description }}</textarea>
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-1">

                                                <img src="{{ asset('service_provider/'. $serviceProvider->image) }}"
                                                    alt="{{ $serviceProvider->name }}"
                                                    class=" img-thumbnail object-fit-cover object-fit-fill rounded-circle"
                                                    style="max-height: 60px;height: 60px; max-width: 60px;width:60px;" />
                                            </div>
                                            <div class="col-11">
                                                <div class="form-floating">
                                                    <input type="file" accept=".jpg,.png,.gif,.jpeg" class="form-control"
                                                        id="pro_img" name="pro_img" placeholder="pro_img">
                                                    <label for="pro_img">Profile Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Address" name="address" id="address" style="height: 70px;">{{ $serviceProvider->address }}</textarea>
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="lat" name="lat"
                                                    placeholder="Latitude" value="{{ $serviceProvider->lat }}">
                                                <label for="lat">Latitude</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="lng" name="lng"
                                                    placeholder="Longitude" value="{{ $serviceProvider->lng }}">
                                                <label for="lng">Longitude</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="facebook_link" name="facebook_link"
                                                    placeholder="facebook_link"
                                                    value="{{ $serviceProvider->facebook_link }}">
                                                <label for="facebook_link">Facebook</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="instagram_link" name="instagram_link"
                                                    placeholder="instagram_link"
                                                    value="{{ $serviceProvider->instagram_link }}">
                                                <label for="instagram_link">Instagram</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="youtube_link" name="youtube_link"
                                                    placeholder="youtube_link"
                                                    value="{{ $serviceProvider->youtube_link }}">
                                                <label for="youtube_link">Youtube</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="twitter_link" name="twitter_link"
                                                    placeholder="twitter_link"
                                                    value="{{ $serviceProvider->twitter_link }}">
                                                <label for="twitter_link">Twitter</label>
                                            </div>
                                        </div>

                                        <div class="text-center mt">
                                            <button type="submit" class="btn btn-warning">Update</button>
                                            <a href="{{ route('service.provider.index') }}"
                                                class="btn btn-secondary">Cancel</a>
                                        </div>

                                    </div>


                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </section>

    </main><!-- End #main -->


@endsection
