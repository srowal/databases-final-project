<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $SSN = $_POST['SSN'];
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

    $sql1 = "INSERT INTO persons (SSN, firstName, lastName, dateOfBirth, medicareNumber, phoneNumber, address, city, province, postalCode, emailAddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("sssssssssss", $SSN, $firstName, $lastName, $dateOfBirth, $medicareNumber, $phoneNumber, $address, $city, $province, $postalCode, $emailAddress);

    $sql2 = "INSERT INTO familyMembers (SSN) VALUES (?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $SSN);

    if ($stmt1->execute() and $stmt2->execute()) {
        echo "New Family Member created successfully.";
    } else {
        echo "Error: " . $stmt1->error;
        echo "Error: " . $stmt2->error;
    }

    $stmt1->close();
    $stmt2->close();
    $conn->close();
}