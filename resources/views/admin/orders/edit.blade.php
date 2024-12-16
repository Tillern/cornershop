@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Order #{{ $order->id }}</h1>

    <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="customer_name">Customer Name</label>
        <input type="text" name="customer_name" class="form-control" value="{{ $order->customer_name }}">
    </div>
    <div class="form-group">
        <label for="customer_email">Customer Email</label>
        <input type="email" name="customer_email" class="form-control" value="{{ $order->customer_email }}">
    </div>
    <div class="form-group">
        <label for="products">Products</label>
        <select name="products[]" class="form-control" multiple>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $order->items->contains('product_id', $product->id) ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Order</button>
</form>

</div>
@endsection