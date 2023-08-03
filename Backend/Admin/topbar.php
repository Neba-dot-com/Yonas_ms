<?php
include '../../connection.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");

$query= "SELECT COUNT(ID)AS num_of_request_customers FROM register where STA_TUS = 'waiting'";
$no_customer_result = mysqli_query($conn,$query);
$row_customer =mysqli_fetch_assoc($no_customer_result);

$num_customer=$row_customer['num_of_request_customers'];
if(!$num_customer){
    $num_customer=0;
}
echo "    <div class='container'>

<!-- TopBar/Navbar -->
<div class='TopBar'>
    <div class='logo'>
        <h1>Yonas <span style='color: white;'><b>M S</b> </span></h1>
    </div>

    <div class='Search'>
        <input type='text' placeholder='Search Here' name='search'>
        <label for='search'><i class='fas fa-search'></i></label>
    </div>

    <i class='fas fa-bell'></i>

<div class='user'>
      <a href='adlogedit.php'>  <img src='user.jpg' alt=''> </a>
       <a href='approve.php'> <div id='notificationButton'>
        <button id='notificationIcon'><i class='fas fa-bell fa-2x'></i></button> </a>
        <span id='notificationCount'>$num_customer</span>
    </div>
</div>
    



</div>";
?>
