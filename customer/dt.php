<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {

    header("location:../viewer/login.php");
    exit();
}

// Rest of the code for the protected page

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="cus.css">
    <title> Delete Account page</title>
</head>
<body>
<section id="header">
      <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div>
      <div>
          <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a  id="lg-bag" href="cart.php">Cart &nbsp<i class="far fa-shopping-bag"></i></a></li>
          <a href="#" id="close"><i class="far fa-times"></i></a>
          <li><a href="#" onclick="toggleDropdown()"  class= "active">Account &nbsp <i class="far fa-bars"></i></a> </li>
      <div>
          <ul id="new" style="display: none;">
              <li> <i class="fas fa-user"></i> <a href="Account.php">My Account</a> </li>
              <li> <i class="fas fa-pencil-alt"></i>   <a href="update.php">Update Account</a> </li>
              <li> <i class="fas fa-trash-alt"></i>    <a href="dt.php">Delete Account</a> </li>
              <li> <i class="fas fa-shopping-cart"></i>   <a href="order.php">My Orders</a> </li>
              <li> <i class="fas fa-question-circle"></i>           <a href="help.php">Help & Support</a> </li>
              <li> <i class="fas fa-file-alt"></i> <a href="setting.php">Terms & Conditions</a> </li>
              <li> <i class="fas fa-sign-out-alt"></i>    <a href="#" onclick="LogoutConfirmation(event)" >Logout</a> </li>
              </ul>
      </div>
        </ul>
          <div id="confirmationModal" class="modal">
          <div class="modal-content">
            <span class="close2" onclick="hideConfirmationModal()">&times;</span>
            <h3>Logout Confirmation</h3>
            <p>Are you sure you want to logout?</p>
            <div class="button-container">
            <button class="btn-confirm" onclick="logout()"><a style="text-decoration:none;" href="logout.php">Logout</a> </button>
            <button class="btn-cancel" onclick="hideConfirmationModal()">Cancel</button>
          </div>
          </div>
          </div>
        </div>
            <div id="mobile">
                <a href="cart.php"> <i class="far fa-shopping-bag"></i> </a>
                 <i id="bar" class="fas fa-outdent"></i>
            </div>
</section>
<section class="py-5 my-5">
	<div class="container">
		<h1 class="mb-5">Delete Account</h1>
		<div class="bg-white shadow rounded-lg d-block d-sm-flex">
		<div class="profile-tab-nav border-right">
		<div class="p-4">
		<div class="img-circle text-center mb-3">
			<img src="imgs/user2.jpeg" alt="Image" class="shadow">
		</div>
			<h4 class="text-center">User Name</h4>
		</div>
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
			<i class="fas fa-trash-alt"></i>Deletion Process </a>
			<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
			<i class="fas fa-exclamation-triangle"></i> Data Retention</a>
            <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
			<i class="fas fa-check-circle"></i>Confirmation </a>
		</div>
		</div>
        <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
		<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
			<h3 class="mb-4">Deletion Process</h3>
			<p>Thank you for being customer in our medical store. We understand that you may no longer wish <br> to have an account with us. please carefully read the following information to proceed with the<br> account deletion process.</p>
        <div>
            <h3>Necessary Steps</h3>
            <p>
            1. Go to your account<br>
            2. Back up any important data or information from your account that you wish to retain, <br>as account deletion is irreversible.
            </p>
        </div>
		</div>
		<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
			<h3 class="mb-4">Data Retention</h3>
			<p>
               After account deletion, your personal informationand general account data will be permanetly <br> deleted from our system. However, for regulatory or auditing purpose, we may retain certain <br>trade history and membership data that is strictly necessary and relevant to comply with legal <br>obligation. If you have any questions or concerns regarding  the account deletion process,<br> please feel free to reach out to our support team through our Email Account <br> <strong>yonasmedicalstore@gmail.com. </strong>
            </p>
		</div>
        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
		<div> <h3 class="mb-4">Confirmation Process</h3> <hr> 
            <strong> <p>To proceed with account deletion, please confirm the following:</p> </strong>
        <form action="" method="">
            <label>
                <input type="checkbox" name="confirmation" id="confirmation" required> I understand that deleting my account is irreversible and all associated data<br> will be permanently removed.
                        </label> <br> <br>
            <label>
                <input type="checkbox" name="backup" id="backup" required>  I have backed up any important information from my account.
            </label> <br> <hr>
            <label>
                Please re-enter your account password for verification:  <input type="password" name="password" id="password" required>
            </label> <br> <hr>
        </form>
                <i class="fas fa-trash-alt"> </i> &nbsp &nbsp<input type="submit" name="" value="Delete Account" class="delete-button" id="delete-account-button" disabled >
	      </div>
	    </div>
	   </div>
	</div>
	</div>
</section>
<section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4> We value your feedback!</h4>
            <p>  Your opinion matters to us, and we are eager to hear your thoughts. <br>Please take a moment to share your feedback so that we can continue<br> to enhance our services and meet your expectations.  <span> Thank you!</span> </p>
    </div>
    <div class="form">
        <button class="normal">Give Feedback</button>
    </div>
</section>
<footer class="section-p1">
        <div class="col">
           <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div> <br>

            <h4>Contact</h4>
            <p> <strong>Address: </strong> GONDAR ETHIOPIA</p>
            <p> <strong>Phone: </strong> +251 0000 000</p>
            <p> <strong>Hours: </strong> 8:00 - 10:00, Mon - Sun</p>
            <div class="follow">
                <h4>Follow Us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-telegram"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.html">About us</a>
            <a href="help.html">Delivery Information</a>
            <a href="setting.html">Terms & Conditions</a>
            <a href="contact.html">Contact us</a>
        </div>
        <div class="col">
            <h4>Account</h4>
            <a href="update.html">Update Account</a>
            <a href="cart.html">View Cart</a>
            <a href="order.html">Send Order Request</a>
            <a href="help.html">Help</a>
        </div>
        <div class="col install" style="display: flex;">
            <h3 style="font-size:15px; font-weight: 500;">secure Payment GAteways</h3>
            <img src="img/pay/pay.jpg" alt="" style="width:200px; height: 80px; position: center;"> <br> 
            <img src="img/pay/pay2.jpg" alt="" style="width:200px; height: 80px; position: center;">
        </div>
        <div class="copyright">
            <p> 2015 FM.NET SQUAD ALL RIGHTS RESERVED!</p>
        </div>
</footer>
    <script src="cus.js"></script>
    <script src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>