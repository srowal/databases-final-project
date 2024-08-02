<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SSN = $_POST["SSN"];

    $sql = "DELETE FROM personnels WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $SSN);

    if ($stmt->execute()) {
        echo "Personnel deleted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}