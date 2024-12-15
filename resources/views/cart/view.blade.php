@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Your Cart</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cart as $item)
            <tr>
                <td><img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px;"></td>
                <td>{{ $item['name'] }}</td>
                <td>${{ number_format($item['price'], 2) }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.update') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 60px;">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                </td>
                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.remove') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Your cart is empty.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        <form method="GET" action="{{ route('cart.clear') }}">
            @csrf
            <button class="btn btn-warning">Clear Cart</button>
        </form>
    </div>
</div>
@endsection
