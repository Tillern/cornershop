@extends('layouts.admin')

@section('content')
<h1>Orders</h1>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->status }}</td>
            <td>
                <a href="{{ route('admin.orders.show', $order) }}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection