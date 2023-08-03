

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

    <title>Admin Dashboard</title>
    <style type="text/css">

    </style>
<!-- Include Chart.js library -->


</head>

<body>

<?php
include 'topbar.php';
$page ='Dashboard';
// Check if the user is logged in
if (!isset($_SESSION['admin_user'])) {

    header("location:log.php");
    exit();
}


$query_manager = "SELECT COUNT(ID) AS num_of_managers FROM manager";
$query_customer = "SELECT COUNT(ID) AS num_of_customers FROM register WHERE STA_TUS <> 'waiting'";

$no_manager_result = mysqli_query($conn, $query_manager);
$no_customer_result = mysqli_query($conn, $query_customer);

// Fetch the counts from the query results
$row_manager = mysqli_fetch_assoc($no_manager_result);
$row_customer = mysqli_fetch_assoc($no_customer_result);

$no_managers = $row_manager['num_of_managers'];
$no_customers = $row_customer['num_of_customers'];
// SQL query to retrieve customer counts for each month in the past 12 months
// SQL query to retrieve customer counts for each month in the past 12 months where status is "approved"
$sql = "SELECT 
            SUM(MONTHNAME(registration_date) = 'January') AS `Jan`,
            SUM(MONTHNAME(registration_date) = 'February') AS `Feb`,
            SUM(MONTHNAME(registration_date) = 'March') AS `Mar`,
            SUM(MONTHNAME(registration_date) = 'April') AS `Apr`,
            SUM(MONTHNAME(registration_date) = 'May') AS `May`,
            SUM(MONTHNAME(registration_date) = 'June') AS `Jun`,
            SUM(MONTHNAME(registration_date) = 'July') AS `Jul`,
            SUM(MONTHNAME(registration_date) = 'August') AS `Aug`,
            SUM(MONTHNAME(registration_date) = 'September') AS `Sep`,
            SUM(MONTHNAME(registration_date) = 'October') AS `Oct`,
            SUM(MONTHNAME(registration_date) = 'November') AS `Nov`,
            SUM(MONTHNAME(registration_date) = 'December') AS `Dec`
        FROM register
        WHERE registration_date >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND STA_TUS = 'approved'";

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Process the SQL result and retrieve customer counts for each month
if ($row = mysqli_fetch_assoc($result)) {
    $Jan = $row['Jan'];
    $Feb = $row['Feb'];
    $Mar = $row['Mar'];
    $Apr = $row['Apr'];
    $May = $row['May'];
    $Jun = $row['Jun'];
    $Jul = $row['Jul'];
    $Aug = $row['Aug'];
    $Sep = $row['Sep'];
    $Oct = $row['Oct'];
    $Nov = $row['Nov'];
    $Dec = $row['Dec'];
} else {
    // If no data found, set counts to 0 for all months
    $Jan = $Feb = $Mar = $Apr = $May = $Jun = $Jul = $Aug = $Sep = $Oct = $Nov = $Dec = 0;
}

// Close the database connection
mysqli_close($conn);


?>
      <!-- SideBar -->
        <?php include "sidebar.php"?>
 <!-- main content for approve customer-->
        

        <!-- Main Content -->
        <div class="Main1">

            <div class="MainCard1">

                <div class="Card">
                    <a href="viewcus.php">                    <div class="content">
                        <div class="num"><?php echo $no_customers;?></div>
                        <div class="name">Customers</div>
                    </div></a>
                    <div class="icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                </div>

                <div class="Card">
                    <a href="manager.php">
                    <div class="content">
                        <div class="num"><?php echo $no_managers;?></div>
                        <div class="name">Managers</div>
                    </div>
                    </a>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>

                <div class="Card">
                <a href="cashier.php">
                <div class="content">
                        <div class="num">2</div>
                        <div class="name">Cashier</div>
                    </div>
                </a>
                    <div class="icon">
                        <i class="fas fa-cash-register"></i>
                    </div>
                </div>


                <div class="Card">
                <a href="sales.php">
                <div class="content">
                        <div class="num">3</div>
                        <div class="name">SalesMan</div>
                    </div>
                </a>
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>




            </div>

            <!-- Charts -->
            <div class="MainChart">

                
                    <div class="Chart">
                        <h1>
                            Customers (Past 12 Months)
                        </h1>
                        <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <canvas id="lineChart"></canvas>
                            <script>

                    function updateChart1Data(Jan, Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec) {
                        MyChart.data.datasets[0].data = [Jan,Feb, Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec];
                        MyChart.update();
                    }


                                var ctx = document.getElementById("lineChart").getContext("2d");

                                var MyChart = new Chart(ctx, {
                                type: "line",
                                data: {
                                    labels: [
                                    "Jan",
                                    "Feb",
                                    "Mar",
                                    "Apr",
                                    "May",
                                    "Jun",
                                    "Jul",
                                    "Aug",
                                    "Sep",
                                    "Oct",
                                    "Nov",
                                    "Dec",
                                    ],
                                    datasets: [
                                    {
                                        label: "Number of customers",
                                        data: [
                                        2050, 1900, 2100, 2800, 1800, 2000, 2500, 2600, 2450, 1950, 2300,
                                        2900,
                                        ],
                                        backgroundColor: ["rgb(221,4,4"],
                                        borderColor: "#f30707",
                                        borderWidth: 1,
                                    },
                                    ],
                                },
                                options: {
                                    responsive: true,
                                },
                                });



                                function fetchDataAndUpdateChart() {
             
                        // Call the updateChartData function to update the Chart data
                        updateChart1Data(<?php echo $Jan; ?>, <?php echo $Feb; ?>,<?php echo $Mar; ?>,
                        <?php echo $Apr; ?>,<?php echo $May; ?>,<?php echo $Jun; ?>,<?php echo $Jul; ?>,<?php echo $Aug; ?>,
                        <?php echo $Sep; ?>,<?php echo $Oct; ?>,<?php echo $Nov; ?>,<?php echo $Dec; ?>);
                    }

                    // Call the fetchDataAndUpdateChart function to initially load the data and update the Chart
                    fetchDataAndUpdateChart();

                    // Optionally, you can set up a timer to fetch and update the data at regular intervals
                    // For example, to fetch data every 5 seconds:
                    setInterval(fetchDataAndUpdateChart, 1000);

                            </script>
                        </div>

                    </div>
                
                <div class="Chart doughnut-chart">
                    <h1>Employees</h1>
                    <div>
                                        <!-- Include Chart.js library -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <!-- Add the canvas element for the chart -->
                    <canvas id="doughnut"></canvas>

                    <script>
                    // Function to update the Chart data
                    function updateChartData(noManagers, noCustomers) {
                        myChart2.data.datasets[0].data = [3, noManagers, 2];
                        myChart2.update();
                    }

                    // Initial Chart configuration
                    var ctx2 = document.getElementById("doughnut").getContext("2d");
                    var myChart2 = new Chart(ctx2, {
                        type: "doughnut",
                        data: {
                        labels: [ "SalesMan", "Store Manager", "Cashier"],
                        datasets: [
                            {
                            label: "Employees",
                            data: [ 3, 2, 2],
                            backgroundColor: [
                                "#f30707",
                                "rgb(19, 0, 230)",
                                "rgb(252, 183, 9)",
                                "rgb(166, 1, 237)",
                            ],
                            borderColor: [
                                "#f30707",
                                "rgb(19, 0, 230)",
                                "rgb(252, 183, 9)",
                                "rgb(166, 1, 237)",
                            ],
                            borderWidth: 1,
                            },
                        ],
                        },
                        options: {
                        responsive: true,
                        },
                    });

                    // Function to fetch data from the PHP code and update the Chart
                    function fetchDataAndUpdateChart() {
             
                        // Call the updateChartData function to update the Chart data
                        updateChartData(<?php echo $no_managers; ?>);
                    }

                    // Call the fetchDataAndUpdateChart function to initially load the data and update the Chart
                    fetchDataAndUpdateChart();

                    // Optionally, you can set up a timer to fetch and update the data at regular intervals
                    // For example, to fetch data every 5 seconds:
                    setInterval(fetchDataAndUpdateChart, 5000);
                    </script>


                    </div>
                </div>


            </div>



        </div>

    </div>

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="show.js"></script>
   

</body>

</html>