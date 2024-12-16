@extends('admin.layouts.admin')

@section('content')
<!-- Add Order Form -->
<div id="add-order-form" class="card p-3 mb-4">
    <form method="POST" action="{{ route('admin.orders.store') }}">
        @csrf

        <h5>Add New Order</h5>
        
        <!-- Customer Details -->
        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>
        <div class="mb-3">
            <label for="customer_email" class="form-label">Customer Email</label>
            <input type="email" class="form-control" id="customer_email" name="customer_email" required>
        </div>

        <!-- Order Items -->
        <div id="items-container">
            <div class="mb-3">
                <label for="product_1" class="form-label">Product</label>
                <select class="form-control" id="product_1" name="products[]" required>
                    <option value="" disabled selected>Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addProductField()">Add Another Product</button>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Save Order</button>
        <button type="button" class="btn btn-danger" onclick="hideAddOrderForm()">Cancel</button>
    </form>
</div>

@endsection