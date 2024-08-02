<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT cm.membershipNumber, p.firstName, p.lastName, TIMESTAMPDIFF(YEAR, p.dateOfBirth, CURDATE()) AS age, p.phoneNumber, p.emailAddress, l.name AS locationName
FROM clubMembers cm
INNER JOIN persons p ON cm.SSN = p.SSN
INNER JOIN associatedFamily af ON af.membershipNumber = cm.membershipNumber
INNER JOIN associatedLocations al ON af.familyMemberSSN = al.familyMemberSSN
INNER JOIN locations l ON al.locationID = l.locationID
INNER JOIN players play ON cm.membershipNumber = play.playerMembershipNumber
INNER JOIN teamFormation tf ON (play.teamID = tf.team1ID OR play.teamID = tf.team2ID)
GROUP BY cm.membershipNumber, p.firstName, p.lastName, p.dateOfBirth, p.phoneNumber, p.emailAddress, l.name
HAVING COUNT(tf.teamFormationID) > 0
   AND cm.membershipNumber NOT IN (
       SELECT p.playerMembershipNumber
       FROM players p
       INNER JOIN teamFormation tf1 ON p.teamID = tf1.team1ID
       WHERE tf1.score1 <= tf1.score2
       UNION
       SELECT p.playerMembershipNumber
       FROM players p
       INNER JOIN teamFormation tf2 ON p.teamID = tf2.team2ID
       WHERE tf2.score2 <= tf2.score1
   )
ORDER BY l.name, cm.membershipNumber ASC;";

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
