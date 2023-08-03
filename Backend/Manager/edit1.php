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
    /* The CSS code for your form should be placed below your existing CSS styles */

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
    height: 100px; /* Set a fixed height for the image container */
    overflow: hidden; /* Hide any overflow if the image is larger than the container */
}

.image-container img {
    max-height: 100px; /* Adjust this value to increase the image size */
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
                <img src="manager.png" alt="">
           <a href="expired.html"> <div id="notificationButton">
                <button id="notificationIcon"><i class="fas fa-bell fa-2x"></i></button> <a>
                <span id="notificationCount">0</span>
            </div>
        </div>
            



        </div>
        <!-- SideBar -->
        <?php include 'sidebar.php'?>

                    <div class="MainChartM">

                <div class="ChartM">
                             <h1>EDIT ITEM</h1> <br>
                             <label>Name:&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp</label>
                            <input type="text" name="" class="box2"> <br> <br>
                            <label>Price:&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp</label> 
                            <input type="number" name="" class="box2"><br> <br>

                            <label>Category:&nbsp &nbsp</label>
                            <input type="text" name="" class="box2"> </lable> <br> <br>
                            <label>Supplier:&nbsp &nbsp</label>
                            <input type="text" name="" class="box2"> <br> <br>

                            <label>Generic Name:&nbsp &nbsp</label>
                            <input type="text" name="" class="box2"> <br> <br> 
                             
                            <label>Brand Name:&nbsp &nbsp&nbsp &nbsp</label> 
                            <input type="text" name="" class="box2"> <br> <br>
                            <label>Expired Date:&nbsp &nbsp&nbsp</label>
                            <input type="date" name="" class="box2"> <br> <br>

                            
                             
                            
                            <label>Detail Informatio:&nbsp &nbsp</label>
                            <textarea class="box2"> </textarea><br> <br>
<!-- Your existing HTML code -->
<!-- ... -->

                        <div class='form-group'>
                            <label>Main:&nbsp &nbsp</label>
                            <div class='image-container'>
                                <img id='previewImage1' src='../../images/19.jpg' alt=''>
                                <input type='file' id='image1' name='image1' accept='image/*' style='border: none;' onchange='previewFile(1)'>
                                <input type='hidden' name='existing_image1' value='$image'> <!-- Add this hidden input field -->
                            </div>
                        </div>


                        <div class="alternative-images-container">
                            <div class='form-group'>
                                <label>Alt1_img:</label>
                                <div class='alternative-image-container'>
                                    <img id='previewImage1' src='../../images/19.jpg' alt=''>
                                    <input type='file' id='image1' name='image1' accept='image/*' style='border: none;' onchange='previewFile(1)'>
                                    <input type='hidden' name='existing_image1' value='$image'> <!-- Add this hidden input field -->
                                </div>
                            </div>

                            <div class='form-group'>
                                <label>Alt2_img:&nbsp &nbsp</label>
                                <div class='alternative-image-container'>
                                    <img id='previewImage2' src='../../images/s8d.jpg' alt=''>
                                    <input type='file' id='image2' name='image2' accept='image/*' style='border: none;' onchange='previewFile(2)'>
                                    <input type='hidden' name='existing_image2' value='$image'> <!-- Add this hidden input field -->
                                </div>
                            </div>

                            <div class='form-group'>
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <label>IAlt_img3:</label>
                                <div class='alternative-image-container'>
                                    <img id='previewImage3' src='../../images/18.jpg' alt=''>
                                    <input type='file' id='image3' name='image3' accept='image/*' style='border: none;' onchange='previewFile(3)'>
                                    <input type='hidden' name='existing_image3' value='$image'> <!-- Add this hidden input field -->
                                </div>
                            </div>
                        </div>

<!-- Your existing HTML code -->
<!-- ... -->


                            <br> <br>
                            &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp<input type="button" value="Save" class="b"> &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                            <input type="button" value="Cancel" class="b">
                       
                    
                </div>



            </div>



        </div>

    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>