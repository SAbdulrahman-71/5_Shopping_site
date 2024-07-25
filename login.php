<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    header('Location: products.php');
    exit;
}

require('connection.php');

$error = '';

if (isset($_POST['ok'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $valid_login = false;

    $enc_pass = md5($pass);

    $query = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$enc_pass'";
    $users = mysqli_query($connect, $query) or die('Error in connection query');
    $record = mysqli_fetch_assoc($users);

    if ($record) {
        if ($record['is_verified'] == 0) {
            $_SESSION['email'] = $email;
            header('Location: verify.php?email=' . $email);
            exit;
        }

        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $record['full_name'];
        $_SESSION['email'] = $record['email'];

        $user_id = $record['id'];
        $login_success = mysqli_query($connect, "UPDATE users SET `is_loggedin` = 1 WHERE id = '$user_id'") or die('Error user id');
        $valid_login = true;
    } else {
        $error = 'Your account does not exist or is not verified.';
    }

    if ($valid_login) {
        header('Location: products.php');
        exit;
    } else {
        $error = 'Invalid email or password. Please try again.';
    }
}
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

<body>
    <nav class="nav_container">
        <ul class="nav flex-column text-center">
            <li class="nav-item ">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="login.php">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($error) : ?>
                    <div class="alert alert-danger"><?php echo $error ?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" name="pass" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="ok">Login</button>
                            <a href="register.php" class="btn btn-link">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>