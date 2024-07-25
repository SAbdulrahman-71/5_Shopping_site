<?php
include 'Data/new_data.php';


function getimg($items, $ID)
{
    $img = '';
    foreach ($items as $item) {
        if ($item['item_id'] == $ID) {
            $img = $item['img'];
            break;
        }
    }
    return $img;
}

function getdescription($items, $ID)
{
    $description = '';
    foreach ($items as $item) {
        if ($item['item_id'] == $ID) {
            $description = $item['description'];
            break;
        }
    }
    return $description;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/home.css">
</head>

<body>

    <nav class="nav_container">
        <ul class="nav flex-column text-center">
            <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_cart.php">View Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">log out</a>
            </li>
        </ul>
    </nav>


    <section class="container">
        <div class="home_container row pl-5">
            <div class="col text-center p-5">
                <h1>Welcome To the home page</h1>
            </div>
        </div>


        <br>

        <section class="Display_container container py-5 px-5">
            <div class="card">
                <div class="col text-center p-5">
                    <h1>Here are some products</h1>
                </div>
            </div>



            <div class="row text-center p-5">
                <div class="pic_card col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?php echo getimg($items, 105); ?>" class="card-img-top" alt="Product 1">
                    </div>
                </div>
                <div class="pic_card col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?php echo getimg($items, 101); ?>" class="card-img-top" alt="Product 2">
                    </div>
                </div>
                <div class="pic_card col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?php echo getimg($items, 102); ?>" class="card-img-top" alt="Product 2">
                    </div>
                </div>
                <div class="pic_card col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?php echo getimg($items, 106); ?>" class="card-img-top" alt="Product 2">
                    </div>
                </div>
            </div>







        </section>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>