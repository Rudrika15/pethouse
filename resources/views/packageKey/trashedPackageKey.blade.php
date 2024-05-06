@extends('layouts.app')
@section('title', 'All Trashed Package Key')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Trashed Package Key</h1>
            {{-- <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav> --}}
        </div><!-- End Page Title -->



        <section class="section">



            <div class="row" id="trashed">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <div class='row'>
                                <div class="col-lg-10">
                                    <div class="row mt-3">
                                        <div class="col-10">
                                            <form action="{{route('packagekey.trashed')}}" name="search" method="get">
                                            <input type="search" id="myInput" value="" name="query" class="form-control" placeholder="Search...." title="Type in a name">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{route('packagekey.trashed')}}"><i class="fa-solid fa-arrows-rotate"></i></a>

                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2'>
                                    <a href="{{ route('packagekey.index') }}"
                                        class="btn btn-success mt-3 float-end btn-shadow">Available Keys</a>

                                </div>

                            </div>
                            <!-- Table with stripped rows -->
                            <div class="table-responsive mt-3">
                            <table class="table text-center align-middle table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>Icon</th>
                                        <th>Key</th>
                                        <th>Price (<i class="fa-solid fa-indian-rupee-sign"></i>)</th>
                                        <th>Description</th>
                                        <th>Actoin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packageKeys as $packageKey)
                                        @if($packageKey->trashed())

                                        <tr>
                                            <td>{{$packageKey->id}}</td>
                                            <td>
                                                <img src="{{asset("packageKeyIcon/".$packageKey->icon)}}" alt="{{$packageKey->icon}}" class=" img-thumbnail object-fit-cover rounded-circle" style="max-height: 60px;height: 60px; max-width: 60px;width:60px;"/>
                                            </td>

                                            <td>{{$packageKey->key}}</td>
                                            <td>{{$packageKey->price}}</td>
                                            <td>{{$packageKey->description}}</td>
                                            <td>
                                                <a href="{{route('packagekey.restore',$packageKey->id)}}"
                                                    class="btn btn-success btn-shadow" title="Restore"><i
                                                        class="fa-solid fa-trash-can-arrow-up"></i></a>
                                                <a href="{{route('packagekey.destroy',$packageKey->id)}}"
                                                    class="btn btn-danger btn-shadow" title="Perment Delete"><i class="fa-solid fa-circle-xmark"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                            <!-- End Table with stripped rows -->
                            <div class="d-flex justify-content-center">
                                {!! $packageKeys->links() !!}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main><!-- End #main -->


@endsection
