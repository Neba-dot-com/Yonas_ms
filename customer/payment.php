<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page </title>
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
:root{
    --green:#088178;
    --black:#444;
    --light-color:#777;
    --box-shadow:.5rem .5rem 0 rgba(22, 160, 133, .2);
    --text-shadow:.4rem .4rem 0 rgba(0, 0, 0, .2);
    --border:.2rem solid var(--green);
}
    form{
     flex:1 1 35rem;
    background: #fff;
    border:var(--border);
    box-shadow: var(--box-shadow);
    text-align: center;
    padding: 2rem;
    border-radius: .5rem;
     max-width: 600px;
     align-self: center;
    align-items: center;
    justify-content: center;
   
    margin: 0;
}
form .box{
    width: 60%;
    margin:.5rem 0;
    border-radius: .6rem;
    border:var(--border);
    font-size: 1.0 rem;
    color: var(--black);
    text-transform: none;
    padding: 1rem;
}

  </style>
</head>
<body>
<section id="header">
      <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div>
      <div>
          <ul id="navbar">
          <li><a href="index.html">Home</a></li>
          <li><a href="shop.html">Shop</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="order.html">Order</a></li>
          <li><a  id="lg-bag" href="cart.html">Cart &nbsp<i class="far fa-shopping-bag"></i></a></li>
          <a href="#" id="close"><i class="far fa-times"></i></a>
          <li><a href="#" onclick="toggleDropdown()">Account &nbsp <i class="far fa-bars"></i></a> </li>
      <div>
          <ul id="new" style="display: none;">
              <li> <i class="fas fa-user"></i> <a href="Account.html">My Account</a> </li>
              <li> <i class="fas fa-pencil-alt"></i>   <a href="update.html">Update Account</a> </li>
              <li> <i class="fas fa-trash-alt"></i>    <a href="dt.html">Delete Account</a> </li>
              <li> <i class="fas fa-shopping-cart"></i>   <a href="myorder.html">My Orders</a> </li>
              <li> <i class="fas fa-question-circle"></i>           <a href="help.html">Help & Support</a> </li>
              <li> <i class="fas fa-file-alt"></i> <a href="setting.html">Terms & Conditions</a> </li>
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
            <button class="btn-confirm" onclick="logout()">Logout</button>
            <button class="btn-cancel" onclick="hideConfirmationModal()">Cancel</button>
          </div>
          </div>
          </div>
        </div>
            <div id="mobile">
                <a href="cart.html"> <i class="far fa-shopping-bag"></i> </a>
                 <i id="bar" class="fas fa-outdent"></i>
            </div>
</section>
<section class="book" id="book">
    <div class="row">
    <!-- <h1>Payment Details</h1> -->
    <form  method="POST">
        <label for="paymentMethod">Select Payment Method:</label>
        <select id="paymentMethod" name="paymentMethod" required class="box">
            <option value="tellebirr">Tellebirr</option>
            <option value="cbe">Commercial Bank of Ethiopia</option>
        </select>
        <br>
        <label for="cardholderName"> Account Owner Name:</label>
        <input type="text" id="cardholderName" name="cardholderName" required class="box">
        <br>
        <label for="cardNumber">Account Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required class="box">
        <br>
        <label for="expiryDate">Expiry Date:</label>
        <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required class="box">
        <br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required class="box">
        <br>
        <label for="billingAddress">Billing Address:</label>
        <input type="text" id="billingAddress" name="billingAddress" required class="box">
        <br>
        <!-- Add more fields as needed for billing information -->
        <br>
        <a href="paypro.php"><button type="submit" class="btn">Proceed to Payment</button> </a>
    </form>
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
