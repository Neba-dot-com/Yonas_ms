<?php
include '../../connection.php';
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $generic_name = $_POST['generic_name'];
    $drug_class = $_POST['drug_class'];
    $dosage_forms=$_POST['dosage_forms'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $before_taking = $_POST['before_taking'];
    $how_to_take = $_POST['how_to_take'];
    $miss_dose = $_POST['miss_dose']; // Corrected name
    $over_dose = $_POST['over_dose'];
    $side_effects = $_POST['side_effects'];

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
        // Use prepared statement with parameter binding for update
        $stmt = $conn->prepare("UPDATE mdguide SET Title=?, generic_name=?, drug_class=?, dosage_forms=?, price=?, des_cription=?, before_taking=?, how_to_take=?, miss_dose=?, over_dose=?, side_effects=?, img1=?, img2=?, img3=?, img4=? WHERE id=?");

        // Bind the parameters to the prepared statement
        $stmt->bind_param("ssssdssssssssssi", $title, $generic_name, $drug_class, $dosage_forms, $price, $description, $before_taking, $how_to_take, $miss_dose, $over_dose, $side_effects, $image, $image1, $image2, $image3, $id);


        if ($stmt->execute()) {
            // Redirect back to the previous page
            header("Location: " . $_SESSION['previous_page']);
            exit; // Make sure to exit after sending the header to prevent further script execution
        } else {
            $error_message = "Error updating record: " . $stmt->error;
            // Handle the error appropriately, like redirecting to an error page
            // header("Location: error_page.php");
            // exit();
        }

        $stmt->close();
        $conn->close();

}

?>