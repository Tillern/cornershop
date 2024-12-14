@extends('admin.layouts.admin')

@section('title', 'View Product')

@section('content')
    <h1 class="mb-4">{{ $product->name }}</h1>
    <div>
        <p><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Created At:</strong> {{ $product->created_at->format('d M Y') }}</p>
    </div>
    <div>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        @else
            <p>No image available</p>
        @endif
    </div>
@endsection