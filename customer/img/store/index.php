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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yonas MS Home Page </title>
        <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <!-- Stylesheet Link -->
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" type="text/css" href="cus.css">

<style type="text/css">
        a{
            color: #088178;
            text-decoration: none;
        }
</style>
</head>

<body>
            <!-- This is where Header Starts -->
<section id="header">
    <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  
    </div>
        <div>
            <ul id="navbar">
                <li><a class= "active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a  id="lg-bag" href="cart.php">Cart &nbsp <i class="fas fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
                <li><a href="#" onclick="toggleDropdown()">Account &nbsp <i class="fas fa-bars"></i></a> </li>
            <div>
    <!----------- Drop Down List Under Account---------->
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
                <!-- This is where Header Ends -->

<section id="hero" style="background-image: url('img/ban2.jpg'); background-repeat: no-repeat; background-position: center;">
<?php

echo $_SESSION['user'];

?>       

<h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>on all products</h1>
        <p style="color:S#000">We offer competitive prices to make healthcare more affordable <br> without compromising on quality  !</p>
        <a href="shop.html"> <button style="background:none;"><i class="fas fa-shopping-cart"></i>Shop now</button> <br><br><br> </a>
            <div class="search">
                <form class="search-bar" style="border-bottom:none; border-left: none; border-right:none;">
                    <input type="text" name="search" placeholder="Search Available items">
                    <button type="submit" style="  border: 0; border-radius: 50%;width: 20px;height: 60px; background-image: none; "> <img src="img/search.png"> </button>
              </form>
            </div>
</section>
            
<section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
</section>
        <!-- This is where Product Display Starts -->
<section id="product1" class="section-p1">
        <h2>Featured products</h2>
        <p>Unlock Your Shopping Potential</p>
        <!-- The Big Div Starts-->
        <div class="pro-container">
        <!-- The Div That Will Loop Itself Starts-->
            <div class="pro">
               <a href="sproduct.php"> <img src="img/products/f1.jpg" alt="">
                <div class="des">
                    <span>Aminopenicillins</span>
                    <h5>Ampicillin</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>308 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>    
        <!-- The Div That Will Loop Itself Ends-->
             <div class="pro">
               <a href="sproduct.php"> <img src="img/products/f2.jpg" alt="">
                <div class="des">
                    <span>Nonsteroidal anti-inflammatory drugs</span>
                    <h5>Advil</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>508 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.php"><img src="img/products/f3.jpg" alt="">
                <div class="des">
                    <span> Miscellaneous anxiolytics, sedatives and hypnotics</span>
                    <h5>Xyrem</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>738 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.php"><img src="img/products/f4.jpg" alt="">
                <div class="des">
                    <span>Urinary anti-infectives</span>
                    <h5>Hyprex</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>278 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.php"><img src="img/products/f5.jpg" alt="">
                <div class="des">
                    <span> Ophthalmic anti-infectives</span>
                    <h5>Erythromycin Ophthalmic</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>128</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <a href="sproduct.php"><div class="pro">
                <img src="img/products/f6.jpg" alt="">
                <div class="des">
                    <span>Decongestants, Vasopressors</span>
                    <h5>Ephedrine</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>343 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.php"><img src="img/products/f7.jpg" alt="">
                <div class="des">
                    <span>Heparins</span>
                    <h5>Enoxaparin</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>165</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.php"><img src="img/products/f8.jpg" alt="">
                <div class="des">
                    <span>Antacids, Minerals and electrolytes</span>
                    <h5>Calcium carbonate</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
        </div>      
</section> 

<section id="banner" class="section-m1">
        <h4>Unlock your health and savings with exclusive discounts!</h4>
        <h2> Up to <span>15% Off </span> - All our High quality products </h2>
       <a href="shop.html"> <button class="normal"> Shop Now</button> </a> 
</section>

<section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Stay up-to-date with the latest pharmaceutical innovations and treatments. <br>Check out our new arrival drugs that can help improve your health and well-being.</p>
        <div class="pro-container">
            <div class="pro">
               <a href="sproduct.html"> <img src="img/products/n1.jpg" alt="">
                <div class="des">
                    <span>Glucocorticoids</span>
                    <h5>Decadron</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>158 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
               <a href="sproduct.html"> <img src="img/products/n2.jpg" alt="">
                <div class="des">
                    <span>Antidiuretic hormones</span>
                    <h5>Desmopressin</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>211 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.html"><img src="img/products/n3.jpg" alt="">
                <div class="des">
                    <span>Miscellaneous uncategorized agents</span>
                    <h5>Hemgenix</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>98 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.html"><img src="img/products/n4.jpg" alt="">
                <div class="des">
                    <span>Topical acne agents, Topical keratolytics</span>
                    <h5>Wart Remover</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>453 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.html"><img src="img/products/n5.jpg" alt="">
                <div class="des">
                    <span>Impotence agents</span>
                    <h5>Yohimbine</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>132 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.html"><img src="img/products/n6.png" alt="">
                <div class="des">
                    <span>Opioids (narcotic analgesics)</span>
                    <h5>Hydromorphone</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>202 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.html"><img src="img/products/n7.jpg" alt="">
                <div class="des">
                    <span>Glucocorticoids</span>
                    <h5>Hydrocortisone</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>311 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <a href="sproduct.html"><img src="img/products/n8.jpg" alt="">
                <div class="des">
                    <span>Miscellaneous analgesics</span>
                    <h5>Acetaminophen</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>541 ETB</h4>
                </div>
                <i class="fal fa-shopping-cart cart"></i></a>
            </div>
        </div>        
</section> 

<section id="banner3">
        <div class="banner-box">
            <h2 style="color: #088178;">Pain Relief</h2>
            <h3>Effective solutions for your <br> customers' pain management needs</h3>          
        </div>
        <div class="banner-box banner-box2">
            <h2 style="color: #088178;">Allergy</h2>
            <h3>Provide relief and help your <br>customers combat allergies..</h3>          
        </div>
        <div class="banner-box banner-box3">
            <h2 style="color: #088178;">Diabetes</h2>
            <h3>Help your customers effectively <br> manage diabetes with our <br>comprehensive solutions.</h3>          
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
        <script src="dark.js"></script>
        <script src="script.js"></script>
</body>
</html>