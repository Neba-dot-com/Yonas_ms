


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
    text-align: left;
    padding: 2rem;
    border-radius: .5rem;
}
form .box2{
    width: 60%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 0.8rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
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
        include "../../connection.php";
        $page ='Dashboard';
        // Check if the user is logged in
        if (!isset($_SESSION['manager_user'])) {
        
            header("location:../Admin/log.php");
            exit();
        }
        
        // Rest of the code for the protected page
        
        // Prevent caching

        include 'topbar.php';

        if (isset($_POST['save'])) {
            $image = $_FILES['image1']['name'];
        
            if (isset($_FILES['image1'])) {
                $image = $_FILES['image1']['name'];
        
                if ($image) {
                    // Only call move_uploaded_file once to move the uploaded file to the target directory
                    move_uploaded_file($_FILES["image1"]["tmp_name"], "../../images/" . $_FILES["image1"]["name"]);
                }
            } else {
                // Handle the case when no image is uploaded, you may set a default value or show an error message.
                $image = ''; // Set a default value or an empty string if no image is uploaded.
            }
        
            $name = $_POST['name'];
            $desc = $_POST['detail_info'];
            $cate_img = $image ? basename($_FILES['image1']['name']) : '';
        
            $sql = "INSERT INTO category (category,image,description) VALUES ('$name','$cate_img','$desc')";
        
            // Execute the SQL query
            $result = mysqli_query($conn, $sql);
        
            if ($result === TRUE) {
                // Set a session variable to indicate success
                $_SESSION['success_message'] = "New Category" . "<br> added successfully!";
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


    </div>
        <!-- SideBar -->
        <?php 
        
        include "sidebar.php"
        ?>
                    <div class="MainChartM">
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
                <div class="ChartM">
                <form method="post" action="newcategory.php" enctype="multipart/form-data"> <h1>ADD NEW CATEGORY</h1> <br>
                            <label>Name:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
                            <input type="text" name="name" class="box2"> <br> <br>
                            <label>Description:&nbsp &nbsp</label>
                            <textarea cols="16" name="detail_info" rows="8" class="box2" required></textarea> <br> <br>
                            <label>Image:&nbsp &nbsp</label>
                            <input type="file" id="image" name="image1" accept="image/*" required style="border: none;">



                             <br> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
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