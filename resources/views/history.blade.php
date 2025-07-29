<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart History</title>
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
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        thead th {
            background-color: #3498db;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 1.1rem;
        }

        tbody td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        td:last-child {
            text-align: center;
        }

        /* Styling buttons and links */
        .back-link {
            display: inline-block;
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            font-weight: bold;
            font-size: 1rem;
        }

        .back-link:hover {
            background-color: #2980b9;
        }

        .checkout-btn {
            background-color: #27ae60;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1rem;
            font-weight: bold;
        }

        .checkout-btn:hover {
            background-color: #2ecc71;
        }

        /* Responsive design for smaller devices */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tbody tr {
                margin-bottom: 20px;
            }

            tbody td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border-bottom: none;
                border: 1px solid #ddd;
            }

            tbody td:before {
                content: attr(data-label);
                font-weight: bold;
                text-transform: capitalize;
            }

            .back-link, .checkout-btn {
                width: 100%;
                text-align: center;
                padding: 15px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h2>Your Cart History</h2>
        <table>
            <thead>
                <tr>
                    <th>Product image</th>
                    <th>Product Name</th>
                    <th>Product Mass</th>
                    <th>Total Price</th>
                    <th>Cart Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $carts)
                    <tr>
                        
                        <td data-label="Product Name">{{ $carts->p_name }}</td>
                        <td data-label="Product Mass">{{ $carts->total_mass }} grams</td>
                        <td data-label="Total Price">RM {{ number_format($carts->total_mass * $carts->p_price / 100, 2) }}</td>
                        <td data-label="Cart Status">{{ $carts->c_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add a checkout button -->
        <div style="text-align: center; margin-bottom: 20px;">
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>

        <a href="{{ route('index') }}" class="back-link">Back to Main Page</a>
    </div>
</body>
</html>
