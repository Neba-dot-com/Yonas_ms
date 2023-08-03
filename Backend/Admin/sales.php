

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
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css"> -->
<title>Dashboard</title>
  <style>
   
   table {
/*      border-collapse: collapse;*/
      width: 100%;
    }

    table th {
      border-collapse: separate;
      border-spacing: 9;
      border: 1;

    }

    th, td {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 8px;
      border-left: none;
      border-right: none;
       border-bottom: 1px solid #ddd;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr td:hover {
      background-color: #f5f5f5;
    }
    th i {
      margin-right: 4px;
      color: #088178;
    }

    #tableM input[type='text'] {
    border: none; /* Remove the border */
    background-color: transparent; /* Make the input background transparent */
    font-size: 12px; /* Adjust the font size as per your requirement */
    width: 100px; /* Set a minimum width for the input fields */
    min-width: 100px; /* Set a minimum width for the input fields */
    resize: both; /* Allow the input fields to be resizable */
  }

  /* Style for the table row in edit mode */
  tr.edit-mode {
    background-color: #f2f2f2; /* Add some background color to indicate edit mode */
  }

  </style>
</head>

<body>

    <!--  -->
    <?php
include 'topbar.php';
$page = 'sale';
if (!isset($_SESSION['admin_user'])) {

    header("location:log.php");
    exit();

    if (isset($_POST['action']) && isset($_POST['id'])) {
        $action = $_POST['action'];
        $id = $_POST['id'];
    
        if ($action === 'decline') {
            $sql = "UPDATE manager SET STA_TUS = 'deactive' WHERE ID = $id";
    
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record delated successfully');</script>";
            }
        } elseif ($action === 'approve') {
            $sql = "UPDATE salesman SET STA_TUS = 'active' WHERE ID = $id";
    
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
        <?php  include "sidebar.php";?>
 <!-- main content for approve customer-->
       

        <!-- Main Content -->
 

            <!-- Charts -->
            <div class="MainChartM">

                <div class="ChartM">
 
                    <h1>Sales_Man Information</h1> 
                        <div class="CardM">
                            <a href="addsales.php"><button style="background:none;"><span style="color:#088178; hover:black; font-size:18px;"> Add New Sales_Man </span></button> <i class="fas fa-user" style="color:black;"></i> </a>
                       
               </div>  <br>
               <div> 
                   
                   <table id="tableM">
                    <tr>
                    <th style="background-color:#f5f5f5;"><i class="fas fa-user-tie"></i>First Name</th>
                    <th style="background-color:white;"><i class="fas fa-user-tie"></i>Last Name </th>
                    <th style="background-color:#f5f5f5;"><i class="fas fa-user-tie"></i>User Name</th>
                    <th><i class="fas fa-lock"></i>Password</th>
                    <th style="background-color:#f5f5f5;"><i class="fas fa-dollar-sign"></i>Salary</th>
                    <th><i class="fas fa-envelope"></i>Email</th>
                    <th style="background-color:#f5f5f5;"><i class="fas fa-phone"></i>Phone Number</th>
                    <th><i class="fas fa-venus-mars"></i>Gender</th>
                    <th style="background-color:#f5f5f5;"><i class="fas fa-clock"></i>Date of birth</th>
                    <th><br>Status</th>
                    <!-- <th><i class="fas fa-pen"></i>Edit</th> -->
                    </tr>
                        <?php
                    $sql = "SELECT * FROM salesman ";
                    $run = mysqli_query($conn, $sql);

                  

                    while ($row = mysqli_fetch_array($run)) {
                        $id=$row['ID'];
                        $firstname = $row['FIRST_NAME'];
                        $lastname = $row['LAST_NAME'];
                        $username = $row['USER_NAME'];
                        $password = $row['PASS_WORD'];
                        $email = $row['EMAIL'];
                        $phone_num = $row['PHONE_NO'];
                        $salary = $row['SALARY'];
                        $gender = $row['GENDAR'];
                        $birthdate = $row['BIRTH_DATE'];
                        $status = $row['STA_TUS'];
                        $managerID = $row['ID'];

                        echo "
                        <tr>
                        <form class='manager-form' method='POST'>
                            <td><input type='text' name='firstname' value='$firstname' disabled></td>
                            <td><input type='text' name='lastname' value='$lastname' disabled></td>
                            <td><input type='text' name='username' value='$username' disabled></td>
                            <td><input type='text' name='password' value='$password' disabled></td>
                            <td><input type='text' name='salary' value='$salary' disabled></td>
                            <td><input type='text' name='email' value='$email' disabled></td>
                            <td><input type='text' name='phone_num' value='$phone_num' disabled></td>
                            <td><input type='text' name='gender' value='$gender' disabled></td>
                            <td><input type='text' name='birthdate' value='$birthdate' disabled></td>
                            <td>$status</td>
                            <td>
                                <button class='edit-btn' data-manager-id='$managerID' style='background: none;'>
                                    <i class='fas fa-pen' style='color: blue;'></i>&nbsp;Edit
                                </button>
                                <button class='save-btn' style='display: none;'>
                                    <i class='fas fa-save' style='color: green;'></i>&nbsp;Save
                                </button>
                            </td>
                            </form>
                            <td>
                            <form action='sales.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to deactivate this salesman?')\">
                                <input type='hidden' name='id' value='$id'>
                                <button type='submit' name='action' value='decline' style='background: none; border: none;' " . ($status === 'active' ? '' : 'disabled') . ">
                                    <i class='fas fa-user-times' style='color: red;'></i>Deactivate
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action='sales.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to activate this salesman?')\">
                                <input type='hidden' name='id' value='$id'>
                                <button type='submit' name='action' value='approve' style='background: none; border: none;' " . ($status !== 'active' ? '' : 'disabled') . ">
                                    <i class='fas fa-user-check' style='color: green;'></i>Activate
                                </button>
                            </form>
                        </td>
                        </tr>";
                    }

                     // Close the form tag
                    ?>

                   </table> 
                   

                   <!-- Add the below script to your HTML file, after the PHP code -->
            <!-- Place the below script at the bottom of manager.php -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
function sendDataToServer(row) {
  var managerID = row.find(".edit-btn").data("manager-id");
  var firstName = row.find("input[name='firstname']").val();
  var lastName = row.find("input[name='lastname']").val();
  var username = row.find("input[name='username']").val();
  var password = row.find("input[name='password']").val();
  var salary = row.find("input[name='salary']").val();
  var email = row.find("input[name='email']").val();
  var phone_num = row.find("input[name='phone_num']").val();
  var gender = row.find("input[name='gender']").val();
  var birthdate = row.find("input[name='birthdate']").val();

  // AJAX POST request to send the data to the server (update_manager.php)
  $.ajax({
    url: "update_salesman.php",
    method: "POST",
    data: {
      manager_id: managerID,
      firstname: firstName,
      lastname: lastName,
      username: username,
      password: password,
      salary: salary,
      email: email,
      phone_num: phone_num,
      gender: gender,
      birthdate: birthdate
    },
    dataType: "json",
    success: function(response) {
      // Handle the response from the server
      if (response.status === "success") {
        // If the update was successful, show the success message
        alert(response.message);

        // After successful response, hide the save button and show the edit button
        row.find(".save-btn").hide();
        row.find(".edit-btn").show();
        row.find("input[type='text']").prop("disabled", true); // Disable inputs
      } else {
        // If there was an error, show the error message
        alert("Error: " + response.message);
      }
    },
    error: function(xhr, status, error) {
      // Handle any errors that occur during the AJAX request
      console.error("AJAX Error:", error);
      alert("An error occurred while processing the request.");
    }
  });
}

$(".edit-btn").on("click", function(event) {
  event.preventDefault();
  var row = $(this).closest("tr");
  row.find(".edit-btn").hide();
  row.find(".save-btn").show();
  row.find("input[type='text']").prop("disabled", false); // Enable inputs for editing
});

$(".save-btn").on("click", function(event) {
  event.preventDefault();
  var row = $(this).closest("tr");
  sendDataToServer(row); // Only send data to the server and update buttons after successful response
});
});
</script>





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