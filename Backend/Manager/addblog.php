 <?php
 include "../../connection.php";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title=$_POST['title'];
    $par1=$_POST['para1'];
    $par2=$_POST['para2'];
    $par3=$_POST['para3'];

    $main_image = $_FILES['main_image']['name'];

    // Move the images to the designated folder (if selected)

    if ($main_image) {
        move_uploaded_file($_FILES["main_image"]["tmp_name"],"../../images/".$_FILES["main_image"]["name"]);
   }

    $main_image_name = $main_image ? basename($_FILES['main_image']['name']) : '';

    $sql = "INSERT INTO blog(Title,img,para1,para2,para3) VALUES('$title','$main_image_name','$par1','$par2','$par3')";
    if ($conn->query($sql) === TRUE){
        header("Location: blog.php");
    }


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

    <title>Add Blog</title>
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
    width: 60%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 0.8rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;

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
        <?php include "sidebar.php";?>
 <div class="MainChartM">

                <div class="ChartM">
 
                    <h1>ADD BLOG</h1>  <br>
                    
                        <form action="addblog.php" method="POST" enctype="multipart/form-data">  
                            
                        <br>
                            <label>Title:&nbsp &nbsp</label>
                            <input type="text" name="title" class="box2"> <br> <br>

                       <h4 align="center"> Detail Information</h4>
                             <br>
                             <label for ='para1'>First Paragraph</label>
                             <textarea cols="24" id ="para1" name="para1" rows="8" class="box2" required></textarea>
                             <br><br>
                             <label>Second Paragraph</label>
                             <textarea cols="24" name="para2" rows="8" class="box2" ></textarea><br> <br>
                             <br>
                             <label>Third Paragraph</label>
                             <textarea cols="24" name="para3" rows="8" class="box2" ></textarea> <br> <br>
                            <label>Image</label>
                            <input type="file" name="main_image" accept="image/*" required class="box2">
                             <br> <br> <br> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                         <i class="fas fa-save"></i>   <input type="submit" name="submit" value="Post">  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input type="reset" name="" value="Reset">
                        </form>
                    
                

        </div>  

    </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>