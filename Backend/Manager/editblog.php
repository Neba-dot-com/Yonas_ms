<?php 
        if (!isset($_SESSION['manager_user'])) {
        
            header("location:managerlog.php");
            exit();
        }
$id=$_GET['id'];
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

.form-group label {
    width: 150px;
}

.image-container {
    position: relative;
    display: flex;
    align-items: center;
    height: 300px; /* Set a fixed height for the image container */
    overflow: hidden; /* Hide any overflow if the image is larger than the container */
}

.image-container img {
    max-height: 350px;
    max-width: 450px; /* Adjust this value to increase the image size */
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
        <div class="TopBar">
            <div class="logo">
                <h1>Yonas <span style="color: white;"><b>M S</b> </span></h1>
            </div>

            <div class="Search">
                <input type="text" placeholder="Search Here" name="search">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>

            <i class="fas fa-bell"></i>

        <div class="user">
                <img src="manager.png" alt="">
           <a href="expired.php"> <div id="notificationButton">
                <button id="notificationIcon"><i class="fas fa-bell fa-2x"></i></button> <a>
                <span id="notificationCount">0</span>
            </div>
        </div>
            



        </div>
        <!-- SideBar -->
        <?php include "sidebar.php";?>
 <div class="MainChartM">

                <div class="ChartM">
 
                    <h1>ADD BLOG</h1>  <br>
                    <?php
                    
                    $sql = "SELECT * from blog WHERE id=$id";
           
                    $run = mysqli_query($conn,$sql);
        
                    if($run->num_rows > 0){
        
                        while($row=$run->fetch_assoc()){
                            $id=$row['id'];
                            $img=$row['img'];
                            $title=$row['Title'];
                            $para1=$row['para1'];
                            $para2=$row['para2'];
                            $para3=$row['para3'];
                            $data = $row["para1"];
                        
                        echo " <form action='process_bog.php' method='POST' enctype='multipart/form-data'>  
                            
                        <br>
                            <label>Title:&nbsp &nbsp</label>
                            <input type='text' name='title' value ='$title' class='box2'> <br> <br>

                       <h4 align='center'> Detail Information</h4>
                             <br>
                             <label for ='para1'>First Paragraph</label>
                             <textarea cols='24' id ='para1' name='para1' rows='8' class='box2' required>$para1</textarea>
                             <br><br>
                             <label>Second Paragraph</label>
                             <textarea cols='24' name='para2' rows='8' class='box2' >$para2</textarea><br> <br>
                             <br>
                             <label>Third Paragraph</label>
                             <textarea cols='24' name='para3' rows='8' class='box2' >$para3</textarea> <br> <br>
                             <div class='form-group'>
                             <br> <br>
                             <label>Image:&nbsp &nbsp</label>
                             <div class='image-container'>
                                 <img id='previewImage' src='../../images/$img' alt=''>
                                 <input type='file' id='image' name='image1' accept='image/*' style='border: none;' onchange='previewFile()'>
                                 <input type='hidden' name='existing_image' value='$img'> <!-- Add this hidden input field -->
                             </div>
                         </div>
                             <br> <br> <br> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                         <i class='fas fa-save'></i>   <input type='submit' name='submit' value='Edit'>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input type='reset' name='' value='Reset'>
                            <input type='hidden' name='id' value='$id'>
                        </form>";
                        
                        }
                        } 
                    ?>
                       
                    
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>