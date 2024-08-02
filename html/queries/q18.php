<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT p.firstName, p.lastName, p.phoneNumber, p.emailAddress, l.name AS locationName, op.role, op.mandate
    FROM personnels pn
    INNER JOIN persons p ON pn.SSN = p.SSN
    INNER JOIN operatesAT op on op.SSN = p.SSN
    INNER JOIN locations l ON op.locationID = l.locationID
    LEFT JOIN familyMembers fm ON p.SSN = fm.SSN
    WHERE op.mandate = 'volunteer'
    AND fm.SSN IS NULL
    ORDER BY l.name, op.role, p.firstName, p.lastName ASC;";

$result = $conn->query($sql);

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

$conn->close();
