
@section('content')
<div class="container mt-4">
    <h1>Place Your Order</h1>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>

        <h5>Order Summary</h5>
        <ul class="list-group mb-3">
            @foreach($cartItems as $item)
                <li class="list-group-item">
                    {{ $item['name'] }} ({{ $item['quantity'] }} x ${{ $item['price'] }})
                    <span class="float-end">${{ $item['quantity'] * $item['price'] }}</span>
                </li>
            @endforeach
            <li class="list-group-item">
                <strong>Total:</strong>
                <span class="float-end">${{ $totalPrice }}</span>
            </li>
        </ul>

        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
</div>
@endsection