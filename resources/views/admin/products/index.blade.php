@extends('admin.layouts.admin')

@section('title', 'Products')

@section('content')
    <h1 class="my-5">Products</h1>
    <a href="{{ route('admin.products.create') }}" class="btn waves-effect waves-light btn-grd-primary m-5">Add New Product</a>


    <table class="table table-hover table-striped mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price (in Kes.)</th>
                <th>Quantity in Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                     <td>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                             class="img-thumbnail" style="width: 50px; height: 50px;">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="Placeholder" 
                             class="img-thumbnail" style="width: 80px; height: 80px;">
                    @endif
                </td>
                    <td>{{ $product->category->name ?? 'Uncategorized' }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection