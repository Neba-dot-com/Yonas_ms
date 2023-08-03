<?php
// update_manager.php

// Place your database connection code here
// ...
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the data from the AJAX request
    $managerID = $_POST["manager_id"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $salary = $_POST["salary"];
    $email = $_POST["email"];
    $phone_num = $_POST["phone_num"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];

    // Prepare the SQL statement
    $sql = "UPDATE salesman SET FIRST_NAME = ?, LAST_NAME = ?, USER_NAME = ?, PASS_WORD = ?, EMAIL = ?, PHONE_NO = ?, SALARY = ?, GENDAR = ?, BIRTH_DATE = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("sssssssssi", $firstName, $lastName, $username, $password, $email, $phone_num, $salary, $gender, $birthdate, $managerID);

    // Execute the statement
    if ($stmt->execute()) {
        // The update was successful
        $response = array("status" => "success", "message" => "Record updated successfully");
    } else {
        // Handle errors if the update fails
        $response = array("status" => "error", "message" => "Error: " . $stmt->error);
    }



    // Output the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit(); // Make sure nothing else is output after this
}
?>
