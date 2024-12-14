@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Summary</h1>

        @if ($order)
            <h3>Order ID: #{{ $order->id }}</h3>
            <p>Status: {{ $order->status }}</p>
            <p>Placed on: {{ $order->created_at->format('d-m-Y') }}</p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Total: ${{ number_format($order->total_price, 2) }}</h3>

        @else
            <p>No order found.</p>
        @endif
    </div>
@endsection