<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $playerMembershipNumber = $_POST['playerMembershipNumber'];
    $teamID = $_POST['teamID'];
    $position = $_POST['position'];

    $sql = "INSERT INTO players (playerMembershipNumber, teamID, position) 
    VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $playerMembershipNumber, $teamID, $position);

    if ($stmt->execute()) {
        echo "Member assigned.";
    } else {
        echo "Error: " . $stmt->error;

    }

    $stmt->close();

    $conn->close();
}