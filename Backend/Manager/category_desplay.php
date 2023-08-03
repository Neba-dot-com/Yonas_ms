


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
    /* ... Previous CSS code ... */
    .quantity-cell {
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid #ddd;
  cursor: default; /* Set the cursor to default for the quantity cell */
  position: relative; /* Position relative for hover effect */
}

.quantity-cell.low-quantity {
  background-color: red; /* Red background color for low quantity */
}

.quantity-cell::before {
  content: attr(data-warning); /* Display warning text on hover */
  position: absolute;
  background-color: red; /* Set the background color to red */
  color: white;
  padding: 4px;
  border-radius: 4px;
  font-size: 12px;
  white-space: nowrap;
  display: none;
  bottom: 100%;
  left: 50%;
  transform: translateX(-50%);
}

.quantity-cell:hover::before {
  display: block;
}

.expire-soon {
  background-color: red; /* Set the background color to red for cells expiring soon */
  color: white; /* Set the text color to white for better contrast */
}


/* ... Remaining CSS code ... */

  </style>

</head>

<body>

    <!--  -->
    <div class="container">

        <!-- TopBar/Navbar -->
       <?php include 'topbar.php';
       $query = $_GET['category'];
       if ($query==='All'){
           $page ='';   
       }
       else {
           $page ='Dashboard';
       }
       
       // Check if the user is logged in
       if (!isset($_SESSION['manager_user'])) {
       
           header("location:../Admin/log.php");
           exit();
       }
       
       ?>
            



        </div>
        <!-- SideBar -->
        <?php include "sidebar.php"?>
                    <div class="MainChart2">

                <div class="Chart2">
                    <?php
                    
                    
                   
                    
                    
                            
                    ?>
                    <h1><?php echo $query; ?>  Products</h1> <br>
                    <div>
                    <?php
                        $sql = '';

                        if ($query === 'All') {
                            $sql = "SELECT * FROM items WHERE EXPIRE_DATE > CURDATE()";
                        } else {
                            $sql = "SELECT * FROM items WHERE category='$query' AND EXPIRE_DATE > CURDATE()";
                        }

                        $res = $conn->query($sql);
                        if($res->num_rows >0){
                            echo "
                       <table>
                        <tr>
                        
                        <th style='background-color:#f5f5f5;'>Name</th>
                        <th style='background-color:white;'>Category </th>
                        <th style='background-color:#f5f5f5;'></i>Supplier</th>
                        <th style='background-color:#f5f5f5;'>Price</th>
                        <th>Quantity</th>
                        <th>Expired Date</th>
                        </tr>
                            ";
                            while ($result = mysqli_fetch_array($res)){
                                $id = $result['ID'];
                                $product_name = $result['PRODUCT_NAME'];
                                $category = $result['CATEGORY'];
                                $supplier = $result['SUPPLIER'];
                                $expire = $result['EXPIRE_DATE'];
                                $price=$result['PRICE'];
                                $quantity=$result['QUANTITY'];

                                
                                $expireDateTime = new DateTime($expire);
                                $currentDateTime = new DateTime();
                                $interval = $currentDateTime->diff($expireDateTime);
                            
                                $daysLeft = $interval->days;
                                $hoursLeft = $daysLeft * 24 + $interval->h;
                            
                                $quantityClass = ($quantity <= 5) ? 'low-quantity' : '';
                                $warningText = ($quantity <= 5) ? 'Warning: the quantity is below or equal to 5' : '';
                                $expireClass = ($hoursLeft <= 48 || ($daysLeft <= 60 && $daysLeft > 1)) ? 'expire-soon' : '';
                                $expireDisplay = '';
                            
                                if ($expireDateTime < $currentDateTime) {
                                    $expireDisplay = "<span class='expired'>Expired</span>";
                                    $expireClass = 'expired'; // Apply expired class for red background
                                } elseif ($hoursLeft <= 24) {
                                    if ($hoursLeft <= 6) {
                                        $expireDisplay = 'tomorrow';
                                    } else {
                                        $expireDisplay = "<span class='warning'>$hoursLeft hours left</span>";
                                    }
                                } elseif ($daysLeft <= 60 && $daysLeft > 1) {
                                    $monthsLeft = floor($daysLeft / 30);
                                    $remainingDays = $daysLeft % 30;
                                    $expireDisplay = "<span class='warning'>$monthsLeft month" . ($monthsLeft > 1 ? 's' : '') . " and $remainingDays day" . ($remainingDays > 1 ? 's' : '') . ' left</span>';
                                } else {
                                    $expireDisplay = $expire;
                                }
                            

                                echo "
                                
                                <tr>
                                <td>$product_name</td>
                                <td>$category</td>
                                <td>$supplier</td>
                                <td>$price</td>
                                <td class=\"quantity-cell $quantityClass\" data-quantity=\"$quantity\" data-warning=\"$warningText\">$quantity</td>
                                <td class=\"$expireClass\">$expireDisplay</td>
                                
                               <td> <a href='edit.php?id=$id'><button style='background:none;'> <i class='fas fa-pen' style='color: green;'></i> &nbsp &nbsp <b style='color:blue;'> Edit </b> </span></button></a> </td>
                               <td> <button style='background:none;'> <i class='fas fa-times' style='color: red;'></i> &nbsp &nbsp <b style='color:blue;'> Remove </b> </span></button> </td>
                            </tr>
                             
                                ";
                            
                            
                            
                            
                            }}
                            else {
                                // If there are no waiting customers, display the message
                                echo "<h1 style='text-align: center; color: #ff0000;'>No Avaliable item for this category</h1>";
                            }
                        
                        ?>

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