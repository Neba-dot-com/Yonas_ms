


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
    <div class="container">

    <?php
    include 'topbar.php';
    $page = 'customer';
// Check if the user is logged in
if (!isset($_SESSION['admin_user'])) {

    header("location:log.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['id'])) {
        $action = $_POST['action'];
        $id = $_POST['id'];

        if ($action === 'decline') {
            $sql = "UPDATE register SET STA_TUS = 'deactive' WHERE ID = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record delated successfully');</script>";
            }
        } elseif ($action === 'approve') {
            $sql = "UPDATE register SET STA_TUS = 'approved' WHERE ID = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record updated successfully');</script>";
            }
        }
        // Redirect back to the same page after processing the form
            header("Location: ".$_SERVER['REQUEST_URI']);
            exit(); // Important: Make sure to exit the script after the header() redirect.
    }
}

// Rest of the code for the protected page

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");
    ?>
            <!-- SideBar -->
            <?php
            
            include "sidebar.php";
            ?>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
 

            <!-- Charts -->
            <div class="MainChart2">

                <div class="Chart2">
                    <h1>Customers</h1> <br>
                    <div class="CardM">
                            <a href="addcus.php"><button style="background:none;">
                            <span style="color:#088178; hover:black; font-size:18px;"> 
                            Add New Customer 
                        </span></button> <i class="fas fa-user" style="color:black;"></i> </a>
                       
                 </div>
                 <br>
                    <div>
                       <table>
                        <tr>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-user"></i>First Name</th>
                        <th style="background-color:white;"><i class="fas fa-user"></i>Last Name </th>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-prescription-bottle"></i>Pharmacy Name </th>
                        <th style="background-color:white;"><i class="fas fa-map-marker-alt"></i>Pharmacy Address  </th>
                        <th style="background-color:#f5f5f5;"><i class="fas fa-envelope"></i>Email Address </th>
                        <th style="background-color:#f5f5f5;">Status</th>
                        </tr>
                        <?php
                        
                        $query = "SELECT * FROM register WHERE STA_TUS <> 'waiting'";
                        $run = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($run)){
                            $id=$row['ID'];
                            $firstname=$row['FIRST_NAME'];
                            $lastname=$row['LAST_NAME'];
                            $pharmacy_name=$row['PHARMACY_NAME'];
                            $pharmacy_addr=$row['PHARMACY_ADDRESS'];
                            $email=$row['EMAIL'];
                            $status = $row['STA_TUS'];
                           if($status =='approved'){
                            $status ='active';
                           } 
                            echo "  
                            <tr>
                                <td>$firstname</td>
                                <td>$lastname</td>
                                <td>$pharmacy_name</td>
                                <td>$pharmacy_addr</td>
                                <td>$email</td>
                                <td>$status</td>
                                <td>
                                    <form action='viewcus.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to deactivate this customer?')\">
                                        <input type='hidden' name='id' value='$id'>
                                        <button type='submit' name='action' value='decline' style='background: none; border: none;' " . ($status === 'active' ? '' : 'disabled') . ">
                                            <i class='fas fa-user-times' style='color: red;'></i>Deactivate
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action='viewcus.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to activate this customer?')\">
                                        <input type='hidden' name='id' value='$id'>
                                        <button type='submit' name='action' value='approve' style='background: none; border: none;' " . ($status !== 'active' ? '' : 'disabled') . ">
                                            <i class='fas fa-user-check' style='color: green;'></i>Activate
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        ";

                            


                        }
                        
                        
                        ?>
                         <script>
                            function confirmAction(message) {
                                return confirm(message);
                            }
                        </script>

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