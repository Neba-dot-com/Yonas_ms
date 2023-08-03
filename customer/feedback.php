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
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a  id="lg-bag" href="cart.php">Cart &nbsp<i class="far fa-shopping-bag"></i></a></li>
          <a href="#" id="close"><i class="far fa-times"></i></a>
          <li><a href="#" onclick="toggleDropdown()">Account &nbsp <i class="far fa-bars"></i></a> </li>
      <div>
          <ul id="new" style="display: none;">
              <li> <i class="fas fa-user"></i> <a href="Account.php">My Account</a> </li>
              <li> <i class="fas fa-pencil-alt"></i>   <a href="update.php">Update Account</a> </li>
              <li> <i class="fas fa-trash-alt"></i>    <a href="dt.php">Delete Account</a> </li>
              <li> <i class="fas fa-shopping-cart"></i>   <a href="myorder.php">My Orders</a> </li>
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
            <button class="btn-confirm" onclick="logout()">Logout</button>
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
<section class="book" id="book">
    <div class="row">
    <!-- <h1>Yonas MS Feedback Form</h1> -->
    <form action="/submit_feedback" method="POST">
        <p>1. How satisfied are you with the overall experience on our website?</p>
        <input type="radio" name="satisfaction" value="Very Satisfied" class="box"> Very Satisfied
        <input type="radio" name="satisfaction" value="Satisfied" class="box"> Satisfied
        <input type="radio" name="satisfaction" value="Neutral" class="box"> Neutral
        <input type="radio" name="satisfaction" value="Dissatisfied" class="box"> Dissatisfied
        <input type="radio" name="satisfaction" value="Very Dissatisfied" class="box"> Very Dissatisfied

        <p>2. What was the primary purpose of your visit to our website?</p>
        <input type="checkbox" name="purpose" value="Purchasing pharmaceutical supplies for a pharmacy" class="box"> Purchasing pharmaceutical supplies for a pharmacy<br>
        <input type="checkbox" name="purpose" value="Browsing available products and prices"> Browsing available products and prices<br>
        <input type="checkbox" name="purpose" value="Checking delivery options and timelines" class="box"> Checking delivery options and timelines<br>
        <input type="checkbox" name="purpose" value="Seeking information about our services" class="box"> Seeking information about our services<br>

        <p>3. Were you able to find the products you were looking for easily?</p>
        <input type="radio" name="products_found" value="Yes, very easy" class="box"> Yes, very easy
        <input type="radio" name="products_found" value="Yes, but it took some effort" class="box"> Yes, but it took some effort
        <input type="radio" name="products_found" value="No, I had difficulty finding what I needed" class="box"> No, I had difficulty finding what I needed

        <p>4. How do you rate the variety and availability of products on our website?</p>
        <input type="radio" name="product_variety" value="Excellent" class="box"> Excellent
        <input type="radio" name="product_variety" value="Good" class="box"> Good
        <input type="radio" name="product_variety" value="Average" class="box"> Average
        <input type="radio" name="product_variety" value="Below Average" class="box"> Below Average
        <input type="radio" name="product_variety" value="Poor"> Poor

        <p>5. Did you encounter any technical issues while browsing or making a purchase?</p>
        <input type="radio" name="technical_issues" value="No, the website worked smoothly" class="box"> No, the website worked smoothly
        <input type="radio" name="technical_issues" value="Yes, I experienced minor glitches" class="box"> Yes, I experienced minor glitches
        <input type="radio" name="technical_issues" value="Yes, I encountered significant technical problems" class="box"> Yes, I encountered significant technical problems

        <p>6. How satisfied are you with the checkout and payment process?</p>
        <input type="radio" name="checkout_satisfaction" value="Very Satisfied" class="box"> Very Satisfied
        <input type="radio" name="checkout_satisfaction" value="Satisfied" class="box"> Satisfied
        <input type="radio" name="checkout_satisfaction" value="Neutral" class="box"> Neutral
        <input type="radio" name="checkout_satisfaction" value="Dissatisfied" class="box"> Dissatisfied
        <input type="radio" name="checkout_satisfaction" value="Very Dissatisfied" class="box"> Very Dissatisfied

        <p>7. How would you rate the delivery service provided by Yonas Medical Store?</p>
        <input type="radio" name="delivery_satisfaction" value="Excellent, always timely and reliable" class="box"> Excellent, always timely and reliable
        <input type="radio" name="delivery_satisfaction" value="Good, but sometimes there are delays" class="box"> Good, but sometimes there are delays
        <input type="radio" name="delivery_satisfaction" value="Average, it could be improved" class="box"> Average, it could be improved
        <input type="radio" name="delivery_satisfaction" value="Below Average, delivery times are often inconsistent" class="box"> Below Average, delivery times are often inconsistent
        <input type="radio" name="delivery_satisfaction" value="Poor, I faced multiple issues with deliveries" class="box"> Poor, I faced multiple issues with deliveries

        <p>8. Do you have any suggestions on how we can improve our website or services?</p>
        <textarea name="suggestions" rows="4" cols="50" class="box"></textarea>

        <p>9. Would you recommend Yonas Medical Store to others?</p>
        <input type="radio" name="recommendation" value="Yes, absolutely" class="box"> Yes, absolutely
        <input type="radio" name="recommendation" value="Yes, with some reservations" class="box"> Yes, with some reservations
        <input type="radio" name="recommendation" value="No, I would not recommend" class="box"> No, I would not recommend

        <p>10. How did you hear about Yonas Medical Store?</p>
        <input type="checkbox" name="how_heard" value="Online search (Google, Bing, etc.)" class="box"> Online search (Google, Bing, etc.)<br>
        <input type="checkbox" name="how_heard" value="Social media (Facebook, Instagram, etc.)" class="box"> Social media (Facebook, Instagram, etc.)<br>
        <input type="checkbox" name="how_heard" value="Word of mouth (friends, family, colleagues)" class="box"> Word of mouth (friends, family, colleagues)<br>
        <input type="checkbox" name="how_heard" value="Other"> Other: <input type="text" name="other_heard" class="box">

        <p>11. Any additional comments or feedback?</p>
        <textarea name="additional_comments" rows="4" cols="50" class="box"></textarea>

        <p>12. Name (Optional):</p>
        <input type="text" name="name" class="box">

        <p>13. Email Address (Optional):</p>
        <input type="email" name="email" class="box">

        <br>
        <input type="submit" value="Submit" class="btn">
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
