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

    <title>Add SAMPLE MED</title>
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

</head>
<body>

    <!--  -->
    <div class="container">
    <?php
 include "../../connection.php";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title=$_POST['title'];
    $description=$_POST['description'];


    $main_image = $_FILES['main_image']['name'];

    // Move the images to the designated folder (if selected)

    if ($main_image) {
        move_uploaded_file($_FILES["main_image"]["tmp_name"],"../../images/".$_FILES["main_image"]["name"]);
   }

    $main_image_name = $main_image ? basename($_FILES['main_image']['name']) : '';

    $sql = "INSERT INTO mgsample(Title,description,img) VALUES('$title','$description','$main_image_name')";
    if ($conn->query($sql) === TRUE){
        header("Location: med.php");
    }


 }


 ?>
 
        <!-- TopBar/Navbar -->
        <div class="TopBar">
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
<div class="SideBar">

            <ul>
                <li>
                    <a href="managerhome.html">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="all.html">
                        <i class="fas fa-eye"></i>
                        <div> View Available Items</div>
                    </a>
                </li>
      
                <li>
                    <a href="additem.html">
                        <i class="fas fa-plus"></i>
                        <div>Add New Item</div>
                    </a>
                </li>
                <li>
                    <a href="blog.html">
                        <i class="fas fa-blog"></i>
                        <div>Blog</div>
                    </a>
                </li> 
                <li>
                    <a href="report.html">
                        <i class="fas fa-flag"></i>
                        <div> Report</div>
                    </a>
                </li>
                <li>
                    <a href="transaction.html">
                        <i class="fas fa-exchange-alt"></i>
                        <div>Transaction</div>
                    </a>
                </li> 
                <li>
                    <a href="feed.html">
                        <i class="fas fa-comment "></i>
                        <div> Feedback <span id="notificationCountfeed"> NEW</span></div>
                    </a>
                </li>
               <li>
                    <a href="sales.html">
                        <i class="fas fa-dollar-sign"></i>
                        <div>Sales</div>
                    </a>
                </li> 

                <li>
                    <a href="rate.html">
                        <i class="fas fa-star"></i>
                        <div>Rating</div>
                    </a>
                </li> 

                <li>
                    <a href="med.html">
                        <i class="fas fa-book"></i>
                        <div>Med Guide</div>
                    </a>
                </li> 

            </ul>

</div>
 <div class="MainChartM">

                <div class="ChartM">
 
                    <h1>ADD SAMPLE MED</h1>  <br>
                    
                        <form action="addmedsample.php" method="POST" enctype="multipart/form-data">
                              <br>
                            <label>Title:&nbsp &nbsp</label>
                            <input type="text" name="title" class="box2"> <br> <br>
                            <label>Description:&nbsp &nbsp</label>
                            <textarea class="box2" name="description"></textarea> <br> <br>
                             
                             <br>
                            <label>Image</label>
                            <input type="file" name="main_image" accept="image/*" required class="box2">
                             <br> <br> <br> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                         <i class="fas fa-save"></i>   <input type="submit" name="submit" value="ADD">  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input type="button" name="" value="CANCEL">
                        </form>
                    
                

        </div>  

    </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>