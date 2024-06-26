@extends('layouts.app')
@section('title', 'All Pet Masters')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pet Masters</h1>
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
                                            <form action="{{route('petmaster.index')}}" name="search" method="get">
                                            <input type="search" id="myInput" name="query" class="form-control" value="{{request('query')}}" placeholder="Search...." title="Type in a name">
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{route('petmaster.index')}}"><i class="fa-solid fa-arrows-rotate"></i></a>

                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2 col-md-2 col-sm-3'>
                                    <a href="{{route('petmaster.trashed')}}"
                                        class="btn btn-success mt-3 float-end btn-shadow">Go To Trash</a>

                                </div>

                            </div>
                            <!-- Table with stripped rows -->
                            <div class="table-responsive mt-3">
                            <table class="table text-center align-middle table-striped" >
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Parent Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($petMasters as $petMaster)
                                        <tr>
                                            <td>{{ $petMaster->id }}</td>
                                            <td>
                                                <img src="{{asset('petMaster/'.$petMaster->image)}}" alt="{{$petMaster->name}}" class=" img-thumbnail object-fit-cover object-fit-fill rounded-circle" style="max-height: 60px;height: 60px; max-width: 60px;width:60px;"/>
                                            </td>

                                            <td>{{ $petMaster->name }}</td>
                                            <td>{{ $petMaster->slug }}</td>

                                            <td>{{ $petMaster->description ?? '-' }}</td>
                                            <td>
                                                {{ $petMaster->parent->name ?? '-' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('petmaster.delete', $petMaster->id) }}"
                                                    class="btn btn-danger btn-shadow" ><i
                                                        class="fa-solid fa-trash"></i></i></a>
                                                <a href="{{ route('petmaster.edit', $petMaster->id) }}"
                                                    class="btn btn-warning btn-shadow" ><i
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
                                {!! $petMasters ->links() !!}
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </section>



    </main><!-- End #main -->


@endsection
