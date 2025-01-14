@extends('layouts.app')
@section('PageTitle', 'New Category')

@section('container')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2>New Category</h2>
            </div>
            <div class="col-2">
                <a href="{{ route('categories.index')}}" class="btn btn-secondary">Return to Category</a>
            </div>
        </div>


        <div class="row">
            <form action="{{route('categories.store') }}" method="POST">
                @csrf
                <label for="name">name</label>
                <input type="text" class="form-control" name="name">

                <label for="desc">Description</label>
                <input type="text" class="form-control" name="description" id="">

                <button class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

@endsection
