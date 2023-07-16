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
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css"> -->
<title>Dashboard</title>
  <style>
   
      
    table {
/*      border-collapse: collapse;*/
      width: 100%;
    }

    table th {
      border-collapse: separate;
      border-spacing: 9;
      border: 1;

    }

    th, td {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 8px;
      border-left: none;
      border-right: none;
       border-bottom: 1px solid #ddd;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr td:hover {
      background-color: #f5f5f5;
    }
    th i {
      margin-right: 4px;
      color: #088178;
    }


  </style>
</head>

<body>

    <!--  -->
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
 

            <!-- Charts -->
            <div class="MainChartM">

                <div class="ChartM">
 
                    <h1>Sales_Man Information</h1> 
                        <div class="CardM">
                            <a href="addsales.html"><button style="background:none;"><span style="color:#088178; hover:black; font-size:18px;"> Add New Sales_Man </span></button> <i class="fas fa-user" style="color:black;"></i> </a>
                       
               </div>  <br>
                    <div> 
                       <table id="tableM">
                        <tr>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-user"></i>First Name</th>
                        <th style="background-color:white;"><i class="fas fa-user"></i>Last Name </th>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-user"></i>User Name</th>
                        <th><i class="fas fa-lock"></i>Password</th>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-dollar-sign"></i>Salary</th>
                        <th><i class="fas fa-envelope"></i>Email</th>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-phone"></i>Phone Number</th>
                        <th><i class="fas fa-venus-mars"></i>Gender</th>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-clock"></i>Age</th>
                        <th><i class="fas fa-pen">
                        </i>Edit</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                           <td> <button style="background: none;"> <i class="fas fa-pen" style="color: blue; "></i></button> </td>
                            <td> <button> <i class="fas fa-user-times" style="color: red;"></i>&nbsp Deactivate</button> </td>
                        </tr>
                        
                       </table> 
                


            </div>
    </div>
                </div>


        </div>

    </div>
    <!--  -->





    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- <script src="chart1.js"></script> -->
    <script src="chart2.js"></script>

</body>

</html>