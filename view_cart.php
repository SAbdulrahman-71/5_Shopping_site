<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #b2c5d8;
            padding-top: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .cart-item {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-name {
            font-weight: bold;
        }

        .item-price {
            color: #6c757d;
            margin-top: 5px;
        }

        .item-quantity {
            margin-left: 10px;
        }

        .item-total {
            font-weight: bold;
            margin-left: auto;
        }

        .btn-update {
            margin-left: 10px;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-checkout {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Your Shopping Cart</h2>
        <?php
        session_start();

        if (empty($_SESSION['cart'])) {
            echo '<p>Your cart is empty.</p>';
        } else {
            foreach ($_SESSION['cart'] as $key => $item) {
                echo '<div class="cart-item">';
                echo '<span class="item-name">' . $item['name'] . '</span>';
                echo '<span class="item-price">$' . $item['price'] . '</span>';
                echo '<div class="item-quantity">Quantity: ' . $item['quantity'] . '</div>';
                echo '<div class="item-total">$' . ($item['price'] * $item['quantity']) . '</div>';
                echo '<form method="post" action="update_cart.php">';
                echo '<input type="hidden" name="item_id" value="' . $item['item_id'] . '">';
                echo '<input type="number" name="quantity" value="' . $item['quantity'] . '" min="1" class="form-control">';
                echo '<button type="submit" name="update_quantity" class="btn btn-sm btn-primary btn-update">Update</button>';
                echo '<button type="submit" name="remove_item" class="btn btn-sm btn-danger btn-update">Remove</button>';
                echo '</form>';
                echo '</div>';
            }

            // Calculate total price
            $total_price = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total_price += $item['price'] * $item['quantity'];
            }

            echo '<div class="text-right mt-3">';
            echo '<h4>Total: $' . number_format($total_price, 2) . '</h4>';
            echo '<a href="#" class="btn btn-success btn-checkout">Checkout</a>';
            echo '</div>';
        }
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>