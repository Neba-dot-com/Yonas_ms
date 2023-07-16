<?php
include '../connection.php';

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$query ="SELECT * FROM  register";
$run=mysqli_query($conn,$query);
while ($result=mysqli_fetch_array($run)){
  
    if( ( $username==$result["USER_NAME"])&&( $password==$result["PASS_WORD"])&&($result["STA_TUS"]=="approved")){
    
      $_SESSION['user_id']= $_SESSION['ID'];
      $_SESSION['user']=$username;
      $_SESSION['firstname']=$result["FIRST_NAME"];
      $_SESSION['lastname']=$result["LAST_NAME"];
      $_SESSION['pharmacyname']=$result['PHARMACY_NAME'];
      $_SESSION['phone_number']=$result['PHONE_NUMBER'];
  
      $_SESSION['email']=$result["EMAIL"];
      
      header("location:../customer/index.php");
    }
  
  else if( ( $username==$result["USER_NAME"])&&( $password==$result["PASS_WORD"])&&($result["STA_TUS"]=="waiting")){
    $_SESSION['waiting_user']=$username;
    header("location:waiting_page.php");
  }
  


}
$_SESSION['logedIn'] = "<p style='text-aline: center; color: red;'>Invalid user or password</p>";

}


?>


<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
             <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="cs/style.css">
    <link rel="shortcut icon" href="favicon2.ico?v=<?php echo filemtime('favicon2.ico') ?>" />
    <title>Viewer Login Page </title>
</head>

<body>
        <!-- This is where Header Starts -->

<header class="header1">
<a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Yonas <b> M S </b> </a>

<nav class="navbar">
  <a href="home.php">home</a>
  <a href="vabout.php">about us</a>
  <a href="vcontact.php">contact us</a>
  <a href="login.php">Login</a>    
</header>

             <!-- This is where Header Ends --> 

            <!-- This is where Login Form Starts --> 
<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="images/login.svg" alt="">
        </div>
     
        <form name="login_form" action="login.php" method="POST"> <h2 style="color: red">Please log in or register to start shopping and make your purchases!</h2>
            <h3>Login</h3>
            <?php
      if(isset($_SESSION['logedIn'])) {
         echo $_SESSION['logedIn'];
         unset($_SESSION['logedIn']);
        }
      ?>
            <input type="text" name="username" placeholder="Username" class="box">
            <input type="password" name="password" placeholder="Password" class="box"> <br>
            <a href="#" class="fp">Forgot password?</a> <br>
            <input type="submit" name="login" value="login" class="btn"><br> <br> 
            <a href="register.php"> doesn't have an account? Click here To Register.</a>
        </form>
    </div>

            <h1 style="text-align: center;">Create an account now to enjoy <br> a seamless shopping  experience, track your orders, and receive exclusive offers!</h1>
</section>        
            <!-- This is where Login Form Ends -->

             <!-- This is where Footer Starts --> 

             <?php include "viewer_footer.php"?>
</body>
</html>