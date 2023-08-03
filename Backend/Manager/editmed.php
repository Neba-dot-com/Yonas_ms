 <?php
 include "../../connection.php";
 // Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {
    header("location: managerlog.php");
    exit();
}
$_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
// Rest of the code for the protected page

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");


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

    <title>Edit MED</title>
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

        .new hover{
            background-color: none;
        }

        .b{
            color: green;
        }

        .box2{

    width: 40%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 0.8rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
}
        
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
    max-height: 150px; /* Adjust this value to increase the image size */
    margin-right: 10px;
}

.image-container input[type="file"] {
    position: relative;
    width: auto;
    opacity: 1;
    pointer-events: auto;
    margin-left: 5px;
}

.b {
    background-color: #088178;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

  /* Add this CSS to align the alternative image containers side by side */
  .alternative-images-container {
    display: flex;
    gap: 10px; /* Adjust the gap value as needed to control the spacing between images */
    margin-top: 10px; /* Add some margin to separate the alternative images from the main image */
  }

  /* Add this CSS to style the alternative image containers */
  .alternative-image-container {
    width: 100px; /* Adjust the width as needed to control the size of the alternative images */
    height: 100px; /* Adjust the height as needed to control the size of the alternative images */
    overflow: hidden;
    position: relative;
  }

  /* Add this CSS to style the alternative images */
  .alternative-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* Add this CSS to style the alternative image file input */
  .alternative-image-container input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }
  .image-container input[type="file"]{
    opacity: 0;
    cursor: pointer;
  }
        /* CSS for the responsive layout */
        @media (max-width: 768px) {
            .image-container {
                flex-direction: column;
            }

            .image-container img {
                max-height: 100px;
                margin-right: 0;
                margin-bottom: 5px;
            }

            .image-container {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .image-container img {
                max-height: 80px;
            }
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
              <a href="managerlog.html">   <img src="manager.png" alt=""> </a>
           <a href="expired.html"> <div id="notificationButton">
                <button id="notificationIcon"><i class="fas fa-bell fa-2x"></i></button> <a>
                <span id="notificationCount">0</span>
            </div>
        </div>
            



        </div>
        <!-- SideBar -->
        <?php include 'sidebar.php';
        
        ?>
 <div class="MainChartM">

                <div class="ChartM">
 
                    <h1>EDIT MED</h1>  <br>

                    <form action="process_guide.php" method="POST" enctype="multipart/form-data">  <br>
                    <?php
                                      $id=$_GET['id'];
                                      $sql="SELECT * from mdguide where id =$id";
                                      $res = $conn->query($sql);
                          
                                      if($result = mysqli_fetch_array($res)){
                                          
                                              $id=$result['id'];
                                          $title = $result['Title'];
                                          $generic_name = $result['generic_name'];
                                          $drug_class = $result['drug_class'];
                                          $dosage_forms=$result['dosage_forms'];
                                          $price = $result['price'];
                                          $description = $result['des_cription'];
                                          $before_taking = $result['before_taking'];
                                          $how_to_take = $result['how_to_take'];
                                          $miss_dose = $result['miss_dose']; // Corrected name
                                          $over_dose = $result['over_dose'];
                                          $side_effects = $result['side_effects'];
                                          
                                          $main_image_name = $result['img1'];
                                          $image1_name = $result['img2'];
                                          $image2_name = $result['img3'];
                                          $image3_name =$result['img4'];
                                      


                                echo "
                                
                                <label>Title:&nbsp &nbsp</label>
                                <input type='text' name='title' value=$title class='box2'><br>
                                <label>Generic Name:&nbsp &nbsp</label>
                                <input  type='text' class='box2' name='generic_name' value=$generic_name><br>
                                 
                                <label>Drug class:&nbsp &nbsp</label>
                                <input  type='text' class='box2' name='drug_class' value=$drug_class><br>
                                <label>Price:&nbsp &nbsp</label>
                                <input  type='number' class='box2' name='price' value=$price><br>
                                <label>Dosage_forms:&nbsp &nbsp</label>
                                <textarea  cols='16'  rows='8'  name='dosage_forms' class='box2' >$dosage_forms</textarea <br>

                                <label>Description:&nbsp &nbsp</label>
                                <textarea  cols='16'  rows='8'  class='box2'name='description'>$description</textarea> <br>
    
                                <label>Before taking the medicine: &nbsp &nbsp</label>
                                <textarea  cols='16'  rows='8' class='box2' name='before_taking' >$before_taking</textarea> <br>
    
                                <label>How to take:&nbsp &nbsp</label>
                                <textarea  cols='16'  rows='8'  class='box2' name='how_to_take' >$how_to_take</textarea> <br>
    
                                <label>What happens if miss dose:&nbsp &nbsp</label>
                                <textarea  cols='16'  rows='8'  class='box2' name='miss_dose'>$miss_dose </textarea> <br>
    
                                <label>What happens if over dose:&nbsp &nbsp</label>
                                <textarea  cols='16'  rows='8'  class='box2' name='over_dose'>$over_dose</textarea> <br>
    
                                <label>Side effects:&nbsp &nbsp</label>
                                <textarea  cols='16'  rows='8'  class='box2' name='side_effects'>$side_effects </textarea> <br>
    
                                 <br>
 
                                 <div class='form-group'>
                                 <label>Main:&nbsp &nbsp</label>
                                 <div class='image-container'>
                                     <img id='main_image' src='../../images/$main_image_name' alt=''>
                                     <input type='file' id='image' name='main_image' accept='image/*' style='border: none;' onchange='mainFile()'>
                                     <input type='hidden' name='existing_image' value='$main_image_name'> <!-- Add this hidden input field -->
                                 </div>
                             </div>
 
 
                             <div class='alternative-images-container'>
                                 <div class='form-group'>
                                     <label>  Alt1_img:</label>
                                     <div class='alternative-image-container'>
                                         <img id='previewImage1' src='../../images/$image1_name' alt=''>
                                         <input type='file' id='image1' name='image1' accept='image/*' style='border: none;' onchange='previewFile(1)'>
                                         <input type='hidden' name='existing_image1' value='$image1_name'> <!-- Add this hidden input field -->
                                     </div>
                                 </div>
 
                                 <div class='form-group'>
                                     <label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Alt2_img:</label>
                                     <div class='alternative-image-container'>
                                         <img id='previewImage2' src='../../images/$image2_name' alt=''>
                                         <input type='file' id='image2' name='image2' accept='image/*' style='border: none;' onchange='previewFile(2)'>
                                         <input type='hidden' name='existing_image2' value='$image2_name'> <!-- Add this hidden input field -->
                                     </div>
                                 </div>
 
                                 <div class='form-group'>
                                  <label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Alt23_img:</label>
                                     <div class='alternative-image-container'>
                                         <img id='previewImage3' src='../../images/$image3_name' alt=''>
                                         <input type='file' id='image3' name='image3' accept='image/*' style='border: none;' onchange='previewFile(3)'>
                                         <input type='hidden' name='existing_image3' value='$image3_name'> <!-- Add this hidden input field -->
                                     </div>
                                 </div>
                             </div>
                             <br> <br>
                             <input type='hidden' name='id' value ='$id' class='box2'>
                             <input type='hidden' name='url' value ='$id' class='box2'>
                             <div> &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp 
                             &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                              &nbsp&nbsp &nbsp&nbsp &nbsp <input type='submit' name='save' value='Save' class='b'>

                               &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                               <input type='button' value='Cancel' class='b' onclick='goBack()'>
                               </div>
                                ";
                                      
                                        }                    
                    
                    


                    ?>      
                    

                        </form>
                    
                
                        <script>
                    function goBack() {
                    // Navigate back to the previous page
                    window.history.back();
                    }
                    </script>

                                <script>
                    function mainFile() {
                        const preview = document.getElementById('main_image');
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
                <script>
        function previewFile(imageNumber) {
            const preview = document.getElementById(`previewImage${imageNumber}`);
            const fileInput = document.getElementById(`image${imageNumber}`);
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