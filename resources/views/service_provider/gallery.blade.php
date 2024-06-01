@extends('layouts.app')
@section('title', 'Service Provider Gallery')
@section('content')


    <main id="main" class="main">
<style>

    .remove-btn {
            cursor: pointer;
            background: red;
            display: inline;
            position: absolute;
            top: -15px;
            right: -15px;
            width: 30px;
            z-index: 10;
            height: 30px;
            align-content: center;
            text-align: center;
        }
</style>
        <div class="pagetitle">
            <div class="row">
                <div class="col-lg-10">
                    <h1>Service Provider Gallery</h1>
                </div>

                <div class="col-lg-2">
                <button class="btn btn-primary float-end btn-shadow"
                onclick="addMultipleImages(this)" service-provider-id="{{$serviceProvider->id}}"
                data-bs-toggle="modal" data-bs-target="#addGallery">
                        <i class="fa-solid fa-images"></i> Add </button>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">






            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body mt-3">
                            <div class="row">
                                <div class="col-lg-10">

                                    <h5 class="card-title">{{ $serviceProvider->name }} Gallery</h5>
                                </div>

                            </div>
                            <div class="container"
                                style="display: flex; flex-wrap: wrap;flex-direction: row;justify-content: space-evenly;">

                                @foreach ($serviceProvider->gallery as $gallery)


                                    <div class="col-lg-3 m-2 position-relative" style="flex:1;min-width:300px;max-width:300px;">
                                        <a href="{{ route('service.provider.gallery.destroy',$gallery->id)}}" class="remove-btn rounded-circle btn-shadow">
                                            <i class="fa fa-times text-light"></i>
                                        </a>
                                        <!-- Card with an image on top -->
                                        <div class="card card-3d-shadow-radius overflow-hidden"
                                            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                            <img src="{{asset('service_provider_gallery/'.$serviceProvider->id.'/'.$gallery->image)}}"
                                                class="card-img-top object-fit-contain" style="height: 200px;"
                                                alt="{{$gallery->image}}">
                                            <div class="card-body p-0 text-center">
                                                {{-- <h5 class="card-title">Card with an image on top</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                {{-- <a href=""
                                                    class="btn btn-danger btn-shadow"><i class="fa-solid fa-trash"></i></a> --}}
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



        <div class="modal fade text-dark" id="addGallery" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content card-3d-shadow-radius">
                    <div class="modal-header" style="position: relative;">
                        <h5 class="modal-title">Add Gallery Images</h5>
                        <button type="button" class="btn btn-danger btn-shadow" style="position: absolute;right:12px;" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>

                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <!-- Floating Labels Form -->
                    <form class="" method="POST" action="{{route('service.provider.gallery.store',$serviceProvider->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="addGalleryImages"
                                        placeholder="Select Images" name="gallery[]" multiple>
                                    <label for="gallery">Select Images</label>
                                    <input type="hidden" id="serviceProviderId" name="serviceProviderId" />

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


            function addMultipleImages(btn) {
                petDetailId = btn.getAttribute("service-provider-id");
                // alert(petDetailId);
                $("#serviceProviderId").val(petDetailId);
            }
        </script>

    </main><!-- End #main -->


@endsection
