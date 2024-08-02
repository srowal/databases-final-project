<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['locationID'])) {
    $locationID = $_GET['locationID'];

    $sql = "SELECT DISTINCT
        persons.firstName,
        persons.lastName,
        persons.phoneNumber
        FROM
        familyMembers
        JOIN
        persons ON familyMembers.SSN = persons.SSN
        JOIN
        associatedFamily ON familyMembers.SSN = associatedFamily.familyMemberSSN
        JOIN
        clubMembers ON associatedFamily.membershipNumber =
        clubMembers.membershipNumber
        JOIN
        associatedLocations ON familyMembers.SSN = associatedLocations.familyMemberSSN
        AND associatedLocations.endDate IS NULL
        JOIN
        teams ON familyMembers.SSN = teams.headCoachSSN AND teams.locationID =
        associatedLocations.locationID
        JOIN
        teamFormation ON (teams.teamID = teamFormation.team1ID OR teams.teamID =
        teamFormation.team2ID)
        WHERE
        associatedLocations.locationID = ?
        ORDER BY
        persons.firstName, persons.lastName;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $locationID);
    
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
    echo "No locationID provided.";
}
