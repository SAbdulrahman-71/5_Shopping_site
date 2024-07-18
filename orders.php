<?php
session_start();

echo 'Ordered Products:<br>';
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id) {
        echo 'Product ID: ' . $product_id . '<br>';
    }
}
