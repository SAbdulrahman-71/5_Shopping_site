<?php
session_start();
// require('users.php');

if (isset($_SESSION['name'])) {

    echo '<h1>Welcome to the website, dear ' . $_SESSION['name'] . '</h1>';

    echo "<h3>Please choose the product that you want</h3>";



    $watches = array(
        array('item_id' => 101, 'name' => 'Digital Watch', 'price' => 99.99, 'img' => 'images/products_items/watches/Digital_Watch.webp'),
        array('item_id' => 102, 'name' => 'Analog Watch', 'price' => 149.99, 'img' => 'images/products_items/watches/Analog_watch.webp'),
        array('item_id' => 103, 'name' => 'Sport Watch', 'price' => 119.99, 'img' => 'images/products_items/watches/1.png'),
        array('item_id' => 104, 'name' => 'Luxury Watch', 'price' => 999.99, 'img' => 'images/products_items/watches/1.png'),
    );

    $books = array(
        array('item_id' => 201, 'name' => 'Fiction Book', 'price' => 19.99),
        array('item_id' => 202, 'name' => 'Non-Fiction Book', 'price' => 29.99),
        array('item_id' => 203, 'name' => 'Science Book', 'price' => 24.99),
        array('item_id' => 204, 'name' => 'History Book', 'price' => 34.99),
    );

    $shoes = array(
        array('item_id' => 301, 'name' => 'Men\'s Shoes', 'price' => 79.99),
        array('item_id' => 302, 'name' => 'Women\'s Shoes', 'price' => 89.99),
        array('item_id' => 303, 'name' => 'Running Shoes', 'price' => 99.99),
        array('item_id' => 304, 'name' => 'Casual Shoes', 'price' => 69.99),
    );

    $electronic_devices = array(
        array('item_id' => 401, 'name' => 'Smartphone', 'price' => 699.99),
        array('item_id' => 402, 'name' => 'Laptop', 'price' => 1199.99),
        array('item_id' => 403, 'name' => 'Tablet', 'price' => 499.99),
        array('item_id' => 404, 'name' => 'Smart Watch', 'price' => 299.99),
    );

    $pens = array(
        array('item_id' => 501, 'name' => 'Ballpoint Pen', 'price' => 4.99),
        array('item_id' => 502, 'name' => 'Fountain Pen', 'price' => 19.99),
        array('item_id' => 503, 'name' => 'Gel Pen', 'price' => 6.99),
        array('item_id' => 504, 'name' => 'Calligraphy Pen', 'price' => 29.99),
    );

    $tables = array(
        array('item_id' => 601, 'name' => 'Coffee Table', 'price' => 199.99),
        array('item_id' => 602, 'name' => 'Dining Table', 'price' => 399.99),
        array('item_id' => 603, 'name' => 'Study Table', 'price' => 149.99),
        array('item_id' => 604, 'name' => 'Outdoor Table', 'price' => 299.99),
    );



    $products = array(
        array(
            'id' => 1,
            'name' => 'Watches',
            'description' => 'Timepieces for every occasion.',
            'items' => $watches,
        ),
        array(
            'id' => 2,
            'name' => 'Books',
            'description' => 'Explore worlds beyond your imagination.',
            'items' => $books,
        ),
        array(
            'id' => 3,
            'name' => 'Shoes',
            'description' => 'Step into comfort and style.',
            'items' => $shoes,
        ),
        array(
            'id' => 4,
            'name' => 'Electronic Devices',
            'description' => 'Cutting-edge technology at your fingertips.',
            'items' => $electronic_devices,
        ),
        array(
            'id' => 5,
            'name' => 'Pens',
            'description' => 'Elegant writing instruments for professionals.',
            'items' => $pens,
        ),
        array(
            'id' => 6,
            'name' => 'Tables',
            'description' => 'Furniture pieces for every space.',
            'items' => $tables,
        ),
    );
} else {

    echo ' 
        <button type="submit" name="ok"><a href="login.php"</a> unauthorized<br></button>
    </form>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/products.css">

    <title>Document</title>
</head>

<body>
    <hr>



    <div class="container-flex px-5 py-5">
        <div class="row">

            <?php

            foreach ($products as $product) {
                echo '<div class="col-lg-6 p-1">';
                echo '<div class="card product-card " >';
                echo '<div class="card-body">';
                echo '<a href="product_items.php?id=' . $product['id'] . '">' . $product['name'] . ' - ' . $product['description'] . '</a><br>';
                echo '<div class="card" style="padding: 10px; margin-top: 10px; background-color: white; border: 1px solid #ccc; border-radius: 5px;">';
                echo '<pre style="margin-bottom: 0;">';
                echo '<strong>Product Details:</strong><br>';
                echo 'ID: ' . $product['id'] . '<br>';
                echo 'Name: ' . $product['name'] . '<br>';
                echo 'Description: ' . $product['description'] . '<br>';

                foreach ($product['items'] as $items) {
                    echo '<br>Item Name: ' . $items['name'] . '<br >&ensp;';
                    echo ' Item Price: $' . $items['price'] . '<br>';
                }

                echo '</pre>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }



            ?>


        </div>
    </div>





    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>