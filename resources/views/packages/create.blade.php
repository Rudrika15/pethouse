@extends('layouts.app')
@section('title', 'Package Create')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Package Create</h1>
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
                            <h5 class="card-title">Enter Package Details</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" action="{{ route('package.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control @error('packageName') is-invalid @enderror"
                                            value="{{ old('packageName') }}" id="packageName" placeholder="Package Name"
                                            name="packageName">
                                        <label for="packageName">Package Name</label>
                                        @error('packageName')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="number"
                                            class="form-control @error('packagePrice') is-invalid @enderror"
                                            name="packagePrice" value="{{ old('packagePrice') }}" id="packagePrice"
                                            placeholder="Package Price">
                                        <label for="packagePrice">Package Price</label>
                                        @error('packagePrice')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="packageDescription" placeholder="Address" id="packageDescription"
                                            style="height: 100px;">{{ old('packageDescription') }}</textarea>
                                        <label for="packageDescription">Package Description</label>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <h3 class="card-title">Add Package Keys</h3>
                                    <div class="mb-3">
                                        <div class="card-body p-0">
                                            @foreach ($keys as $key)
                                                <div
                                                    class="row m-2 p-2 packageKeysBox-style d-flex align-items-center card-3d-shadow-radius">
                                                    <div class="col-1 col-lg-1 col-sm-2 text-center">
                                                        <img src="{{ asset('packageKeyIcon/' . $key->icon) }}"
                                                            alt="{{ $key->icon }}"
                                                            class=" img-thumbnail object-fit-cover rounded-circle"
                                                            style="max-height: 60px;height: 60px; max-width: 60px;width:60px;" />

                                                    </div>
                                                    <div class="col-8 col-lg-8 col-sm-7">
                                                        {{ $key->key }}
                                                    </div>
                                                    <div class="col-2 col-lg-2 col-sm-2">
                                                        <i class="fa-solid fa-indian-rupee-sign"></i> {{ $key->price }}
                                                    </div>
                                                    <div class="col-1 col-sm-1 col-lg-1 justify-center text-center">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input packageKeys" type="checkbox"
                                                                style="scale: 1.5;" name="keys[]"
                                                                value="{{ $key->id }}">
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach



                                        </div>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>


                            </form><!-- End floating Labels Form -->

                        </div>
                    </div>
                </div>

            </div>


        </section>

    </main><!-- End #main -->


@endsection
