@extends('layouts.app')
@section('title', 'Category Create')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Category Update</h1>

        </div><!-- End Page Title -->

        <section class="section">

            @if (Session::has('message'))
                <script>
                    swal('{{ Session::get('message') }}', '', 'success');
                </script>
            @endif




            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <h5 class="card-title">Enter Category Detail</h5>
                            {{-- {{$updateCategory}} --}}
                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" action="{{ route('category.update', $updateCategory->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control @error('categoryName') is-invalid @enderror"
                                            value="{{ old('categoryName') ? old('categoryName') : $updateCategory->name }}"
                                            name="categoryName" id="categoryName" placeholder="Your Name">
                                        <label for="categoryName">Category Name</label>
                                        @error('categoryName')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1">

                                            <img src="{{ asset('categoryImage/' . $updateCategory->image) }}"
                                                alt="{{ $updateCategory->name }}"
                                                class=" img-thumbnail object-fit-cover object-fit-fill rounded-circle"
                                                style="max-height: 60px;height: 60px; max-width: 60px;width:60px;" />
                                        </div>
                                        <div class="col-11">

                                            <div class="form-floating">

                                                <input type="file" class="form-control" name="categoryImage"
                                                    id="categoryImage">
                                                <label for="categoryImage">Category Image</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="categoryDescription" placeholder="categoryDescription" id="floatingTextarea"
                                            style="height: 100px;">{{ $updateCategory->description }}</textarea>
                                        <label for="categoryDescription">Category Description</label>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <label>Select Paretn Category</label>
                                    <div>
                                        @include('category.categorytree', [
                                            'updateCategory' => $updateCategory,
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
