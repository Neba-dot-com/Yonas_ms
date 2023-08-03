<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <!-- Stylesheet Link -->
    <link rel="stylesheet" type="text/css" href="cs/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="cus.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <title>Yonas Medical Store Viewer Home Page</title>
     <style>
        .add-to-cart-button {
        border: none;  /* Remove the border */
        outline: none; /* Remove the outline */
        background: none; /* Remove the background */
        padding: 0; /* Remove any padding */
        cursor: pointer; /* Change the cursor to a pointer */
    }
     </style>
</head>

<body>
            <!-- This is where Header Starts -->

	<header class="header1">
		  <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Yonas <b> M S </b> </a>

        <nav class="navbar">
            <a href="home.php" class="active">home</a>
            <a href="Vabout.php">about us</a>
            <a href="Vcontact.php">contact us</a>
            <a href="med.php">Med Guide</a>
            <a href="login.php">Login</a>
       
	</header>


<section style="background-image:url('img/banner/ss.jpg');border: none; background-repeat: norepeat; background-position:center; background-size: cover; height: 40vh; margin-top: 30px;"> 
               <br> <br> <br> <br>                   
</section>

        <?php include "search_med_guide.php" ?>

                <br> <br> <br> 
<section id="product1" class="section-p1">
        <div class="pro-container">
        <!-- The Div That Will Loop Itself Starts--> 
        <?php
                  include "../connection.php";
                  $query = $_GET['query'];

                  $sql = "SELECT * FROM mdguide WHERE Title LIKE '%$query%' OR drug_class LIKE '%$query%'";
                  $res = $conn->query($sql);


                  if ($res->num_rows > 0) {
                      while ($result = mysqli_fetch_array($res)) {
                      
                          $id=$result['id'];
                      $title = $result['Title'];
                      $generic_name = $result['generic_name'];
                      $drug_class = $result['drug_class'];
   
                      $price = $result['price'];

                      
                      $main_image_name = $result['img1'];


                      echo "             <div class='pro'>
                      <a style='text-decoration:none;'  href='meddetail.php?id=$id'><img src='../images/$main_image_name' alt=''>
                      <div class='des'>
                          <span>$generic_name</span>
                          <h5>$title</h5>
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
                }
        
        ?> 
                <script>
        function redirectToLogin() {
            window.location.href = "login.php";
        }
        </script>

        <!-- The Div That Will Loop Itself Starts-->  
            <div class="pro">
                <a href="meddetail.php"><img src="img/Baby/b9a.jpg" alt="">
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
                    <h4>120 ETB</h4>
                </div> 
                </a> 
            </div> 



        <!-- The Div That Will Loop Itself Starts-->  
            <div class="pro">
                <a href="meddetail.php"><img src="img/Baby/b10a.jpg" alt="">
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
                    <h4>120 ETB</h4>
                </div>  </a>
            </div> 

 </section>
</body>
</html>