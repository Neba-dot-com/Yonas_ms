<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Stylesheet Link -->
     <link rel="stylesheet" type="text/css" href="cs/style.css">
     <link rel="stylesheet" type="text/css" href="style.css">
     <title>Yonas Medical Store Viewer Home Page</title>

<style type="text/css">
label{
            font-size: 15px;
         }

#blog {
  padding: 100px 150px 0 100px;
}
.blog-img{
    justify-content: space-between;
    
}
.blog-img img{
    padding-bottom:50px;
}
     </style>
</head>

<body>
            <!-- This is where Header Starts -->

	<header class="header1">
		  <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Yonas <b> M S </b> </a>

        <nav class="navbar">
            <a href="home.php" class="active">home</a>
            <a href="Vabout.php">about us</a>
            <a href="Vcontact.php">contact us</a>
            <a href="#review">review</a>
            <a href="login.php">Login</a>
       
	</header>


                <br> <br> <br> 
                <?php
            include "../connection.php";
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
            echo"
            <section id='blog'>
     <div class='blog-box'>
        <div class='blog-img'>
            <img src='../images/$main_image_name' alt='no image '>
        </div>

         <div class='blog-details'>

             <h4>'$title'</h4> <br>
             <label><b>$generic_name:&nbsp &nbsp</b></label>
             <br> <br>
             <label><b>Drug class:&nbsp &nbsp</b></label>
             <label>$drug_class</label> <br> <br>
             <label><b>Dosage forms:&nbsp &nbsp</b></label>
             <label>$dosage_forms</label><br> <br>
</section>

            ";

            echo "
            <section id='blog'>
             <label><b>Description:&nbsp &nbsp</b></label>
             <label>$description</label><br> <br>
             <label><b>Before taking this medicine:&nbsp &nbsp</b></label>
             <label>$before_taking</label><br> <br>
             <label><b>How to take:&nbsp &nbsp</b></label>
             <label>$how_to_take.</label><br> <br>
</section>";
echo "
<section id='blog'>
  <div class='blog-img'>
            <img src='../images/$image1_name' alt='no image '>
            <img src='../images/$image2_name' alt='no image '>
            <img src='../images/$image3_name' alt='no image '>
  </div>

</section>
";

echo "

<section id='blog'>
             <label><b>What happens if miss dose:&nbsp &nbsp</b></label>
             <label>$miss_dose</label><br> <br>
             <label><b>What happens if over dose:&nbsp &nbsp</b></label>
             <label>$over_dose</label><br> <br>
             <label><b>Side effects:&nbsp &nbsp</b></label>
             <label>$side_effects;</label><br>
         </div>
     </div>
 </section>
";
        }
            ?>



<br> <br><br><br> <br><br><br> <br><br>



</body>
</html>