<?php
include "../../connection.php";
$id=$_GET['id'];

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

    <title>Blog Detail</title>
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
  margin-top:40px;
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
              <a href="managerlog.php">   <img src="manager.png" alt=""> </a>
           <a href="expired.php"> <div id="notificationButton">
                <button id="notificationIcon"><i class="fas fa-bell fa-2x"></i></button> <a>
                <span id="notificationCount">0</span>
            </div>
        </div>
            



        </div>
        <!-- SideBar -->
            <?php include "sidebar.php"?>
 <div class="Main">

<section id="blog">
     <div class="blog-box">
     <?php
                     $sql = "SELECT * from blog WHERE id=$id";
           
                     $run = mysqli_query($conn,$sql);
         
                     if($run->num_rows > 0){
         
                         while($row=$run->fetch_assoc()){
                             $id=$row['id'];
                             $img=$row['img'];
                             $title=$row['Title'];
                             $para1=$row['para1'];
                             $para2=$row['para2'];
                             $para3=$row['para3'];
                             $data = $row["para1"];
                             // Extract the first 10 characters (adjust the substring length as needed)
                          $small_number_of_characters = substr($data, 0, 150);
                            echo "
                            <div class='blog-img'>
                            <img src='../../images/$img' alt='no image '>
                        </div>
                
                         <div class='blog-details'>
                             <h4>\"$title\" </h4> <br>
                             <label>$small_number_of_characters.</label>
                        </div>
                        </div>
                            <p> $para1.</p><br> <br>
                
                
                             <p>$para2.</p><br> <br>
                
                             <p>$para3.</p><br>
                            
                
                             <div style='display: inline-block; margin-right: 20px;'>
                             <a href='editblog.php?id=$id'><button style='align-self: center; color: blue; font-size: 20px; background-color: #fff;'>EDIT</button></a>
                         </div>

                         <br> <br>
  
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