@extends('layouts.app')
@section('title', 'Pet Master Update')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pet Master Update</h1>

        </div><!-- End Page Title -->

        <section class="section">




            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <h5 class="card-title">Enter Pet Master Detail</h5>
                            {{-- {{$updateCategory}} --}}
                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" action="{{ route('petmaster.update', $updatePetMaster->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control @error('petMasterName') is-invalid @enderror"
                                            value="{{ old('petMasterName') ? old('petMasterName') : $updatePetMaster->name }}"
                                            name="petMasterName" id="petMasterName" placeholder="Your Name">
                                        <label for="petMasterName">Pet Master Name</label>
                                        @error('petMasterName')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1">

                                            <img src="{{ asset('petMaster/' . $updatePetMaster->image) }}"
                                                alt="{{ $updatePetMaster->name }}"
                                                class=" img-thumbnail object-fit-cover object-fit-fill rounded-circle"
                                                style="max-height: 60px;height: 60px; max-width: 60px;width:60px;" />
                                        </div>
                                        <div class="col-11">

                                            <div class="form-floating">

                                                <input type="file" class="form-control" name="petMasterImage"
                                                    id="petMasterImage">
                                                <label for="petMasterImage">Category Image</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="petMasterDescription" placeholder="Pet Master Description" id="floatingTextarea"
                                            style="height: 100px;">{{ $updatePetMaster->description }}</textarea>
                                        <label for="petMasterDescription">Pet Master Description</label>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <label>Select Paretn Pet Master</label>
                                    <div>
                                        @include('pet_master.petMasterTree', [
                                            'updateCategory' => $updatePetMaster,
                                        ])


                                    </div>

                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-shadow">Update</button>
                                    <button type="reset" class="btn btn-secondary btn-shadow">Reset</button>
                                </div>
                            </form><!-- End floating Labels Form -->

                        </div>
                    </div>

                </div>


        </section>

    </main><!-- End #main -->


@endsection
