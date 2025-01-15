@extends('layouts.app')
@section('PageTitle', 'New Product')

@section('container')
<div class="container py-5">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h2>Create New Product</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Return to Products
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Enter product name"
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
                        placeholder="Enter product description">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select
                        id="category_id"
                        name="category_id"
                        class="form-control"
                        required>
                        <option value="" disabled selected>Select a category</option>
                        @forelse ($Categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="" disabled>No categories available</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        class="form-control"
                        placeholder="Enter product price"
                        value="{{ old('price') }}"
                        required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
