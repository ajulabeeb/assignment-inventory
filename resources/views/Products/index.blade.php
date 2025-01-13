@extends('layouts.app')
@section('PageTitle','Products')

@section('container')

    <div class="container py-4">
        <div class="mb-4">
            <div class="row">
                <div class="">
                    <a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Products as $Product)
                        <tr>
                            <td>{{ $Product->name}} </td>
                            <td>{{ $Product->description}} </td>
                            <td>{{ $Product->category_id}} </td>
                            <td>{{ $Product->price}} </td>
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>



        </div>




    </div>
@endsection
