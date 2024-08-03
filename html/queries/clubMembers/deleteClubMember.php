<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $membershipNumber = $_POST["membershipNumber"];

    $sql = "DELETE FROM clubMembers WHERE membershipNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $membershipNumber);

    if ($stmt->execute()) {
        echo "Club Member deleted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}