@extends('layouts.app')
@section('PageTitle','Products')

@section('container')

    <div class="container py-4">
        <div class="mb-4">
            <div class="row">
                <div class="col">
                    <h3>Manage Products</h3>
                </div>
                <div class="col-2">
                    <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">view Categories</a>
                </div>
                <div class="col-2">
                    <a href="{{route('products.create')}}" class="btn btn-primary btn-sm">Create Product</a>
                </div>
            </div>

            <div class="row">
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Products as $Product)
                        <tr>
                            <td>{{ $Product->name}} </td>
                            <td>{{ $Product->description}} </td>
                            <td>{{ $Product->category->name}} </td>
                            <td>{{ $Product->price}} </td>
                            <td class="col-2 text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('products.edit', $Products) }}">Edit</a>
                                <form action="{{ route('products.destroy', $Product) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <p class="text-center">
                                    NO DATA AVAILABLE FOR DISPLAY
                                </p>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>




    </div>
@endsection
