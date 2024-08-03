<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $playerMembershipNumber = $_POST['playerMembershipNumber'];
    $teamID = $_POST['teamID'];

    $sql = "DELETE FROM players WHERE playerMembershipNumber=? AND teamID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $playerMembershipNumber, $teamID);

    if ($stmt->execute()) {
        echo "Member removed from team.";
    } else {
        echo "Error: " . $stmt->error;

    }

    $stmt->close();

    $conn->close();
}