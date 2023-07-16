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

    <title>Dashboard</title>
       <style>
:root{
    --green:#088178;
    --black:#444;
    --light-color:#777;
    --box-shadow:.5rem .5rem 0 rgba(22, 160, 133, .2);
    --text-shadow:.4rem .4rem 0 rgba(0, 0, 0, .2);
    --border:.2rem solid var(--green);
}
    form{
    flex:1 1 35rem;
    background: #fff;
    border:var(--border);
    box-shadow: var(--box-shadow);
    text-align: center;
    padding: 2rem;
    border-radius: .5rem;
/*    align-items: center;*/
    align-self: center;
}
form .box2{
    width: 60%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 0.9rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
}
.MainChart2{
    width: 70%;
}
/*.MainChart2 .Chart2{
    width: 70%;
}*/

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
                    <a href="addcashier.php">
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
            <div class="MainChart2">

                <div class="Chart2">
                    <div>
                       <form> <h1>ADD NEW CASHIER</h1> <br>
                            <label>First Name:&nbsp &nbsp</label> <br>
                            <input type="text" name="" class="box2"> <br>
                            <label>Last Name:&nbsp &nbsp</label>  <br> 
                            <input type="text" name="" class="box2"><br>
                            <label>User Name:&nbsp &nbsp</label> <br>
                            <input type="text" name="" class="box2"> <br> 
                            <label>Password:&nbsp &nbsp</label> <br> 
                            <input type="password" name="" class="box2">  <br>
                            <label>Email:&nbsp &nbsp</label> <br>
                            <input type="email" name="" class="box2">  <br>
                            <label>Phone Number:&nbsp &nbsp</label> <br>
                            <input type="tel" name="" class="box2"> <br> 
                            <label>Salary:&nbsp &nbsp</label> <br>
                            <input type="number" name="" class="box2"><br>
                            <label>Gender:&nbsp &nbsp</label> <br>
                            <select class="box2">
                                <option>Male</option>
                                <option>Female</option>
                            </select> <br> 
                            <label>Age:&nbsp &nbsp</label> <br> 
                            <input type="date" name="" class="box2"> <br>  
                         <i class="fas fa-save"></i>   <input type="button" name="" value="Save">  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input type="reset" name="" value="Reset">
                        </form>
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