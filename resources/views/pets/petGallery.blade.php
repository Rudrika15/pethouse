@extends('layouts.app')
@section('title', 'Pet Gallery')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pet Gallery</h1>
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
                            <div class="row">
                                <div class="col-lg-10">

                                    <h5 class="card-title">{{ $petDetail->name }} Gallery</h5>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary mt-3 float-end btn-shadow"
                                        onclick="addMultipleImages(this)" pet-detail-id="{{ $petDetail->id }}"
                                        data-bs-toggle="modal" data-bs-target="#addGallery">
                                        <i class="fa-solid fa-images"></i> Add </button>
                                </div>
                            </div>
                            <div class="container"
                                style="display: flex; flex-wrap: wrap;flex-direction: row;justify-content: space-evenly;">
                                @foreach ($petDetail->gallery as $gallery)
                                    <div class="col-lg-3 m-2" style="flex:1;min-width:300px;max-width:300px;">

                                        <!-- Card with an image on top -->
                                        <div class="card card-3d-shadow-radius overflow-hidden"
                                            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                            <img src="{{ asset('petDetailImage/' . $gallery->image) }}"
                                                class="card-img-top object-fit-contain" style="height: 200px;"
                                                alt="{{ $gallery->alt }}">
                                            <div class="card-body pt-2 text-center pb-2">
                                                {{-- <h5 class="card-title">Card with an image on top</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                <a href="{{ route('gallery.destroy', $gallery->id) }}"
                                                    class="btn btn-danger btn-shadow"><i class="fa-solid fa-trash"></i></a>
                                                <button class="btn btn-warning btn-shadow" id="galleryUpdataBtn"
                                                    onclick = "dispImage(this)" gallery-id="{{ $gallery->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#updateGallery"><i
                                                        class="fa-solid fa-pencil"></i></button>
                                            </div>
                                        </div><!-- End Card with an image on top -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </section>

        <div class="modal fade text-dark" id="updateGallery" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Gallery Image</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                        <button type="button" class="btn btn-danger btn-shadow" style="position: absolute;right:12px;" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>

                    </div>
                    <!-- Floating Labels Form -->
                    <form class="" method="POST" action="{{ route('galler.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="galleryImage" placeholder="Select Image"
                                        name="galleryImage">
                                    <label for="galleryImage">Select Image</label>
                                    <input type="hidden" id="updateGalleryId" name="galleryId" />

                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-shadow" data-bs-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary btn-shadow">Update</button>
                        </div>
                    </form><!-- End floating Labels Form -->

                </div>
            </div>
        </div><!-- End Extra Large Modal-->

        <div class="modal fade text-dark" id="addGallery" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content card-3d-shadow-radius">
                    <div class="modal-header" style="position: relative;">
                        <h5 class="modal-title">Add Gallery Images</h5>
                        <button type="button" class="btn btn-danger btn-shadow" style="position: absolute;right:12px;" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>

                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <!-- Floating Labels Form -->
                    <form class="" method="POST" action="{{ route('gallery.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="addGalleryImages"
                                        placeholder="Select Images" name="addGalleryImages[]" multiple>
                                    <label for="addGalleryImages">Select Images</label>
                                    <input type="hidden" id="petDetailId" name="petDetailId" />

                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-shadow" data-bs-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary btn-shadow">Submit</button>
                        </div>
                    </form><!-- End floating Labels Form -->

                </div>
            </div>
        </div><!-- End Extra Large Modal-->

        <script>
            function dispImage(btn) {
                galleryId = btn.getAttribute("gallery-id");
                // alert(galleryId);
                $("#updateGalleryId").val(galleryId);
            }

            function addMultipleImages(btn) {
                petDetailId = btn.getAttribute("pet-detail-id");
                // alert(petDetailId);
                $("#petDetailId").val(petDetailId);
            }
        </script>

    </main><!-- End #main -->


@endsection
