-- ii. Report of family members registered in a location with the number of related active club members
-- !!! ASSOCIATED LOCATIONS NOT POPULATED !!!
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
-- !!! ASSOCIATED LOCATIONS NOT POPULATED !!!
-- !!! Need to add CITY to locations table !!!
SELECT 
    locations.name AS locationName, 
    clubMembers.membershipNumber, 
    persons.firstName, 
    persons.lastName, 
    TIMESTAMPDIFF(YEAR, persons.dateOfBirth, CURDATE()) AS age, 
    persons.address, -- used address instead but assignment wants city
    persons.province
FROM 
    clubMembers
JOIN 
    persons ON clubMembers.SSN = persons.SSN
LEFT JOIN 
    associatedLocations ON clubMembers.SSN = associatedLocations.familyMemberSSN
LEFT JOIN 
    locations ON associatedLocations.locationID = locations.locationID
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
    associatedFamily.familyMemberSSN = 333222111; -- change SSN to test other


-- vi. History of locations associated with a given family member
-- !!! ASSOCIATED LOCATIONS NOT POPULATED !!!
SELECT 
    locations.name AS locationName, 
    locations.province, 
    locations.address, -- used address instead but assignment wants city
    associatedLocations.startDate, 
    associatedLocations.endDate
FROM 
    associatedLocations
JOIN 
    locations ON associatedLocations.locationID = locations.locationID
WHERE 
    associatedLocations.familyMemberSSN = 666555444 -- change SSN to test other
ORDER BY 
    associatedLocations.startDate ASC;


-- viii
SELECT cm.membershipNumber, l.name, al_1.startDate, al_2.startDate
FROM clubMembers as cm
inner join persons as p on p.SSN = cm.SSN
inner join associatedFamily as af on cm.membershipNumber = af.membershipNumber
inner join associatedLocations as al_1 on af.familyMemberSSN = al_1.familyMemberSSN
inner join locations as l on al_1.locationID = l.locationID
inner join associatedLocations as al_2 on af.familyMemberSSN = al_2.familyMemberSSN
	where (al_1.endDate IS NOT NULL AND al_1.startDate < al_2.startDate)
ORDER BY p.firstName, p.lastName, al_1.startDate ASC;

