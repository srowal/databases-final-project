-- 7.
SELECT
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
locations.city ASC;

#8
SELECT sm.firstName, sm.lastName, sm.phoneNumber, p.firstName, p.lastName, p.dateOfBirth, p.SSN, p.medicareNumber, p.phoneNumber, p.address, p.city, p.province, p.postalCode, sm.relationship
	FROM secondaryFamilyMembers sm
    left JOIN familyMembers fm on fm.secondaryFamilyMemberID = sm.secondaryFamilyMemberID
    left JOIN associatedFamily am on am.familyMemberSSN = fm.SSN
    left JOIN clubMembers c on c.membershipNumber = am.membershipNumber
    left JOIN persons p on p.SSN = c.SSN
    -- CHOSE USER BELOW
    WHERE fm.SSN = 777666555;

-- 9.
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
teamFormation.address = '202 Birch Lane' AND DATE(teamFormation.datetime) =
'2024-08-05'
ORDER BY
teamFormation.datetime ASC;

#10
SELECT cm.membershipNumber, p.firstName, p.lastName
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
		cm.membershipNumber ASC;

-- 11.
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
teamFormation.datetime BETWEEN '2024-01-01' AND '2024-08-31'
GROUP BY
teamFormation.address
HAVING
COUNT(DISTINCT gameSessions.teamFormationID) >= 3
ORDER BY
totalGameSessions DESC;
	
# 12
SELECT DISTINCT cm.membershipNumber, p.firstName, p.lastName, TIMESTAMPDIFF(YEAR, p.dateOfBirth, CURDATE()) AS age, p.phoneNumber, p.emailAddress, l.name
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
ORDER BY l.name, cm.membershipNumber ASC;

-- 13.
SELECT
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
locations.name ASC, clubMembers.membershipNumber ASC;        
        
#14
SELECT cm.membershipNumber, p.firstName, p.lastName, TIMESTAMPDIFF(YEAR, p.dateOfBirth, CURDATE()) AS age, p.phoneNumber, p.emailAddress, l.name
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
ORDER BY l.name ASC, cm.membershipNumber ASC;

SELECT DISTINCT
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
associatedLocations.locationID = 9
ORDER BY
persons.firstName, persons.lastName;

#16
SELECT cm.membershipNumber, p.firstName, p.lastName, TIMESTAMPDIFF(YEAR, p.dateOfBirth, CURDATE()) AS age, p.phoneNumber, p.emailAddress, l.name AS locationName
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
ORDER BY l.name, cm.membershipNumber ASC;

-- 17.
SELECT
persons.firstName,
persons.lastName,
operatesAT.startDate AS startDateAsPresident,
operatesAT.endDate AS lastDateAsPresident
FROM
operatesAT
JOIN
persons ON operatesAT.SSN = persons.SSN
JOIN
locations ON operatesAT.locationID = locations.locationID
WHERE
locations.type = 'Head' AND operatesAT.role = 'generalManager'
ORDER BY
persons.firstName ASC,
persons.lastName ASC,
operatesAT.startDate ASC;

#18
SELECT p.firstName, p.lastName, p.phoneNumber, p.emailAddress, l.name AS locationName, op.role, op.mandate
FROM personnels pn
INNER JOIN persons p ON pn.SSN = p.SSN
INNER JOIN operatesAT op on op.SSN = p.SSN
INNER JOIN locations l ON op.locationID = l.locationID
LEFT JOIN familyMembers fm ON p.SSN = fm.SSN
WHERE op.mandate = 'volunteer'
AND fm.SSN IS NULL
ORDER BY l.name, op.role, p.firstName, p.lastName ASC;


        