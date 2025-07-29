<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
            font-size: 2.5rem;
            letter-spacing: 1px;
        }

        /* Product grid for cart items */
        .cart-items {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .cart-items img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }

        .cart-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .cart-details h4 {
            font-size: 1.3rem;
            color: #333;
        }

        .cart-details p {
            color: #888;
            margin-top: 5px;
            font-size: 0.9rem;
        }

        .cart-price {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #27ae60;
        }

        .cart-status {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #3498db;
        }

        .checkout-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
        }

        .checkout-btn {
            background-color: #2ecc71;
            color: white;
            padding: 15px 30px;
            border-radius: 5px;
            border: none;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #27ae60;
        }

        .back-link {
            text-decoration: none;
            color: white;
            background-color: #3498db;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 1.1rem;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #2980b9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cart-items {
                grid-template-columns: 1fr;
            }

            .checkout-section {
                flex-direction: column;
                gap: 20px;
            }

            .back-link, .checkout-btn {
                width: 100%;
                text-align: center;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h2>Your Cart</h2>
        <!-- Example of one cart item -->
        @foreach($cart as $carts)
        <div class="cart-items">
            <!-- Product Image -->
            <img src="{{ $carts->p_image }}" alt="Product Image">
            
            <!-- Product Details -->
            <div class="cart-details">
                <h4>{{ $carts->p_name }}</h4>
                <p>{{ $carts->total_mass }} grams</p>
            </div>
            
            <!-- Total Price -->
            <div class="cart-price">
                RM {{ number_format($carts->total_mass * $carts->p_price / 100, 2) }}
            </div>
            
            <!-- Cart Status -->
            <div class="cart-status">
                {{ $carts->c_status }}
            </div>
        </div>
        @endforeach

        <!-- Checkout and Back Links -->
        <div class="checkout-section">
            <a href="{{ route('index') }}" class="back-link">Continue Shopping</a>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="checkout-btn">Proceed to Checkout</button>
            </form>
        </div>
    </div>
</body>
</html>
