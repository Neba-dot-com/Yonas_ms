<?php

include ('connect.php');
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
header('location:../viewer/login.php');
?>