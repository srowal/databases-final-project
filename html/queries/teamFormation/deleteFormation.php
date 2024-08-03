<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teamFormationID = $_POST["teamFormationID"];

    $sql = "DELETE FROM teamFormation WHERE teamFormationID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $teamFormationID);

    if ($stmt->execute()) {
        echo "Team Formation deleted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}