<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/product_items.css">
    <style>
        body {
            background-color: #b2c5d8;
            padding-top: 20px;
        }

        .product-card {
            transition: transform 0.3s ease-in-out;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .quantity {
            width: 60px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    // Initialize session for cart storage
    session_start();

    // Sample product arrays (watches, books, etc.) as you've defined
    $watches = array(
        array('item_id' => 101, 'name' => 'Digital Watch', 'price' => 99.99, 'img' => 'images/products_items/watches/Digital_Watch.webp'),
        array('item_id' => 102, 'name' => 'Analog Watch', 'price' => 149.99, 'img' => 'images/products_items/watches/Analog_watch.webp'),
        array('item_id' => 103, 'name' => 'Sport Watch', 'price' => 119.99, 'img' => 'images/products_items/watches/1.png'),
        array('item_id' => 104, 'name' => 'Luxury Watch', 'price' => 999.99, 'img' => 'images/products_items/watches/1.png'),
    );

    // Function to print product cards
    function printProductCards($products)
    {
        foreach ($products as $product) {
            echo '<div class="col-lg-6 mb-4">';
            echo '<div class="card product-card">';
            echo '<img src="' . $product['img'] . '" class="card-img-top" alt="' . $product['name'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $product['name'] . '</h5>';
            echo '<p class="card-text">Price: $' . $product['price'] . '</p>';
            echo '<form method="post">';
            echo '<input type="hidden" name="item_id" value="' . $product['item_id'] . '">';
            echo '<div class="input-group mb-3">';
            echo '<input type="number" class="form-control quantity" name="quantity" value="1" min="1">';
            echo '<div class="input-group-append">';
            echo '<button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

    // Handle Add to Cart form submission
    if (isset($_POST['add_to_cart'])) {
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];

        // Initialize cart if not already set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Check if item already exists in cart, update quantity
        $item_exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['item_id'] === $item_id) {
                $item['quantity'] += $quantity;
                $item_exists = true;
                break;
            }
        }

        // If item does not exist in cart, add new entry
        if (!$item_exists) {
            $_SESSION['cart'][] = array(
                'item_id' => $item_id,
                'quantity' => $quantity
            );
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Watches</h2>
                <div class="row">
                    <?php printProductCards($watches); ?>
                </div>
            </div>
            <!-- Add more categories and their respective product listings as needed -->
        </div>
    </div>

    <!-- Cart Summary -->
    <div class="fixed-bottom text-right m-3">
        <a href="view_cart.php" class="btn btn-success">View Cart</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$watches = array(
    array('item_id' => 101, 'name' => 'Digital Watch', 'price' => 99.99, 'img' => 'images/products_items/watches/Digital_Watch.webp'),
    array('item_id' => 102, 'name' => 'Analog Watch', 'price' => 149.99, 'img' => 'images/products_items/watches/Analog_watch.webp'),
    array('item_id' => 103, 'name' => 'Sport Watch', 'price' => 119.99, 'img' => 'images/products_items/watches/1.png'),
    array('item_id' => 104, 'name' => 'Luxury Watch', 'price' => 999.99, 'img' => 'images/products_items/watches/1.png'),
);

$products = array(
    array(
        'id' => 1,
        'name' => 'Watches',
        'description' => 'Timepieces for every occasion.',
        'items' => $watches,
    ),
);

// Loop through $products array
foreach ($products as $product) {
    echo '<h2>' . $product['name'] . '</h2>';
    echo '<p>' . $product['description'] . '</p>';

    // Loop through $watches array inside $products
    foreach ($product['items'] as $watch) {
        if ($watch['name'] === 'Sport Watch') {
            echo 'Price of Sport Watch: $' . $watch['price'];
            break; // Exit the loop once 'Sport Watch' is found
        }
    }
}
?>