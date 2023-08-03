
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

    <title>Dashboard</title>
      <style>

table {
    width: 100%;
    border-collapse: collapse;
}

td {
  position: relative;
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 20px; /* Increase the padding to make the cell larger */
  text-align: left;
  z-index: 1; /* Ensure the table cell is above the image */
}

td img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0; /* Set the image behind the table cell */
}




tr td:hover {
    background-color: #f5f5f5;
}

/* Your existing CSS styles here... */

/* Your existing CSS styles here... */

  </style>
  <style>
/* Add this to your existing CSS */
/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
  

}

.modal img {
  display: block;
  max-width: 90%;
  max-height: 80%;
  margin: auto;
  margin-top: 40px;
}

.modal a {
  display: block;
  text-align: center;
  color: #fff;
  font-size: 18px;
  margin-top: 10px;
}

.close {
  color: #fff;
  font-size: 40px;
  position: absolute;
  top: 20px;
  right: 30px;
  cursor: pointer;
}


  </style>
<!-- Add these links in the head section -->
<link href="path/to/magnific-popup.css" rel="stylesheet">
<script src="path/to/jquery.min.js"></script> <!-- Magnific Popup requires jQuery -->
<script src="path/to/jquery.magnific-popup.min.js"></script>

</head>

<body>

    <!--  -->
    <?php
include 'topbar.php';
        if (!isset($_SESSION['admin_user'])) {

            header("location:log.php");
            
            // Connect to the database here (assuming you have already done this)
 

    exit();
        }

         
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action']) && isset($_POST['id'])) {
                $action = $_POST['action'];
                $id = $_POST['id'];
        
                if ($action === 'decline') {
                    $sql="DELETE from register where ID = $id";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Record delated successfully');</script>";
                    }
                } elseif ($action === 'approve') {
                    $sql = "UPDATE register SET STA_TUS = 'approved' WHERE ID = $id";
        
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Record updated successfully');</script>";
                    }
                }
                // Redirect back to the same page after processing the form
        header("Location: ".$_SERVER['REQUEST_URI']);
        exit(); // Important: Make sure to exit the script after the header() redirect.
            }
        }
?>
        <!-- SideBar -->
        <div class="SideBar">

            <ul>
                <li>
                    <a href="index.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="viewcus.php">
                        <i class="fas fa-user-check"></i>
                        <div> Customer</div>
                    </a>
                </li>
         <!--        <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Customer</div>
                    </a>
                </li> -->
                <li>
                    <a href="manager.php">
                        <i class="fas fa-user-tie"></i>
                        <div>Store Manager</div>
                    </a>
                </li>
              <!--   <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Manager</div>
                    </a>
                </li> -->
                <li>
                    <a href="cashier.php">
                        <i class="fas fa-cash-register"></i>
                        <div> Cashier</div>
                    </a>
                </li>
             <!--    <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate Cashier</div>
                    </a>
                </li> -->
                <li>
                    <a href="sales.php">
                        <i class="fas fa-briefcase "></i>
                        <div> SalesMan</div>
                    </a>
                </li>
               <!--   <li>
                    <a href="#">
                        <i class="fas fa-user-times"></i>
                        <div>Deactivate SalesMan</div>
                    </a>
                </li> -->

            </ul>

        </div>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
<!-- Add the modal div -->
            <div id="imageModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Full-size Image">
            <a id="downloadButton" href="#" download>Download</a>
            </div>

            <!-- Charts -->
            <div class="MainChart2">

                <div class="Chart2">
                    <h1>Customer's Membership Requests</h1> <br>
                    <div>
                    <?php
                    $query = "SELECT * FROM register WHERE STA_TUS='waiting'";
                    $run = mysqli_query($conn, $query);

                    // Check if there are waiting customers
                    if (mysqli_num_rows($run) > 0) {
                        echo "
                        <table>
                            <tr>
                                <th style='background-color:#f5f5f5;'><i class='fas fa-user'></i>First Name</th>
                                <th style='background-color:white;'><i class='fas fa-user'></i>Last Name</th>
                                <th style='background-color:#f5f5f5;'><i class='fas fa-envelope'></i>Email Address</th>
                                <th><i class='fas fa-prescription-bottle'></i> Pharmacy Name</th>
                                <th style='background-color:#f5f5f5;'><i class='fas fa-map-marker-alt'></i>Pharmacy Address</th>
                                <th style='background-color:#fff;'><span class='license-icon'>&#127909;</span> License Number</th>
                                <th style='background-color:#f5f5f5;'><span class='license-icon'>&#128247;</span> License Photo</th>
                            </tr>";

                        while ($row = mysqli_fetch_assoc($run)) {
                            $id = $row['ID'];
                            $first_name = $row['FIRST_NAME'];
                            $last_name = $row['LAST_NAME'];
                            $email = $row['EMAIL'];
                            $pharmacy_name = $row['PHARMACY_NAME'];
                            $pharmacy_address = $row['PHARMACY_ADDRESS'];
                            $license_no = $row['PHARMA_LICENSE_NO'];
                            $license_img = $row['PHARMACY_LICENSE_IMG'];

                            // Properly escape the data to prevent HTML injection
                            $first_name = htmlspecialchars($first_name);
                            $last_name = htmlspecialchars($last_name);
                            $email = htmlspecialchars($email);
                            $pharmacy_name = htmlspecialchars($pharmacy_name);
                            $pharmacy_address = htmlspecialchars($pharmacy_address);
                            $license_no = htmlspecialchars($license_no);
                            $license_img = htmlspecialchars($license_img);

                            echo "
                            <tr>
                                <td>$first_name</td>
                                <td>$last_name</td>
                                <td>$email</td>
                                <td>$pharmacy_name</td>
                                <td>$pharmacy_address</td>
                                <td>$license_no</td>
                                <td>
                                    <a href='#' class='enlarge-image'>
                                        <img src='../../$license_img' style='width: 100%; height: 100%; object-fit: cover;' alt='Image' onclick='openModal(\"../../$license_img\")'>
                                    </a>
                                </td>
                                <td>
                                    <form action='approve.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to decline this customer?')\">
                                        <input type='hidden' name='id' value='$id'>
                                        <button type='submit' name='action' value='decline' style='background: none; border: none;'>
                                            <i class='fas fa-user-times' style='color: red;'></i>Decline
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action='approve.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to approve this customer?')\">
                                        <input type='hidden' name='id' value='$id'>
                                        <button type='submit' name='action' value='approve' style='background: none; border: none;'>
                                            <i class='fas fa-user-check' style='color: green;'></i>Approve
                                        </button>
                                    </form>
                                </td>
                            </tr>";
                        }

                        echo "</table>";
                    } else {
                        // If there are no waiting customers, display the message
                        echo "<h1 style='text-align: center; color: #ff0000;'>No Customer request</h1>";
                    }
                    ?>

                       <script>
                        // Function to display the modal when an image is clicked
                        function openModal(imageSrc) {
                            var modal = document.getElementById("imageModal");
                            var modalImage = document.getElementById("modalImage");
                            var downloadButton = document.getElementById("downloadButton");

                            modalImage.src = imageSrc;
                            downloadButton.href = imageSrc;

                            modal.style.display = "block";
                        }

                        // Function to close the modal when the close button or outside modal is clicked
                        function closeModal() {
                            var modal = document.getElementById("imageModal");
                            modal.style.display = "none";
                        }
                        </script>

                            <input type="text" hidden>
                    </div>
                </div>



            </div>



        </div>


    </div>
    <!--  -->





    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- <script src="chart1.js"></script> -->
    <script src="chart2.js"></script>

</body>

</html>