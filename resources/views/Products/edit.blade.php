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
            <input type="text" class="form-control" name="description" id="">
            <div class="form-group">
              <label for="">Category</label>
              <select class="form-control" name="Ccategory" id="">
                <option>?</option>
                <option>??</option>
                <option>???</option>
              </select>
            </div>
            <input type="num" class="form-control" name="price">
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
