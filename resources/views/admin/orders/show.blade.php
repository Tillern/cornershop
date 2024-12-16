@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Order #{{ $order->id }}</h1>

    <h3>Customer Details</h3>
    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
    <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>

    <h3>Order Items</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ $item->price }}</td>
                <td>${{ $item->subtotal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</div>
@endsection

