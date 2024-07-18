    <?php session_start();
    require('users.php');

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles/login.css">

    </head>

    <body class="container-flex">


        <?php

        $error = '';

        if (isset($_POST['ok'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $valid_login = false;

            foreach ($users as $account) {
                if ($email == $account['email'] && $pass == $account['pass']) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name'] = $account['name'];
                    $valid_login = true;
                    break;
                }
            }

            if ($valid_login) {
                header('Location: products.php');
                exit;
            } else {
                $error = 'Invalid email or password. Please try again.';
            }
        }

        ?>

        <div class="container-flex px-5">

            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <?php if ($error) : ?>
                        <div class="error-message" style=""><?php echo $error ?></div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Login</h3>

                        </div>
                        <div class="card-body">
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="ok">Login</button>
                                <a href="register.php">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>













        </div>











        <!-- <img src="images/products_items/watches/1.png"> -->
        <!-- <img src="images/products_items/watches/Digital_Watch.webp"> -->




    </body>

    </html>