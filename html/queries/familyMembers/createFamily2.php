<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $relationship = $_POST['relationship'];
    $phoneNumber = $_POST['phoneNumber']; 

    $sql = "INSERT INTO secondaryFamilyMembers (firstName, lastName, relationship, phoneNumber) VALUES (?, ?, ?, ?)";  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $relationship, $phoneNumber);

    if ($stmt->execute()) {
        echo "New Secondary Family Member created successfully.";
    } else {
        echo "Error: " . $stmt->error;

    }

    $stmt->close();
    $conn->close();
}