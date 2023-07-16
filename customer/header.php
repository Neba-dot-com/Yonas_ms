            <?php
            
            include '../connection.php';
            // Check if the user is logged in
            if (!isset($_SESSION['user'])) {
            
                header("location:../viewer/login.php");
                exit();
            }
            
            // Rest of the code for the protected page
            
            // Prevent caching
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
            header("Pragma: no-cache");
            
            ?>
            
      
            <!-- This is where Header Starts -->
            <section id="header">
    <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  
    </div>
        <div>
            <ul id="navbar">
            <li><a <?php if ($page === 'home') { echo 'class="active"'; } ?> href="index.php">Home</a></li>
            <li><a <?php if ($page === 'shop') { echo 'class="active"'; } ?> href="shop.php">Shop</a></li>
            <li><a <?php if ($page === 'about') { echo 'class="active"'; } ?> href="about.php">About</a></li>
            <li><a <?php if ($page === 'contact') { echo 'class="active"'; } ?> href="contact.php">Contact</a></li>
            <li><a <?php if ($page === 'order') { echo 'class="active"'; } ?> href="order.php">Order</a></li>
            <li>
    <a id="lg-bag" href="cart.php">
    Cart &nbsp;<i class="fas fa-shopping-bag"></i>
    <?php if ( isset($_SESSION['cart']) && is_array($_SESSION['cart'])): ?>
        <span class="cart-count"><?php echo count($_SESSION['cart']); ?></span>
        <!--  && count($_SESSION['cart']) > 0 -->
    <?php else: ?>
        <span class="cart-count"><?php echo 0; ?></span>
    <?php endif; ?>
</a>

</li>





                <!-- <li><a  id="lg-bag" href="cart.php">Cart &nbsp <i class="fas fa-shopping-bag"></i></a></li> -->
                <a href="#" id="close"><i class="fas fa-times"></i></a>
                <li><a href="#" onclick="toggleDropdown()">Account &nbsp <i class="fas fa-bars"></i></a> </li>
            <div>
    <!----------- Drop Down List Under Account---------->
                <ul id="new" style="display: none;">
                    <li> <i class="fas fa-user"></i> <a href="Account.php">My Account</a> </li>
                    <li> <i class="fas fa-pencil-alt"></i>   <a href="update.php">Update Account</a> </li>
                    <li> <i class="fas fa-trash-alt"></i>    <a href="dt.php">Delete Account</a> </li>
                     <li> <i class="fas fa-shopping-cart"></i>   <a href="myorder.php">My Orders</a> </li>
                     <li> <i class="fas fa-question-circle"></i>           <a href="help.php">Help & Support</a> </li>
                     <li> <i class="fas fa-file-alt"></i> <a href="setting.php">Terms & Conditions</a> </li>
                     <li> <i class="fas fa-sign-out-alt"></i>    <a href="#" onclick="LogoutConfirmation(event)">Logout</a> </li>
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
               
