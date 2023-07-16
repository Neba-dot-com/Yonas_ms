<?php
$page = 'order';
// Rest of the code for the shop page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order request Page </title>
        <!-- Fontawesome Libriaries Links -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <!-- Stylesheet Link -->
            <link rel="stylesheet" type="text/css" href="cus.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="cs/style.css">
<style type="text/css">
        a{
            color: #088178;
            text-decoration: none;
        }
        
</style>
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
            </style>
</head>

<body>
            <!-- This is where Header Starts -->
<?php include 'header.php'?>
                <!-- This is where Header Ends -->
<section id="page-header" class="blog-header"  style="background-image:url('img/ban2.jpg');">
            <h2 style="color: black;">#Request Order</h2>
            <p>Want To order our products? Please Tell us what you want!</p>    
</section>          
<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="img/pay/ord2.jpg" alt="">
        </div>
  <form action="process_order.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required class="box"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required class="box"><br><br>
        
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required class="box"><br><br>
        
        <h3>Product Details:</h3>
        
        <div id="products">
          <div class="product-entry">
            <label for="product1">Product 1:</label>
            <input type="text" id="product1" name="product[]" required class="box"><br><br>
            
            <label for="quantity1">Quantity:</label>
            <input type="number" id="quantity1" name="quantity[]" required class="box"><br><br>
      </div>
        </div>
        <button type="button" onclick="addProductEntry()" class="btn">Add Another Product</button><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" cols="30" class="box"></textarea><br><br>
        <input type="submit" value="Submit" class="btn">
      </form>
</section>
  <script>
    function addProductEntry() {
      var productsContainer = document.getElementById("products");
      var productEntry = document.createElement("div");
      productEntry.classList.add("product-entry");
      
      var productLabel = document.createElement("label");
      productLabel.textContent = "Product " + (productsContainer.childElementCount + 1) + ":";
      productEntry.appendChild(productLabel);
      
      var productInput = document.createElement("input");
      productInput.type = "text";
      productInput.name = "product[]";
      productInput.required = true;
      productEntry.appendChild(productInput);
      
      var quantityLabel = document.createElement("label");
      quantityLabel.textContent = "Quantity:";
      productEntry.appendChild(quantityLabel);
      
      var quantityInput = document.createElement("input");
      quantityInput.type = "number";
      quantityInput.name = "quantity[]";
      quantityInput.required = true;
      productEntry.appendChild(quantityInput);
      
      productsContainer.appendChild(productEntry);
    }
  </script>

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