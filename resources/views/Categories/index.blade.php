@extends('layouts.app')
@section('PageTitle','Category')

@section('container')
    <div class="container py-4">
        <div class="mb-4">

            <div class="row">
                <div class="col">
                    <h3>Manage Categories</h3>
                </div>
                <div class="col-2">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">View Products</a>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm">Create Category</a>
                </div>
            </div>

            <div class="row">


                @if(session('category-error'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="autoDismissAlert">
                    <strong>Note!</strong> {{ session('category-error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>


                @endif
            </div>

            <div class="row">
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>s/n</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Categories as $Category)
                            <tr>
                                <td>#</td>
                                <td>{{ $Category->name}} </td>
                                <td>{{ $Category->description}} </td>
                                <td class="col-2 text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $Category) }}">Edit</a>
                                    {{-- <button class="btn btn-danger" href="{{ route('categories.edit', $Category->id) }}">Delete</button> --}}

                                    <form action="{{ route('categories.destroy', $Category) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="text-center">
                                        <p>
                                            NO DATA AVAILABLE FOR DISPLAY
                                        </p>
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
      }, 3000); // 1500ms = 1.5 seconds
    </script>


@endsection


