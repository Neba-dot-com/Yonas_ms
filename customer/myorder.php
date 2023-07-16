<?php include '../connection.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="cus.css">
    <link rel="stylesheet" type="text/css" href="order.css">

<style type="text/css">
body {
  font-family: Arial, sans-serif;
  margin: 20px;
}

h1 {
  text-align: center;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

thead th {
  background-color: #f5f5f5;
  text-align: left;
  padding: 10px;
}

tbody td {
  padding: 10px;
}

button {
  padding: 5px 10px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.details-row {
  display: none;
}

.order-details {
  margin-top: 10px;
  padding: 10px;
  background-color: #f5f5f5;
}
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

<script type="text/javascript">
    
    function toggleDetails(rowId) {
  const detailsRow = document.getElementById(`details-row-${rowId}`);
  const button = document.getElementById(`details-button-${rowId}`);
  
  if (detailsRow.style.display === "none") {
    detailsRow.style.display = "table-row";
    button.innerText = "Hide Details";
  } else {
    detailsRow.style.display = "none";
    button.innerText = "View Details";
  }
}

    function printDetails(rowId) {
      const orderTable = document.getElementById("order-table");
      const rows = orderTable.getElementsByTagName("tr");
      const labels = orderTable.getElementsByTagName("th");
      const rowData = rows[rowId].getElementsByTagName("td");
      const detailsRow = document.getElementById(`details-row-${rowId}`);
 

      let tableContent = "<table>";
      for (let i = 0; i < rowData.length; i++) {
        tableContent += `
          <tr>
            <td><strong>${labels[i].innerText}:</strong></td>
            <td>${rowData[i].innerText}</td>
          </tr>
        `;
      }
      tableContent += "</table>";

      // Append details row content
      tableContent += `
        <div class="order-details">
          <table>
            ${detailsRow.innerHTML}
          </table>
        </div>
      `;


      const printWindow = window.open("", "_self");

      printWindow.document.open();
      printWindow.document.write(`
        <html>
        <head>
          <title>Order Details - Print</title>
          <link rel="stylesheet" type="text/css" href="styles.css">
         <style>
            table {
              border-collapse: collapse;
              width: 100%;
            }
            th, td {
              padding: 8px;
              text-align: left;
              border-bottom: 1px solid #ddd;
            }
            .order-details {
              margin-top: 10px;
              padding: 10px;
              background-color: #f5f5f5;
            }
            .print-button {
              display: none;
            }
            button{
                  padding: 5px 10px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
            }
            @media print {
              .no-print {
                display: none;
              }
              .print-button {
                display: inline-block;
              }
            }
          </style>
        </head>
        <body>
          <button class="no-print" onclick="window.location.href = document.referrer;">Back to Previous Page</button>
          <button class="no-print" onclick="window.print()">Print</button>
          ${tableContent}
        </body>
        </html>
      `);
      printWindow.document.close();
    }
</script>
</head>

<body>

<section id="header">
        
        <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  
        </div>
            <div>
                <ul id="navbar">
                    <li><a class= "active" href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="order.php">Order</a></li>
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
                         <li> <i class="fas fa-shopping-cart"></i>   <a href="order.php">My Orders</a> </li>
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
                 
  <h1>Order History</h1>
<table id="order-table" class="order-table">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Date</th>
        <th>Items</th>
        <th>Item Quantity</th>
        <th>Item Type</th>
        <th>Total Amount</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>2023-05-15</td>
        <td>2</td>
        <td>3</td>
        <td>Medicine</td>
        <td>$50.00</td>
        <td>
          <button onclick="printDetails(1)" class="print-button">Print</button>
          <button id="details-button-1" onclick="toggleDetails(1)">View Details</button>
        </td>
      </tr>
      <tr id="details-row-1" class="details-row">
      <td colspan="6">
      <table>
      <tr>
      <td><strong>Shipping Address:</strong></td>
      <td>123 Main St, City, Country</td>
      </tr>
      <tr>
      <td><strong>Payment Method:</strong></td>
      <td>Credit Card</td>
      </tr>
<!-- Additional details can be added here -->
</table>
</td>
</tr>
      <tr>
        <td>2</td>
        <td>2023-05-15</td>
        <td>2</td>
        <td>3</td>
        <td>Medicine</td>
        <td>$50.00</td>
        <td>
          <button onclick="printDetails(2)" class="print-button">Print</button>
          <button id="details-button-2" onclick="toggleDetails(2)">View Details</button>
        </td>
      </tr>
      <tr id="details-row-2" class="details-row">
          <td colspan="6">
          <table>
          <tr>
          <td><strong>Shipping Address:</strong></td>
          <td>000 Main St, City, Country</td>
          </tr>
          <tr>
          <td><strong>Payment Method:</strong></td>
          <td>Telle Birr</td>
          </tr>
          <!-- Additional details can be added here -->
          </table>
          </td>
          </tr>
          <!-- Add more rows for additional orders -->
    </tbody>

</table>

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