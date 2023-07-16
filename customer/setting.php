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
        <title> Terms And Conditions Page</title>
</head>
<body>
	<section id="header">
        <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div>

            <div>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php" >Contact</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a  id="lg-bag" href="cart.php"> Cart &nbsp<i class="far fa-shopping-bag"></i></a></li>
                    <a href="#" id="close"><i class="fas fa-times"></i></a>
                       <li><a href="#" onclick="toggleDropdown()" class= "active">Account &nbsp <i class="far fa-bars"></i></a> </li>
                    <div>
                    <ul id="new" style="display: none;">
                            <li> <i class="fas fa-user"></i> <a href="Account.php">My Account</a> </li>
                            <li> <i class="fas fa-pencil-alt"></i>   <a href="update.php">Update Account</a> </li>
                            <li> <i class="fas fa-trash-alt"></i>    <a href="dt.php">Delete Account</a> </li>
                            <li> <i class="fas fa-shopping-cart"></i>   <a href="order.php">My Orders</a> </li>
                            <li> <i class="fas fa-question-circle"></i>           <a href="help.php">Help & Support</a> </li>
                            <li> <i class="fas fa-file-alt"></i> <a href="setting.php">Terms & Conditions</a> </li>
                            <li> <i class="fas fa-sign-out-alt"></i>    <a href="#" onclick="LogoutConfirmation(event)">Logout</a> </li>
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
			<h1 class="mb-5">Terms & Conditions</h1>
			<p>Welcome to Yonas Medical Store! These terms and conditions govern your use of our website and the services we provide. By accessing or using our website and services, you agree to comply with these terms and conditions. Please read them carefully.</p>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
				
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fas fa-check-circle"></i> 
							Eligibility
						</a>
							
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fas fa-shopping-cart"></i> 
							 Ordering & Purchasing 
						</a>
						<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fas fa-truck"></i> 
							Delivery
						</a>
							<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fas fa-exclamation-circle"></i> 
							Limitation of Liability
						</a>
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fas fa-balance-scale"></i> 
							Governing Law
						</a>
						
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<p>
							1. Our services are available only to registered pharmacies located in Ethiopia.<br>
2. By using our services, you represent and warrant that you are a registered pharmacy and authorized to make purchases on behalf of that pharmacy.
						</p>
							
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<p>
							1. Orders placed through our website are subject to availability. <br>
2. All purchases made through our website are final. We do not accept returns or provide refunds, except in cases of damaged or defective products.<br>
3. Prices listed on our website are in Ethiopian Birr (ETB) and are subject to change without notice.
						</p>
						
					</div>
					
					<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						<p> 
							1. We strive to deliver orders promptly, but delivery times may vary depending on product availability and other factors.<br>
2. Delivery charges may apply and will be clearly communicated during the ordering process.</br>
3. Title and risk of loss for products pass to you upon delivery.</p>
					</div>
					<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
						<p>
							1. Yonas Medical Store shall not be liable for any direct, indirect, incidental, consequential, or special damages arising out of or in connection with the use of our website or services. <br>
2. We shall not be held responsible for any errors, omissions, or inaccuracies in the content or products provided.
						</p>
					</div>

					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<p> 1. These terms and conditions shall be governed by and construed in accordance with the laws of Ethiopia.<br>
2. Any disputes arising from or relating to these terms and conditions shall be subject to the exclusive jurisdiction of the courts in Gondar, Ethiopia.
						</p>
					</div>
					<p style="color:blue;"> Please contact us if you have any questions or concerns regarding these terms and conditions.</p>
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