<?php

include '../connection.php';
// Check if the user is logged in


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
        <title>Products Detail</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="cus.css">
        <link rel="stylesheet" type="text/css" href="../customer/cs/style.css">
     <link rel="stylesheet" type="text/css" href="../customer/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style type="text/css">
            form input{
                border: none;
            }
            form textarea{
                border: none;
            }
            .add-to-cart-button {
                border: none;  /* Remove the border */
                outline: none; /* Remove the outline */
                background: none; /* Remove the background */
                padding: 0; /* Remove any padding */
                cursor: pointer; /* Change the cursor to a pointer */
            
                            }


                .add-to-cart-button {
                display: inline-block; /* Display the button as an inline-block element */
                padding: 15px 30px; /* Adjust the padding according to your preference */
                font-size: 18px; /* Increase the font size for a larger button */
                }
                .single-pro-image {
                    text-align: center;
                    }

                    .single-pro-details {
                    text-align: center;
                    margin-bottom: 20px;
                    }

                    .cart-button-wrapper {
                    text-align: center;
                    }



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
        <script>
document.addEventListener('DOMContentLoaded', function() {
  var mainImg = document.getElementById('MainImg');
  var smallImgs = document.querySelectorAll('.small-img');

  smallImgs.forEach(function(img) {
    img.addEventListener('click', function() {
      var newSrc = this.src;
      mainImg.src = newSrc;
    });
  });
});
</script>
<script>
        function redirectToLogin() {
            window.location.href = "login.php";
        }
        </script>
    </head>

    <body>
    <header class="header1">
<a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Yonas <b> M S </b> </a>

<nav class="navbar">
  <a href="home.php">home</a>
  <a href="vabout.php">about us</a>
  <a href="vcontact.php">contact us</a>
  <a href="login.php">Login</a>    
</header>

        <?php
        
        $id=$_GET['id'];
        $sql="SELECT * FROM items WHERE ID =$id";
        $sql2="SELECT *FROM images WHERE ID=$id";

        $res=mysqli_query($conn,$sql);
        $res2=mysqli_query($conn,$sql2);
        $result=mysqli_fetch_array($res);
        $result2=mysqli_fetch_array($res2);
            $image1=$result2['image1'];
            $image2=$result2['image2'];
            $image3=$result2['image3'];

        $name=$result['PRODUCT_NAME'];
        $generic_name=$result['GENERIC_NAME'];
        $brand_name=$result['BRAND_NAME'];
        $quantity=$result['QUANTITY'];
        $price=$result['PRICE'];
        $detail=$result['DETAIL_INFO'];
        $exp_date=$result['EXPIRE_DATE'];
        $image=$result['image'];
        echo "

        
        <section id='prodetails' class='section-p1'>
            <div class='single-pro-image'>
                <img src='../images/$image' width='100%' id='MainImg' alt=''>
                <div class='small-img-group'>
                    <div class='small-img-col'>
                        <img src='../images/$image' width='100%' class='small-img' alt=''>
                    </div>
                    <div class='small-img-col'>
                        <img src='../images/$image2' width='100%' class='small-img' alt=''>
                    </div>
                    <div class='small-img-col'>
                        <img src='../images/$image3' width='100%' class='small-img' alt=''>
                    </div>
                    <div class='small-img-col'>
                        <img src='../images/$image1' width='100%' class='small-img' alt=''>
                    </div>
                </div>
            </div>
            <div class='single-pro-details'>
                <h2>Product Detail</h2>
                    Price <h3> $price ETB</h3>
                <br>
                    <label><h3>Product Information</h3></label> <br>
                    <label>Name</label>
                    <h3> $name</h3><br>
                    <label>$generic_name</label>
                    <h3> Product Generic Name</h3><br>
                    <label>$brand_name</label>
                    <h3> Product Brand Name</h3> <br>
                    <label>Quantity in Stoke</label>
                    <h3> only $quantity </h3> <br>
                    <label>Expired Date</label>
                    <h3> $exp_date</h3> <br>
                    <label>Product Detail Information</label>
                    <p> $detail</p>

                    
            </div>
            
          
         </div>
                <div class='cart-button-wrapper'>
                <button class='add-to-cart-button' onclick='redirectToLogin()'>
                <i class='fal fa-shopping-cart cart'></i>
            </button>
            </div>
        </section>
        
        
        ";

        ?>


    <section id="product1" class="section-p1">
        <h2>Related Products</h2>
        <p>All your Needs Are Here!</p>
          <div class="pro-container">
            <?php
            
            
        $brand_name=$_GET['brand_name'];
            $sql = "SELECT * FROM items WHERE BRAND_NAME ='$brand_name'   ORDER BY RAND()";
            $res = mysqli_query($conn,$sql);
    
    
            while ($result = mysqli_fetch_array($res)){
                $id=$result['ID'];
                $brand_name=$result['BRAND_NAME'];
                $product_name = $result['PRODUCT_NAME'];
                $generic_name = $result['GENERIC_NAME'];
                $price = $result['PRICE'];
                $image = $result['image'];
            echo "
            <div class='pro'>
            <a style='text-decoration:none;' href='sproduct.php?id=$id&brand_name=$brand_name''>
            <img src='../images/$image' alt=''>
            <div class='des'>
                <span>$generic_name</span>
                <h5>$product_name</h5>
                <div class='star'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                </div>
                <h4>$price ETB</h4>
            </div>
            </a>
            <div class='cart-button-wrapper'>
            <button class='add-to-cart-button' onclick='redirectToLogin()'>
                <i class='fal fa-shopping-cart cart'></i>
            </button>
        </div>
        
        </div>
            ";   
            }
            ?>
         <!-- <div class="pro">
                <img src="img/products/z6.jpg" alt="">
                <div class="des">
                    <span>Nonsteroidal anti-inflammatory drugs</span>
                    <h5>Motrin</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="sproduct.html"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
                        <!-- <div class="pro">
                <img src="img/products/j1.png" alt="">
                <div class="des">
                    <span> Anticholinergic bronchodilators</span>
                    <h5>Ipratropium</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>178 ETB</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
               <!-- <div class="pro">
                <img src="img/products/z8.jpg" alt="">
                <div class="des">
                    <span>Miscellaneous antihyperlipidemic agents</span>
                    <h5>Nexletol</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>200 ETB</h4>
                </div>
                <a href="sproduct.html"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
                          <!-- <div class="pro">
                <img src="img/products/j4.jpg" alt="">
                <div class="des">
                    <span>Miscellaneous coagulation modifiers</span>
                    <h5>Jivi</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>238 ETB</h4>
                </div>
                <a href="sproduct.html"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
             <!-- <div class="pro">
                <img src="img/products/z7.jpg" alt="">
                <div class="des">
                    <span>Nonsteroidal anti-inflammatory drugs</span>
                    <h5>Naprosyn</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>324 ETB</h4>
                </div>
                <a href="sproduct.html"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
             <!-- <div class="pro">
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
                    <h4>643 ETB</h4>
                </div>
                <a href="sproduct.html"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
              <!-- <div class="pro">
                <img src="img/products/j3.jpg" alt="">
                <div class="des">
                    <span>Topical antifungals</span>
                    <h5>Jublia</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>243 ETB</h4>
                </div>
                <a href="sproduct.html"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
             <!-- <div class="pro">
                <img src="img/products/f8.jpg" alt="">
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
                    <h4>253 ETB</h4>
                </div>
                <a href="sproduct.html"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
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

<script>
        var MainImg =  document.getElementById("MainImg");
        var smallimg = document.getElementByClassName("small-img");

           smallimg[0].onclick = function(){
            MainImg.src = smallimg[0].src;
        }
           smallimg[1].onclick = function(){
            MainImg.src = smallimg[1].src;
        }
           smallimg[2].onclick = function(){
            MainImg.src = smallimg[2].src;
        }
           smallimg[3].onclick = function(){
            MainImg.src = smallimg[3].src;
        }
    </script>
         <script src="cus.js"></script>

    <script src="script.js"></script>
</body>
 
</html>