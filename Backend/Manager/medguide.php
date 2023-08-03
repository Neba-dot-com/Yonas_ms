<?php
include "../../connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- Link Style CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Manage Med Guide</title>
    <style type="text/css">
        .new hover{
            background-color: none;
        }
         .new hover{
            background-color: none;
        }

        .Card:hover {
  background:#088178;
  color: #000;
  cursor: pointer;
}
#blog {
  padding: 150px 150px 0 150px;
}

#blog .blog-box {
  display: flex;
  align-items: center;
  width: 100%;
  position: relative;
  padding-bottom: 100px;
}

#blog img {
  width: 45%;
  height: 270px;
  object-fit: fit;
}

#blog .blog-img{
  width: 50%;
  margin-right: 40px;
}

#blog .blog-details {
  width: 50%;
}

#blog .blog-details a{
  text-decoration: none;
  font-size: 11px;
  color: #000;
  font-weight: 700;
  position: relative;
  transition: 0.3s;
}

#blog .blog-details a::after{
  content: "";
  width: 50px;
  height: 1px;
  background-color: #000;
  position: absolute;
  top: 4px;
  right: -60px;
}

#blog .blog-details a:hover{
  color: #088178;
}

#blog .blog-details a:hover::after{
  background-color:#088178 ;
}

#blog .blog-box h1{
  position: absolute;
  top: -40px;
  left: 0;
  font-size: 70px;
  font-weight: 700;
  color: #c9cbce;
  z-index: -9;
}

pagination{
  text-align: center; 
}

#pagination a{
  text-decoration: none;
  background-color: #088178;
  padding: 15px 20px;
  border-radius: 4px;
  color: #ffff;
  font-weight: 600;
}

#pagination a i{
  font-size: 16px;
  font-weight: 600;
}

    </style>

</head>

<body>

    <!--  -->
    <div class="container">

        <!-- TopBar/Navbar -->
        <div class="TopBar">
            <div class="logo">
                <h1>Yonas <span style="color: white;"><b>M S</b> </span></h1>
            </div>

            <div class="Search">
                <input type="text" placeholder="Search Here" name="search">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>

            <i class="fas fa-bell"></i>

        <div class="user">
              <a href="managerlog.html">   <img src="manager.png" alt=""> </a>
           <a href="expired.html"> <div id="notificationButton">
                <button id="notificationIcon"><i class="fas fa-bell fa-2x"></i></button> <a>
                <span id="notificationCount">0</span>
            </div>
        </div>
            



        </div>
        <!-- SideBar -->
<?php include "sidebar.php"?>
<div class="Main1">

                    <div><br> <br> 
                     <div class="new"> <a href="addmed.php"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp  

                      <button class="num" style="  border-radius: 3px; border-color: blue; border: 1;"><span style="color:blue; font-size: 23px; "><i class="fas fa-plus"></i> <br>ADD MED GUIDE  </span> </button> </div> </a> 


<section id="blog">
    <?php 
    
    $sql = "SELECT * FROM mdguide ";
    $res = $conn->query($sql);


    if ($res->num_rows > 0) {
        while ($result = mysqli_fetch_array($res)) {
        
            $id=$result['id'];
        $title = $result['Title'];
        $generic_name = $result['generic_name'];
        $drug_class = $result['drug_class'];

        $price = $result['price'];

        
        $main_image_name = $result['img1'];
            echo "
            <div class='blog-box'>
            <div class='blog-img'>
                <img src='../../images/$main_image_name' alt='no image '>
            </div>
             <div class='blog-details'>
                 <h4>$title </h4>
                 <label><b>Generic Name:&nbsp &nbsp</b></label>
                 <label>$generic_name</label> <br>
                 <label><b>Drug class:&nbsp &nbsp</b></label>
                 <label>$drug_class </label> <br> <br> <br>
              <a href='meddetail.php?id=$id'><button style='align-self: center; color: #088178; font-size:15px; background-color:#fff;'>DETAIL</button></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp
            <a href='editmed.php?id=$id'><button style='align-self: center; color: blue; font-size:15px; background-color:#fff;'>EDIT</button></a>

            <br><br>
            <form action='med.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to Remove this sample med guide?')\">
            <input type='hidden' name='id' value='$id'>
            <button type='submit' name='action' value='decline' style='background: none; border: none;' >
                <i class='fas fa-user-times' style='color: red;'></i> Remove
            </button>
        </form>
             </div>
            </div>
        
            ";
    }}
    
    ?>


 </section>

</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>