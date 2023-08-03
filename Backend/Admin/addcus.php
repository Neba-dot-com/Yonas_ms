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

    <title>Add Customer </title>
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
    <div class="container">

        <!-- TopBar/Navbar -->
        <?php
        
        include "topbar.php";    
        $page = 'customer';
        $success = false; //

            if(isset($_POST['submit'])){

            $firstname=$_POST['first_name'];
            $lastname=$_POST['last_name'];
            $email=$_POST['email'];
            $pharmacy_name=$_POST['pharmacy_name'];
            $pharmacy_address=$_POST['pharmacy_address'];
            $phone_num=$_POST['phone_num'];
            $pharmacy_license_no=$_POST['pharmacy_license_no'];
            $license_img=$_POST['license'];
            $username=$_POST['user_name'];
            $password=$_POST['pass_word'];

            $current_date = date('Y-m-d H:i:s');

            $sql = "INSERT INTO register (FIRST_NAME, LAST_NAME, EMAIL, PHONE_NUMBER, PHARMACY_NAME, PHARMACY_ADDRESS, PHARMA_LICENSE_NO, PHARMACY_LICENSE_IMG, USER_NAME, PASS_WORD, STA_TUS, registration_date) 
            VALUES ('$firstname', '$lastname', '$email', '$phone_num', '$pharmacy_name', '$pharmacy_address', '$pharmacy_license_no', '$license_img', '$username', '$password', 'approved', '$current_date')";


            
                // ... your form data processing code here ...

                if ($conn->query($sql) === TRUE) {
                    // Set a session variable to indicate success
                    $_SESSION['success_message'] = "New Customer" . "<br> added successfully!";

                    $success = true; // Set $success to true
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
                <?php include "sidebar.php"?>
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
                       <form action="addcus.php" method="POST"> 
                        <h1>ADD NEW CUSTOMER</h1> <br>
              
                           <label for="fullname">First Name:&nbsp &nbsp</label><br>
                            <input type="text" id="fullname" class="box2" name="first_name" required><br>

                            <label for="fullname">Last Name:&nbsp &nbsp</label><br>
                            <input type="text" id="fullname" class="box2" name="last_name" required><br>
                            
                            <label for="email">Email:&nbsp &nbsp</label><br>
                            <input type="email" id="email" class="box2" name="email" required><br>
                            
                            <label for="phone-num">Phone  Number:&nbsp &nbsp</label><br>
                            <input type="text" id="phone-num" class="box2" name="phone_num" required><br>

                            <label for="pharmacy-name">Pharmacy Name:&nbsp &nbsp</label><br>
                            <input type="text" id="pharmacy-name" class="box2" name="pharmacy_name" required><br>
                            
                            <label for="pharmacy-address">Pharmacy Address:&nbsp &nbsp</label><br>
                            <input type="text" id="pharmacy-address" class="box2"  name="pharmacy_address" required><br>
                            
                            <label for="pharmacy-license">Pharmacy License Number:&nbsp &nbsp</label><br>
                            <input type="text" id="pharmacy-license" class="box2" name="pharmacy_license_no" required><br>

                            <label for="license">Pharmacist License:&nbsp &nbsp</label><br>
                            <input type="file" id="license" class="box2" name="license" accept=".pdf,.jpg,.jpeg,.png" required><br>

                            <label for="pharmacy-name"> Username:&nbsp &nbsp</label><br>
                            <input type="text" id="username" class="box2" name="user_name" required><br>

                            <label for="password">Password:&nbsp &nbsp</label><br>
                            <input type="password" id="password" class="box2" name="pass_word" required><br>

                            <!-- Your submit button -->
                            <input id="submitButton" type="submit" name="submit" class="btn" value="register">
                            <button type="reset" class="btn">Reset</button>
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