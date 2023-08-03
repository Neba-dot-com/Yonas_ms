
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
$page = 'sale';
if (!isset($_SESSION['admin_user'])) {

    header("location:log.php");
    exit();
}
       // Rest of the code for the protected page
       if(isset($_POST['save'])){
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $userName = $_POST['user_name'];
        $password = $_POST['pass_word'];
        $salary = $_POST['salary'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $date = $_POST['date'];
    
        $sql = "INSERT INTO salesman (FIRST_NAME, LAST_NAME, USER_NAME, PASS_WORD, EMAIL, PHONE_NO, SALARY, GENDAR, BIRTH_DATE,STA_TUS) VALUES
        ('$firstName', '$lastName', '$userName', '$password', '$email', '$phoneNumber', '$salary', '$gender', '$date','active')";
    
        // Execute the SQL query
        $result = mysqli_query($conn, $sql); // Replace $connection with your actual database connection variable.
    
        if ($result) {
            // Insertion successful, display an alert message using JavaScript
            echo '<script>alert("Data inserted successfully!");</script>';
        } else {
            // Insertion failed, display an alert message with the error
            echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>'; // Replace $connection with your actual database connection variable.
        }
    }
// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");

?>
        <!-- SideBar -->
        <?php include "sidebar.php";?>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
 

            <!-- Charts -->
            <div class="MainChart2">

                <div class="Chart2">
                    <div>
                    <form action="addcashier.php" method="POST" > <h1>ADD NEW SALES_MAN</h1> <br>
                            <label>First Name:&nbsp &nbsp</label> <br>
                            <input type="text" name="first_name" class="box2" required> <br>
                            <label>Last Name:&nbsp &nbsp</label>  <br> 
                            <input type="text" name="last_name" class="box2" required><br>
                            <label>User Name:&nbsp &nbsp</label> <br>
                            <input type="text" name="user_name" class="box2" required> <br> 
                            <label>Password:&nbsp &nbsp</label> <br> 
                            <input type="password" name="pass_word" class="box2" required>  <br>
                            <label>Email:&nbsp &nbsp</label> <br>
                            <input type="email" name="email" class="box2" required>  <br>
                            <label>Phone Number:&nbsp &nbsp</label> <br>
                            <input type="tel" name="phone_number" class="box2" required> <br> 
                            <label>Salary:&nbsp &nbsp</label> <br>
                            <input type="number" name="salary" class="box2" required><br>
                            <label>Gender:&nbsp &nbsp</label> <br>
                            <select  name="gender" class="box2">
                                <option value="male" >Male</option>
                                <option value="female">Female</option>
                            </select> <br> 
                            <label>Date of birth:&nbsp &nbsp</label> <br> 
                            <input type="date" name="date" class="box2" required> <br>  
                         <i class="fas fa-save"></i>   <input type="submit" name="save" value="Save">  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
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