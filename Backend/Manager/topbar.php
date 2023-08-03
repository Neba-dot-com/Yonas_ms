<?php
include "../../connection.php";
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");

// Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {
    header("location:log.php");
    exit();
}

// Count the number of items with low quantity or less than 2 months left to expire
$sqlItemCount = "SELECT COUNT(*) AS item_count FROM items WHERE (QUANTITY <= 5 OR EXPIRE_DATE <= DATE_ADD(CURDATE(), INTERVAL 2 MONTH))";
$resItemCount = $conn->query($sqlItemCount);
$itemCount = 0;
if ($resItemCount->num_rows > 0) {
    $itemRow = $resItemCount->fetch_assoc();
    $itemCount = $itemRow['item_count'];
}

// Rest of the code for the protected page

// ... (Other code)

// Display the notification icon with the item count
echo "
<div class='TopBar'>
<div class='logo'>
    <h1>Yonas <span style='color: white;'><b>M S</b> </span></h1>
</div>

<div class='Search'>
    <input type='text' placeholder='Search Here' name='search'>
    <label for='search'><i class='fas fa-search'></i></label>
</div>

<a href='expired.php'>
<div class='user'>
    <img src='manager.png' alt=''>
    <div id='notificationButton'>
        <button id='notificationIcon'><i class='fas fa-bell fa-2x'></i></button>
        <span id='notificationCount'>$itemCount</span>
    </div>
</div>
</a>
</div>";
?>
