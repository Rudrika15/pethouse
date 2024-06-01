@extends('layouts.app')
@section('title', 'FAQs')
@section('content')
    <style>
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
            <h1>All FAQs</h1>

        </div><!-- End Page Title -->

        <section class="section">






            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h3 class="card-title">FAQs</h3>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-primary mt-3 float-end add-faq"><i
                                            class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                            <form method="post" action="{{route('servide.provider.faq.save',$serviceProvider->id)}}">
                                @csrf
                                <div class="row px-3 main-faq-box">
                                    @foreach ($serviceProvider->faqs as $faq)
                                        <div class="col-lg-12 p-0 faq-box mt-4">
                                            <div class="card m-0 btn-shadow faq-card">

                                                <div class="card-body mt-3">
                                                    <a href="{{route('service.provider.faq.destroy',$faq->id)}}" class="remove-faq rounded-circle btn-shadow">
                                                        <i class="fa fa-times text-light"></i>
                                                    </a>

                                                    <div class="row mb-3">
                                                        <label for="que"
                                                            class="col-sm-2 col-form-label">Question</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" value="{{ $faq->question ?? '-' }}"
                                                                class="form-control" id="que" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="ans" class="col-sm-2 col-form-label">Answer</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="ans" disabled>{{ $faq->answer ?? '-' }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 d-flex">
                                        <a href="{{route('service.provider.index')}}" class="btn btn-warning">Back</a>
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
            //faq card remove
            $(document).on("click", ".remove-faq-btn", function() {
                $(this).parents(".faq-box").remove();
            })

            $(document).on("click", ".add-faq", function() {

                var faqbox = ` <div class="col-lg-12 p-0 faq-box mt-4 ">
                                            <div class="card m-0 btn-shadow faq-card">

                                                <div class="card-body mt-4">
                                                    <span class="remove-faq remove-faq-btn rounded-circle btn-shadow">
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
        </script>
    </main><!-- End #main -->


@endsection
