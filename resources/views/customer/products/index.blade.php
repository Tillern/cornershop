@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shop Products</h1>

    <!-- Filters -->
    <form method="GET" action="{{ route('shop.index') }}" class="mb-4">
        <div class="row">
            <!-- Category Filter -->
            <div class="col-md-4">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sort Filter -->
            <div class="col-md-4">
                <label for="sort">Sort By</label>
                <select name="sort" id="sort" class="form-control">
                    <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Oldest to Newest</option>
                    <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Newest to Oldest</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Product Grid -->
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->withQueryString()->links() }}
    </div>
</div>
@endsection
