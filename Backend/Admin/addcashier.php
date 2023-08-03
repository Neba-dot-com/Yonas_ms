

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
:root {
    --green: #088178;
    --black: #444;
    --light-color: #777;
    --box-shadow: .5rem .5rem 0 rgba(22, 160, 133, .2);
    --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
    --border: .2rem solid var(--green);
}

form {
    flex: 1 1 35rem;
    background: #fff;
    border: var(--border);
    box-shadow: var(--box-shadow);
    text-align: center;
    padding: 2rem;
    border-radius: .5rem;
    /*    align-items: center;*/
    align-self: center;
}

form .box2 {
    width: 60%;
    margin: .5rem 0;
    border-radius: .6rem;
    border: var(--border);
    font-size: 0.9rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
}

.MainChart2 {
    width: 70%;
}

/* CSS for the notification container */
.notification-container {
    position: fixed;
    top: 30%;
    right: 0;
    transform: translateY(-50%);
    background-color: #f2f2f2;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
}

/* CSS for the success notification */
.notification-container.success {
    background-color: #5cb85c;
    color: #fff;
}

/* CSS for the error notification */
.notification-container.error {
    background-color: #d9534f;
    color: #fff;
}
  </style>
</head>

<body>

    <!--  -->
    <?php
include 'topbar.php';
$page="cashier";
if (!isset($_SESSION['admin_user'])) {
    header("location:log.php");
    exit();
}

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

    $sql = "INSERT INTO cashier (FIRST_NAME, LAST_NAME, USER_NAME, PASS_WORD, EMAIL, PHONE_NO, SALARY, GENDAR, BIRTH_DATE,STA_TUS) VALUES
    ('$firstName', '$lastName', '$userName', '$password', '$email', '$phoneNumber', '$salary', '$gender', '$date','active')";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql); // Replace $connection with your actual database connection variable.

    if ($result === TRUE) { // Check the result from mysqli_query, not the redundant query execution with $conn->query
        // Set a session variable to indicate success
        $_SESSION['success_message'] = "New Cashier" . "<br> added successfully!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // Check if the success_message session variable is set
    if (isset($_SESSION['success_message'])) {
        $success_message = $_SESSION['success_message'];

        // Clear the session variable to prevent reappearing after refreshing
        unset($_SESSION['success_message']);
    }
}
?>

        <!-- SideBar -->
        <?php include "sidebar.php";?>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
 

            <!-- Charts -->
            <div class="MainChart2">
            <?php if (isset($success_message)): ?>
            <div class="notification-container success">
                <?php echo $success_message; ?>
            </div>
            <script>
                setTimeout(function() {
                    document.querySelector('.notification-container').style.transform = 'translateY(-50%) translateX(100%)';
                }, 3000); // 3000 milliseconds (3 seconds)
            </script>
        <?php endif; ?>
                <div class="Chart2">
                    <div>
                    <form action="addcashier.php" method="POST" > <h1>ADD NEW CASHIER</h1> <br>
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