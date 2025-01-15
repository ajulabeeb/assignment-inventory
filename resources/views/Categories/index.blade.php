@extends('layouts.app')
@section('PageTitle', 'Category')

@section('container')
<div class="container py-4">
    <div class="mb-4">

        <div class="row align-items-center mb-3">
            <div class="col">
                <h3>Manage Categories</h3>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm me-2">
                    <i class="bi bi-box"></i> View Products
                </a>
                <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Create Category
                </a>
            </div>
        </div>

        @if(session('category-error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="autoDismissAlert">
            <strong>Note!</strong> {{ session('category-error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Categories as $Category)
                    <tr>
                        <td>#</td>
                        <td>{{ $Category->name }}</td>
                        <td>{{ $Category->description }}</td>
                        <td class="text-end">
                            <a class="btn btn-info btn-sm me-1" href="{{ route('categories.edit', $Category) }}" data-bs-toggle="tooltip" title="Edit Category">
                                <i class="bi bi-pencil-square"></i>Edit
                            </a>
                            <form action="{{ route('categories.destroy', $Category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Category">
                                    <i class="bi bi-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
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

<script>
    setTimeout(() => {
        const alertElement = document.getElementById('autoDismissAlert');
        if (alertElement) {
            const alert = new bootstrap.Alert(alertElement);
            alert.close();
        }
    }, 3000); // 3 seconds
</script>
@endsection
