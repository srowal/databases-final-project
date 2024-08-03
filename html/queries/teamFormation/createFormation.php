<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $address = $_POST['address'];
    $datetime = $_POST['datetime'];
    $type = $_POST['type'];
    $team1ID = $_POST['team1ID'];
    $team2ID = $_POST['team2ID'];
    $score1 = $_POST['score1']; 
    $score2 = $_POST['score2'];

    $sql = "INSERT INTO teamFormation (address, datetime, type, team1ID, team2ID, score1, score2) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiii", $address, $datetime, $type, $team1ID, $team2ID, $score1, $score2);

    if ($stmt->execute()) {
        echo "New Team Formation created successfully.";
    } else {
        echo "Error: " . $stmt->error;

    }

    $stmt->close();

    $conn->close();
}