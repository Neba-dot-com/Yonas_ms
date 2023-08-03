
 
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

    <title>Manager Dashboard</title>
    <style type="text/css">
        .new hover{
            background-color: none;
        }
    </style>
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
/* CSS for the notification container */
.notification-container {
    position: fixed;
    top: 30%;
    right: 0;
    transform: translateY(-50%);
    background-color: #f2f2f2;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
}

/* CSS for the success notification */
.notification-container.success {
    background-color: #5cb85c;
    color: #fff;
}

/* CSS for the error notification */
.notification-container.error {
    background-color: #d9534f;
    color: #fff;
}
  </style>

</head>

<body>

    <!--  -->
    <div class="container">

        <!-- TopBar/Navbar -->
        <?php
        include "../../connection.php";
        include 'topbar.php';
        $page ='Dashboard';
        if (!isset($_SESSION['manager_user'])) {

          header("location:../Admin/log.php");
          exit();
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action']) && isset($_POST['id'])) {
            $action = $_POST['action'];
            $id = $_POST['id'];
    
            if ($action === 'decline') {
                $sql = "DELETE FROM category WHERE ID = $id";
    
        
            // Execute the SQL query
            $result = mysqli_query($conn, $sql);
        
            if ($result === TRUE) {
                // Set a session variable to indicate success
                $_SESSION['success_message'] = "One Category" . "<br> Removed successfully!";
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
            }
        
            
        
            // Check if the success_message session variable is set
            if (isset($_SESSION['success_message'])) {
                $success_message = $_SESSION['success_message'];
        
                // Clear the session variable to prevent reappearing after refreshing
                unset($_SESSION['success_message']);
            }
      }}
    }
        ?>


    </div>
        <!-- SideBar -->
        <?php 
        
        include "sidebar.php"
        ?>
        <div class="MainChartM">
        <?php if (isset($success_message)): ?>
            <div class="notification-container success">
                <?php echo $success_message; ?>
            </div>
            <script>
                setTimeout(function() {
                    document.querySelector('.notification-container').style.transform = 'translateY(-50%) translateX(100%)';
                }, 3000); // 3000 milliseconds (3 seconds)
            </script>
        <?php endif; ?>
                <div class="ChartM">

                    <h1>MANAGE CATEGORIES</h1> 
                        <div class="CardM">
                            <a href="newcategory.php"><button style="background:none;"><span style="color:#088178; hover:black; font-size:18px;"> ADD NEW CATEGORY </span></button> <i class="fas fa-medkit" style="color:black;"></i> </a>
                       
               </div>  <br>
                    <div> 
                       <table id="tableM">
                        <tr>
                        <th style="background-color:#f5f5f5;"> Name</th>
                        <th style="background-color:white;"> Quantity </th>
                        <th style="background-color:#f5f5f5;">Action</th>
                        </tr>
                        <?php
                        
                        $sql = "SELECT * FROM category";

      $res = $conn->query($sql);


if ($res->num_rows > 0) {
    while ($result = mysqli_fetch_array($res)) {
        $id = $result['id'];
        $category = $result['category'];
        $image = $result['image'];
        $description = $result['description'];

        $query_category = "SELECT COUNT(ID) AS number_of_category FROM items where CATEGORY ='$category'";
        $no_category_result = mysqli_query($conn, $query_category);
        $row_category = mysqli_fetch_assoc($no_category_result);
        $no_category = $row_category['number_of_category'];

        echo "
        <tr>
                            
        <td>$category</td> 
        <td>$no_category</td>                          
        <td> <button style='background: none;'> <i class='fas fa-pen' style='color: blue; '></i> <a href='edit_category.php?category=$category'>Edit</a></button> &nbsp &nbsp &nbsp &nbsp 
         </td>
         <td>
         <form action='managecategory.php' method='POST' style='border: none;' onsubmit=\"return confirm('Are you sure you want to Remove this Category?')\">
             <input type='hidden' name='id' value='$id'>
             <button type='submit' name='action' value='decline' style='background: none; border: none;' >
                 <i class='fas fa-user-times' style='color: red;'></i> Remove
             </button>
         </form>
     </td>
    </tr>
    
        ";
    }
  
  
  }
                        
                        ?>
                         <script>
                            function confirmAction(message) {
                                return confirm(message);
                            }
                        </script>

                       </table> 
                


            </div>
    </div>
                </div>


        </div>

    </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
    <script src="chart2.js"></script>

</body>

</html>