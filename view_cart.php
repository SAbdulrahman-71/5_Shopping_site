<?php
require('functions.php');
html_connect(); // only other pages not on login page
include 'Data/new_data.php';

function getProductById($itemId, $items)
{
    foreach ($items as $item) {
        if ($item['item_id'] == $itemId) {
            return $item;
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        $itemId = $_POST['item_id'];
        $quantity = (int)$_POST['quantity'];

        if ($quantity > 0) {
            $_SESSION['cart'][$itemId] = $quantity;
        } else {
            unset($_SESSION['cart'][$itemId]);
        }
    }

    if (isset($_POST['remove_from_cart'])) {
        $itemId = $_POST['item_id'];
        unset($_SESSION['cart'][$itemId]);
    }

    header('Location: view_cart.php');
    exit();
}

$totalPrice = 0.00;
$cartItems = [];

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        $product = getProductById($itemId, $items);
        if ($product) {
            $product['quantity'] = $quantity;
            $cartItems[] = $product;
            $totalPrice += $product['price'] * $quantity;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Shopping Cart</h1>
        <?php if (empty($cartItems)) : ?>
            <div class="alert alert-warning">Your cart is empty.</div>
        <?php else : ?>
            <ul class="list-group mb-4">
                <?php foreach ($cartItems as $item) : ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3 ">
                                <img src="<?php echo htmlspecialchars($item['img']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            </div>
                            <div class="col-md-8">
                                <h5><?php echo htmlspecialchars($item['name']); ?></h5>
                                <p>Price: $<?php echo number_format($item['price'], 2); ?></p>
                                <p>Quantity: <?php echo $item['quantity']; ?></p>
                                <form method="post" class="form-inline">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                    <div class="form-group mb-2">
                                        <input type="number" class="form-control" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                                    </div>
                                    <button type="submit" name="update_cart" class="btn btn-primary mb-2 ml-2">Update</button>
                                    <button type="submit" name="remove_from_cart" class="btn btn-danger mb-2 ml-2">Remove</button>
                                </form>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="row mb-4">
                <div class="col-md-12 text-right">
                    <h4>Total: $<?php echo number_format($totalPrice, 2); ?></h4>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <a href="product_view.php" class="btn btn-secondary">Continue Shopping</a>
            </div>
            <div class="col-md-6 text-right">
                <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</body>

</html>