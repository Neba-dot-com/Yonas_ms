<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['detail_info'];

    // Check if a new image file was uploaded
    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image1']['name'];
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["image1"]["tmp_name"], "../../images/" . $_FILES["image1"]["name"]);
    } else {
        // No new file was uploaded, so keep the existing image
        $image = $_POST['existing_image']; // Use the existing image name from the hidden input field
    }

    // Construct the SQL query
    $sql = "UPDATE category SET category='$name', image='$image', description='$desc' WHERE id=$id";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
        // Set a session variable to indicate success
        header("location:managerhome.php");
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // Check if the success_message session variable is set
    if (isset($_SESSION['success_message'])) {
        $success_message = $_SESSION['success_message'];

        // Clear the session variable to prevent reappearing after refreshing
        unset($_SESSION['success_message']);
    }
}
?>
