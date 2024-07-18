<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/product_items.css">
</head>

<body>
    <?php

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
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Watches</h2>
                <div class="row">
                    <?php foreach ($watches as $watch) : ?>
                        <div class="col-lg-6 mb-4">
                            <div class="card product-card">
                                <img src="<?php echo $watch['img']; ?>" class="card-img-top" alt="<?php echo $watch['name']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $watch['name']; ?></h5>
                                    <p class="card-text">Price: $<?php echo $watch['price']; ?></p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Books</h2>
                <div class="row">
                    <?php foreach ($books as $book) : ?>
                        <div class="col-lg-6 mb-4">
                            <div class="card product-card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $book['name']; ?></h5>
                                    <p class="card-text">Price: $<?php echo $book['price']; ?></p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Repeat the above structure for other product categories (Shoes, Electronic Devices, Pens, Tables) -->

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>