<?php

$page = 'home';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery </title>
        <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <!-- Stylesheet Link -->
            <link rel="stylesheet" type="text/css" href="cus.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="cs/style.css">
        <style type="text/css">
        a{
            color: #088178;
            text-decoration: none;
        }
</style>
<style>
:root{
    --green:#088178;
    --black:#444;
    --light-color:#777;
    --box-shadow:.5rem .5rem 0 rgba(22, 160, 133, .2);
    --text-shadow:.4rem .4rem 0 rgba(0, 0, 0, .2);
    --border:.2rem solid var(--green);

}

    form{
    flex:1 1 35rem;
    background: #fff;
    border:var(--border);
    box-shadow: var(--box-shadow);
    text-align: center;
    padding: 2rem;
    border-radius: .5rem;
     max-width: 600px;
     align-self: center;
    align-items: center;
    justify-content: center;
   
    margin: 0;

}
form .box{
    width: 60%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 1.0 rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
}

  </style>
</head>
<body>
<section id="header">
      <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div>
      
     </div>
</section>
<section class="book" id="book">
    <div class="row">
    <!-- <h1>Delivery Details</h1> -->
    <form method="POST">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required class="box">
        <br>
        <label for="addressLine1">Address Line 1:</label>
        <input type="text" id="addressLine1" name="addressLine1" required class="box">
        <br>
        <label for="addressLine2">Address Line 2 (Optional):</label>
        <input type="text" id="addressLine2" name="addressLine2" class="box">
        <br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required class="box">
        <br>
        <label for="zipCode">Zip Code:</label>
        <input type="text" id="zipCode" name="zipCode" required class="box">
        <br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required class="box">
        <br>
        <label for="deliveryOption">Delivery Option:</label>
        <select id="deliveryOption" name="deliveryOption" required class="box"> 
            <option value="standard">Standard Delivery</option>
            <option value="express">Express Delivery</option>
        </select>
        <br>
        <label for="deliveryInstructions">Delivery Instructions (Optional):</label>
        <textarea id="deliveryInstructions" name="deliveryInstructions" rows="4" class="box"></textarea>
        <br>
        <a href="payment.php"> <button type="submit" class="btn">Proceed to Payment</button> </a>
    </form>
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
</html>
