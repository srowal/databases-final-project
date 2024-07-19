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

