@extends('layouts.app')
@section('PageTitle', 'Edit Category')

@section('container')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2>Edit Category</h2>
            </div>
            <div class="col-2">
                <a href="{{ route('categories.index')}}" class="btn btn-secondary">Return to Category</a>
            </div>
        </div>

        <div class="row">
            <form action="{{route('categories.update', $Category) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="name">name</label>
                <input type="text" class="form-control" name="name" value="{{ $Category->name }}">

                <label for="desc">Description</label>
                <textarea name="description" id="" class="form-control" cols="30" rows="10">{{$Category->description }}</textarea>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
