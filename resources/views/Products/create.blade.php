@extends('layouts.app')
@section('PageTitle', 'new Product')

@section('container')
    <div class="container py-5">

        <div class="row">
            <div class="col">
                <h2>Create New Product</h2>
            </div>
            <div class="col-2">
                <a href="{{ route('products.index')}}" class="btn btn-secondary">Return to Products</a>
            </div>
        </div>
        <form action="{{route('products.store') }}" method="POST">
            @csrf

            <label for="name">name</label>
            <input type="text" class="form-control" name="name" required>

            <label for="desc">Description</label>
            <input type="text" class="form-control" name="description" id="">

            <label for="" class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
            <option value="" disabled selected>Select a category</option>
                @forelse ($Categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                    <option value="" disabled selected>No category Available</option>
                @endforelse
            </select>

            <label for="">Price/Amount:</label>
            <input type="number" class="form-control" name="price" required>

            <button class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
