@extends('layouts.app')
@section('title', 'Category Create')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Category Add</h1>

        </div><!-- End Page Title -->

        <section class="section">






            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <h5 class="card-title">Enter Category Detail</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('categoryName') is-invalid @enderror" value="{{old('categoryName')}}" name="categoryName" id="categoryName"
                                            placeholder="Your Name">
                                        <label for="categoryName">Category Name</label>
                                        @error('categoryName')
                                        <div class='invalid-feedback'>{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="file" class="form-control"  name="categoryImage" id="categoryImage">
                                        <label for="categoryImage">Category Image</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="categoryDescription" placeholder="categoryDescription" id="floatingTextarea" style="height: 100px;">{{old('categoryDescription')}}</textarea>
                                        <label for="categoryDescription">Category Description</label>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label>Select Paretn Category</label>
                                    <div>
                                        @include('category.categorytree')


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
