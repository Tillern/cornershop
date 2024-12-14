<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Products</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Available Products</h1>
        <div class="row">
            @foreach($products as $product)
<div class="col-md-4">
    <div class="card mb-4">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Price: ${{ $product->price }}</p>
            <button class="btn btn-primary" onclick="addToCart({{ $product->id }})">Add to Cart</button>
        </div>
    </div>
</div>
</div>

           
        </div>
    
@endforeach
</div>

<script>
    function addToCart(productId) {
        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
