<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['SSN'])) {
    $SSN = $_GET['SSN'];

    $sql = "
    SELECT sm.firstName as secondaryMemberFirstName, sm.lastName as secondaryMemberLastName, sm.phoneNumber as secondaryMemberPhoneNumber, p.firstName, p.lastName, p.dateOfBirth, p.SSN, p.medicareNumber, p.phoneNumber, p.address, p.city, p.province, p.postalCode, sm.relationship as secondaryMemberRelationship
    FROM secondaryFamilyMembers sm
        left JOIN familyMembers fm on fm.secondaryFamilyMemberID = sm.secondaryFamilyMemberID
        left JOIN associatedFamily am on am.familyMemberSSN = fm.SSN
        left JOIN clubMembers c on c.membershipNumber = am.membershipNumber
        left JOIN persons p on p.SSN = c.SSN
        WHERE fm.SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $SSN);
    
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
    echo "No SSN provided.";
}
