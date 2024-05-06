@extends('layouts.app')
@section('title', 'All Keys')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col-lg-10">
                    <h1>All Keys</h1>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-primary float-end btn-shadow" data-bs-toggle="modal"
                        data-bs-target="#addKeyModal"><i class="fa-solid fa-plus"></i> Add Key</button>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">






                    <div class="row">
                    <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Keys</h5> --}}
                            <div class='row'>
                                <div class="col-lg-10 col-md-10 col-sm-9">
                                    <div class="row mt-3">
                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                            <form action="{{route('packagekey.index')}}" name="search" method="get">
                                                <input type="search" id="myInput" name="query" class="form-control"
                                                    value="{{ request('query') }}" placeholder="Search...."
                                                    title="Type in a name">
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{route('packagekey.index')}}"><i
                                                    class="fa-solid fa-arrows-rotate"></i></a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2 col-md-2 col-sm-3'>
                                    <a href="{{route('packagekey.trashed')}}"
                                        class="btn btn-success mt-3 float-end btn-shadow">Go To Trash</a>

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
                                            <th>Price  (<i class="fa-solid fa-indian-rupee-sign"></i>)</th>
                                            <th>Description</th>
                                            <th>Actoin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($packageKeys as $packageKey)
                                        <tr>
                                            <td>{{$packageKey->id}}</td>
                                            <td>

                                                <img src="{{asset('packageKeyIcon/'.$packageKey->icon) }}" alt="{{$packageKey->icon}}" class=" img-thumbnail object-fit-cover rounded-circle" style="max-height: 60px;height: 60px; max-width: 60px;width:60px;" />
                                            </td>
                                            <td>{{$packageKey->key}}</td>
                                            <td>{{$packageKey->price}}</td>
                                            <td>{{$packageKey->description}}</td>
                                            <td>
                                                <a href="{{route('packagekey.softdelete',$packageKey->id)}}"
                                                    class="btn btn-danger btn-shadow"><i
                                                        class="fa-solid fa-trash"></i></i></a>
                                                <button
                                                    class="btn btn-warning btn-shadow edit-modal" data-title="{{$packageKey->key}}" data-price="{{$packageKey->price}}" data-description="{{$packageKey->description}}" data-icon ="{{asset("packageKeyIcon/".$packageKey->icon)}}" data-id="{{$packageKey->id}}" data-bs-toggle="modal"
                                                    data-bs-target="#editKeyModal"><i
                                                        class="fa-solid fa-pencil"></i></a>

                                            </td>

                                        </tr>
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

        @include("packageKey.addKeyModal")
        @include("packageKey.editKeyModal")
    </main><!-- End #main -->


@endsection
