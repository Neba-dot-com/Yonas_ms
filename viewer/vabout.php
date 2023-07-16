<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" type="text/css" href="cs/style.css">
            <!-- Stylesheet Link -->
     <link rel="stylesheet" type="text/css" href="style.css">
     <title>Viewer About Page </title>
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

        <!-- This is where Abouts us description Starts -->
<section class="about" id="about">
    <h1 class="heading"> <span>about</span> us </h1>
    <div class="row">
        <div class="image">
            <img src="images/about.jpg" alt="">
        </div>
        <div class="content">
            <h3>Welcome to Yonas Medical Store!</h3>
            <p>We are a trusted supplier of high-quality drugs and medications to pharmacies throughout Gondar city and beyond. With our online store, we make it easy for pharmacies to access the products they need to provide top-notch care to their customers.

            <p>We are proud to be a part of the healthcare community in Gondar city, and we are committed to supporting the pharmacies that serve our community. Whether you are a small independent pharmacy or a large healthcare facility, we are here to help you provide the best possible care to your customers.</p>
            <p>Thank you for choosing Yonas Medical Store as your pharmacy supply partner. We look forward to serving you and helping you achieve your healthcare goals.</p>
            
            <details>
                    <summary> <a href="#detail" class="btn"> Read more <span class="fas fa-chevron-down"></span> </a> </summary>
                    <p id="detail">With years of experience in the industry, we understand the importance of reliable and efficient supply chains for pharmacies. We work closely with reputable manufacturers and suppliers to curate a comprehensive inventory of pharmaceutical products, including medications, over-the-counter drugs, medical devices, and other essential supplies.

                    We take pride in our commitment to excellence, offering competitive pricing, timely delivery, and exceptional customer service. Our team of knowledgeable professionals is always ready to assist you in finding the right products that meet your specific requirements.

                    Whether you operate a community pharmacy, hospital pharmacy, or any other healthcare facility, Yonas Medical Store is here to support you. We strive to be your trusted partner in ensuring the availability and accessibility of vital medications and supplies for the well-being of the local community.

                    Thank you for choosing Yonas Medical Store. We look forward to serving you and meeting all your pharmacy supply needs.</p>
            </details> 
        </div>
    </div>
</section>
        <!-- This is where Abouts us description Ends -->
 
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
    <!--  This is where Sign up and Login Button Div Ends -->

    <!--  This is where Footer Start -->
    <?php include "viewer_footer.php"?>
        <!--  This is where Footer Ends -->

</body>
</html>