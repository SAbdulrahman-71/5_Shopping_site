<?php
require('functions.php');
html_connect(); // only other pages not on login page
include 'Data/products_data.php';

if (isset($_SESSION['name'])) {
} else {
    echo '<button type="submit" name="ok"><a href="login.php"</a> unauthorized<br></button></form>';
}
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
    <h1 class="container text-center">
        Welcome to the website Dear <?php echo  $_SESSION['name'] ?> </h1>
    <hr>

    <h3 class="text-left">
        Kindly have a look no this display of all products we have.</h3>
    <h3 class="text-left">
        then you may choose the product that you want</h3>
    <div class="container-flex px-5 py-5">
        <div class="row">

            <?php
            foreach ($products as $product) {
                echo '<div class="col-lg-6 p-1">';
                echo '<div class="card product-card">';
                echo '<div class="card-body">';
                // Change the link to include an anchor with product ID
                echo '<a style="color: #F9F7F7;" href="product_view.php?product=' . $product['id'] . '">' . $product['name'] . ' - ' . $product['description'] . '</a><br>';
                echo '<div class="card" style="padding: 10px; margin-top: 10px; background-color: white; border: 1px solid #ccc; border-radius: 5px;">';
                echo '<pre style="margin-bottom: 0;">';
                echo '<strong>Product Details:</strong><br>';
                echo 'ID: ' . $product['id'] . '<br>';
                echo 'Name: ' . $product['name'] . '<br>';
                echo 'Description: ' . $product['description'] . '<br>';

                foreach ($product['items'] as $items) {
                    echo '<br>Item Name: ' . $items['name'] . '<br>&ensp;';
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