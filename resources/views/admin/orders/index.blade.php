@extends('admin.layouts.admin')

@section('title', 'Orders')

@section('content')
    <h1 class="mb-4">Orders</h1>
    <a href="{{ route('admin.orders.create') }}" class="btn waves-effect waves-light btn-grd-primary m-5">Create new
        Order</a>
    <table class="table table-hover table-striped">

        <div class="mt-5">
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Items</th>
                    <th>Image</th>
                    <th>Order date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>
                            @foreach ($order->items as $item)                                
                                                                      
                                    {{ $item->product->name }}
                                
                            @endforeach
                        </td>

                        <td>
                            @foreach ($order->items as $item)
                                <div>
                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}" width="50">
                                </div>
                            @endforeach
                        </td>
                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <!-- Update Button -->
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>

                            <!-- Delete Button -->
                            <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}"
                                style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endsection
