@extends('layouts.app')
@section('PageTitle', 'New Category')

@section('container')
<div class="container py-5">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h2>Create New Category</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Return to Categories
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Enter category name"
                        value="{{ old('name') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Enter category description"
                        required>{{ old('description') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
