<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $locationID = $_POST['locationID'];

    $sql = "DELETE FROM locations WHERE locationID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $locationID);

    if ($stmt->execute()) {
        echo "Location deleted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "No locationID provided.";
}