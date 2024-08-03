<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['drop-table'];

    // Validate and sanitize the table name
    if (preg_match('/^[a-zA-Z0-9_]+$/', $table)) {
        $sql = "DROP TABLE `$table`";
        if ($conn->query($sql) === TRUE) {
            echo "Table '$table' deleted successfully.";
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid table name.";
    }
} else {
    echo "No table provided.";
}
?>