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
        <?php
        include 'topbar.php'
        ?>


    </div>
        <!-- SideBar -->
        <?php 
        
        include "sidebar.php"
        ?>
        <div class="MainChartM">

                <div class="ChartM">
 
                    <h1>MANAGE CATEGORIES</h1> 
                        <div class="CardM">
                            <a href="newcategory.php"><button style="background:none;"><span style="color:#088178; hover:black; font-size:18px;"> ADD NEW CATEGORY </span></button> <i class="fas fa-medkit" style="color:black;"></i> </a>
                       
               </div>  <br>
                    <div> 
                       <table id="tableM">
                        <tr>
                        <th>#</th>
                        <th style="background-color:#f5f5f5;"> Name</th>
                        <th style="background-color:white;"> Quantity </th>
                        <th style="background-color:#f5f5f5;">Action</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td> 
                            <td></td>                          
                            <td> <button style="background: none;"> <i class="fas fa-pen" style="color: blue; "></i> Edit</button> &nbsp &nbsp &nbsp &nbsp 
                             <button> <i class="fas fa-user-times" style="color: red;"></i>&nbsp  Remove</button> </td>
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