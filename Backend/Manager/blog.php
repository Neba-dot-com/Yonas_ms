<?php
include "../../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['id'])) {
        $action = $_POST['action'];
        $id = $_POST['id'];

        if ($action === 'decline') {
            $sql = "DELETE FROM blog WHERE ID = $id";

    
        // Execute the SQL query
        $result = mysqli_query($conn, $sql);
    
        if ($result === TRUE) {
            // Set a session variable to indicate success
            header("header:blog.php");
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    
        
    
        // Check if the success_message session variable is set
        if (isset($_SESSION['success_message'])) {
            $success_message = $_SESSION['success_message'];
    
            // Clear the session variable to prevent reappearing after refreshing
            unset($_SESSION['success_message']);
        }
  }}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <!-- Link Style CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Blog</title>
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
  padding: 50px 150px 0 150px;
}

#blog .blog-box {
  display: flex;
  align-items: center;
  width: 100%;
  position: relative;
  padding-bottom: 50px;
  margin-bottom: 80px;
}

#blog img {
  width: 45%;
  height: 210px;
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
            <?php
            
            include "sidebar.php";
            ?>
<div class="Main1">

                    <div><br> <br> 
                     <div class="new"> <a href="addblog.php"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp  <button class="num" style="  border-radius: 3px; border-color: blue; border: 1;"><span style="color:blue; font-size: 23px; "><i class="fas fa-plus"></i> <br>ADD NEW BLOG  </span> </button></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp    
                    </div>  


<section id="blog">
            <?php
                 $sql = "SELECT * from blog  ORDER BY id DESC ";
           
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
                      <div class='blog-box'>
                      <div class='blog-img'>
                      <img src='../../images/$img' alt='no image '>
                  </div>
          
                   <div class='blog-details'>
                       <h4>$title </h4>
                       <p>$small_number_of_characters</p>
                       <br> <br>
                     
                     <div style='display: inline-block;'>
                     <a href='blogdetail.php?id=$id'><button style='align-self: center; color: #088178; font-size:15px; background-color:#fff;'>DETAIL</button></a>
                     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp 
                 <a href='editblog.php?id=$id'><button style='align-self: center; color: blue; font-size:15px; background-color:#fff;'>EDIT</button></a>
                 <br> <br>
                     <form action='blog.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to Remove this Category?')\">
                         <button type='submit' name='action' value='decline' style='background: none; border: none;'>
                             <i class='fas fa-user-times' style='color: red;'></i> Remove
                         </button>
                         <input type='hidden' name='id' value='$id'>
                     </form>
                 </div>
                   </div>
                   </div>";
                     }
                 }
            ?>
                                     <script>
                            function confirmAction(message) {
                                return confirm(message);
                            }
                        </script>
      <!-- <div class="blog-box">
        <div class="blog-img">
            <img src="img/Baby/b10a.jpg" alt="no image ">
        </div>
         <div class="blog-details">
             <h4>"Title of Blog" </h4>
             <p>Did you know? Having accurate and up-to-date information about your medication can empower you to make informed decisions about your health and well-being. Always consult your healthcare professional for personalized advice and ensure you understand the proper usage, dosage, and potential side effects of any medication you take.
                
             <br> <br>
<a href="blogdetail1.php"><button style="align-self: center; color: #088178; font-size:15px; background-color:#fff;">DETAIL</button></a>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp 
 <a href="editblog.php"><button style="align-self: center; color: blue; font-size:15px; background-color:#fff;">EDIT</button></a>
             </p>
         </div>

        </div>

             <div class="blog-box">
        <div class="blog-img">
            <img src="img/Baby/b10a.jpg" alt="no image ">
        </div>
         <div class="blog-details">
             <h4>"Title of Blog" </h4>
             <p>Did you know? Having accurate and up-to-date information about your medication can empower you to make informed decisions about your health and well-being. Always consult your healthcare professional for personalized advice and ensure you understand the proper usage, dosage, and potential side effects of any medication you take. <br> <br>
        <a href="blogdetail1.php"><button style="align-self: center; color: #088178; font-size:15px; background-color:#fff;">DETAIL</button></a>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp 
        <a href="editblog.php"><button style="align-self: center; color: blue; font-size:15px; background-color:#fff;">EDIT</button></a>
             </p>
         </div>

        </div> <br> <br> -->
 </section>
</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</php>