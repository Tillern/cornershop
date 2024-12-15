<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Your Cart</h1>
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
        @foreach($cart as $productId => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>${{ number_format($item['price'], 2) }}</td>
                <td>
                    <input type="number" value="{{ $item['quantity'] }}" class="form-control quantity" data-product-id="{{ $productId }}">
                </td>
                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                <td>
                    <button class="btn btn-danger btn-remove" data-product-id="{{ $productId }}">Remove</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3>Total: ${{ number_format($total, 2) }}</h3>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = '{{ csrf_token() }}';

        // Update Quantity
        document.querySelectorAll('.quantity').forEach(input => {
            input.addEventListener('change', function () {
                const productId = this.getAttribute('data-product-id');
                const quantity = this.value;

                axios.post('/cart/update', {product_id: productId, quantity}, {
                    headers: {'X-CSRF-TOKEN': csrfToken}
                }).then(response => location.reload());
            });
        });

        // Remove Item
        document.querySelectorAll('.btn-remove').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');

                axios.delete('/cart/remove', {
                    headers: {'X-CSRF-TOKEN': csrfToken},
                    data: {product_id: productId}
                }).then(response => location.reload());
            });
        });
    });
</script>
</body>
</html>
