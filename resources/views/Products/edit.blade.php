@extends('layouts.app')
@section('PageTitle', 'Edit Product')

@section('container')
    <div class="container py-5">

        <div class="row">
            <div class="col">
                <h2>Edit Product</h2>
            </div>
            <div class="col-2">
                <a href="{{ route('products.index')}}" class="btn btn-secondary">Return to Products</a>
            </div>
        </div>
        <form action="{{route('products.store') }}" method="POST">
            @csrf
            <label for="name">name</label>
            <input type="text" class="form-control" name="name">

            <label for="desc">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>

            <div class="form-group">
              <label for="">Category</label>
              <select name="category_id" class="form-control" required>
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <input type="num" class="form-control" name="price">
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
