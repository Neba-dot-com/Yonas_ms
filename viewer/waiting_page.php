<?php
session_start();
if(!isset($_SESSION['waiting_user'])){
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Waiting Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    body {
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.container {
  text-align: center;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

  </style>
</head>
<body>
  <div class="container">
    <h1>Thank you for your application! <?php if(isset($_SESSION['waiting_user'])){echo $_SESSION['waiting_user'];} ?></h1>
    <p>Your application is currently being processed for approval.</p>
    <p>Please wait while we verify your information.</p>
  </div>
  <script src="script.js"></script>
</body>
</html>
