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


        <?php
        
        include "topbar.php";
        

// Store the previous page URL in a session variable
$_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
if (!isset($_SESSION['manager_user'])) {
        
    header("location:managerlog.php");
    exit();
}
        ?>

        </div>
        <!-- SideBar -->
            <?php include "sidebar.php";?>
                    <div class="MainChartM">

                <div class="ChartM">
             <form method="POST" action="item_edit_proccess.php" enctype="multipart/form-data">
                             <h1>EDIT ITEM</h1> <br>
           
                            
                             <?php 
                             
                             $id=$_GET['id'];
                             $sql="SELECT * FROM items WHERE ID =$id";
                             $sql2="SELECT *FROM images WHERE ID=$id";
                             
                     
                             $res=mysqli_query($conn,$sql);
                             $res2=mysqli_query($conn,$sql2);
                             $result=mysqli_fetch_array($res);
                             $result2=mysqli_fetch_array($res2);
                                 $image1=$result2['image1'];
                                 $image2=$result2['image2'];
                                 $image3=$result2['image3'];
                            $id=$result['ID'];
                             $name=$result['PRODUCT_NAME'];
                             $generic_name=$result['GENERIC_NAME'];
                             $brand_name=$result['BRAND_NAME'];
                             $category=$result['CATEGORY'];
                             $quantity=$result['QUANTITY'];
                             $price=$result['PRICE'];
                             $detail=$result['DETAIL_INFO'];
                             $exp_date=$result['EXPIRE_DATE'];
                             $supplier=$result['SUPPLIER'];
                             $featured=$result['FEATURED'];
                             $newarivals=$result['NEW_ARIVALS'];
                             $image=$result['image'];

                             $sql3="SELECT * FROM category";
                             $res3=mysqli_query($conn,$sql3);
                             
                             
                             echo "
                             <label>Name:&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp</label>
                             <input type='text' name='name' class='box2' value='$name'> <br> <br>
                             <label>Generic Name:&nbsp &nbsp</label>
                             <input type='text' name='generic_name' value ='$generic_name' class='box2'> <br> <br> 
                             <label>Brand Name:&nbsp &nbsp&nbsp &nbsp</label> 
                             <input type='text' name='brand_name' value='$brand_name' class='box2'> <br> <br>
                             <label>Price:&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp</label> 
                             <input type='number' name='price' value='$price' class='box2'><br> <br>
                             <label>Quantity:&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp</label> 
                             <input type='number' name='quantity' value='$quantity' class='box2'><br> <br>
                                ";
                               
                                echo "<label>Category:&nbsp &nbsp</label>
                                <select class='box2' name='category' required>";
                          
                                while ($result3 = mysqli_fetch_array($res3)) {
                                    $cat = $result3['category'];
                                    $selected = ($cat === $category) ? 'selected' : ''; // Check if the current category matches the selected category
                                
                                    echo "<option value='$cat' $selected>$cat</option>";
                                }
                                
                                echo "</select>";
                                
                                echo "<label>Featured:&nbsp &nbsp</label>
                               
                                <select class='box2' name='featured' required>";
                          
                          $cat = $result['FEATURED']; // Assuming $result['FEATURE'] contains the correct value (0 or 1)
                          // Add debugging statements
                          echo "Value of \$cat: $cat<br>";
                          
                          $true = ($cat == 1) ? 'selected' : '';
                          $false = ($cat == 0) ? 'selected' : '';
                          
                          // Add debugging statements
                          echo "Value of \$true: $true<br>";
                          echo "Value of \$false: $false<br>";
                          echo "<option value='1' $true>True</option>";
                          echo "<option value='0' $false>False</option>";
                          echo "</select>";
                            
                          echo "<label>New Arival:&nbsp &nbsp</label>
                               
                          <select class='box2' name='new_arival' required>";
                    
                    $cat2 = $result['NEW_ARIVALS']; // Assuming $result['FEATURE'] contains the correct value (0 or 1)
                    // Add debugging statements
                    echo "Value of \$cat2: $cat2<br>";
                    
                    $tru = ($cat2 == 1) ? 'selected' : '';
                    $fals = ($cat2 == 0) ? 'selected' : '';
                    
                    // Add debugging statements
                    echo "Value of \$true: $tru<br>";
                    echo "Value of \$false: $fals<br>";
                    echo "<option value='1' $tru>True</option>";
                    echo "<option value='0' $fals>False</option>";
                    echo "</select>";
                        
                             echo "
                             
                             <label>Supplier:&nbsp &nbsp</label>
                             <input type='text' name='supplier' value=$supplier class='box2'> <br> <br>
 
                             <label>Expired Date:&nbsp &nbsp&nbsp</label>
                             <input type='date' name='exp_date' value =$exp_date class='box2'> <br> <br>
 
                             <label>Detail Informatio:&nbsp &nbsp</label>
                             <textarea cols='16' name='detail_info' rows='8' class='box2' required>$detail</textarea><br> <br>
 
                             <!-- Your existing HTML code -->
                             <!-- ... -->
 
                             <div class='form-group'>
                                 <label>Main:&nbsp &nbsp</label>
                                 <div class='image-container'>
                                     <img id='main_image' src='../../images/$image' alt=''>
                                     <input type='file' id='image' name='main_image' accept='image/*' style='border: none;' onchange='mainFile()'>
                                     <input type='hidden' name='existing_image' value='$image'> <!-- Add this hidden input field -->
                                 </div>
                             </div>
 
 
                             <div class='alternative-images-container'>
                                 <div class='form-group'>
                                     <label>  Alt1_img:</label>
                                     <div class='alternative-image-container'>
                                         <img id='previewImage1' src='../../images/$image1' alt=''>
                                         <input type='file' id='image1' name='image1' accept='image/*' style='border: none;' onchange='previewFile(1)'>
                                         <input type='hidden' name='existing_image1' value='$image1'> <!-- Add this hidden input field -->
                                     </div>
                                 </div>
 
                                 <div class='form-group'>
                                     <label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Alt2_img:</label>
                                     <div class='alternative-image-container'>
                                         <img id='previewImage2' src='../../images/$image2' alt=''>
                                         <input type='file' id='image2' name='image2' accept='image/*' style='border: none;' onchange='previewFile(2)'>
                                         <input type='hidden' name='existing_image2' value='$image2'> <!-- Add this hidden input field -->
                                     </div>
                                 </div>
 
                                 <div class='form-group'>
                                  <label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Alt23_img:</label>
                                     <div class='alternative-image-container'>
                                         <img id='previewImage3' src='../../images/$image3' alt=''>
                                         <input type='file' id='image3' name='image3' accept='image/*' style='border: none;' onchange='previewFile(3)'>
                                         <input type='hidden' name='existing_image3' value='$image3'> <!-- Add this hidden input field -->
                                     </div>
                                 </div>
                             </div>
                             <input type='hidden' name='id' value ='$id' class='box2'>
                             <input type='hidden' name='url' value ='$id' class='box2'>
                                                         <br> <br>
 
                                <div> &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp 
                                &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                                 &nbsp&nbsp &nbsp&nbsp &nbsp <input type='submit' name='save' value='Save' class='b'>

                                  &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                  <input type='button' value='Cancel' class='b' onclick='goBack()'>
                                  </div>
                             ";
                             
                             
                             
                             ?>
                            
                             </form>

                    
                </div>
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

    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>