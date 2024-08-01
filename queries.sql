-- i. Complete details for every location in the system
SELECT 
address, 
    city, 
    province, 
    postalCode, 
    phoneNumber, 
    webAddress, 
    maxCapacity,
CASE 
WHEN h.locationID IS NOT NULL THEN 'Head'
        ELSE 'Branch'
END AS type,
    firstName as generalManagerFirstName,
    lastName as generalManagerlastName,
CASE 
WHEN totalMembers IS NULL THEN 0
        ELSE totalMembers
END as totalMembers
FROM 
locations l 
LEFT JOIN
(SELECT SSN, firstName, lastName FROM persons) p ON p.SSN = l.g_manager_id
LEFT JOIN 
head h ON l.locationID = h.locationID
LEFT JOIN (
SELECT locationID, COALESCE(COUNT(*), 0) as totalMembers
FROM 
associatedFamily af
JOIN 
associatedLocations al ON af.familyMemberSSN = al.familyMemberSSN
JOIN 
clubMembers cm ON cm.membershipNumber = af.membershipNumber
GROUP BY 
locationID ) t ON t.locationID = l.locationID
ORDER BY province, city;

-- ii. Report of family members registered in a location with the number of related active club members
SELECT 
    persons.firstName, 
    persons.lastName,
    COUNT(clubMembers.membershipNumber) AS numberOfActiveClubMembers
FROM 
    associatedLocations
JOIN 
    persons ON associatedLocations.familyMemberSSN = persons.SSN
LEFT JOIN 
    associatedFamily ON persons.SSN = associatedFamily.familyMemberSSN
LEFT JOIN 
    clubMembers ON associatedFamily.membershipNumber = clubMembers.membershipNumber
WHERE 
    associatedLocations.locationID = 2 -- change location ID to test other
    AND associatedLocations.endDate IS NULL -- if end date is null then they are still at location
GROUP BY 
    persons.firstName, persons.lastName;


-- iii. Report of all personnels currently operating in a given location
SELECT 
    persons.firstName, 
    persons.lastName, 
    persons.dateOfBirth, 
    persons.SSN, 
    persons.medicareNumber, 
    persons.phoneNumber, 
    persons.address, 
    persons.city,
    persons.province, 
    persons.postalCode, 
    persons.emailAddress, 
    operatesAT.role, 
    operatesAT.mandate
FROM 
    operatesAT
JOIN 
    persons ON operatesAT.SSN = persons.SSN
WHERE 
    operatesAT.locationID = 1 -- change location ID to test other


-- iv. Detailed list of all club members registered in the system
SELECT 
    locations.name AS locationName, 
    clubMembers.membershipNumber, 
    persons.firstName, 
    persons.lastName, 
    TIMESTAMPDIFF(YEAR, persons.dateOfBirth, CURDATE()) AS age, 
    persons.city,
    persons.province
FROM 
    clubMembers
JOIN 
    persons ON clubMembers.SSN = persons.SSN
LEFT JOIN 
    associatedFamily ON clubMembers.membershipNumber = associatedFamily.membershipNumber
LEFT JOIN 
    associatedLocations ON associatedFamily.familyMemberSSN = associatedLocations.familyMemberSSN
LEFT JOIN 
    locations ON associatedLocations.locationID = locations.locationID
WHERE
	associatedLocations.endDate IS NULL
ORDER BY 
    locations.name, 
    age;

-- v. Details of all associated club members with a given family member
SELECT 
    clubMembers.membershipNumber, 
    persons.firstName, 
    persons.lastName, 
    persons.dateOfBirth, 
    persons.SSN, 
    persons.medicareNumber, 
    persons.phoneNumber, 
    persons.address, 
    persons.city,
    persons.province, 
    persons.postalCode, 
    associatedFamily.relationship
FROM 
    associatedFamily
JOIN 
    clubMembers ON associatedFamily.membershipNumber = clubMembers.membershipNumber
JOIN 
    persons ON clubMembers.SSN = persons.SSN
WHERE 
    associatedFamily.familyMemberSSN = 765432111; -- change SSN to test other


-- vi. History of locations associated with a given family member
SELECT 
    locations.name AS locationName, 
    locations.province, 
    locations.city,
    associatedLocations.startDate, 
    associatedLocations.endDate
FROM 
    associatedLocations
JOIN 
    locations ON associatedLocations.locationID = locations.locationID
WHERE 
    associatedLocations.familyMemberSSN = 333222111 -- change SSN to test other
ORDER BY 
    associatedLocations.startDate ASC;


-- viii
SELECT
    cm.membershipNumber,
    l.name,
    al_1.startDate,
    al_2.startDate
FROM
    clubMembers as cm
    inner join persons as p on p.SSN = cm.SSN
    inner join associatedFamily as af on cm.membershipNumber = af.membershipNumber
    inner join associatedLocations as al_1 on af.familyMemberSSN = al_1.familyMemberSSN
    inner join locations as l on al_1.locationID = l.locationID
    inner join associatedLocations as al_2 on af.familyMemberSSN = al_2.familyMemberSSN
where
    (
        al_1.endDate IS NOT NULL
        AND al_1.startDate < al_2.startDate
    )
ORDER BY
    p.firstName,
    p.lastName,
    al_1.startDate ASC;



