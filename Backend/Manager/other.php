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
    <div class="container">

        <!-- TopBar/Navbar -->
        <? include 'topbar.php'
        ?>



        </div>
        <!-- SideBar -->
        <div class="SideBar">

            <ul>
                <li>
                    <a href="managerhome.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="viewitem.php">
                        <i class="fas fa-eye"></i>
                        <div> View Available Items</div>
                    </a>
                </li>
         <!--        <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Customer</div>
                    </a>
                </li> -->
                <li>
                    <a href="additem.php">
                        <i class="fas fa-plus"></i>
                        <div>Add New Item</div>
                    </a>
                </li>
              <!--   <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Manager</div>
                    </a>
                </li> -->
                <li>
                    <a href="report.php">
                        <i class="fas fa-flag"></i>
                        <div> Report</div>
                    </a>
                </li>
                <li>
                    <a href="transaction.php">
                        <i class="fas fa-exchange-alt"></i>
                        <div>Transaction</div>
                    </a>
                </li> 
                <li>
                    <a href="feed.php">
                        <i class="fas fa-comment "></i>
                        <div> Feedback</div>
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

                    <div class="MainChart2">

                <div class="Chart2">
                    <h1>Other Products</h1> <br>
                    <div>
                       <table>
                        <tr>
                            <th>#</th>
                        <th style="background-color:#f5f5f5;">Name</th>
                        <th style="background-color:white;">Category </th>
                        <th style="background-color:#f5f5f5;">Price</th>
                        <th>Quantity</th>
                        <th style="background-color:#f5f5f5;"></i>Supplier</th>
                        <th>Expired Date</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                           <td> <button style="background:none;"> <i class="fas fa-pen" style="color: green;"></i> &nbsp &nbsp <b style="color:blue;"> Edit </b> </span></button> </td>
                           <td> <button style="background:none;"> <i class="fas fa-times" style="color: red;"></i> &nbsp &nbsp <b style="color:blue;"> Remove </b> </span></button> </td>
                        </tr>
                        
                       </table> 
                    </div>
                </div>



            </div>



        </div>

    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>