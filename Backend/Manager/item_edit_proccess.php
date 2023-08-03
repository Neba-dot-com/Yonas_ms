<?php

include '../../connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

var_dump($_POST); // Add this line to check the contents of $_POST

if (isset($_POST['save'])) {
    // Collect the image files from the form

            
    // Check if a new image file was uploaded
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['main_image']['name'];
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["main_image"]["tmp_name"], "../../images/" . $_FILES["main_image"]["name"]);
    } else {
        // No new file was uploaded, so keep the existing image
        $image = $_POST['existing_image']; // Use the existing image name from the hidden input field
    }
    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        $image1 = $_FILES['image1']['name'];
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["image1"]["tmp_name"], "../../images/" . $_FILES["image1"]["name"]);
    } else {
        // No new file was uploaded, so keep the existing image
        $image1 = $_POST['existing_image1']; // Use the existing image name from the hidden input field
    }

    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        $image2 = $_FILES['image2']['name'];
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["image2"]["tmp_name"], "../../images/" . $_FILES["image2"]["name"]);
    } else {
        // No new file was uploaded, so keep the existing image
        $image2 = $_POST['existing_image2']; // Use the existing image name from the hidden input field
    }
    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        $image3 = $_FILES['image3']['name'];
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["image3"]["tmp_name"], "../../images/" . $_FILES["image3"]["name"]);
    } else {
        // No new file was uploaded, so keep the existing image
        $image3 = $_POST['existing_image3']; // Use the existing image name from the hidden input field
    }

    // Process other form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $generic_name = $_POST['generic_name'];
    $brand_name = $_POST['brand_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $featured = $_POST['featured'];
    $new_arival = $_POST['new_arival'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier']; // Corrected name
    $exp_date = $_POST['exp_date'];
    $detail_info = $_POST['detail_info'];
    $featured = (int)$featured;
    $new_arival = (int)$new_arival;

    // Fix the syntax error and add proper quotes in the UPDATE query
    $sql1 = "UPDATE items SET PRODUCT_NAME='$name', GENERIC_NAME='$generic_name', BRAND_NAME='$brand_name', QUANTITY='$quantity', PRICE='$price',
            CATEGORY='$category', SUPPLIER='$supplier', FEATURED=$featured, NEW_ARIVALS=$new_arival, DETAIL_INFO='$detail_info', EXPIRE_DATE='$exp_date', image='$image' WHERE ID=$id";

    // Add proper quotes in the UPDATE query for $sql2
    $sql2 = "UPDATE images SET image1='$image1', image2='$image2', image3='$image3' WHERE ID=$id";

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    if ($result1 && $result2) {
        // Redirect back to the previous page
        header("Location: " . $_SESSION['previous_page']);
        exit; // Make sure to exit after sending the header to prevent further script execution
    } else {
        echo "Error updating tables: " . mysqli_error($conn);
    }
    

    // Close the connection when done
    mysqli_close($conn);
}
?>
