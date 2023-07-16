<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {

    header("location:../Admin/log.php");
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
						 <img src="manager.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Manager Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="username">USER NAME</label>
									<input id="uname" type="text" class="form-control" name="uername" value="" required autofocus> <br> &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp
								<i class="fas fa-pen"></i>	<input type="button" name="" value="Edit" class="button2">&nbsp &nbsp &nbsp  
								<input type="button" name="" value="Save" class="button" >
								</div>

								<div class="form-group">
									<label for="password">PASSWORD
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye> <br> &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp
								<i class="fas fa-pen"></i>	<input type="button" name="" value="Edit" class="button2">&nbsp &nbsp &nbsp  
								<input type="button" name="" value="Save" class="button" >
								    
								</div>

								<!-- <div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div> -->

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										save
									</button>
								</div>
								<a href="manager_logout.php">log out</a>
								<!-- <div class="mt-4 text-center">
									Don't have an account? <a href="register.html">Create One</a>
								</div> -->
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

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
	<script src="js/my-login.js"></script>
</body>
</html>
