<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['teamFormationID'])) {
    $teamFormationID = $_GET['teamFormationID'];

    $sql = "SELECT * FROM teamFormation WHERE teamFormationID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $teamFormationID);
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $key => $value){
                echo "$key : $value <br>";
            }
            echo "<br>";
        }
    }
    else {
        echo "No results";
    }


    $stmt->close();
    $conn->close();

} else {
    echo "No formation ID provided.";
}