<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT
    persons.firstName,
    persons.lastName,
    operatesAT.startDate AS startDateAsPresident,
    operatesAT.endDate AS lastDateAsPresident
    FROM
    operatesAT
    JOIN
    persons ON operatesAT.SSN = persons.SSN
    JOIN
    locations ON operatesAT.locationID = locations.locationID
    WHERE
    locations.type = 'Head' AND operatesAT.role = 'generalManager'
    ORDER BY
    persons.firstName ASC,
    persons.lastName ASC,
    operatesAT.startDate ASC;";

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
