@extends('layouts.app')
@section('title', 'All Packages')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
                <h1>All Packages</h1>

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
                                            <form action="{{route('package.index')}}" name="search" method="get">
                                                <input type="search" id="myInput" name="query" class="form-control"
                                                    value="{{ request('query') }}" placeholder="Search...."
                                                    title="Type in a name">
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{route('package.index')}}"><i
                                                    class="fa-solid fa-arrows-rotate"></i></a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2 col-md-2 col-sm-3'>
                                    <a href="{{route('package.trashed')}}"
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
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Price (<i class="fa-solid fa-indian-rupee-sign"></i>)</th>
                                            <th>Duration</th>
                                            <th>Total Keys</th>
                                            <th>Actoin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($packages as $package)
                                        <tr>
                                            <td>{{$package->id}}</td>
                                            <td>{{$package->name}}</td>
                                            <td>{{$package->slug}}</td>
                                            <td>{{$package->price}}</td>

                                            <td>{{$package->duration}}</td>
                                            <td>{{$package->keys->count()}}</td>
                                            <td>
                                                <a href="{{route('package.softdelete',$package->id)}}"
                                                    class="btn btn-danger btn-shadow"><i
                                                        class="fa-solid fa-trash"></i></i></a>
                                                        <a href="{{route('package.edit',$package->id)}}"
                                                            class="btn btn-warning btn-shadow"><i
                                                                class="fa-solid fa-pencil"></i></a>

                                            </td>

                                        </tr>
                                        @empty
                                        <tr>
                                            <th colspan="7">
                                                <h2 class="text text-danger">🙅 Record Not Available</h2>
                                            </th>
                                        </tr>
                                        @endforelse

                                    </tbody>

                                </table>
                            </div>
                            <!-- End Table with stripped rows -->
                            <div>
                                {!! $packages->links() !!}
                            </div>
                        </div>
                    </div>
                        </div>

                </div>


        </section>

    </main><!-- End #main -->


@endsection
