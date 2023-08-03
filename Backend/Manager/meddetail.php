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
  display: table-column;
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
<?php  include "sidebar.php"?>

 <div class="Main">

<section id="blog">
      <?php
                  $id=$_GET['id'];
                  $sql="SELECT * from mdguide where id =$id";
                  $res = $conn->query($sql);
      
                  if($result = mysqli_fetch_array($res)){
                      
                          $id=$result['id'];
                      $title = $result['Title'];
                      $generic_name = $result['generic_name'];
                      $drug_class = $result['drug_class'];
                      $dosage_forms=$result['dosage_forms'];
                      $price = $result['price'];
                      $description = $result['des_cription'];
                      $before_taking = $result['before_taking'];
                      $how_to_take = $result['how_to_take'];
                      $miss_dose = $result['miss_dose']; // Corrected name
                      $over_dose = $result['over_dose'];
                      $side_effects = $result['side_effects'];
                      
                      $main_image_name = $result['img1'];
                      $image1_name = $result['img2'];
                      $image2_name = $result['img3'];
                      $image3_name =$result['img4'];
                    
                    echo "
                    <div class='blog-box'>
                    <div class='blog-img'>
                        <img src='../../images/$main_image_name' alt='no image '>
                    </div>
            
                     <div class='blog-details'>
                         <h4>'$title' </h4> <br>
                         <label><b>Generic Name:&nbsp &nbsp</b></label>
                         <label>$generic_name</label> <br> <br>
                         <label><b>Drug class:&nbsp &nbsp</b></label>
                         <label>$drug_class</label> <br> <br>
                         <label><b>Dosage forms:&nbsp &nbsp</b></label>
                         <label>$dosage_forms</label>
            
                    </div>
                    </div>
                    
                    ";
                    echo "
                 
             <label><b>Description:&nbsp &nbsp</b></label>
             <label>$description</label><br> <br>

             <label><b>Before taking the medicine:&nbsp &nbsp</b></label>
             <label>$$before_taking</label><br> <br>

             <label><b>How to take:&nbsp &nbsp</b></label>
             <label>$how_to_take</label><br> <br>

             <label><b>What happens if miss dose:&nbsp &nbsp</b></label>
             <label>$miss_dose</label><br> <br>
             <label><b>What happens if over dose:&nbsp &nbsp</b></label>
             <label>$over_dose</label><br> <br>
             <label><b>Side effects:&nbsp &nbsp</b></label>
             <label>$side_effects</label><br> <br> <br>
             &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

             
             <a href='editmed.php?id=$id'><button style='align-self: center; color: blue; font-size:20px; background-color:#fff;'>EDIT</button></a> <br> <br> <br>   
                    
                    ";
                    }
      
      ?>


</section>
<!-- <section id="blog" style="padding: 100px 150px 0 100px; ">
    <div class="blog-box">
        <div class="blog-img" style="justify-content: space-between;">
            <img src="img/F/f2b.jpg" alt="no image ">
            <img src="img/F/f2b.jpg" alt="no image ">
            <img src="img/F/f2b.jpg" alt="no image ">
</div>
</div>
</section> -->
</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>