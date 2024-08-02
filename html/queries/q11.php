<?php
require_once "../config.php";
include "../include/header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['fromDate']) and isset($_GET['toDate']) ) {
    $fromDate = $_GET['fromDate'];
    $toDate = $_GET['toDate'];
    
    $sql = "
SELECT
teamFormation.address AS location,
COUNT(DISTINCT trainingSessions.teamFormationID) AS totalTrainingSessions,
COUNT(DISTINCT trainingPlayers.playerMembershipNumber) AS
totalPlayersInTrainingSessions,
COUNT(DISTINCT gameSessions.teamFormationID) AS totalGameSessions,
COUNT(DISTINCT gamePlayers.playerMembershipNumber) AS
totalPlayersInGameSessions
FROM
teamFormation
LEFT JOIN
teamFormation trainingSessions ON teamFormation.teamFormationID =
trainingSessions.teamFormationID AND trainingSessions.type = 'Training'
LEFT JOIN
players trainingPlayers ON trainingSessions.team1ID = trainingPlayers.teamID OR
trainingSessions.team2ID = trainingPlayers.teamID
LEFT JOIN
teamFormation gameSessions ON teamFormation.teamFormationID =
gameSessions.teamFormationID AND gameSessions.type = 'Game'
LEFT JOIN
players gamePlayers ON gameSessions.team1ID = gamePlayers.teamID OR
gameSessions.team2ID = gamePlayers.teamID
WHERE
teamFormation.datetime BETWEEN ? AND ?
GROUP BY
teamFormation.address
HAVING
COUNT(DISTINCT gameSessions.teamFormationID) >= 3
ORDER BY
totalGameSessions DESC;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fromDate, $toDate);
    
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

// '2024-01-01' AND '2024-08-31'