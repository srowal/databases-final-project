<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT
    clubMembers.membershipNumber,
    persons.firstName,
    persons.lastName,
    TIMESTAMPDIFF(YEAR, persons.dateOfBirth, CURDATE()) AS age,
    persons.phoneNumber,
    persons.emailAddress,
    locations.name AS currentLocationName
    FROM
    clubMembers
    JOIN
    persons ON clubMembers.SSN = persons.SSN
    JOIN
    associatedFamily ON clubMembers.membershipNumber =
    associatedFamily.membershipNumber
    JOIN
    associatedLocations ON associatedFamily.familyMemberSSN =
    associatedLocations.familyMemberSSN AND associatedLocations.endDate IS NULL
    JOIN
    locations ON associatedLocations.locationID = locations.locationID
    JOIN
    players ON clubMembers.membershipNumber = players.playerMembershipNumber
    JOIN
    teamFormation ON players.teamID = teamFormation.team1ID OR players.teamID =
    teamFormation.team2ID
    LEFT JOIN
    players players_other ON clubMembers.membershipNumber =
    players_other.playerMembershipNumber AND players_other.position != 'Goalkeeper'
    WHERE
    players.position = 'Goalkeeper'
    AND players_other.playerMembershipNumber IS NULL
    GROUP BY
    clubMembers.membershipNumber, persons.firstName, persons.lastName, age,
    persons.phoneNumber, persons.emailAddress, locations.name
    ORDER BY
    locations.name ASC, clubMembers.membershipNumber ASC;";

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
