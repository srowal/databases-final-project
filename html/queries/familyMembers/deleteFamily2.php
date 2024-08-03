<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM secondaryFamilyMembers WHERE secondaryFamilyMemberID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        echo "Secondary Family Member deleted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}