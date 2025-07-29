<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 1 1 400px;
            margin-right: 40px;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-details {
            flex: 2 1 500px;
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
        }

        input[readonly] {
            background-color: #f9f9f9;
        }

        #total {
            font-size: 1.5rem;
            color: #e74c3c;
        }

        .add-cart-btn,
        .back-link {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .add-cart-btn:hover,
        .back-link:hover {
            background-color: #2980b9;
        }

        .back-link {
            background-color: #2ecc71;
        }

        .back-link:hover {
            background-color: #27ae60;
        }

        .price-container {
            display: flex;
            flex-direction: column;
            margin-top: 15px;
        }

        .price-label {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #555;
        }
    </style>

    <script>
        // Function to calculate total price
        function calculate() {
            const mass = document.querySelector('input[name="p_mass"]').value;
            const price = document.querySelector('input[name="p_price"]').value;
            const totalPrice = (mass * price / 100).toFixed(2); // Calculate total price
            document.getElementById('total').textContent = `RM ${totalPrice}`;
        }
        // Call the calculate function on page load
        window.onload = calculate;
    </script>
</head>
<body>
    <div class="container">
        <!-- Product Image Section -->
        <div class="product-image">
            <img src="{{ asset($products->p_image) }}" alt="{{ $products->p_name }}">
        </div>

        <!-- Product Details Section -->
        <div class="product-details">
            <h2>{{ $products->p_name }}</h2>
            <form method="post" action="{{ route('add_cart', $products->id) }}">
                @csrf

                <!-- Product Mass Input -->
                <label for="p_mass">Product Mass (g):</label>
                <input type="number" name="p_mass" value="{{ $products->p_mass }}" onchange="calculate()">

                <!-- Readonly Price Input -->
                <label for="p_price">Price per 100g:</label>
                <input type="text" name="p_price" readonly value="{{ $products->p_price }}">

                <!-- Total Price Display -->
                <div class="price-container">
                    <span class="price-label">Total Price:</span>
                    <span id="total">RM 0.00</span>
                </div>

                <!-- Add to Cart Button -->
                <button type="submit" class="add-cart-btn">Add to Cart</button>
            </form>

            <!-- Back to Products Button -->
            <a href="{{ route('index') }}" class="back-link">Back to Products</a>
        </div>
    </div>
</body>
</html>
