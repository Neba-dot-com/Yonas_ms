<?php
$page = 'shop';
// Rest of the code for the shop page
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="cus.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    function updateCartCount() {
        $.ajax({
            url: 'get_cart_count.php',
            method: 'GET',
            success: function(response) {
                $('.cart-count').text(response);

                // Update the cart count in the header.php file
                $('.header-cart-count').text(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching cart count:', error);
            }
        });
    }

    $('.add-to-cart-button').click(function(e) {
        e.preventDefault();

        var itemId = $(this).data('item-id');
        var itemName = $(this).data('item-name');
        var itemPrice = $(this).data('item-price');
        var itemImage = $(this).data('item-image');

        $.ajax({
            url: 'cart.php',
            method: 'POST',
            data: {
                item_id: itemId,
                item_name: itemName,
                item_price: itemPrice,
                item_image: itemImage
            },
success: function(response) {
    console.dir(response); // Log the response to check its content
    updateCartCount();
    if (response.trim() === 'Item already added to the cart') {
        alert('Item already added to the cart.');
    } else {
        alert('Item added to cart successfully.');
    }
}
,
            error: function(xhr, status, error) {
                console.error('Error adding item to cart:', error);
            }
        });
    });

    updateCartCount();
});
</script>


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
.add-to-cart-button {
        border: none;  /* Remove the border */
        outline: none; /* Remove the outline */
        background: none; /* Remove the background */
        padding: 0; /* Remove any padding */
        cursor: pointer; /* Change the cursor to a pointer */
    }
            </style>
            <style>
    .pro-container {
        text-align: center;
    }

    .pagination {
        display: inline-block;
        margin-top: 20px;
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
   <?php include 'header.php'?>
            <section id="page-header" style="background-image:url('img/banner/s4.jpg'); background-repeat: no-repeat; background-position:center;">
                <h2 style="color:black">Your Local Source for Medical Supplies!</h2>
                <p style="color:green; font-size: 20px; font-weight: 800;">#Building Healthier Communities</p>
               
                    
            </section>
            <?php include "search_button.php"?>
            
<section id="product1" class="section-p1">
        <h3  style="background-color: #088178; font-size: 25px;"><i>#Shop Smart, <b style="color: #fff;">Shop Easy for your Pharmacies! </b></h3></i>  
       
        <div class="pro-container">

<?php
// Define the number of items per page
$itemsPerPage = 12;

// Get the current page number from the URL query string
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $itemsPerPage;

$sql = "SELECT * FROM items ORDER BY PRODUCT_NAME ASC LIMIT $offset, $itemsPerPage";
$res = mysqli_query($conn, $sql);

while ($result = mysqli_fetch_array($res)){
    $id = $result['ID'];
    $brand_name = $result['BRAND_NAME'];
    $product_name = $result['PRODUCT_NAME'];
    $generic_name = $result['GENERIC_NAME'];
    $price = $result['PRICE'];
    $image = $result['image'];

    echo "
    <div class='pro'>
        <a style='text-decoration:none;' href='sproduct.php?id=$id&brand_name=$brand_name'>
            <img src='../images/$image' alt=''>
            <div class='des'>
                <span>$generic_name</span>
                <h5>$product_name</h5>
                <div class='star'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                </div>
                <h4>$price ETB</h4>
            </div>
        </a>
        <!-- Example form to add items to the cart -->
        <div class='cart-button-wrapper'>
            <button class='add-to-cart-button' data-item-id='$id' data-item-name='$product_name' data-item-price='$price' data-item-image='../images/$image'>
                <i class='fal fa-shopping-cart cart'></i>
            </button>
        </div>
    </div>
    ";
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
</div>
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

            
    </section> 

    <!-- <section id="pagination" class="section-p1">
         <a href="#">1</a>
         <a href="shop2.html">2</a>
          <a href="shop3.html"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section> -->

  <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4> We value your feedback!</h4>
            <p>  Your opinion matters to us, and we are eager to hear your thoughts. <br>Please take a moment to share your feedback so that we can continue<br> to enhance our services and meet your expectations.  <span> Thank you!</span> </p>
        </div>
        <div class="form">
            <button class="normal">Give Feedback</button>
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
            <a href="about.html">About us</a>
            <a href="help.html">Delivery Information</a>
            <a href="setting.html">Terms & Conditions</a>
            <a href="contact.html">Contact us</a>
        </div>
        <div class="col">
            <h4>Account</h4>
            <a href="update.html">Update Account</a>
            <a href="cart.html">View Cart</a>
            <a href="order.html">Send Order Request</a>
            <a href="help.html">Help</a>
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
<!-- 
             <div class="pro">
                <img src="img/products/f2.jpg" alt="">
                <div class="des">
                    <span>Nonsteroidal anti-inflammatory drugs</span>
                    <h5>Advil</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>180 ETB</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/A/a1.webp" alt="">
                <div class="des">
                    <span> Miscellaneous anxiolytics, sedatives and hypnotics</span>
                    <h5>Albuterol</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/f4.jpg" alt="">
                <div class="des">
                    <span>Urinary anti-infectives</span>
                    <h5>Hyprex</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/f5.jpg" alt="">
                <div class="des">
                    <span> Ophthalmic anti-infectives</span>
                    <h5>Erythromycin Ophthalmic</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/f6.jpg" alt="">
                <div class="des">
                    <span>Decongestants, Vasopressors</span>
                    <h5>Ephedrine</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/f7.jpg" alt="">
                <div class="des">
                    <span>Heparins</span>
                    <h5>Enoxaparin</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/f8.jpg" alt="">
                <div class="des">
                    <span>Antacids, Minerals and electrolytes</span>
                    <h5>Calcium carbonate</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/products/z1.jpg" alt="">
                <div class="des">
                    <span>Mouth and throat products, Polyenes</span>
                    <h5>Nystatin</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/z2.jpg" alt="">
                <div class="des">
                    <span>Antiallergic Agents</span>
                    <h5>Ketotifen</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/z3.jpg" alt="">
                <div class="des">
                    <span> Miscellaneous anxiolytics, sedatives and hypnotics</span>
                    <h5>Krill Oil</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/z4.jpg" alt="">
                <div class="des">
                    <span>Cation exchange resins</span>
                    <h5>Kayexalate</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/z5.jpg" alt="">
                <div class="des">
                    <span> Laxatives</span>
                    <h5>MiraLAX</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/z6.jpg" alt="">
                <div class="des">
                    <span>Nonsteroidal anti-inflammatory drugs</span>
                    <h5>Motrin</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/z7.jpg" alt="">
                <div class="des">
                    <span>Nonsteroidal anti-inflammatory drugs</span>
                    <h5>Naprosyn</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div>
             <div class="pro">
                <img src="img/products/z8.jpg" alt="">
                <div class="des">
                    <span>Miscellaneous antihyperlipidemic agents</span>
                    <h5>Nexletol</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"> <i class="fal fa-shopping-cart cart"></i></a>
            </div> -->