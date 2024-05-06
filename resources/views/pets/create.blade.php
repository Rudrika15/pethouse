@extends('layouts.app')
@section('title', 'Pet Create')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pet Create</h1>
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
                            <h5 class="card-title">Enter Pet Details</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" action="{{ route('pets.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="petName"
                                            class="form-control @error('petName') is-invalid @enderror" id="petName"
                                            value="{{ old('petName') }}" placeholder="Pet Name">
                                        <label for="petName">Pet Name</label>
                                        @error('petName')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="petHeight" value="{{ old('petHeight') }}"
                                            class="form-control @error('petHeight') is-invalid @enderror" id="petHeight"
                                            placeholder="Pet Height">
                                        <label for="petHeight">Pet Height</label>
                                        @error('petHeight')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="petWeight" value="{{ old('petWeight') }}"
                                            class="form-control @error('petWeight') is-invalid @enderror" id="petWeight"
                                            placeholder="Pet Weight">
                                        <label for="petWeight">Pet Weight</label>
                                        @error('petWeight')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="petOrigin" value="{{ old('petOrigin') }}"
                                            class="form-control @error('petOrigin') is-invalid @enderror" id="petOrigin"
                                            placeholder="Pet Origin">
                                        <label for="petOrigin">Pet Origin</label>
                                        @error('petOrigin')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="petColor" value="{{ old('petColor') }}"
                                            class="form-control @error('petColor') is-invalid @enderror" id="petColor"
                                            placeholder="Pet Color">
                                        <label for="petColor">Pet Color</label>
                                        @error('petColor')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="petLifeSpan" value="{{ old('petLifeSpan') }}"
                                            class="form-control @error('petLifeSpan') is-invalid @enderror" id="petLifeSpan"
                                            placeholder="Pet Life Span">
                                        <label for="petLifeSpan">Pet Life Span</label>
                                        @error('petLifeSpan')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="petAge" value="{{ old('petAge') }}"
                                            class="form-control @error('petAge') is-invalid @enderror" id="petAge"
                                            placeholder="Pet Age">
                                        <label for="petAge">Pet Age</label>
                                        @error('petAge')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="file" name="petGallery[]" class="form-control" id="petGallery"
                                            placeholder="Pet Gallery" multiple>
                                        <label for="petGallery">Select Pet Images</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label>
                                            Select Pet Master
                                        </label for="justAnotherInputBox">

                                        @include('pets.petMasterTree')

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="petDescription">Enter Pet Description</label>
                                        <textarea id="petDescription" class="tinymce-editor" name="petDescription">
                                            {{ old('petDescription') }}
                                        </textarea><!-- End TinyMCE Editor -->

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
