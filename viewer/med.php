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
     <title>Yonas Medical Store Viewer Home Page</title>
</head>

<body>
            <!-- This is where Header Starts -->

	<header class="header1">
		  <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Yonas <b> M S </b> </a>

        <nav class="navbar">
            <a href="home.php" class="active">home</a>
            <a href="Vabout.php">about us</a>
            <a href="Vcontact.php">contact us</a>
            <a href="#review">review</a>
            <a href="login.php">Login</a>
       
	</header>


<section style="background-image:url('img/banner/ss.jpg');border: none; background-repeat: norepeat; background-position:center; background-size: cover; height: 40vh; margin-top: 30px;"> 
               <br> <br> <br> <br>                   
</section>

<?php include 'search_med_guide.php'?>
                <br> <br> <br> 
<section id="blog">
<?php
 $sql = "SELECT * from mgsample  ORDER BY id DESC ";
      
 $run = mysqli_query($conn,$sql);

 if($run->num_rows > 0){

     while($row=$run->fetch_assoc()){
         $id=$row['id'];
         $img=$row['img'];
         $title=$row['Title'];
         $description=$row['description'];
     
         echo "
         <div class='blog-box'>
         <div class='blog-img'>
             <img src='../images/$img' alt='no image '>
         </div>
          <div class='blog-details'>
              <h4>'$title' </h4>
              <p>$description <br> <br>
         
              </p>
              
          </div>
 
         </div>
         ";
     
     }}

?>
 </section>







    <!--  This is where Sign up and Login Button Div Ends -->

    <!--  This is where Footer Start -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="vabout.php"> <i class="fas fa-chevron-right"></i> about us </a>
            <a href="vcontact.php"> <i class="fas fa-chevron-right"></i> contact us </a>
            <a href="#review"> <i class="fas fa-chevron-right"></i> review </a>
            <a href="login.php"> <i class="fas fa-chevron-right"></i> login </a>
        </div>

        <div class="box">
            <h3>our services</h3>
            <a href="login.php"> <i class="fas fa-chevron-right"></i> Online Shoping </a>
            <a href="login.php"> <i class="fas fa-chevron-right"></i> Online Payment </a>
            <a href="login.php"> <i class="fas fa-chevron-right"></i> Delivery </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +251-900-0000 </a>
            <a href="#"> <i class="fas fa-phone"></i> +251-900-0000 </a>
            <a href="#"> <i class="fas fa-envelope"></i> yonas2@gmail.com </a>
            <a href="#"> <i class="fas fa-envelope"></i> yonas@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Arada,Gondar,Ethiopia. </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-telegram"></i> telegram </a>
        </div>
    </div>
    <div class="credit"> created by <span>FM.NET SQUAD 2015 E.C</span> | all rights reserved </div>
</section>
</body>
</html>