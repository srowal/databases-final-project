<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['location']) and isset($_GET['date']) ) {
    $location = $_GET['location'];
    $date = $_GET['date'];
    
    $sql = "
SELECT
teamFormation.datetime AS startTime,
teamFormation.address,
teamFormation.type AS sessionType,
team1.name AS team1Name,
teamFormation.score1 AS team1Score,
headCoach1.firstName AS team1HeadCoachFirstName,
headCoach1.lastName AS team1HeadCoachLastName,
team2.name AS team2Name,
teamFormation.score2 AS team2Score,
headCoach2.firstName AS team2HeadCoachFirstName,
headCoach2.lastName AS team2HeadCoachLastName,
player1.firstName AS team1PlayerFirstName,
player1.lastName AS team1PlayerLastName,
playerRole1.position AS team1PlayerRole,
player2.firstName AS team2PlayerFirstName,
player2.lastName AS team2PlayerLastName,
playerRole2.position AS team2PlayerRole
FROM
teamFormation
JOIN
teams team1 ON teamFormation.team1ID = team1.teamID
JOIN
teams team2 ON teamFormation.team2ID = team2.teamID
JOIN
persons headCoach1 ON team1.headCoachSSN = headCoach1.SSN
JOIN
persons headCoach2 ON team2.headCoachSSN = headCoach2.SSN
LEFT JOIN
players playerRole1 ON team1.teamID = playerRole1.teamID
LEFT JOIN
clubMembers clubMember1 ON playerRole1.playerMembershipNumber =
clubMember1.membershipNumber
LEFT JOIN
persons player1 ON clubMember1.SSN = player1.SSN
LEFT JOIN
players playerRole2 ON team2.teamID = playerRole2.teamID
LEFT JOIN
clubMembers clubMember2 ON playerRole2.playerMembershipNumber =
clubMember2.membershipNumber
LEFT JOIN
persons player2 ON clubMember2.SSN = player2.SSN
WHERE
teamFormation.address = ? AND DATE(teamFormation.datetime) =
?
ORDER BY
teamFormation.datetime ASC;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $location, $date);
    
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
    echo "no info.";
}
