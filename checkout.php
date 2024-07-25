<?php
session_start();
include 'Data/products_data.php';
if (isset($_SESSION['name'])) {
} else {
    header('Location: login.php');
    echo '<button type="submit" name="ok"><a href="login.php"</a> unauthorized<br></button></form>';
}
session_start();

function getProductById($itemId, $products)
{
    foreach ($products as $productCategory) {
        foreach ($productCategory['items'] as $product) {
            if ($product['item_id'] == $itemId) {
                return $product;
            }
        }
    }
    return null;
}

$totalPrice = 0.00;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Checkout</h1>

        <?php if (empty($_SESSION['cart'])) : ?>
            <div class="alert alert-warning">Your cart is empty. <a href="index.php">Go shopping</a></div>
        <?php else : ?>
            <ul class="list-group mb-4">
                <?php foreach ($_SESSION['cart'] as $itemId => $quantity) :
                    $product = getProductById($itemId, $products);
                    if ($product) :
                        $totalPrice += $product['price'] * $quantity;
                ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo htmlspecialchars($product['img']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                </div>
                                <div class="col-md-8">
                                    <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                                    <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                                    <p>Quantity: <?php echo $quantity; ?></p>
                                    <p>Subtotal: $<?php echo number_format($product['price'] * $quantity, 2); ?></p>
                                </div>
                            </div>
                        </li>
                <?php endif;
                endforeach; ?>
            </ul>

            <div class="row mb-4">
                <div class="col-md-12 text-right">
                    <h4>Total: $<?php echo number_format($totalPrice, 2); ?></h4>
                </div>
            </div>

            <form action="complete_order.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="zip">ZIP Code</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>
                <button type="submit" class="btn btn-primary">Complete Order</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>