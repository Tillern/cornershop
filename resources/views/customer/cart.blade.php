@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Cart</h1>
        
        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 60px;">
                                    <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <h3>Total: ${{ number_format($totalPrice, 2) }}</h3>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        @endif
    </div>
@endsection