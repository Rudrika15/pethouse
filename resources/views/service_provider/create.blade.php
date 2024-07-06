@extends('layouts.app')
@section('title', 'Add Service Provider')
@section('content')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js" integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
  rel="stylesheet"
  href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
  type="text/css"
/>
    <style>
        .select {
            background-color: #012970;
            color: #fff;
            width: 40px;
            height: 40px;
            display: inline-block;
            cursor: pointer;
        }

        .unselect {
            /* background-color: #012970; */
            border: 2px solid #012970;
            color: #012970;
            width: 40px;
            height: 40px;
            display: inline-block;
            cursor: pointer;
        }

        .select-error {
            /* border: 2px solid #dc3545; */
            /* color: #dc3545; */
            color: #fff;
            background-color: #dc3545;
            width: 40px;
            height: 40px;
            display: inline-block;
            cursor: pointer;

        }

        .select-success {
            /* border: 2px solid #dc3545; */
            /* color: #dc3545; */
            color: #fff;
            background-color: rgb(25, 135, 84);
            width: 40px;
            height: 40px;
            display: inline-block;
            cursor: pointer;

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

        .faq-card {
            background: #D6EAF8;
            color: #012970;
        }

        .remove-faq {
            cursor: pointer;
            background: red;
            display: inline;
            position: absolute;
            top: -15px;
            right: -15px;
            width: 30px;
            height: 30px;
            align-content: center;
            text-align: center;
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <h3 class="card-title text-center">Steps</h3>
                            <div class="row">
                                <div class="col-md-12 text-center py-2">
                                    <span class="select rounded-circle position-relative tab-indicator" iconIndex="1" onclick="currentTab(1)"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">1</span></span>
                                </div>
                                <div class="col-md-12 text-center py-2">
                                    <span class="unselect position-relative rounded-circle tab-indicator"
                                        iconIndex="2" onclick="currentTab(2)"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">2</span></span>

                                </div>
                                <div class="col-md-12 text-center py-2">
                                    <span class="unselect position-relative rounded-circle tab-indicator"
                                        iconIndex="3" onclick="currentTab(3)"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">3</span></span>

                                </div>
                                <div class="col-md-12 text-center py-2">
                                    <span class="unselect position-relative rounded-circle tab-indicator"
                                        iconIndex="4" onclick="currentTab(4)"><span
                                            style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);">4</span></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <form action="{{ route('service.provider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab" index="1">

                            <div class="card card-3d-shadow-radius">
                                <div class="card-body">
                                    <h3 class="card-title">General Information</h3>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control @if ($errors->firsttab->first('name')) is-invalid @endif"
                                                    id="name" name="name" placeholder="Enter Name"
                                                    value="{{ old('name') }}">
                                                <label for="name">Name</label>
                                            </div>
                                            @if ($errors->firsttab->first('name'))
                                                <span class='text-danger'>{{ $errors->firsttab->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="useremail"
                                                    class="form-control @if ($errors->firsttab->first('useremail')) is-invalid @endif"
                                                    value="{{ old('useremail') }}" id="useremail" name="useremail"
                                                    placeholder="Enter Email">
                                                <label for="useremail">Email</label>
                                            </div>
                                            @if ($errors->firsttab->first('useremail'))
                                                <span class='text-danger'>{{ $errors->firsttab->first('useremail') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password"
                                                    class="form-control @if ($errors->firsttab->first('password')) is-invalid @endif"
                                                    value="{{ old('password') }}" id="password" name="password"
                                                    placeholder="Password">
                                                <label for="password">Password</label>
                                            </div>
                                            @if ($errors->firsttab->first('password'))
                                                <span class='text-danger'>{{ $errors->firsttab->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input
                                                    class="form-control @if ($errors->firsttab->first('phone')) is-invalid @endif"
                                                    id="phone" value="{{ old('phone') }}" name="phone"
                                                    placeholder="Enter Phone No.">
                                                <label for="phone">Phone No.</label>

                                            </div>
                                            @if ($errors->firsttab->first('phone'))
                                                <span class='text-danger'>{{ $errors->firsttab->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input
                                                    class="form-control @if ($errors->firsttab->first('whatsapp')) is-invalid @endif"
                                                    id="whatsapp" name="whatsapp" placeholder="whatsapp"
                                                    value="{{ old('whatsapp') }}">
                                                <label for="whatsapp">Whatsapp No.</label>
                                            </div>
                                            @if ($errors->firsttab->first('whatsapp'))
                                                <span class='text-danger'>{{ $errors->firsttab->first('whatsapp') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="description" name="description" id="description" style="height: 70px;">{{ old('description') }}</textarea>
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
                                                <textarea class="form-control" placeholder="Address" name="address" id="address" style="height: 70px;">{{ old('address') }}</textarea>
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="lat" name="lat"
                                                    placeholder="Latitude" value="{{ old('lat') }}">
                                                <label for="lat">Latitude</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="lng" name="lng"
                                                    placeholder="Longitude" value="{{ old('lng') }}">
                                                <label for="lng">Longitude</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="facebook_link" name="facebook_link"
                                                    placeholder="facebook_link" value="{{ old('facebook_link') }}">
                                                <label for="facebook_link">Facebook</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="instagram_link" name="instagram_link"
                                                    placeholder="instagram_link" value="{{old('instagram_link')}}">
                                                <label for="instagram_link">Instagram</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="youtube_link" name="youtube_link"
                                                    placeholder="youtube_link" value="{{old('youtube_link')}}">
                                                <label for="youtube_link">Youtube</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="twitter_link" name="twitter_link"
                                                    placeholder="twitter_link" value="{{old('twitter_link')}}">
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

                                    <div class="row d-flex mx-0 justify-content-around ">
                                        {{-- all check box id must be different --}}
                                        @foreach ($services as $service)
                                            <div class="col-lg-2 service-card text-center btn-shadow service-card-danger {{!empty(old("services")) && in_array($service->id,old("services"))  ? "service-card-success" : "" }}">
                                                <img src="{{ asset('categoryImage\\' . $service->image) }}" alt=""
                                                    class="object-fit-contain service-card-image rounded-circle img-thumbnail my-2" />
                                                <br>
                                                <span class="block">{{ $service->name }}</span>

                                                <div class="checkbox-wrapper-26 mt-3">
                                                    <input type="checkbox" class="service-check"
                                                        value="{{ $service->id }}" name="services[]"
                                                        id="service{{ $service->id }}" {{!empty(old("services")) && in_array($service->id,old("services"))  ? "checked" : "" }}>
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
                                    <div class="row g-3 px-3">
                                        <div class="col-lg-12 dropbox-style p-2" id="dropzone">

                                            <span class="dropzone-title">Drop images here or click to upload</span>
                                            <div></div>
                                            <input name="gallery[]" type="file"
                                                accept="image/png,image/jpeg,image/gif,image/jpg" multiple />
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
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h3 class="card-title">FAQs</h3>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-primary mt-3 float-end add-faq"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <div class="row px-3 main-faq-box">
                                        <div class="col-lg-12 p-0 faq-box ">
                                            <div class="card m-0 btn-shadow faq-card">

                                                <div class="card-body mt-3">
                                                    {{-- <span class="remove-faq rounded-circle btn-shadow">
                                                        <i class="fa fa-times text-light"></i>
                                                    </span> --}}

                                                    <div class="row mb-3">
                                                        <label for="que"
                                                            class="col-sm-2 col-form-label">Question</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="faq[que][]" value="{{old('faq')['que'][0] ?? ""}}" class="form-control"
                                                                id="que">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="ans"
                                                            class="col-sm-2 col-form-label">Answer</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="faq[ans][]" class="form-control" id="ans">{{old('faq')['ans'][0] ?? ""}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @if (!empty(old('faq')) && count(old('faq')['ans']) > 1)
                                        @for($i=1;$i<count(old('faq')['que']);$i++)
                                        <div class="col-lg-12 p-0 faq-box mt-4 ">
                                            <div class="card m-0 btn-shadow faq-card">

                                                <div class="card-body mt-4">
                                                    <span class="remove-faq rounded-circle btn-shadow">
                                                        <i class="fa fa-times text-light"></i>
                                                    </span>

                                                    <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Question</label>
                                                      <div class="col-sm-10">
                                                        <input type="text" name="faq[que][]" value="{{old('faq')['que'][$i] ?? ""}}" class="form-control">
                                                      </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Answer</label>
                                                      <div class="col-sm-10">
                                                        <textarea name="faq[ans][]" class="form-control">{{old('faq')['ans'][$i] ?? ""}}</textarea>
                                                      </div>
                                                    </div>

                                                </div>
                                              </div>
                                        </div>
                                        @endfor
                                        @endif
                                    </div>
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

        <script type="text/javascript" lang="text/javascript">
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
            $(document).ready(function() {

                // var cTab = localStorage.getItem("currentTab");
                // if (cTab && cTab != null) {
                //     currentTab(cTab);
                // }


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



                //faq card remove
                $(document).on("click", ".remove-faq", function() {
                    $(this).parents(".faq-box").remove();
                })

                $(document).on("click", ".add-faq", function() {

                    var faqbox = ` <div class="col-lg-12 p-0 faq-box mt-4 ">
                                            <div class="card m-0 btn-shadow faq-card">

                                                <div class="card-body mt-4">
                                                    <span class="remove-faq rounded-circle btn-shadow">
                                                        <i class="fa fa-times text-light"></i>
                                                    </span>

                                                    <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Question</label>
                                                      <div class="col-sm-10">
                                                        <input type="text" name="faq[que][]" class="form-control">
                                                      </div>
                                                    </div>

                                                    <div class="row">
                                                      <label class="col-sm-2 col-form-label">Answer</label>
                                                      <div class="col-sm-10">
                                                        <textarea name="faq[ans][]" class="form-control"></textarea>
                                                      </div>
                                                    </div>

                                                </div>
                                              </div>
                                        </div> `;
                    $(".main-faq-box").append(faqbox);
                })
            });
        </script>

        @if (count($errors->firsttab))
            <script>
                $(document).ready(function() {
                    currentTab(1)
                })
            </script>
        @endif
    </main><!-- End #main -->


@endsection
