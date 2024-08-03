<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $relationship = $_POST['relationship'];
    $phoneNumber = $_POST['phoneNumber']; 

    $sql = "UPDATE secondaryFamilyMembers SET firstName = ?, lastName = ?, relationship = ?, phoneNumber = ?
        WHERE secondaryFamilyMemberID=?";  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $firstName, $lastName, $relationship, $phoneNumber, $id);

    if ($stmt->execute()) {
        echo "New Secondary Family updated successfully.";
    } else {
        echo "Error: " . $stmt->error;

    }

    $stmt->close();
    $conn->close();
}