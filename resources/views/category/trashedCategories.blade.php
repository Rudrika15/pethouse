@extends('layouts.app')
@section('title', 'All Category')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Trashed Categories</h1>
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
                                            <form action="{{route('category.trashed')}}" name="search" method="get">
                                            <input type="search" id="myInput" value="{{request('query')}}" name="query" class="form-control" placeholder="Search...." title="Type in a name">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-dark btn-shadow" type="submit"><i class="fa fa-search"></i></button>
                                            <a class="btn btn-primary btn-shadow" href="{{route('category.trashed')}}"><i class="fa-solid fa-arrows-rotate"></i></a>

                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2'>
                                    <a href="{{ route('category.index') }}"
                                        class="btn btn-success mt-3 float-end btn-shadow">Available Category</a>

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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>

                                        <th>Description</th>
                                        <th>Parent Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trashedCategories as $category)
                                    @if($category->trashed())

                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>
                                                <img src="{{asset('categoryImage/'.$category->image)}}" alt="{{$category->name}}" class=" img-thumbnail object-fit-cover object-fit-fill rounded-circle" style="max-height: 60px;height: 60px; max-width: 60px;width:60px;"/>
                                            </td>

                                            <td>{{ $category->name }}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{ $category->description ?? '-'  }}</td>
                                            <td>{{ $category->parent->name ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('category.restore', $category->id) }}"
                                                    class="btn btn-success btn-shadow" title="Restore"><i
                                                        class="fa-solid fa-trash-can-arrow-up"></i></a>
                                                <a href="{{ route('category.destroy', $category->id) }}"
                                                    class="btn btn-danger btn-shadow" title="Perment Delete"><i class="fa-solid fa-circle-xmark"></i></a>
                                            </td>
                                        </tr>
                                        @endif
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
                            <div class="d-flex justify-content-center">
                                {!! $trashedCategories->links() !!}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main><!-- End #main -->


@endsection
