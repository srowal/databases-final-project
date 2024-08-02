<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['locationID'])) {
    $locationID = $_GET['locationID'];

    $sql = "SELECT * FROM locations WHERE locationID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $locationID);
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Location ID: " . $row["locationID"] . "<br>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Phone Number: " . $row["phoneNumber"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "City: " . $row["city"] . "<br>";
            echo "Province: " . $row["province"] . "<br>";
            echo "Postal Code: " . $row["postalCode"] . "<br>";
            echo "Max Capacity: " . $row["maxCapacity"] . "<br>";
            echo "Web Address: " . $row["webAddress"] . "<br>";
            echo "General Manager ID: " . $row["g_manager_id"] . "<br>";
            echo "Type: " . $row["type"] . "<br>";
        }
    } else {
        echo "No results";
    }

    $stmt->close();
    $conn->close();

} else {
    echo "No locationID provided.";
}