<?php

include '../../connection.php';

// Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {
    header("location: managerlog.php");
    exit();
}

// Rest of the code for the protected page

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");

if (isset($_POST['save'])) {
    // Collect the image files from the form
    $main_image = $_FILES['main_image']['name'];
    $alt_image1 = $_FILES['alt_image1']['name'];
    $alt_image2 = $_FILES['alt_image2']['name'];
    $alt_image3 = $_FILES['alt_image3']['name'];

    // Move the images to the designated folder (if selected)
    



    if ($main_image) {
         move_uploaded_file($_FILES["main_image"]["tmp_name"],"../../images/".$_FILES["main_image"]["name"]);
    }

    if ($alt_image1) {
        
        move_uploaded_file($_FILES["alt_image1"]["tmp_name"],"../../images/".$_FILES["alt_image1"]["name"]);
    }

    if ($alt_image2) {
        move_uploaded_file($_FILES["alt_image2"]["tmp_name"],"../../images/".$_FILES["alt_image2"]["name"]);
    }

    if ($alt_image3) {
        move_uploaded_file($_FILES["alt_image3"]["tmp_name"],"../../images/".$_FILES["alt_image3"]["name"]);
    }


    $title = $_POST['title'];
    $generic_name = $_POST['generic_name'];
    $drug_class = $_POST['drug_class'];
    $dosage_forms=$_POST['dosage_forms'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $before_taking = $_POST['before_taking'];
    $how_to_take = $_POST['how_to_take'];
    $miss_dose = $_POST['miss_dose']; // Corrected name
    $over_dose = $_POST['over_dose'];
    $side_effects = $_POST['side_effects'];
    

    // Prepare the image file names (if selected)
    $main_image_name = $main_image ? basename($_FILES['main_image']['name']) : '';
    $image1_name = $alt_image1 ? basename($_FILES['alt_image1']['name']) : '';
    $image2_name = $alt_image2 ? basename($_FILES['alt_image2']['name']) : '';
    $image3_name = $alt_image3 ? basename($_FILES['alt_image3']['name']) : '';

 




// Use prepared statements with parameter binding
$stmt = $conn->prepare("INSERT INTO mdguide (Title, generic_name, drug_class, dosage_forms, price, des_cription, before_taking, how_to_take, miss_dose, over_dose, side_effects, img1, img2, img3, img4)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind the parameters to the prepared statement
$stmt->bind_param("ssssdssssssssss", $title, $generic_name, $drug_class, $dosage_forms, $price, $description, $before_taking, $how_to_take, $miss_dose, $over_dose, $side_effects, $main_image_name, $image1_name, $image2_name, $image3_name);


if ($stmt->execute()) {

   
        $success_message = "New Guide for product ". "<br> added successfully!";
        // or redirect to a success page
        // header("Location: success_page.php");

    }
 else {
    $error_message = "Error: " . $sql . "<br>" . $conn->error;
    // or redirect to an error page
    // header("Location: error_page.php");
    // exit();
}

$conn->close();

  
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

    <title>Add MED</title>
       <style type="text/css">
        .new hover{
            background-color: none;
        }
    </style>
    
    <style>
:root{
    --green:#088178;
    --black:#444;
    --light-color:#777;
    --box-shadow:.5rem .5rem 0 rgba(22, 160, 133, .2);
    --text-shadow:.4rem .4rem 0 rgba(0, 0, 0, .2);
    --border:.1rem solid var(--green);
}
    form{
    flex:1 1 35rem;
    background: #fff;
    border:var(--border);
    box-shadow: var(--box-shadow);
    text-align: left;
    padding: 2rem;
    border-radius: .5rem;
}
form .box2{
    width: 40%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 0.8rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
    border-top: none;
    border-right: none;
    border-left: none;
}

  </style>
  <style>
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

    <?php
            
            if (!isset($_SESSION['manager_user'])) {
                header("location:log.php");
                exit();
            }
            
            // Count the number of expired items
            $sqlExpiredCount = "SELECT COUNT(*) AS expired_count FROM items WHERE EXPIRE_DATE <= CURDATE()";
            $resExpiredCount = $conn->query($sqlExpiredCount);
            $expiredCount = 0;
            if ($resExpiredCount->num_rows > 0) {
                $expiredRow = $resExpiredCount->fetch_assoc();
                $expiredCount = $expiredRow['expired_count'];
            }
            
            // Rest of the code for the protected page
            
            // ... (Other code)
            
            // Display the notification icon with the expired item count
            echo "
            <div class='TopBar'>
            <div class='logo'>
                <h1>Yonas <span style='color: white;'><b>M S</b> </span></h1>
            </div>
            
            <div class='Search'>
                <input type='text' placeholder='Search Here' name='search'>
                <label for='search'><i class='fas fa-search'></i></label>
            </div>
            
            <a href='expired.php'>
            <div class='user'>
                <img src='manager.png' alt=''>
                <div id='notificationButton'>
                    <button id='notificationIcon'><i class='fas fa-bell fa-2x'></i></button>
                    <span id='notificationCount'>$expiredCount</span>
                </div>
            </div>
            </a>
            </div>";
            ?>
            
            
            ?>
        <!-- SideBar -->
<?php include "sidebar.php"?>
 <div class="MainChartM">

                <div class="ChartM">
                <?php if (isset($success_message)): ?>
        <div class="notification-container success">
            <?php echo $success_message; ?>
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.notification-container').style.transform = 'translateY(-50%) translateX(100%)';
            }, 3000); // 3000 milliseconds (3 seconds)
        </script>
    <?php elseif (isset($error_message)): ?>
        <div class="notification-container error">
            <?php echo $error_message; ?>
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.notification-container').style.transform = 'translateY(-50%) translateX(100%)';
            }, 3000); // 3000 milliseconds (3 seconds)
        </script>
    <?php endif; ?>
                    <h1>ADD SAMPLE MED</h1>  <br>
                    
                        <form action="addmed.php" method="POST" enctype="multipart/form-data">  <br>
                            <label>Title:&nbsp &nbsp</label>
                            <input type="text" name="title" class="box2"><br>
                            <label>Generic Name:&nbsp &nbsp</label>
                            <input  type="text" class="box2" name="generic_name"><br>
                             
                            <label>Drug class:&nbsp &nbsp</label>
                            <input  type="text" class="box2" name="drug_class"><br>
                            <label>Dosage_forms:&nbsp &nbsp</label>
                            <input type="text" name="dosage_forms" class="box2"><br>
                            <label>Price:&nbsp &nbsp</label>
                            <input  type="number" class="box2" name="price"><br>
                            <label>Description:&nbsp &nbsp</label>
                            <textarea class="box2"name="description"></textarea> <br>

                            <label>Before taking the medicine: &nbsp &nbsp</label>
                            <textarea class="box2" name="before_taking" ></textarea> <br>

                            <label>How to take:&nbsp &nbsp</label>
                            <textarea class="box2" name="how_to_take" ></textarea> <br>

                            <label>What happens if miss dose:&nbsp &nbsp</label>
                            <textarea class="box2" name="miss_dose"></textarea> <br>

                            <label>What happens if over dose:&nbsp &nbsp</label>
                            <textarea class="box2" name="over_dose"></textarea> <br>

                            <label>Side effects:&nbsp &nbsp</label>
                            <textarea class="box2" name="side_effects"></textarea> <br>

                             <br>
                             <label for="main_image">Main Image:</label>
                            <input type="file" id="main_image" name="main_image" accept="image/*" required style="border: none;">
                            <br> <br> <br>
                            <label for="alt_image1">Alternative Image 1:</label>
                            <input type="file" id="alt_image1" name="alt_image1" accept="image/*" required style="border: none;">
                            <br><br> <br>
                            <label for="alt_image2">Alternative Image 2:</label>
                            <input type="file" id="alt_image2" name="alt_image2" accept="image/*" required style="border: none;">
                            <br><br> <br>
                            <label for="alt_image3">Alternative Image 3:</label>
                            <input type="file" id="alt_image3" name="alt_image3" accept="image/*" required style="border: none;"> 
                             <br> <br> <br> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                         <i class="fas fa-save"></i>   <input type="submit" name="save" value="SAVE">  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input type="button" name="" value="CANCEL">
                        </form>
                

        </div>  

    </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>