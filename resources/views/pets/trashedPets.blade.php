@extends('layouts.app')
@section('title', 'Trashed Pet Master')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Trashed Pets</h1>
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
                                            <form action="" name="search" method="get">
                                                <input type="search" id="myInput" value="{{ request('query') }}"
                                                    name="query" class="form-control" placeholder="Search...."
                                                    title="Type in a name">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{ route('pets.trashed') }}"><i
                                                    class="fa-solid fa-arrows-rotate"></i></a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2'>
                                    <a href="{{ route('pets.index') }}"
                                        class="btn btn-success mt-3 float-end btn-shadow">Available Pets</a>

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
                                            @if($petDetail->trashed())
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
                                                    <a href="{{ route('pets.restore', $petDetail->id) }}"
                                                        class="btn btn-success btn-shadow" title="Restore"><i
                                                            class="fa-solid fa-trash-can-arrow-up"></i></a>
                                                    <a href="{{ route('pets.destroy', $petDetail->id) }}"
                                                        class="btn btn-danger btn-shadow" title="Perment Delete"><i
                                                            class="fa-solid fa-circle-xmark"></i></a>
                                                </td>
                                            </tr>
                                        @endif
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
