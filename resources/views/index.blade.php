<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .cart-link {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .cart-link:hover {
            background-color: #2980b9;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-info {
            padding: 20px;
            text-align: center;
        }

        .product-name {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
        }

        .product-price {
            font-size: 1.1rem;
            color: #27ae60;
            margin-bottom: 15px;
        }

        .buy-btn {
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .buy-btn:hover {
            background-color: #27ae60;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 20px;
            }

            .cart-link {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header with cart and history links -->
        <div class="header">
            <a href="{{ route('cart_list') }}" class="cart-link">View Cart</a>
            <a href="{{ route('history') }}" class="cart-link">Order History</a>
        </div>

        <!-- Product grid -->
        <div class="product-grid">
            @if(count($products) !== 0)
                @foreach ($products as $product)
                <div class="product-card">
                   
                    <img src="{{ $product->p_image }}" alt="{{ $product->p_name }}" class="product-image">

                    <!-- Product details -->
                    <div class="product-info">
                        <h3 class="product-name">{{ $product->p_name }}</h3>
                        <p class="product-price">RM{{ number_format($product->p_price, 2) }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="buy-btn">Buy Now</a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>
