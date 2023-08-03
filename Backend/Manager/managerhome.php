

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

</head>

<body>

    <!--  -->
         <div class="container">

        <!-- TopBar/Navbar -->
<?php include "topbar.php";
$page ='Dashboard';
// Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {

    header("location:managerlog.php");
    exit();
}
?>
        <!-- SideBar -->
        <?php 
        
        include "sidebar.php"
        ?>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
        <div class="Main1">

            <div class="MainCard1">
            <?php
$sql = "SELECT * FROM category ";
$res = $conn->query($sql);


if ($res->num_rows > 0) {
    while ($result = mysqli_fetch_array($res)) {
        $id = $result['id'];
        $category = $result['category'];
        $image = $result['image'];
        $description = $result['description'];

        $query_category = "SELECT COUNT(ID) AS number_of_category FROM items where CATEGORY ='$category'AND   EXPIRE_DATE > CURDATE()";
        $no_category_result = mysqli_query($conn, $query_category);
        $row_category = mysqli_fetch_assoc($no_category_result);
        $no_category = $row_category['number_of_category'];
        echo "
        <div class='Card' style=\"background-image: url('../../images/$image'); background-repeat: no-repeat; background-position: center; background-size: cover; color: #ffffff;\">
            <a href='category_desplay.php?category=$category'>
                <div class='content'>
                    <div class='icon'>
                        <!-- Add your icon content here -->
                    </div>
                    <div class='num'><span style='color: black;'>$category</span></div>
                    <div class='name'><span id='circle'>$no_category</span></div>
                </div>
            </a>
        </div>
        ";
    }
}
?>


                <div class="Card" style="background-image: url('images/all.webp');background-repeat: no-repeat; background-position: center; background-size: cover; scolor: #ffffff;">
                    <a href="category_desplay.php?category=All"> <div class="icon">
                         <div class="content">
                  
                    </div>
                   
                        <div class="num">All</div>
                        <?php
                        
                        $query_category = "SELECT COUNT(ID) AS number_of_category FROM items where  EXPIRE_DATE > CURDATE()";
                        $no_category_result = mysqli_query($conn, $query_category);
                        $row_category = mysqli_fetch_assoc($no_category_result);
                        $no_category = $row_category['number_of_category'];
                       echo "<div class='name'><span id='circle'>$no_category </span></div>";
                        ?>
                        
                    </div> </a>
                    
                </div> <br> <br> 


                    
                




            </div>
            <div>
            <div style="display: flex;">
    <div style="margin-right: 10px;">
        <a href="newcategory.php">
            <button class="num" style="border-radius: 3px; border-color: blue; border: 1;">
                <span style="color: blue; font-size: 23px;">
                    <i class="fas fa-plus"></i> <br>Add new Category
                </span>
            </button>
        </a>
    </div>

    <div>
        <a href="managecategory.php">
            <button class="num" style="border-radius: 3px;">
                <span style="color: blue; font-size: 23px;">
                    <i class="fas fa-gear"></i> <br>Manage Categories
                </span>
            </button>
        </a>
    </div>
</div>


    




    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>