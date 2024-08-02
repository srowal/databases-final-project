<?php
require_once "../../config.php";
include "../../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['SSN'])) {
    $SSN = $_GET['SSN'];

    $sql = "SELECT * FROM personnels JOIN persons ON personnels.SSN=persons.SSN WHERE personnels.SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $SSN);
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "SSN: " . $row["SSN"] . "<br>";
            echo "firstName: " . $row["firstName"] . "<br>";
            echo "lastName: " . $row["lastName"] . "<br>";
            echo "dateOfBirth: " . $row["dateOfBirth"] . "<br>";
            echo "medicareNumber: " . $row["medicareNumber"] . "<br>";
            echo "Phone Number: " . $row["phoneNumber"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "City: " . $row["city"] . "<br>";
            echo "Province: " . $row["province"] . "<br>";
            echo "Postal Code: " . $row["postalCode"] . "<br>";
            echo "emailAddress: " . $row["emailAddress"] . "<br>";
        }
    } else {
        echo "No results";
    }

    $stmt->close();
    $conn->close();

} else {
    echo "No SSN provided.";
}