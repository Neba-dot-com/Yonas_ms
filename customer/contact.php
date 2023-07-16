
<?php
$page = 'contact';
// Rest of the code for the shop page
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yonas MS Contact us Page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="cus.css">
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
        <section id="page-header" class="about-header" style="background-image:url('img/ban2.jpg')">
                
                <h2 style="color: black;">#LetsTalk</h2>
               
                <p>Leave a message we love to hear from you!</p>    
        </section>

            <section id="contact-details" class="section-p1">
                <div class="details">
                    <span> GET IN TOUCH</span>
                    <h2>Visit us or contact us today</h2>
                    <h3>Head Office</h3>
                    <div>
                        <li>
                            <i class="fal fa-map"></i>
                            <p> Gondar Arada</p>
                        </li>
                         <li>
                            <i class="far fa-envelope"></i>
                            <p> Gondar Arada</p>
                        </li>
                         <li>
                            <i class="fas fa-phone-alt"></i>
                            <p> Gondar Arada</p>
                        </li>
                         <li>
                            <i class="fas fa-clock"></i>
                            <p> Monday to Sunday: 8:00 to 10:00</p>
                        </li>
                    </div>
                </div>
                <div class="map">
                    <img src="img/1.jpg">
                </div>
            </section>

            <section id="form-details">
                <form action="#">
                    <span>LEAVE A MESSAGE</span>
                    <h2>We Love To Hear From You!</h2>
                    <input type="text" placeholder="Your Name" name="">
                    <input type="Email" placeholder="Your Email" name="">
                    <input type="text" placeholder="Subject" name="">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Your Message here please">  </textarea>
                    <button class="normal">Submit</button>
                </form>
                <div class="people">
                    <div>
                        <img src="img/people/1.png" alt="">
                        <p><span>Yonas</span>Store Owner <br> Phone: +251 9 11 57 61 99 <br> Email: <a href="yoni201534@gmail.com">yoni201534@gmail.com</a></p>
                    </div>
                    <div>
                        <img src="img/people/3.jpg" alt="">
                        <p><span>Fayu</span>Store Owner <br> Phone: +251 9 10 04 50 04<br> Email: fayu@gmail.com</p>
                    </div>
                    <div>
                        <img src="img/people/2.jpg" alt="">
                        <p><span>Neba</span>Store Owner <br> Phone: +251 9 25 18 24 53 <br> Email: nebamami@gmail.com</p>
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
        <!-- <script src="logout.js"></script> -->
        <script src="script.js"></script>
</body>
 
</html>