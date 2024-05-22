@extends('layouts.app')
@section('title', 'All Pet Details')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>All Pet Details</h1>
            {{-- <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav> --}}
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row" id="all">
                <div class="col-lg-12">

                    <div class="card card-3d-shadow-radius">
                        <div class="card-body">
                            <div class='row'>
                                <div class="col-lg-10 col-md-10 col-sm-9">
                                    <div class="row mt-3">
                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                            <form action="" name="search" method="get">
                                                <input type="search" id="myInput" name="query" class="form-control"
                                                    value="{{ request('query') }}" placeholder="Search...."
                                                    title="Type in a name">
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{route('pets.index')}}"><i
                                                    class="fa-solid fa-arrows-rotate"></i></a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2 col-md-2 col-sm-3'>
                                    <a href="{{ route('pets.trashed') }}"
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
                                            <th>Origin</th>
                                            <th>Age</th>
                                            <th>Pet Master</th>
                                            <th>Gallery</th>
                                            <th>Description</th>
                                            <th>Actoin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($petDetails as $petDetail)
                                            <tr>
                                                <td>{{ $petDetail->id }}</td>

                                                <td>{{ $petDetail->name }}</td>
                                                <td>{{ $petDetail->slug }}</td>


                                                <td>
                                                    {{ $petDetail->origin }}
                                                </td>

                                                <td>
                                                    {{ $petDetail->Age ?? '-' }}
                                                </td>
                                                <td>
                                                    {{ $petDetail->petMaster->name }}
                                                </td>
                                                <td>
                                                    <a href="{{route('pets.gallery',$petDetail->id)}}" class="btn btn-primary"><i
                                                            class="fa-solid fa-images"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{route('pets.show',$petDetail->id)}}" class="btn btn-success"><i
                                                            class="fa-solid fa-book"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('pets.delete', $petDetail->id) }}"
                                                        class="btn btn-danger btn-shadow"><i
                                                            class="fa-solid fa-trash"></i></i></a>
                                                    <a href="{{ route('pets.edit', $petDetail->id) }}"
                                                        class="btn btn-warning btn-shadow"><i
                                                            class="fa-solid fa-pencil"></i></a>

                                                </td>
                                            </tr>
                                            @empty
                                        <tr>
                                            <th colspan="9">
                                                <h2 class="text text-danger">🙅 Record Not Available</h2>
                                            </th>
                                        </tr>
                                        @endforelse

                                    </tbody>

                                </table>
                            </div>
                            <!-- End Table with stripped rows -->
                            <div class="d-flex justify-content-center">
                                {!! $petDetails->links() !!}
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </section>



    </main><!-- End #main -->


@endsection
