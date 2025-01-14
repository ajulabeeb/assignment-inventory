@extends('layouts.app')
@section('PageTitle','Products')

@section('container')

    <div class="container py-4">
        <div class="mb-4">
            <div class="row">
                <div class="col">
                    <h3>Products</h3>
                </div>
                <div class="col-2">
                    <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">view Categories</a>
                </div>
                <div class="col-2">
                    <a href="{{route('products.create')}}" class="btn btn-primary btn-sm">Create Product</a>
                </div>
            </div>

            <div class="row">
                <table class="table table-striped table-inverse table-responsive">
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
                            <td>{{ $Product->category_id}} </td>
                            <td>{{ $Product->price}} </td>
                            <td></td>
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
