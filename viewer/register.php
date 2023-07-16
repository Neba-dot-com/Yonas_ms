<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <!-- Stylesheet Link -->
    <link rel="stylesheet" type="text/css" href="cs/style.css">
    <title>Yonas Medical Store </title>
</head>
<body style="padding:6rem 5%;">

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

        <!-- This is where Registration Form Starts -->

<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="images/login.svg" alt="">
        </div>
    <form name="login_form" action="POST"> 
        <h1>Welcome to Yonas Medical Store Please fill the Folowing form to Register!</h1> <br>
              <label for="fullname">First Name:</label>
              <input type="text" id="fullname" class="box" name="fname" required>

              <label for="fullname">Last Name:</label>
              <input type="text" id="fullname" class="box" name="lname" required>
              
              <label for="email">Email:</label>
              <input type="email" id="email" class="box" name="email" required>
              
              <label for="pharmacy-name">Pharmacy Name:</label>
              <input type="text" id="pharmacy-name" class="box" name="pharmacy-name" required>
              
              <label for="pharmacy-address">Pharmacy Address:</label>
              <input type="text" id="pharmacy-address" class="box"  name="pharmacy-address" required>
              
              <label for="pharmacy-license">Pharmacy License Number:</label>
              <input type="text" id="pharmacy-license" class="box" name="pharmacy-license" required>

               <label for="license">Pharmacist License:</label>
               <input type="file" id="license" class="box" name="license" accept=".pdf,.jpg,.jpeg,.png" required>

               <label for="pharmacy-name">Choose Username:</label>
              <input type="text" id="username" class="box" name="username" required>

              <label for="password">Password:</label>
              <input type="password" id="password" class="box" name="password" required>

              <strong> <label style="font-size:10px">Terms and Condition</label></strong><br> <br>
               <input style="transform: scale(1.5);" type="checkbox" name="" required> &nbsp &nbsp &nbsp <span style="color:darkblue; font-size:15px"> By registering, you agree to provide accurate information and maintain the confidentiality of your account. Unauthorized activities are prohibited, and we may suspend your account for violations.Thank you. </span><br>

              <button type="submit" class="btn">request to register</button> &nbsp &nbsp &nbsp &nbsp
              <button type="reset" class="btn">Reset</button>
    </form>
  </div>
</section>
            <!-- This is where Registration Form Ends -->

            <!-- This is where Footer Starts --> 
<section class="footer">
    <div class="credit"> created by <span>FM.NET SQUAD 2015 E.C</span> | all rights reserved </div>
</section>
</body>
</html>