<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT cm.membershipNumber, p.firstName, p.lastName, TIMESTAMPDIFF(YEAR, p.dateOfBirth, CURDATE()) AS age, p.phoneNumber, p.emailAddress, l.name
    FROM clubMembers cm
    INNER JOIN persons p ON cm.SSN = p.SSN
    INNER JOIN associatedFamily af on af.membershipNumber = cm.membershipNumber
    INNER JOIN associatedLocations al ON af.familyMemberSSN = al.familyMemberSSN
    INNER JOIN locations l ON al.locationID = l.locationID
    WHERE al.endDate IS NULL 
    AND cm.membershipNumber IN (
        SELECT play.playerMembershipNumber
        FROM players play
        GROUP BY playerMembershipNumber
        HAVING 
            SUM(play.position = 'Goalkeeper') > 0 AND
            SUM(play.position = 'Defender') > 0 AND
            SUM(play.position = 'Midfielder') > 0 AND
            SUM(play.position = 'Forward') > 0
    )
    ORDER BY l.name ASC, cm.membershipNumber ASC;";

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
