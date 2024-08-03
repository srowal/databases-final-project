<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['drop-table'];

    $sql = "DROP TABLE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $table);

    if ($stmt->execute()) {
        echo "table deleted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "No table provided.";
}
