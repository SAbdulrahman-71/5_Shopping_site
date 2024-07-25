<?php
session_start();

require('connection.php');

// Check if the user ID is set in the session before updating the database
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $setlogout_query = "UPDATE users SET `is_loggedin` = 0 WHERE id = '$user_id'";

    if (mysqli_query($connect, $setlogout_query)) {

        echo 'User status updated successfully.';
    } else {
        die('Error updating user status: ' . mysqli_error($connect));
    }
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or home page
header('Location: login.php');
exit;
