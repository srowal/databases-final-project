<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT DISTINCT cm.membershipNumber, p.firstName, p.lastName, TIMESTAMPDIFF(YEAR, p.dateOfBirth, CURDATE()) AS age, p.phoneNumber, p.emailAddress, l.name
    FROM clubMembers cm
    INNER JOIN persons p on cm.SSN = p.SSN
    INNER JOIN associatedFamily af on cm.membershipNumber = af.membershipNumber
    INNER JOIN associatedLocations al on al.familyMemberSSN
    INNER JOIN locations l on al.locationID = l.locationID 
    WHERE al.endDate is NULL AND cm.membershipNumber NOT IN (
        select p.playerMembershipNumber from teamFormation tf
            inner join teams t1 on t1.teamID = tf.team1ID
            inner join players p on p.teamID = t1.teamID
        UNION
        select p.playerMembershipNumber from teamFormation tf
            inner join teams t2 on t2.teamID = tf.team2ID
            inner join players p on p.teamID = t2.teamID)
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
