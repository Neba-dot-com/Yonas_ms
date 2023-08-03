<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yonas MS Blog Page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="cus.css">
        <style>
                .cart-count {
            background-color: red;
            color: white;
            font-size: 12px;
            font-weight: bold;
            border-radius: 50%;
            padding: 2px 6px;
            position: absolute;
            top: -5px;
            right: -5px;
}
.pro-container {
        text-align: center;
        
    }

    .pagination {
        display: inline-block;
        margin-top: 20px;
        margin-left:50%;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 12px;
        margin: 0 4px;
        color: #333;
        text-decoration: none;
        background-color: #c2e0c6;
        border: 1px solid #9bc49b;
        border-radius: 4px;
    }

    .pagination a.active {
        background-color: #088178;
        color: #fff;
    }
        </style>
    </head>

    <body>
    <?php 
    $page = 'blog';
    
    include "header.php";?>
 <section id="page-header" class="blog-header" style="background-image:url('img/banner/s4.jpg')">
                
                <h2 style="color: black;">#ReadMore</h2>
               
                <p>Read all case studies about our Products!</p>    
 </section>

 <section id="blog">

     
        
     <?php
     $itemsPerPage = 8;

     // Get the current page number from the URL query string
     $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
     
     // Calculate the offset for the SQL query
     $offset = ($currentPage - 1) * $itemsPerPage;
     
     $sql = "SELECT * from blog  ORDER BY id DESC LIMIT $offset, $itemsPerPage";
           
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
                    // Extract the first 10 characters (adjust the substring length as needed)
                 $small_number_of_characters = substr($data, 0, 150);

                 echo " 
                 <div class='blog-box'>
                 <div class='blog-img'>
                 <img src='../images/$img' alt='no image '>
             </div>
     
              <div class='blog-details'>
                  <h4>$title </h4>
                  <p>$small_number_of_characters</p>
                  <a href='blog detail.php?id=$id'>CONTINUE READING</a>
              </div>
              </div>";
                }
            }
            // Get the total number of items
$totalItemsSql = "SELECT COUNT(*) AS total FROM items";
$totalItemsResult = mysqli_query($conn, $totalItemsSql);
$totalItemsRow = mysqli_fetch_assoc($totalItemsResult);
$totalItems = $totalItemsRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalItems / $itemsPerPage);


echo "</div>";
            ?>

     
 </section>

 <div class="pagination">
    <?php
    // Display pagination links
    if ($currentPage > 1) {
        echo "<a href='?page=".($currentPage - 1)."'><i class='fas fa-arrow-left'></i></a>";
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo "<a class='active' href='?page=$i'>$i</a>";
        } else {
            echo "<a href='?page=$i'>$i</a>";
        }
    }
    if ($currentPage < $totalPages) {
        echo "<a href='?page=".($currentPage + 1)."'><i class='fas fa-arrow-right'></i></a>";
    }
    ?>
</div>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4> We value your feedback!</h4>
            <p>  Your opinion matters to us, and we are eager to hear your thoughts. <br>Please take a moment to share your feedback so that we can continue<br> to enhance our services and meet your expectations.  <span> Thank you!</span> </p>
        </div>
        <div class="form">
          <a href="feedback.php">  <button class="normal">Give Feedback</button> </a>
        </div>
    </section>

<footer class="section-p1">
        <div class="col">
           <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div> <br>

            <h4>Contact</h4>
            <p> <strong>Address: </strong> GONDAR ETHIOPIA</p>
            <p> <strong>Phone: </strong> +251 0000 000</p>
            <p> <strong>Hours: </strong> 8:00 - 10:00, Mon - Sun</p>
            <div class="follow">
                <h4>Follow Us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-telegram"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.php">About us</a>
            <a href="help.php">Delivery Information</a>
            <a href="setting.php">Terms & Conditions</a>
            <a href="contact.php">Contact us</a>
        </div>
        <div class="col">
            <h4>Account</h4>
            <a href="update.php">Update Account</a>
            <a href="cart.php">View Cart</a>
            <a href="order.php">Send Order Request</a>
            <a href="help.php">Help</a>
        </div>
        <div class="col install" style="display: flex;">
            <h3 style="font-size:15px; font-weight: 500;">secure Payment GAteways</h3>
            <img src="img/pay/pay.jpg" alt="" style="width:200px; height: 80px; position: center;"> <br> 
            <img src="img/pay/pay2.jpg" alt="" style="width:200px; height: 80px; position: center;">
        </div>
        <div class="copyright">
            <p> 2015 FM.NET SQUAD ALL RIGHTS RESERVED!</p>
        </div>
</footer>
        <script src="cus.js"></script>
        <script src="script.js"></script>
    </body>
 
</html>
