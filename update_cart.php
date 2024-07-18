<?php
session_start();

// Handle update quantity
if (isset($_POST['update_quantity'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Validate quantity
    if ($quantity <= 0) {
        // Remove item from cart if quantity is zero or less
        removeItemFromCart($item_id);
    } else {
        // Update quantity in cart
        updateQuantityInCart($item_id, $quantity);
    }

    // Redirect back to view cart page
    header('Location: view_cart.php');
    exit();
}

// Handle remove item
if (isset($_POST['remove_item'])) {
    $item_id = $_POST['item_id'];
    removeItemFromCart($item_id);

    // Redirect back to view cart page
    header('Location: view_cart.php');
    exit();
}

// Function to update quantity in cart
function updateQuantityInCart($item_id, $quantity)
{
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['item_id'] === $item_id) {
            $item['quantity'] = $quantity;
            break;
        }
    }
}

// Function to remove item from cart
function removeItemFromCart($item_id)
{
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['item_id'] === $item_id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset array keys
            break;
        }
    }
}
