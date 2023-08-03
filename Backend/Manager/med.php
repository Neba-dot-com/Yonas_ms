<?php
include "../../connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['action']) && isset($_POST['id'])) {
      $action = $_POST['action'];
      $id = $_POST['id'];

      if ($action === 'decline') {
          $sql = "DELETE FROM mgsample WHERE ID = $id";

  
      // Execute the SQL query
      $result = mysqli_query($conn, $sql);
  
      if ($result === TRUE) {
          // Set a session variable to indicate success
          $_SESSION['success_message'] = "One Med Guide" . "<br> Removed successfully!";
      } else {
          $error_message = "Error: " . $sql . "<br>" . $conn->error;
      }
  
      
  
      // Check if the success_message session variable is set
      if (isset($_SESSION['success_message'])) {
          $success_message = $_SESSION['success_message'];
  
          // Clear the session variable to prevent reappearing after refreshing
          unset($_SESSION['success_message']);
      }
}}
}

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

    <title>Med Guide</title>
    <style type="text/css">
        .new hover{
            background-color: none;
        }
         .new hover{
            background-color: none;
        }

        .Card:hover {
  background:#088178;
  color: #000;
  cursor: pointer;
}
#blog {
  padding: 150px 150px 0 150px;
}

#blog .blog-box {
  display: flex;
  align-items: center;
  width: 100%;
  position: relative;
  padding-bottom: 100px;
}

#blog img {
  width: 45%;
  height: 200px;
  object-fit: fit;
}

#blog .blog-img{
  width: 50%;
  margin-right: 40px;
}

#blog .blog-details {
  width: 50%;
}

#blog .blog-details a{
  text-decoration: none;
  font-size: 11px;
  color: #000;
  font-weight: 700;
  position: relative;
  transition: 0.3s;
}

#blog .blog-details a::after{
  content: "";
  width: 50px;
  height: 1px;
  background-color: #000;
  position: absolute;
  top: 4px;
  right: -60px;
}

#blog .blog-details a:hover{
  color: #088178;
}

#blog .blog-details a:hover::after{
  background-color:#088178 ;
}

#blog .blog-box h1{
  position: absolute;
  top: -40px;
  left: 0;
  font-size: 70px;
  font-weight: 700;
  color: #c9cbce;
  z-index: -9;
}
.edit{
  display:flex;
}
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
                    <?php include "topbar.php"?>
      </div>
        <!-- SideBar -->
<?php

include "sidebar.php"
?>
<div class="Main1">
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
                    <div><br> <br> 
                     <div class="new"> <a href="addmedsample.php"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp   <button class="num" style="  border-radius: 3px; border-color: blue; border: 1;"><span style="color:blue; font-size: 23px; "><i class="fas fa-plus"></i> <br>ADD NEW SAMPLE  </span> </button></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp  

                <a href="medguide.php"><button class="num" style="  border-radius: 3px; border-color: blue; border: 1;"><span style="color:blue; font-size: 23px; "><i class="fas fa-plus"></i> <br>MANAGE MED GUIDE </span> </button></div> </a>  
                    </div>  


<section id="blog">
<?php
                $sql = "SELECT * from mgsample  ORDER BY id DESC ";
      
                $run = mysqli_query($conn,$sql);
    
                if($run->num_rows > 0){
    
                    while($row=$run->fetch_assoc()){
                        $id=$row['id'];
                        $img=$row['img'];
                        $title=$row['Title'];
                        $description=$row['description'];
                    
                        echo "
                        <div class='blog-box'>
                        <div class='blog-img'>
                            <img src='../../images/$img' alt='no image '>
                        </div>
                         <div class='blog-details'>
                             <h4>'$title' </h4>
                             <p>$description <br> <br>
                        
                             </p>
                          <div class='edit'>
                          
                          <a href='editsample.php?id=$id'><button style='align-self: center; color: blue; font-size:15px; background-color:#fff;'>EDIT</button></a>
                             
                          &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                          <form action='med.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to Remove this sample med guide?')\">
                          <input type='hidden' name='id' value='$id'>
                          <button type='submit' name='action' value='decline' style='background: none; border: none;' >
                              <i class='fas fa-user-times' style='color: red;'></i> Remove
                          </button>
                      </form>
                          </div>
                         </div>
                
                        </div>
                        ";
                    
                    }}
    ?>
                         <script>
                            function confirmAction(message) {
                                return confirm(message);
                            }
                        </script>
  <div class="blog-box">



        </div>
 </section>
</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

                </html>