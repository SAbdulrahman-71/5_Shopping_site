<?php
require('connection.php');
include('Data/new_data.php');

if (!isset($_GET['product']) || $_GET['product'] == 0) {
    header('Location: products.php?error=Invalid request');
    exit();
}

$get_id = $_GET['product'];
$info = null;
foreach ($products as $product) {
    if ($get_id == $product['id']) {
        $info = $product;
        break;
    }
}

$product_items = [];
foreach ($items as $item) {
    if ($get_id == $item['product_id']) {
        $product_items[] = $item;
    }
}

if ($info == null) {
    header('Location: products.php?error=No data for this product');
    exit();
}


if (isset($_GET['add_to_cart']) && $_GET['add_to_cart'] > 0) {
    $get_cart_item_id = $_GET['add_to_cart'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

    if (!isset($_SESSION['cart'][$get_cart_item_id])) {
        $_SESSION['cart'][$get_cart_item_id] = $quantity;
    } else {
        $_SESSION['cart'][$get_cart_item_id] += $quantity;
    }

    header('Location: product_view.php?product=' . $get_id . '&msg=Product added to cart');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($info['name']); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/product_items.css">

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


    <div class="container">
        <div class="view-cart-btn">
            <a href="view_cart.php" class="btn btn-success">View Cart</a>
        </div>

        <div class="container mt-5">
            <?php if (isset($_GET['msg'])) : ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($_GET['msg']); ?>
                </div>
            <?php endif; ?>

            <h1><?php echo htmlspecialchars($info['name']); ?></h1>
            <p><?php echo htmlspecialchars($info['description']); ?></p>




            <h3>Items</h3>
            <div class="row">
                <?php foreach ($product_items as $item) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card product-card h-100">
                            <img src="<?php echo htmlspecialchars($item['img']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                                <p class="card-text">Price: $<?php echo number_format($item['price'], 2); ?></p>
                                <form method="get" action="product_view.php" class="mt-auto">
                                    <input type="hidden" name="product" value="<?php echo $get_id; ?>">
                                    <input type="hidden" name="add_to_cart" value="<?php echo $item['item_id']; ?>">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" name="quantity" value="1" min="1">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>