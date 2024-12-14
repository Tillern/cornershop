@extends('admin.layouts.admin')

@section('content')
<h1>Order #{{ $order->id }}</h1>
<p><strong>User:</strong> {{ $order->user->name }}</p>
<p><strong>Total Price:</strong> {{ $order->total_price }}</p>
<p><strong>Status:</strong> {{ $order->status }}</p>

<h2>Order Items</h2>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<form method="POST" action="{{ route('admin.orders.update', $order) }}">
    @csrf
    @method('PUT')
    <label for="status">Update Status:</label>
    <select name="status" id="status">
        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
    </select>
    <button type="submit">Update</button>
</form>
@endsection
