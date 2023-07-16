<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_user'])) {

    header("location:log.php");
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

    <title>Admin Dashboard</title>
    <style type="text/css">

    </style>

</head>

<body>

<?php
include 'topbar.php';

?>
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
 
                <li>
                    <a href="manager.php">
                        <i class="fas fa-user-tie"></i>
                        <div>Store Manager</div>
                    </a>
                </li>

                <li>
                    <a href="cashier.php">
                        <i class="fas fa-cash-register"></i>
                        <div> Cashier</div>
                    </a>
                </li>

                <li>
                    <a href="sales.php">
                        <i class="fas fa-briefcase "></i>
                        <div> SalesMan</div>
                    </a>
                </li>


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

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>