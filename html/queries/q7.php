<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    global $conn;

    $sql = "SELECT
        locations.name,
        locations.address,
        locations.city,
        locations.province,
        locations.postalCode,
        locations.phoneNumber,
        locations.webAddress,
        locations.type,
        locations.maxCapacity AS capacity,
        persons.firstName AS generalManagerFirstName,
        persons.lastName AS generalManagerLastName,
        COUNT(associatedLocations.familyMemberSSN) AS numberOfClubMembers
        FROM
        locations
        LEFT JOIN
        personnels ON locations.g_manager_id = personnels.SSN
        LEFT JOIN
        persons ON personnels.SSN = persons.SSN
        LEFT JOIN
        associatedLocations ON locations.locationID = associatedLocations.locationID
        GROUP BY
        locations.locationID
        ORDER BY
        locations.province ASC,
        locations.city ASC";

    $result = $conn->query($sql);

    

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "generalManagerFirstName: " . $row["generalManagerFirstName"] . "<br>";
            echo "generalManagerlastName: " . $row["generalManagerLastName"] . "<br>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Phone Number: " . $row["phoneNumber"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "City: " . $row["city"] . "<br>";
            echo "Province: " . $row["province"] . "<br>";
            echo "Postal Code: " . $row["postalCode"] . "<br>";
            echo "Max Capacity: " . $row["capacity"] . "<br>";
            echo "Web Address: " . $row["webAddress"] . "<br>";
            echo "Type: " . $row["type"] . "<br>";
            echo "Total Members: " . $row["numberOfClubMembers"] . "<br><br>";
        }
    } else {
        echo "No results";
    }

    $conn->close();
