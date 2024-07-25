<?php
session_start();

// Check if email is set in the session, if not get it from the URL parameter
if (!isset($_SESSION['email'])) {
    if (isset($_GET['email'])) {
        $_SESSION['email'] = $_GET['email'];
    } else {
        echo 'Unauthorized access';
        exit;
    }
}

$email = $_SESSION['email'];

require('connection.php');
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_code = $_POST['verification_code'];

    // Fetch the user data from the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    $user = mysqli_fetch_assoc($result);

    // Check if the user is found and is not verified
    if ($user) {
        if ($user['is_verified'] == 1) {
            $error = 'Your email is already verified.';
        } elseif ($user['verification_code'] == $entered_code) {
            // Update the user to set is_verified = 1
            $update_query = "UPDATE users SET is_verified = 1 WHERE email = '$email'";
            if (mysqli_query($connect, $update_query)) {
                $success = 'Your email has been verified successfully.';
            } else {
                $error = 'Failed to verify your email. Please try again later.';
            }
        } else {
            $error = 'Invalid verification code. Please try again.';
        }
    } else {
        $error = 'User not found. Please ensure you entered the correct email.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/verify.css">


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


    <div class="container-flex card" style="margin:15%">
        <div style=" display: flex;
            justify-content: center;
            align-items: center;">

            <h1>Verify your email: <?php echo htmlspecialchars($email); ?></h1>
        </div>


        <?php if ($error) : ?>
            <div style=" color: red;"><?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if ($success) : ?>
            <div style="color: green;"><?php echo $success; ?><a href="login.php" class="btn btn-link">Back to login</a></div>
        <?php else : ?>
            <form method="post" action="verify.php">

                <div class="row">
                    <label class="col-lg-3" for="verification_code">Enter your verification code:</label>
                    <input type="text" id="verification_code" name="verification_code" required>
                    <button class="col btn-primary " type="btn-primary submit" class="btn btn-primary btn-block">Verify</button>
                </div>
            </form>
        <?php endif; ?>

    </div>


</body>

</html>