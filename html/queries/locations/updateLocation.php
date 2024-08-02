<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $locationID = $_POST['locationID'];
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber']; 
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postalCode'];
    $maxCapacity = $_POST['maxCapacity'];
    $webAddress = $_POST['webAddress'];
    $g_manager_id = $_POST['g_manager_id'];
    $type = $_POST['type'];

    $sql = "UPDATE locations SET name = ?, phoneNumber = ?, address = ?, city = ?, province = ?, postalCode = ?, maxCapacity = ?, webAddress = ?, g_manager_id = ?, type = ? WHERE locationID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssisssi", $name, $phoneNumber, $address, $city, $province, $postalCode, $maxCapacity, $webAddress, $g_manager_id, $type, $locationID);

    if ($stmt->execute()) {
        echo "Location updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}