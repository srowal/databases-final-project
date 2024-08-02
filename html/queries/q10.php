<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT cm.membershipNumber, p.firstName, p.lastName
	FROM clubMembers cm
    INNER JOIN persons p on p.SSN = cm.SSN
    inner join associatedFamily as af on cm.membershipNumber = af.membershipNumber
	inner join associatedLocations as al on af.familyMemberSSN = al.familyMemberSSN
    WHERE cm.membershipNumber IN (
		select cm.membershipNumber from clubMembers cm
         inner join associatedFamily as af on cm.membershipNumber = af.membershipNumber
		inner join associatedLocations as al on af.familyMemberSSN = al.familyMemberSSN
		WHERE al.endDate IS NULL)
    GROUP BY cm.membershipNumber
    HAVING COUNT(DISTINCT al.locationID) >= 4
    ORDER BY
		cm.membershipNumber ASC";

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
