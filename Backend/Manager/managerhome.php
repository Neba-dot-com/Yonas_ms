<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {

    header("location:../Admin/log.php");
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

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <!-- Link Style CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Manager Dashboard</title>
    <style type="text/css">
        .new hover{
            background-color: none;
        }
    </style>

</head>

<body>

    <!--  -->
    <div class="container">

        <!-- TopBar/Navbar -->
        <?php
        include 'topbar.php'
        ?>


    </div>
        <!-- SideBar -->
        <?php 
        
        include "sidebar.php"
        ?>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
        <div class="Main1">

            <div class="MainCard1">

                <div class="Card">
                    <a href="tablets.php"> <div class="content">
                    <div class="icon">
                        <i class="fas fa-tablets"></i>
                    </div>
                        <div class="num"><span style="text-color:black;">Tablets </span></div>
                        <div class="name"></div>
                        <div class="name">20</div>
                    </div> </a>
                  
                </div> 

                <div class="Card">
                   <a href="capsules.php"> <div class="content">
                    <div class="icon">
                        <i class="fas fa-capsules"></i>
                    </div>
                        <div class="num">Capsules</div>
                        <div class="name"></div>
                    </div> </a>
                 
                </div> 

                 <div class="Card">
                    <a href="syringe.php"> <div class="content">
                    <div class="icon">
                        <i class="fas fa-syringe"></i>
                    </div>
                        <div class="num">Syringe</div>
                        <div class="name"></div>
                    </div> </a>
              
                </div> 


               <div class="Card">
                    <a href="baby.php"> <div class="content">
                    <div class="icon">
                        <i class="fas fa-baby"></i>
                    </div>
                        <div class="num">Baby Products</div>
                        <div class="name"></div>
                    </div> </a>
                   
                </div> 

                <div class="Card">
                    <a href="syrup.php"> <div class="content">
                    <div class="icon">
                        <i class="fas fa-flask"></i>
                    </div>
                        <div class="num">Syrup</div>
                        <div class="name"></div>
                    </div> </a>
                   
                </div> 

                <div class="Card">
                  <a href="skin.php">  <div class="content">
                     <div class="icon">
                        <i class="fas fa-spa"></i>
                    </div>
                        <div class="num">Skin care</div>
                        <div class="name"></div>
                    </div> </a>
                   
                </div> 

               <div class="Card">
                   <a href="injection.php">    <div class="content">
                  <div class="icon">
                        <i class="fas fa-syringe"></i>
                    </div>
                    
                        <div class="num">Injection</div>
                        <div class="name"></div>
                    </div> </a>
                   
                </div> 

                <div class="Card">
                    <a href="other.php"> <div class="icon">
                         <div class="content">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                   
                        <div class="num">Others</div>
                        <div class="name"></div>
                    </div> </a>
                    
                </div> <br> <br> 

                    <div><br> <br> 
                     <div class="new"> <a href="newcategory.php">  <button class="num" style="  border-radius: 3px; border-color: blue; border: 1;"><span style="color:blue; font-size: 23px; "><i class="fas fa-plus"></i> <br>Add new Category  </span> </button> </div> </a>  
                    </div> 
                        <div> <br> <br> 
                        <div> <a href="managecategory.php"><button class="num" style=" border-radius: 3px;"><span style="color:blue; font-size: 23px;"> <i class="fas fa-gear"></i> <br>Manage Categories  </span></button> </div> </a>
                      </div>  
                    
                




            </div>

            <!-- Charts -->

    




    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>