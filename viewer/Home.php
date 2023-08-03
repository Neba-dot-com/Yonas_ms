<?php

include "../connection.php"

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
        <!-- Stylesheet Link -->
     <link rel="stylesheet" type="text/css" href="cs/style.css">
     <link rel="stylesheet" type="text/css" href="style.css">
     
     <link rel="icon" type="image/x-icon" href="../favicon.ico">

     <title>Yonas Medical Store Viewer Home Page</title>
</head>

<body>
            <!-- This is where Header Starts -->
            <header class="header1">
<a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Yonas <b> M S </b> </a>

<nav class="navbar">
  <a href="home.php">home</a>
  <a href="vabout.php">about us</a>
  <a href="vcontact.php">contact us</a>
  <a href="med.php">Med Guide</a>
  <a href="login.php">Login</a>    
</header>

              <!-- This is where Header Ends -->  

    <section class="home" id="home">
        <div class="image">
           <img src="images/home-img.svg" alt="">
        </div>

        <div class="content">
            <h3>Your Path to Health Starts Here!</h3>
            <p>Your Reliable Partner in Pharmacy Supply!Delivering Healthcare to Your Doorstep.</p>
        </div>
    </section>

            <!-- Search Bar Starts-->

            <?php include "../customer/search_button.php"?>
         <!--  This is where Categories Start -->

<section class="services" id="services">
    <h1 class="heading"> our <span>products</span> </h1>
    <div class="box-container">

                 <!--Capsules & Tablets Category -->
<?php

$sql = "SELECT * FROM category";
$res = $conn->query($sql);

if($res->num_rows >0){
    while ($result = mysqli_fetch_array($res)){
        $id = $result['id'];
        $category = $result['category'];
        $image = $result['image'];
        $description = $result['description'];

        echo "
        <div class=\"box\" style=\"background-image: url('../images/$image'); background-repeat: no-repeat; background-position: center; background-size: cover; color: #ffffff;\">
            <i class=\"fa fa-capsules\"></i>
            <h3 style=\"color: darkblue;\">$category</h3>
            <span style=\"color: #000000; font-weight: bold; font-size: 14px;\">$description</span><br>
            <a href=\"category.php?category=$category\" class=\"btn\">Show More</a>
        </div>
    ";
    

    }
    }

?>

                <!-- Syrup Category-->

        <!-- <div class="box" style="background-image: url('images/23.jpg');background-repeat: no-repeat; background-position: center; background-size: cover; scolor: #ffffff;">
                <i class="fa fa-hand-holding-medical"></i>
                <h3 style="color:darkblue;">Syrup</h3>
                <span style="color: #000000; font-weight: bold; font-size: 14px;">Delicious syrups formulated to provide effective relief with a pleasant taste for all ages..</span> <br>
                <a href="syrup.php" class="btn"> Show More  </a>
        </div> -->
                <!-- Skin Care Category -->

        <!-- <div class="box" style="background-image: url('images/16.jpg');background-repeat: no-repeat; background-position: center; background-size: cover; scolor: #ffffff;">
                <i class="fas fa-briefcase-medical"></i>
                <h3 style="color:darkblue;">Skin Care</h3>
                <span style="color: #000000; font-weight: bold; font-size: 14px;">Premium skincare products to nourish, protect, and enhance the health of your skin.</span> <br>
                <a href="skin.php" class="btn"> Show  More  </a>
        </div> -->

                 <!-- Injection Category -->

        <!-- <div class="box" style="background-image: url('images/24.jpg');background-repeat: no-repeat; background-position: center; background-size: cover; scolor: #ffffff;" >
                <i class="fa fa-syringe"></i>
                <h3 style="color:darkblue;">Injection</h3>
               <span style="color: #000000; font-weight: bold; font-size: 14px;">Powerful injections for rapid and direct administration of medication for fast-acting results. </span> <br>
                <a href="injection.php" class="btn"> Show More  </a>
        </div> -->

                 <!-- Baby Products Category -->
<!-- 
        <div class="box" style="background-image: url('images/22.jpg');background-repeat: no-repeat; background-position: center; background-size: cover; scolor: #ffffff;">
                <i class="fas fa-heartbeat"></i>
                <h3 style="color:darkblue;">Baby Products</h3>
              <span style="color: #000000; font-weight: bold; font-size: 14px;">Safe and gentle products specially designed to meet the unique needs of your little ones.</span>  <br>
                <a href="baby.php" class="btn"> Show More  </a>
        </div> -->

                 <!-- All Products Category -->

        <div class="box" style="background-image: url('images/all.webp');background-repeat: no-repeat; background-position: center; background-size: cover; scolor: #ffffff;">
                <i class="fas fa-pills"></i>
                <h3 style="color:darkblue;">All Products</h3> <br>
                <span style="color: #000000; font-weight: bold; font-size: 14px;">Efficient and portable medical products for convenient medication on the go.</span> <br>
                <a href="category.php?category=all" class="btn"> Show More  </a>
        </div>

    </div>
</section>
            <!--  This is where Categories End -->

            <!--  This is where Review Start -->
<section class="review" id="review">
    <h1 class="heading"> customer's <span>review</span> </h1>
    <div class="box-container">

                    <!--  First Box -->

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <h3>Biruk</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
                <p class="text">"I've been working with Yonas Medical Store for over a year now, and I couldn't be happier with their service. Their online ordering system is easy to use, and their delivery is always on time. Plus, the quality of their medications is consistently high. I highly recommend Yonas Medical Store to any pharmacy looking for a reliable supplier." - Biruk, Pharmacy Owner</p>
        </div>
                     <!--  second Box -->

        <div class="box">
            <img src="images/pic-2.png" alt="">
            <h3>Ahmed</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
                <p class="text">"I recently started using Yonas Medical Store for my pharmacy, and I'm so glad I did. The staff is incredibly knowledgeable and helpful, and they went out of their way to help me find the products I needed. I was impressed by the quality of the medications they provided, and the delivery was faster than I expected. I will definitely be using Yonas Medical Store again." - Ahmed, Pharmacist</p>
        </div>
                     <!--  Last Box -->

        <div class="box">
            <img src="images/pic-3.png" alt="">
            <h3>Hiwot</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
                 <p class="text">"As a small, independent pharmacy, it can be tough to find suppliers who are willing to work with us. Yonas Medical Store not only welcomed our business, but they also provided us with excellent service and high-quality products. I appreciate their commitment to our success, and I highly recommend them to anyone looking for a reliable pharmacy supplier." - Hiwot, Pharmacy Manager</p>
        </div>

    </div>
             <!--  This is where Review End -->
</section>

    <!--  This is where Sign up and Login Button Div Start -->

 <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4> Health Supplies at your fingertips!</h4>
            <p> Sign Up and Simplify Your Medical Purchases<span> #Shop Medically!!</span> </p>
        </div>
        <div class="form">
          <a href=register.php><button class="normal">Sign Up</button> </a> &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp
          <a href=login.php>  <button class="normal">Login</button> </a>
        </div>
</section> 
    <!--  This is where Sign up and Login Button Div Ends -->

    <!--  This is where Footer Start -->
    <?php include "viewer_footer.php"?>
</body>
</html>