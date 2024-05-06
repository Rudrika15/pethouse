@extends('layouts.app')
@section('title', 'Pet Description')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pet Description</h1>
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
                            <h5 class="card-title">{{$petDetail->name}}</h5>
                            <div class="container">
                                {!! $petDetail->description !!}
                            </div>
                        </div>
                    </div>
                        </div>

                </div>


        </section>

    </main><!-- End #main -->


@endsection
