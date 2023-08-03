<?php
 include "../../connection.php";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id'];
    $title=$_POST['title'];
    $par1=$_POST['para1'];
    $par2=$_POST['para2'];
    $par3=$_POST['para3'];

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
    $sql = "UPDATE blog SET Title='$title', img='$image', para1='$par1',para2='$par2',para3='$par1' WHERE id=$id";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
        // Set a session variable to indicate success
        header("location:blog.php");
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


}
?>