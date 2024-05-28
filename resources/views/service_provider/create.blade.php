@extends('layouts.app')
@section('title', 'Add Service Provider')
@section('content')


    <style>
        .select {
            background-color: #012970;
            color: #fff;
            width: 40px;
            height: 40px;
            display: inline-block;
        }

        .unselect {
            /* background-color: #012970; */
            border: 2px solid #012970;
            color: #012970;
            width: 40px;
            height: 40px;
            display: inline-block;

        }

        .select-error {
            /* border: 2px solid #dc3545; */
            /* color: #dc3545; */
            color: #fff;
            background-color: #dc3545;
            width: 40px;
            height: 40px;
            display: inline-block;
        }

        .select-success {
            /* border: 2px solid #dc3545; */
            /* color: #dc3545; */
            color: #fff;
            background-color: rgb(25, 135, 84);
            width: 40px;
            height: 40px;
            display: inline-block;
        }

        .dropbox-style {
            background-color: #D6EAF8;
            border: 2px dashed #1B4F72;
            height: 350px;
            border-radius: 20px;
        }



        #dropzone {
            position: relative;
            /* border-radius: 16px; */
            text-align: center;
            overflow: scroll;
            /* background: red; */
        }

        #dropzone::-webkit-scrollbar {
            display: none;
        }

        #dropzone.hover {
            border: 2px dashed #78281F;

            color: #78281F;
            background: #FDEDEC;
        }

        #dropzone.dropped {
            /* background: #222;
                    border: 10px solid #444; */
        }

        .dropzone-title {
            color: #1B4F72;
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 20px;
            font-weight: bold;
            width: 100%;
            transform: translate(-50%, -50%);
        }

        #dropzone div {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            padding: 5px;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-evenly;
        }

        #dropzone img {
            border-radius: 10px;
            max-width: 40%;
            height: 150px;
            width: 200px;
            max-height: 250px;
            z-index: 1;
            object-fit: contain;
        }

        #dropzone [type="file"] {
            cursor: pointer;
            position: absolute;
            opacity: 0;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .service-card {
            height: 180px;
            width: 170px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .service-card-danger {
            border: 2px solid red;
            background: #FADBD8;
            /* color:red; */
        }

        .service-card-success {
            border: 2px solid green;
            background: #D4EFDF;
            /* color:green; */
        }

        .service-card-image {
            width: 50px;
            height: 50px;
        }
    </style>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Service Provider</h1>
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
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <h3 class="card-title text-center">Steps</h3>
                            <div class="row">
                                <div class="col-md-12 text-center py-2">
                                    <span class="select rounded-circle position-relative tab-indicator" iconIndex="1"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">1</span></span>
                                </div>
                                <div class="col-md-12 text-center py-2">
                                    <span class="unselect position-relative rounded-circle tab-indicator"
                                        iconIndex="2"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">2</span></span>

                                </div>
                                <div class="col-md-12 text-center py-2">
                                    <span class="unselect position-relative rounded-circle tab-indicator"
                                        iconIndex="3"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">3</span></span>

                                </div>
                                <div class="col-md-12 text-center py-2">
                                    <span class="unselect position-relative rounded-circle tab-indicator"
                                        iconIndex="4"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">4</span></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <form  action="{{route('service.provider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab" index="1">

                            <div class="card card-3d-shadow-radius">
                                <div class="card-body">
                                    <h3 class="card-title">General Information</h3>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Name">
                                                <label for="name">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="useremail" name="email"
                                                    placeholder="Enter Email">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="phone" name="phone"
                                                    placeholder="Enter Phone No.">
                                                <label for="phone">Phone No.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="whatsapp" name="whatsapp"
                                                    placeholder="whatsapp">
                                                <label for="whatsapp">Whatsapp No.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="description" name="description" id="description" style="height: 70px;"></textarea>
                                                <label for="description">Description</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="file" accept=".jpg,.png,.gif,.jpeg" class="form-control"
                                                    id="pro_img" name="pro_img" placeholder="pro_img">
                                                <label for="pro_img">Profile Image</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Address" name="address" id="address" style="height: 70px;"></textarea>
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="lat" name="lat"
                                                    placeholder="Latitude">
                                                <label for="lat">Latitude</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="lng" name="lng"
                                                    placeholder="Longitude">
                                                <label for="lng">Longitude</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="facebook_link" name="facebook_link"
                                                    placeholder="facebook_link">
                                                <label for="facebook_link">Facebook</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="instagram_link" name="instagram_link"
                                                    placeholder="instagram_link">
                                                <label for="instagram_link">Instagram</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="youtube_link" name="youtube_link"
                                                    placeholder="youtube_link">
                                                <label for="youtube_link">Youtube</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="twitter_link" name="twitter_link"
                                                    placeholder="twitter_link">
                                                <label for="twitter_link">Twitter</label>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 justify-content-end d-flex">
                                            <button class="btn btn-primary nextTab" type="button">Next</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab" index="2" style="display: none;">

                            <div class="card card-3d-shadow-radius">
                                <div class="card-body">
                                    <h3 class="card-title">Select Services</h3>

                                    <div class="row d-flex mx-0 justify-content-around " >

                                        {{-- all check box id must be different --}}
                                        @foreach ($services as $service)
                                        <div class="col-lg-2 service-card text-center btn-shadow service-card-danger">
                                            <img src="{{ asset('categoryImage\\'.$service->image) }}" alt=""
                                                class="object-fit-contain service-card-image rounded-circle img-thumbnail my-2" />
                                            <br>
                                            <span class="block">{{$service->name}}</span>

                                            <div class="checkbox-wrapper-26 mt-3">
                                                <input type="checkbox" class="service-check" value="{{$service->id}}" name="services[]" id="service{{$service->id}}">
                                                <label for="_checkbox-26">
                                                    <div class="tick_mark"></div>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 justify-content-start d-flex">
                                            <button class="btn btn-warning prevTab" type="button">Back</button>
                                        </div>
                                        <div class="col-md-6 justify-content-end d-flex">
                                            <button class="btn btn-primary nextTab" type="button">Next</button>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="tab" index="3" style="display: none;">

                            <div class="card card-3d-shadow-radius">
                                <div class="card-body">
                                    <h3 class="card-title">Gallery</h3>
                                    <div class="row g-3">
                                        <div class="col-lg-12 dropbox-style p-2" id="dropzone">

                                            <span class="dropzone-title">Drop images here or click to upload</span>
                                            <div></div>
                                            <input name="gallery[]" type="file" accept="image/png,image/jpeg,image/gif,image/jpg"
                                                multiple />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 justify-content-start d-flex">
                                            <button class="btn btn-warning prevTab" type="button">Back</button>
                                        </div>
                                        <div class="col-md-6 justify-content-end d-flex">
                                            <button class="btn btn-primary nextTab" type="button">Next</button>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>


                        <div class="tab" index="4" style="display: none;">

                            <div class="card card-3d-shadow-radius">
                                <div class="card-body">
                                    <h3 class="card-title">FAQ</h3>
                                    <div class="row mt-3">
                                        <div class="col-md-6 justify-content-start d-flex">
                                            <button class="btn btn-warning prevTab" type="button">Back</button>
                                        </div>
                                        <div class="col-md-6 justify-content-end d-flex">
                                            <button class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </form><!-- End floating Labels Form -->

                </div>
            </div>


        </section>

        <script>
            $(document).ready(function() {

                var cTab = localStorage.getItem("currentTab");
                if (cTab && cTab != null) {
                    currentTab(cTab);
                }


                $(document).on("click", ".nextTab", function() {
                    var currentTabIndex = $(this).closest(".tab").attr("index")
                    var nextTabIndex = parseInt(currentTabIndex) + 1;
                    // console.log(nextTabIndex);
                    // console.log($(".tab[index|='" + nextTabIndex + "']").addClass("bg-danger"))
                    currentTab(nextTabIndex);
                });

                $(document).on("click", ".prevTab", function() {
                    var currentTabIndex = $(this).closest(".tab").attr("index")
                    var prevTabIndex = parseInt(currentTabIndex) - 1;
                    // console.log(prevTabIndex);
                    // console.log($(".tab[index|='" + prevTabIndex + "']").addClass("bg-danger"))
                    currentTab(prevTabIndex);
                });

                function currentTab(index) {
                    // Hide all tabs
                    $(".tab").hide();
                    // Show the tab with the given index
                    $(".tab[index|='" + index + "']").fadeIn();

                    //remove select from previout tab step span and add unselect
                    $(".tab-indicator").removeClass("select");
                    $(".tab-indicator").addClass("unselect");

                    //add select to current tab step span and remove unselect
                    $("span[iconIndex|='" + index + "']").removeClass("unselect");
                    $("span[iconIndex|='" + index + "']").addClass("select");

                    localStorage.setItem("currentTab", index);
                }


                //dropzone start

                $('#dropzone').on('dragover', function() {
                    $(this).addClass('hover');
                });

                $('#dropzone').on('dragleave', function() {
                    $(this).removeClass('hover');
                });

                $('#dropzone input').on('change', function(e) {
                    var files = this.files;

                    $('#dropzone').removeClass('hover');
                    for (i = 0; i < files.length; i++) {

                        if (this.accept && $.inArray(files[i].type, this.accept.split(/, ?/)) == -1) {
                            return alert('File type not allowed.');
                        }

                        $('#dropzone').addClass('dropped');
                        $('#dropzone img').remove();
                        if ((/^image\/(gif|png|jpeg|jpg)$/i).test(files[i].type)) {

                            var reader = new FileReader(files[i]);

                            reader.readAsDataURL(files[i]);

                            reader.onload = function(e) {
                                var data = e.target.result,
                                    $img = $('<img />').attr('src', data).fadeIn();
                                $('#dropzone div').append($img);

                            };
                        } else {
                            var ext = files[i].name.split('.').pop();

                            $('#dropzone div').html(ext);
                        }
                    }
                });

                //dropzone end


                //check box
                $(document).on("click", ".service-card", function() {
                    $(this).toggleClass("service-card-success")
                    $(this).find("input[type='checkbox']").prop("checked", function(_, oldProp) {
                        return !oldProp; // Toggle the checked state
                    });
                })


            });
        </script>
    </main><!-- End #main -->


@endsection