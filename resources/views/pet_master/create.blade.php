@extends('layouts.app')
@section('title', 'Create Pet Master')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pet Master Add</h1>

        </div><!-- End Page Title -->

        <section class="section">





            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <h5 class="card-title">Enter Pet Master Detail</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" action="{{route('petmaster.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('petMasterName') is-invalid @enderror" value="{{old('petMasterName')}}" name="petMasterName" id="petMasterName"
                                            placeholder="Pet Master Name">
                                        <label for="petMasterName">Pet Master Name</label>
                                        @error('petMasterName')
                                        <div class='invalid-feedback'>{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="file" class="form-control"  name="petMasterImage" id="petMasterImage">
                                        <label for="petMasterImage">Pet Master Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="petMasterDescription" placeholder="Description" id="floatingTextarea" style="height: 100px;">{{old('petMasterDescription')}}</textarea>
                                        <label for="petMasterDescription">Pet Master Description</label>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label>Select Paretn Pet Master</label>
                                    <div>

                                        @include('pet_master.petMasterTree')
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


        </section>

    </main><!-- End #main -->


@endsection
