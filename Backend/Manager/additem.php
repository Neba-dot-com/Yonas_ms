

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
}
form .box2{
    width: 60%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 1.0 rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
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

        <!-- TopBar/Navbar -->
        <?php
    include 'topbar.php';


// Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {
    header("location: manager.php");
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


    $name = $_POST['name'];
    $generic_name = $_POST['generic_name'];
    $brand_name = $_POST['brand_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $featured = $_POST['featured'];
    $new_arival = $_POST['new_arival'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier']; // Corrected name
    $exp_date = $_POST['exp_date'];
    $detail_info = $_POST['detail_info'];

    // Ensure featured and new_arivals are integers
$featured = (int)$featured;
$new_arival = (int)$new_arival;
    // Prepare the image file names (if selected)
    $main_image_name = $main_image ? basename($_FILES['main_image']['name']) : '';
    $image1_name = $alt_image1 ? basename($_FILES['alt_image1']['name']) : '';
    $image2_name = $alt_image2 ? basename($_FILES['alt_image2']['name']) : '';
    $image3_name = $alt_image3 ? basename($_FILES['alt_image3']['name']) : '';

 




    $sql = "INSERT INTO items (PRODUCT_NAME, GENERIC_NAME, BRAND_NAME, QUANTITY, PRICE, CATEGORY, SUPPLIER, FEATURED, NEW_ARIVALS, DETAIL_INFO, AVALIABLE, EXPIRE_DATE, image)
            VALUES ('$name', '$generic_name', '$brand_name', $quantity, $price, '$category', '$supplier', $featured,$new_arival,'$detail_info', 'avaliable', '$exp_date', '$main_image_name')";


if ($conn->query($sql) === TRUE) {
    // Second query to insert the product attributes
    $product_id = $conn->insert_id; // Get the auto-generated ID of the inserted product
    $sql2 = "INSERT INTO images (ID, image1, image2, image3)
    VALUES ($product_id, '$image1_name', '$image2_name', '$image3_name')";
    if ($conn->query($sql2) === TRUE) {
        $success_message = "New product and attributes added successfully!";
        // or redirect to a success page
        // header("Location: success_page.php");
        // exit();
    } else {
        $error_message = "Error: " . $sql2 . "<br>" . $conn->error;
        // or redirect to an error page
        // header("Location: error_page.php");
        // exit();
    }
} else {
    $error_message = "Error: " . $sql . "<br>" . $conn->error;
    // or redirect to an error page
    // header("Location: error_page.php");
    // exit();
}

$conn->close();

  
}

?>

    


    </div>
        <!-- SideBar -->
        <?php 
        
        include "sidebar.php"
        ?>
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


                <form action="additem.php" name="additem" method="POST" enctype="multipart/form-data"> <h1>ADD NEW ITEM</h1> <br>
                            <label>Name:&nbsp &nbsp</label> <br>
                            <input type="text" name="name" class="box2" required> <br> 
                            <label>Generic Name:&nbsp &nbsp</label> <br>
                            <input type="text" name="generic_name" class="box2" required> <br>
                            <label>Brand Name:&nbsp &nbsp</label> <br>
                            <input type="text" name="brand_name" class="box2" required> <br>
                            <label>Price:&nbsp &nbsp</label> <br>
                            <input type="number" name="price" class="box2" required> <br>
                            <label>Quantity:&nbsp &nbsp</label> <br>
                            <input type="number" name="quantity" class="box2" required> <br>
                            <label>Featured:&nbsp &nbsp</label> <br>
                            <select class="box2" name="featured" required>
                                <option value="0">False</option>
                                <option value="1">True</option>
                            </select>
                            <br>
                            <label>New Arival:&nbsp &nbsp</label> <br>
                            <select class="box2" name="new_arival" required>
                            <option value="0">False</option>
                             <option value="1">True</option>
                            </select> <br>
                            <label>Select Category:&nbsp &nbsp</label> <br>
                            <select class="box2" name="category" required>

                            <option selected disabled>Select Category</option>
                            <?php
                                        
                                        $sql = "SELECT * FROM category";
                                        $res = $conn->query($sql);
                                        
                                        
                                        if ($res->num_rows > 0) {
                                            while ($result = mysqli_fetch_array($res)) {
                                                $id = $result['id'];
                                                $category  = $result['category'];
                                                $image = $result['image'];
                                                $description = $result['description'];
                                            
                                            echo "<option>$category</option>";
                                            
                                            }}
                                        
                            
                            ?>
                                

                            </select> <br> 
                            <label>Suplier:&nbsp &nbsp</label> <br>
                            <input type="text" name="supplier" class="box2" required> <br> 
                            <label>Expired Date:&nbsp &nbsp</label> <br>
                            <input type="date" name="exp_date" class="box2" required> <br> <br> 
                            <label>Detail Product Information</label> <br>
                            <textarea cols="24" name="detail_info" rows="8" class="box2" required></textarea> <br> <br>
        
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
                            <br><br> <br>
                         <i class="fas fa-save"></i>   <input type="submit" name="save" value="Save">  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input type="reset" name="" value="Reset">
                        </form>
                    
                </div>



            </div>



        </div>

    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>