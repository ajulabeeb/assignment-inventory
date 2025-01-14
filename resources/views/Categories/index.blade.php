@extends('layouts.app')
@section('PageTitle','Category')

@section('container')
    <div class="container py-4">
        <div class="mb-4">
            <div class="row">
                <div class="col">
                    <h3>Manage Categories</h3>
                </div>
                <div class="col-2">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">View Products</a>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm">Create Category</a>
                </div>
            </div>

            <div class="row">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>s/n</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Categories as $Category)
                            <tr>
                                <td>#</td>
                                <td>{{ $Category->name}} </td>
                                <td>{{ $Category->description}} </td>
                                <td class="col-2 text-right">
                                    <button class="btn btn-info" href="{{ route('categories.edit', $Category->id) }}">Edit</button>
                                    <button class="btn btn-danger" href="{{ route('categories.edit', $Category->id) }}">Delete</button>

                                    {{-- <form action="">
                                        @csrf
                                        @method('DEESTROY')
                                        <button class="btn btn-danger">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @empty
                            <tr colspan="5">NO DATA AVAILABLE FOR DISPLAY</tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
