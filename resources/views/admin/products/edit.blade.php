@extends('admin.layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea id="description" name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @if($product->image_path)
                <img src="{{ Storage::url($product->image_path) }}" alt="Product Image" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-warning">Update Product</button>
    </form>
@endsection