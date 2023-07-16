<?php
$page = 'about';
// Rest of the code for the shop page
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yonas MS About Page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" type="text/css" href="cus.css">
        <link rel="stylesheet" href="style.css">
        <style>
    .cart-count {
            background-color: red;
            color: white;
            font-size: 12px;
            font-weight: bold;
            border-radius: 50%;
            padding: 2px 6px;
            position: absolute;
            top: -5px;
            right: -5px;
}
            </style>
</head>

<body>
<?php include 'header.php'?>
<section id="page-header" class="about-header" style="background-image:url('img/ban2.jpg');background-position: center;">
                <h2 style="color: black;">#KnownUs</h2>
                <!-- <p style="color: darkblue;">We take pride in our commitment to excellence, <br> offering competitive pricing, timely delivery, and <br> exceptional customer service!</p>     -->
</section>
<section id="about-head" class="section-p1">
    <img src="img/about/a6.jpg" alt="">
    <div>
        <h2>Who are We?</h2>
        <p style="font-weight: 600;">We are a trusted supplier of high-quality drugs and medications to pharmacies throughout Gondar city and beyond. With our online store, we make it easy for pharmacies to access the products they need to provide top-notch care to their customers.

        <p>We are proud to be a part of the healthcare community in Gondar city, and we are committed to supporting the pharmacies that serve our community. Whether you are a small independent pharmacy or a large healthcare facility, we are here to help you provide the best possible care to your customers.</p>
        <p>Thank you for choosing Yonas Medical Store as your pharmacy supply partner. We look forward to serving you and helping you achieve your healthcare goals.</p> <br><br>
        
        <marquee bgcolor="lightgreen" loop="-1" scrollamount="5" width100%>Thank you for choosing Yonas Medical Store. We look forward to serving you and meeting all your pharmacy supply needs.</marquee>
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
 
</html>