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

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="cus.css">
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
          <li><a href="#" onclick="toggleDropdown()"  class= "active">Account &nbsp <i class="fas fa-bars"></i></a> </li>
      <div>
          <ul id="new" style="display: none;">
              <li> <i class="fas fa-user"></i> <a href="Account.php">My Account</a> </li>
              <li> <i class="fas fa-pencil-alt"></i>   <a href="update.php">Update Account</a> </li>
              <li> <i class="fas fa-trash-alt"></i>    <a href="dt.php">Delete Account</a> </li>
              <li> <i class="fas fa-shopping-cart"></i>   <a href="myorder.php">My Orders</a> </li>
              <li> <i class="fas fa-question-circle"></i>           <a href="help.php">Help & Support</a> </li>
              <li> <i class="fas fa-file-alt"></i> <a href="setting.php">Terms & Conditions</a> </li>
              <li> <i class="fas fa-sign-out-alt"></i>    <a href="" onclick="LogoutConfirmation(event)" >Logout</a> </li>
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
	    <h1 class="mb-5">Account Information</h1>
	<div class="bg-white shadow rounded-lg d-block d-sm-flex">
	<div class="profile-tab-nav border-right">
	<div class="p-4">
	<div class="img-circle text-center mb-3">
		<img src="imgs/user2.jpeg" alt="Image" class="shadow">
	</div>
		<h4 class="text-center"><?php echo $_SESSION['user']?></h4>
	</div>
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
		<i class="fa fa-home text-center mr-1"></i> Account </a>
		<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
		<i class="fa fa-key text-center mr-1"></i> Password</a>
		<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
	    <i class="fa fa-user text-center mr-1"></i> Security</a>
	</div>
	</div>
	<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
	<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
		<h3 class="mb-4"> My Account</h3>
	<div class="row">
	<div class="col-md-6">
	<div class="form-group">

    

	    <label>First Name</label>
		<?php echo '<input type="text" class="form-control" value="' . $_SESSION['firstname'] . '">'; ?>
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label>Last Name</label>
        <?php echo '<input type="text" class="form-control" value="' . $_SESSION['lastname'] . '">'; ?>
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label>Email</label>
		<?php echo '<input type="text" class="form-control" value="' . $_SESSION['email'] . '">'; ?>
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label>Phone number</label>
		<?php echo '<input type="text" class="form-control" value="' . $_SESSION['phone_number'] . '">'; ?>
	</div>
    </div>
	<div class="col-md-6">
	<div class="form-group">
		<label>Pharmacy</label>
		<?php echo '<input type="text" class="form-control" value="' . $_SESSION['pharmacyname'] . '">'; ?>
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label>User Name</label>
        <?php echo '<input type="text" class="form-control" value="' . $_SESSION['user'] . '">'; ?>
	</div>
    </div>
    </div>
	</div>
	<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
		<h3 class="mb-4">My Password</h3>
	<div class="row">
	<div class="col-md-6">
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control">
	</div>
	</div>
	</div>	
	</div>
	<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
		<h3 class="mb-4">Security</h3>
	<div class="row">
	<div class="col-md-6">
	<div class="form-group">
		<label><strong> Incase I forgot My Password This is My Recovery: </strong></label>  <hr>
		Recovery Email:<input type="Email" class="form-control">
	</div>
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
    </body>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>