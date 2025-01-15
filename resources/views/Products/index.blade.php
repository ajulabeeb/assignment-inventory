@extends('layouts.app')
@section('PageTitle', 'Products')

@section('container')
<div class="container py-4">
    <div class="mb-4">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h3>Manage Products</h3>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm me-2">
                    <i class="bi bi-grid"></i> View Categories
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Create Product
                </a>
            </div>
        </div>

        <div class="row">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
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
                        <td>{{ Str::title($Product->name) }}</td>
                        <td>{{ Str::title($Product->description) }}</td>
                        <td>{{ Str::title($Product->category->name) }}</td>
                        <td>NGN {{ number_format($Product->price, 2) }}</td>
                        <td class="text-end">
                            <a class="btn btn-info btn-sm me-1" href="{{ route('products.edit', $Product) }}" data-bs-toggle="tooltip" title="Edit Product">
                                <i class="bi bi-pencil-square"></i>Edit
                            </a>
                            <form action="{{ route('products.destroy', $Product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Product">
                                    <i class="bi bi-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="text-center py-3">
                                <i class="bi bi-emoji-frown display-4"></i>
                                <p class="mt-2">No data available for display</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
