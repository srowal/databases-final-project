<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $membershipNumber = $_POST["membershipNumber"];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $medicareNumber = $_POST['medicareNumber'];
    $phoneNumber = $_POST['phoneNumber']; 
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postalCode'];
    $emailAddress = $_POST['emailAddress'];

    $sql = "UPDATE persons SET firstName = ?, lastName = ?, dateOfBirth = ?, 
        medicareNumber = ?, phoneNumber = ?, address = ?, city = ?, province = ?, 
        postalCode = ?, emailAddress = ? 
        WHERE SSN IN (SELECT SSN FROM clubMembers WHERE membershipNumber = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssi", $firstName, $lastName, $dateOfBirth, $medicareNumber, $phoneNumber, $address, $city, $province, $postalCode, $emailAddress, $membershipNumber);


    if ($stmt->execute()) {
        echo "Family Member updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}