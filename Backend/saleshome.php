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

    <title>Sales_Man Dashboard</title>
    <style type="text/css">

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
                <img src="sales.jpg" alt="">
           <a href="approve.php"> <div id="notificationButton">
                <button id="notificationIcon"><i class="fas fa-bell fa-2x"></i></button> <a>
                <span id="notificationCount">0</span>
            </div>
        </div>
            



        </div>
        <!-- SideBar -->
        <div class="SideBar">

            <ul>
                <li>
                    <a href="index.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="viewcus.php">
                        <i class="fas fa-user-check"></i>
                        <div> Customer</div>
                    </a>
                </li>
         <!--        <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Customer</div>
                    </a>
                </li> -->
                <li>
                    <a href="manager.php">
                        <i class="fas fa-user-tie"></i>
                        <div>Store Manager</div>
                    </a>
                </li>
              <!--   <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Manager</div>
                    </a>
                </li> -->
                <li>
                    <a href="cashier.php">
                        <i class="fas fa-cash-register"></i>
                        <div> Cashier</div>
                    </a>
                </li>
             <!--    <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Cashier</div>
                    </a>
                </li> -->
                <li>
                    <a href="sales.php">
                        <i class="fas fa-briefcase "></i>
                        <div> SalesMan</div>
                    </a>
                </li>
               <!--   <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate SalesMan</div>
                    </a>
                </li> -->

            </ul>

        </div>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
        <div class="Main1">

            <div class="MainCard1">

                <div class="Card">
                    <div class="content">
                        <div class="num">42</div>
                        <div class="name">Customers</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                </div>

                <div class="Card">
                    <div class="content">
                        <div class="num">2</div>
                        <div class="name">Manager</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>

                <div class="Card">
                    <div class="content">
                        <div class="num">2</div>
                        <div class="name">Cashier</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cash-register"></i>
                    </div>
                </div>


                <div class="Card">
                    <div class="content">
                        <div class="num">20</div>
                        <div class="name">SalesMan</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>




            </div>

            <!-- Charts -->
            <div class="MainChart">

                <div class="Chart">
                    <h1>Welcome To Admin Panel</h1> <br>
                    <div>
                        <form class="form"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color:blueviolet; font-size: 20px;"> <b> My Profile </b></span> <br>
                        <label>User Name :
                            <input type="text" name="" style="border-top: none;">
                            <button id="editButton" class="btn" type="button" onclick="toggleEdit()"> <i class="fas fa-pen"> &nbsp Edit </i> </button> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        </label> 
                        <div id="editActions">
                            <button id="saveButton" class="btn"> <i class="fas fa-save"> &nbsp Save </i> </button>
                            <button id="cancelButton" class="btn"> <i class="fas fa-times"> &nbsp Cancel </i> </button>  
                        </div><br> 
                        <label>Password :
                            <input type="password" name="" style="border-top: none;">
                            <button id="editButton" class="btn"  type="button" onclick="toggleEdit2()"> <i class="fas fa-pen"> &nbsp Edit </i> </button> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            </label>  
                        <div id="editActions2">
                            <button id="saveButton2" class="btn"> <i class="fas fa-save"> &nbsp Save </i> </button>
                            <button id="cancelButton2" class="btn"> <i class="fas fa-times"> &nbsp Cancel </i> </button>  
                        </div>
                        </label>
                        </form>
                    </div>
                </div>

                <div class="Chart doughnut-chart">
                    <h1>Employees</h1>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>


            </div>



        </div>

    </div>
    <!--  -->





    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>