<?php
include "../connection.php";

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
VALUES ('$firstname', '$lastname', '$email', '$phone_num', '$pharmacy_name', '$pharmacy_address', '$pharmacy_license_no', '$license_img', '$username', '$password', 'waiting', '$current_date')";


if($conn->query($sql)===TRUE){
    header("Location:login.php ");
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>



<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <!-- Stylesheet Link -->
    <link rel="stylesheet" type="text/css" href="cs/style.css">
    <title>Yonas Medical Store </title>
    





    <script>
  const form = document.forms.login_form;
  const validationMessageDiv = document.getElementById('validationMessage');
  const firstNameInput = form.first_name;

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    // Your validation logic here
    const firstNameValue = firstNameInput.value.trim();
    if (firstNameValue === '') {
      displayValidationMessage('First name cannot be empty.');
    } else if (!/^[a-zA-Z]+$/.test(firstNameValue)) {
      displayValidationMessage('First name should contain only letters.');
    } else {
      // If all validations pass, submit the form
      form.submit();
    }
  });

  function displayValidationMessage(message) {
    validationMessageDiv.textContent = message;
    validationMessageDiv.style.display = 'block';
    setTimeout(function () {
      validationMessageDiv.textContent = '';
      validationMessageDiv.style.display = 'none';
    }, 5000); // 5000 milliseconds (5 seconds)
  }
</script>
</head>
<body style="padding:6rem 5%;">

        <!-- This is where Header Starts -->
        <header class="header1">
<a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Yonas <b> M S </b> </a>

<nav class="navbar">
  <a href="home.php">home</a>
  <a href="vabout.php">about us</a>
  <a href="vcontact.php">contact us</a>
  <a href="login.php">Login</a>    
</header>

        <!-- This is where Header Ends --> 

        <!-- This is where Registration Form Starts -->

<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="images/login.svg" alt="">
        </div>
    <form name="login_form" method="POST" action="register.php"> 
        <h1>Welcome to Yonas Medical Store Please fill the Folowing form to Register!</h1> <br>
            <!-- Validation message div -->
    <div id="validationMessage" style="display: none; color: red; margin-bottom: 10px;"></div>

     
        <label for="fullname">First Name:</label>
              <input type="text" id="fullname" class="box" name="first_name" required>

              <label for="fullname">Last Name:</label>
              <input type="text" id="fullname" class="box" name="last_name" required>
              
              <label for="email">Email:</label>
              <input type="email" id="email" class="box" name="email" required>
              
              <label for="phone-num">Phone  Number:</label>
              <input type="text" id="phone-num" class="box" name="phone_num" required>

              <label for="pharmacy-name">Pharmacy Name:</label>
              <input type="text" id="pharmacy-name" class="box" name="pharmacy_name" required>
              
              <label for="pharmacy-address">Pharmacy Address:</label>
              <input type="text" id="pharmacy-address" class="box"  name="pharmacy_address" required>
              
              <label for="pharmacy-license">Pharmacy License Number:</label>
              <input type="text" id="pharmacy-license" class="box" name="pharmacy_license_no" required>

               <label for="license">Pharmacist License:</label>
               <input type="file" id="license" class="box" name="license" accept=".pdf,.jpg,.jpeg,.png" required>

               <label for="pharmacy-name">Choose Username:</label>
              <input type="text" id="username" class="box" name="user_name" required>

              <label for="password">Password:</label>
              <input type="password" id="password" class="box" name="pass_word" required>

              <strong> <label style="font-size:10px">Terms and Condition</label></strong><br> <br>
              <input id="agreeCheckbox" style="transform: scale(1.5);" type="checkbox" name="" required>
            <span style="color:darkblue; font-size:15px">By registering, you agree to provide accurate information and maintain the confidentiality of your account. Unauthorized activities are prohibited, and we may suspend your account for violations. Thank you.</span><br>

            <!-- Your submit button -->
            <input id="submitButton" type="submit" name="submit" class="btn" value="request to register" disabled>
            <button type="reset" class="btn">Reset</button>


    </form>
    <script>
  const agreeCheckbox = document.getElementById('agreeCheckbox');
  const submitButton = document.getElementById('submitButton');

  agreeCheckbox.addEventListener('change', function () {
    if (this.checked) {
      submitButton.disabled = false;
      submitButton.classList.remove('blur');
    } else {
      submitButton.disabled = true;
      submitButton.classList.add('blur');
    }
  });

  // Check initial state on page load
  if (!agreeCheckbox.checked) {
    submitButton.disabled = true;
    submitButton.classList.add('blur');
  }
</script>

  </div>
</section>
            <!-- This is where Registration Form Ends -->

            <!-- This is where Footer Starts --> 
<section class="footer">
    <div class="credit"> created by <span>FM.NET SQUAD 2015 E.C</span> | all rights reserved </div>
</section>
</body>
</html>