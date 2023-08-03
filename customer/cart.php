<?php

include '../connection.php';



// Check if the cart array exists in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if the 'add_to_cart' form is submitted
if (isset($_POST['item_id'], $_POST['item_name'], $_POST['item_price'], $_POST['item_image'])) {
    // Get the item details from the form
    $itemId = $_POST['item_id'];
    $itemName = $_POST['item_name'];
    $itemPrice = $_POST['item_price'];
    $itemImage = $_POST['item_image'];

    // Check if the item is already in the cart
    $itemExists = false;
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id'] == $itemId) {
            $itemExists = true;
            break;
        }
    }

    if ($itemExists) {
        echo 'Item already added to the cart';
exit();
    } else {
        // Create an associative array to represent the item
        $item = array(
            'id' => $itemId,
            'name' => $itemName,
            'price' => $itemPrice,
            'image' => $itemImage
        );

        // Add the item to the cart array in the session
        array_unshift($_SESSION['cart'], $item);

        // Update the cart count in the session
        $_SESSION['cart_count'] = count($_SESSION['cart']);

        // Redirect to the cart page to display the cart items
        header("Location: cart.php");
        exit();
    }
}

// Check if the 'remove_item' form is submitted
if (isset($_GET['remove_id'])) {
    $removeItemId = $_GET['remove_id'];

    // Loop through the cart items and remove the item with the matching ID
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $removeItemId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Reset the array keys after removing the item
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Update the cart count in the session
    $_SESSION['cart_count'] = count($_SESSION['cart']);

    header("Location: cart.php");
    exit();
}
?>

<!-- Rest of the code for displaying the cart items -->


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart Page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" type="text/css" href="cus.css">
        <link rel="stylesheet" href="style.css">
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
        <script>
function validateNumber() {
    var inputElement = document.getElementById("inputNumber");
    if (inputElement.value <= 0) {
        inputElement.value = 1; // Set the value to 1 if it's less than or equal to 0
    }
}
</script>

<script>
    function updateQuantity(event, price) {
        var inputElement = event.target;
        var quantity = parseInt(inputElement.value);
        var subtotalElement = inputElement.parentNode.nextElementSibling;
        
        var subtotal = price * quantity;
        subtotalElement.innerText = subtotal + " ETB";
        
        updateSubtotal();
    }
    
    function updateTotal() {
        var subtotals = document.querySelectorAll("tbody td:nth-child(6)");
        var total = 0;
        
        subtotals.forEach(function(subtotal) {
            total += parseFloat(subtotal.innerText);
        });
        
        return total;
    }
    
    function updateSubtotal() {
        var total = updateTotal();
        var subtotalElement = document.getElementById("cart-subtotal");
        var totalElement = document.getElementById("cart-total");
        
        subtotalElement.innerText = total + " ETB";
        totalElement.innerText = total + " ETB";
    }
</script>

</head>
<body>
<section id="header">
    
      <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div>
      <div>
          <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="blog.php" >Blog</a></li>
          <li class="active">
    <a id="lg-bag" href="cart.php">
        Cart &nbsp;<i class="fas fa-shopping-bag"></i>
        <?php if ( isset($_SESSION['cart']) && is_array($_SESSION['cart'])): ?>
            <span class="cart-count"><?php echo count($_SESSION['cart']); ?></span>
            <!--  && count($_SESSION['cart']) > 0 -->
        <?php endif; ?>
    </a>
</li>

          <a href="#" id="close"><i class="far fa-times"></i></a>
          <li><a href="#" onclick="toggleDropdown()">Account &nbsp <i class="far fa-bars"></i></a> </li>
      <div>
          <ul id="new" style="display: none;">
              <li> <i class="fas fa-user"></i> <a href="Account.php">My Account</a> </li>
              <li> <i class="fas fa-pencil-alt"></i>   <a href="update.php">Update Account</a> </li>
              <li> <i class="fas fa-trash-alt"></i>    <a href="dt.php">Delete Account</a> </li>
              <li> <i class="fas fa-shopping-cart"></i>   <a href="order.php">My Orders</a> </li>
              <li> <i class="fas fa-question-circle"></i>           <a href="help.php">Help & Support</a> </li>
              <li> <i class="fas fa-file-alt"></i> <a href="setting.php">Terms & Conditions</a> </li>
              <li> <i class="fas fa-sign-out-alt"></i>    <a href="#" onclick="LogoutConfirmation(event)" >Logout</a> </li>
              </ul>
      </div>
        </ul>
          <div id="confirmationModal" class="modal">
          <div class="modal-content">
            <span class="close2" onclick="hideConfirmationModal()">&times;</span>
            <h3>Logout Confirmation</h3>
            <p>Are you sure you want to logout?</p>
            <div class="button-container">
            <button class="btn-confirm" onclick="logout()"><a style="text-decoration:none;" href="logout.php">Logout</a> </button>
            <button class="btn-cancel" onclick="hideConfirmationModal()">Cancel</button>
          </div>
          </div>
          </div>
        </div>
            <div id="mobile">
                <a href="cart.php"> <i class="far fa-shopping-bag"></i> </a>
                 <i id="bar" class="fas fa-outdent"></i>
            </div>
</section>
        <section id="page-header" class="about-header" style="background-image:url('img/banner/s4.jpg');">
                
                <h2 style="color:darkblue;">#Checkout with confidence: Your cart page awaits!</h2>    
        </section>

        <section id="cart" class="section-p1">
        <table width="100%">
    <thead>
        <tr>
            <td>REMOVE</td>
            <td>IMAGE</td>
            <td>PRODUCT</td>
            <td>PRICE</td>
            <td>QUANTITY</td>
            <td>SUBTOTAL</td>
        </tr>
    </thead>

    <tbody>
        <?php
        if (!empty($_SESSION['cart'])) {
            $subtotal = 0; // Initialize the subtotal variable
            
            foreach ($_SESSION['cart'] as $item) {
                // Check if the 'quantity' key exists in the item
                $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                
                // Calculate the subtotal for each item
                $itemSubtotal = $item['price'] * $quantity;
                
                // Add the item subtotal to the total subtotal
                $subtotal += $itemSubtotal;
                
                echo "<tr>
                    <td><a href='cart.php?remove_id=" . $item['id'] . "'><i class='far fa-times-circle fa-2x' style='color:red'></i></a></td>
                    <td><img src='" . $item['image'] . "' alt=''></td>
                    <td>" . $item['name'] . "</td>
                    <td>" . $item['price'] . " ETB</td>
                    <td><input id='inputNumber' type='number' value='" . $quantity . "' min='1' oninput='updateQuantity(event, " . $item['price'] . ")' /></td>
                    <td>" . $itemSubtotal . " ETB</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
        }
        ?>
    </tbody>
    
</table>

        </section>

        <section id="cart-add" class="section-p1">
    <div id="subtotal">
        <h3 style="align:center">Cart Totals</h3>
        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td id="cart-subtotal"><?php echo calculateSubtotal($_SESSION['cart']); ?> ETB</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td id="cart-total"><strong><?php echo calculateSubtotal($_SESSION['cart']); ?> ETB</strong></td>
            </tr>
        </table>
        <button class="normal" id= "checkoutBtn" <?php if($_SESSION['cart_count']<=0){echo "disabled";}?>>Proceed To Checkout</button>

<script>
  document.getElementById("checkoutBtn").addEventListener("click", function() {
    window.location.href = "wantD.php"; // 
  });
</script>
    </div>
</section>

<?php
// Function to calculate the subtotal based on the cart items
function calculateSubtotal($cart) {
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['price'];
    }
    return $subtotal;
}
?>


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