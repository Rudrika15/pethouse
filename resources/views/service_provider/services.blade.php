@extends('layouts.app')
@section('title', 'Services')
@section('content')
    <style>
.service-card {
            height: 180px;
            width: 170px;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
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
            <h1>All Services</h1>

        </div><!-- End Page Title -->

        <section class="section">






            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <h3 class="card-title">Services</h3>
                            <form method="POST" action="{{route('service.provider.service.save',$serviceProvider->id)}}">
                            @csrf
                            <div class="row d-flex mx-0 justify-content-around ">

                                {{-- all check box id must be different --}}
                                @foreach ($services as $service)
                                    <div
                                        class="col-lg-2 service-card text-center btn-shadow service-card-danger {{ !empty($serviceProviderService) && in_array($service->id, $serviceProviderService) ? 'service-card-success' : '' }}">
                                        <img src="{{ asset('categoryImage\\' . $service->image) }}" alt=""
                                            class="object-fit-contain service-card-image rounded-circle img-thumbnail my-2" />
                                        <br>
                                        <span class="block">{{ $service->name }}</span>

                                        <div class="checkbox-wrapper-26 mt-3">
                                            <input type="checkbox" class="service-check" value="{{ $service->id }}"
                                                name="services[]" id="service{{ $service->id }}"
                                                {{ !empty($serviceProviderService) && in_array($service->id, $serviceProviderService) ? 'checked' : '' }}>
                                            <label for="_checkbox-26">
                                                <div class="tick_mark"></div>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 justify-content-start d-flex">
                                    <a href="{{route('service.provider.index')}}" class="btn btn-warning prevTab" type="button">Back</a>
                                </div>
                                <div class="col-md-6 justify-content-end d-flex">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>


        </section>
        <script>
                //check box
                $(document).on("click", ".service-card", function() {
                    $(this).toggleClass("service-card-success")
                    $(this).find("input[type='checkbox']").prop("checked", function(_, oldProp) {
                        return !oldProp; // Toggle the checked state
                    });
                })
        </script>
    </main><!-- End #main -->


@endsection
