<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require('functions.php');
html_connect();
include 'Data/products_data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/products.css">
    <title>Products Array display</title>
</head>

<body>
    <nav class="nav_container">
        <ul class="nav flex-column text-center">
            <li class="nav-item ">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_cart.php">View Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log out</a>
            </li>
        </ul>
    </nav>

    <div class="container- px-5" style="margin: 5%;">
        <h1 class="welcomeing text-center">Welcome to the website Dear <?php echo $_SESSION['name']; ?></h1>
        <hr>
        <h3 class="text-left welcomeing">Kindly have a look at this display of all products we have.</h3>
        <h3 class="text-left welcomeing">Then you may choose the product that you want</h3>
        <div class="px-5 py-5">
            <div class="row">
                <?php foreach ($products as $product) : ?>
                    <div class="col-lg-6 p-1" style="left:-8%;">
                        <div class="products_container">
                            <div class="card-body">
                                <?php echo '<a href="product_view.php?product=' . $product['id'] . '">' . $product['name'] . ' - ' . $product['description'] . '</a>'; ?>
                                <div class="card">
                                    <strong>Product Details </strong><br>
                                    <div style="margin-bottom: 0;">
                                        <?php
                                        echo 'ID: ' . $product['id'] . '<br>';
                                        echo 'Name: ' . $product['name'] . '<br>';
                                        echo 'Description: ' . $product['description'] . '<br>';
                                        foreach ($product['items'] as $items) {
                                            echo '<br>Item Name: ' . $items['name'] . '<br>&ensp;';
                                            echo ' Item Price: $' . $items['price'] . '<br>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>