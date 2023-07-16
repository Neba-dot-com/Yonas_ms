<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_user'])) {

    header("location:log.php");
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
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="my-login.css">
	<style type="text/css">
		.button{
			border: none;
			color: green;
			background: none;
		}
		.button2{
			color: blue;
			border: none;
			background: none;
		}
	</style>
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="user.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Admin Login</h4>
							
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="username">USER NAME</label>
									<lable id="uname" type="text" class="form-control" name="uername" value="" required autofocus> </lable> <br> &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp
								<i class="fas fa-pen"></i>	<input type="button" name="" value="Edit" class="button2">&nbsp &nbsp &nbsp  
								<input type="button" name="" value="Save" class="button" >
								</div>

								<div class="form-group">
									<label for="password">PASSWORD
									</label>
									<label id="password" type="password" class="form-control" name="password" required data-eye> </label> <br> &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp
								<i class="fas fa-pen"></i>	<input type="button" name="" value="Edit" class="button2" >&nbsp &nbsp &nbsp  
								<input type="button" name="" value="Save" class="button" >
								<a href="logout.php">Log out</a>
								    
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2023 &mdash; Yonas M S
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
