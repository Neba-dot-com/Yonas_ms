


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
/* Add this CSS to align the form elements properly */
/* Add this CSS to align the form elements properly */
/* Add this CSS to use CSS Grid layout for the form */
/* Add this CSS to align the form elements properly */
/* Add this CSS to align the form elements properly */
/* Add this CSS to align the form elements properly */
form {
    display: flex;
    flex-direction: column;
}

.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.form-group label {
    width: 150px;
}

.image-container {
    position: relative;
    display: flex;
    align-items: center;
    height: 200px; /* Set a fixed height for the image container */
    overflow: hidden; /* Hide any overflow if the image is larger than the container */
}

.image-container img {
    max-height: 350px; /* Adjust this value to increase the image size */
    margin-right: 10px;
}

.image-container input[type="file"] {
    position: relative;
    width: auto;
    pointer-events: auto;
    margin-left: 5px;
    opacity: 0;
    cursor: pointer;
}


  </style>

</head>

<body>

    <!--  -->
    <div class="container">

        <!-- TopBar/Navbar -->
        <?php
        

        // Check if the user is logged in

        
        // Rest of the code for the protected page
        
        // Prevent caching

        include 'topbar.php';

       
        if (!isset($_SESSION['manager_user'])) {
        
            header("location:managerlog.php");
            exit();
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
                <form method="POST" action="process_edit_category.php" enctype="multipart/form-data"> <h1>EDIT CATEGORY</h1> <br>
                <?php
                $query = $_GET['category'];
                $sql = "SELECT * FROM category where category='$query'";
                $res = $conn->query($sql);
                
                
                 
                    $result = mysqli_fetch_array($res) ;
                        $id = $result['id'];
                        $category = $result['category'];
                        $image = $result['image'];
                        $description = $result['description'];
                        echo "
                        
                        <div class='form-group'>
                            <label>Name:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
                            <input type='text' name='name' value ='$category' class='box2'>
                        </div>
                        <div class='form-group'>
                            <label>Description:&nbsp &nbsp</label>
                            <textarea cols='16' name='detail_info' rows='8' class='box2' required>$description</textarea>
                        </div>
                        <div class='form-group'>
                        <label>Image:&nbsp &nbsp</label>
                        <div class='image-container'>
                            <img id='previewImage' src='../../images/$image' alt=''>
                            <input type='file' id='image' name='image1' accept='image/*' style='border: none;' onchange='previewFile()'>
                            <input type='hidden' name='existing_image' value='$image'> <!-- Add this hidden input field -->
                        </div>
                    </div>
                    
                        <br>
                        <div>
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <i class='fas fa-save'></i>   <input type='submit' name='save' value='Save'>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input type='reset' name='value='Reset'>
                        </div>
                        <input type='hidden' name='id' value ='$id' class='box2'>
                        ";
                    
        
                    
                
                ?>

                        </form>
                        <script>
    function previewFile() {
        const preview = document.getElementById('previewImage');
        const fileInput = document.getElementById('image');
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
                    
                </div>



            </div>



        </div>

    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>