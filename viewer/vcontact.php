<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Stylesheet Links -->
    <link rel="stylesheet" type="text/css" href="cs/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Yonas Medical Store </title>
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

            <!-- This is where Contact Form Starts -->
<section class="book" id="book">
    <h1 class="heading"> <span>Contact</span> Us </h1>    
    <div class="row">
        <div class="image">
            <img src="images/book-img.svg" alt="">
        </div>
        <form action="">
            <h3>We like to hear from you!</h3>
            <input type="text" placeholder="your name" class="box">
            <input type="number" placeholder="your number" class="box">
            <input type="email" placeholder="your email" class="box">
            <textarea class="box" rows="3" cols="2" placeholder="Type your message here..."></textarea>
            <input type="submit" value="Contact now" class="btn">
        </form>
    </div>
</section>
         <!-- This is where Contact Form Ends -->

    <!--  This is where Sign up and Login Button Div Start -->
<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4> Health Supplies at your fingertips!</h4>
        <p> Sign Up and Simplify Your Medical Purchases<span> #Shop Medically!!</span> </p>
    </div>
    <div class="form">
        <a href=register.html><button class="normal">Sign Up</button> </a> &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp
        <a href=login.html>  <button class="normal">Login</button> </a>
    </div>
</section>
    <!--  This is where Sign up and Login Button Div Start -->
<!--  This is where Footer Start -->
<?php include "viewer_footer.php"?>
  
</body>
</html>