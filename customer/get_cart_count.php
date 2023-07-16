<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("location: ../viewer/login.php");
    exit();
}

if (isset($_SESSION['cart_count'])) {
    echo $_SESSION['cart_count'];
} else {
    echo 0;
}
?>
