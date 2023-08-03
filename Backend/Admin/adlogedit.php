<?php

include "../../connection.php";
// Check if the user is logged in
if (!isset($_SESSION['admin_user'])) {

    header("location:log.php");
    exit();
}


if (isset($_POST['Save1'])) {
    $_username = $_POST['username'];
    $query = "UPDATE `admin` SET `USER_NAME`='$_username' WHERE ID = 1";
    $run = mysqli_query($conn, $query);
    if ($run) {
        $_SESSION['admin_user'] = $_username;
		$_SESSION['update_success'] = true; // 
    }
}

if (isset($_POST['Save2'])) {
	// Update password
	$_password = $_POST['password'];
	$_newpassword = $_POST['new_password'];

	// Sanitize input (Better to use prepared statements or parameterized queries to prevent SQL injection)
	

	// Fetch the admin record (You might want to use a more specific identifier than ID=1)
	$query1 = "SELECT * FROM admin WHERE ID = 1";
	$result = mysqli_query($conn, $query1);

	if ($row = mysqli_fetch_assoc($result)) {
		// Verify if the entered password matches the one in the database
		if (password_verify($_password, $row['PASS_WORD'])) {
			// Hash the new password for secure storage
			
			// Update the password with the new hashed password
			$query = "UPDATE `admin` SET `PASS_WORD`='$_newpassword' WHERE ID = 1";

			if (mysqli_query($conn, $query)) {
				// Password updated successfully
				header("Location:log.php");
				exit();
			} else {
				// Handle the query execution error
				echo "Error updating password: " . mysqli_error($conn);
			}
		} else {
			echo "Incorrect password!";
		}
	} else {
		echo "Admin record not found!";
	}
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
		/* Add your CSS styles here as needed */
		.notification {
            position: fixed;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 4px;
            display: none; /* Hide the notification by default */
        }

	</style>
	
    <script>
        // Check if the update success flag is set in the session
        var updateSuccess = <?php echo isset($_SESSION['update_success']) ? 'true' : 'false'; ?>;
        
        // If the update was successful, show the notification
        if (updateSuccess) {
            var notification = document.getElementById("updateNotification");
            notification.style.display = "block"; // Show the notification box
            setTimeout(function() {
                notification.style.display = "none"; // Hide the notification after a few seconds
            }, 5000); // 5000 milliseconds = 5 seconds (you can adjust this value)
        }
    </script>
</head>

<body class="my-login-page">
<div class="notification" id="updateNotification">
      			  Update successful!
   					 </div>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="user.jpg" alt="logo">
					</div>

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Profile</h4>
							
							<form method="POST" action="adlogedit.php" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="username">USER NAME</label>
									<input id="uname" type="text" class="form-control" name="username" value="<?php echo $_SESSION['admin_user']; ?>" required autofocus> <br>
									<input type="submit" name="Save1" value="Save" class="button">
								</div>

								<div class="form-group">
									<label for="password">PREVIOUS PASSWORD</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye> <br>
								</div>
								<div class="form-group">
									<label for="pass_word">NEW PASSWORD</label>
									<input id="pass_word" type="password" class="form-control" name="new_password" required data-eye> <br>
									<input type="submit" name="Save2" value="Save" class="button">
								</div>
								<br>
								<a href="logout.php">Log out</a>
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
