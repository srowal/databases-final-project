-- USE comp335a1;

CREATE TABLE Persons(
    SSN char(9),
    firstName varchar(25),
    lastName varchar(25),
    dateOfBirth date,
    medicareNumber varchar(12),
    phoneNumber char(10),
    address varchar(255),
    province varchar(2),
    postalCode char(6),
    emailAddress varchar(255),
    PRIMARY KEY (SSN)
);

CREATE TABLE Personnels(
    SSN char(9),
    PRIMARY KEY (SSN),
    FOREIGN KEY (SSN) REFERENCES Persons(SSN)
);

-- autoincrement id--
-- add check for age b/w 4-10 --
CREATE TABLE ClubMembers(
    membershipNumber int,
    SSN char(9),
    PRIMARY KEY (membershipNumber),
    FOREIGN KEY (SSN) REFERENCES Persons(SSN)
);

CREATE TABLE Locations(
    locationID int,
    name varchar(255),
    phoneNumber char(10),
    address varchar(255),
    province char(2),
    postalCode char(6),
    capacity int,
    webAddress varchar(255),
    PRIMARY KEY (locationID)
)

CREATE TABLE operatesAT(
    SSN char(9),
    locationID int,
    role varchar(22),
    mandate varchar(20),
    startDate date,
    endDate date,
    PRIMARY KEY (SSN, locationID, role, mandate, startDate),
    FOREIGN KEY (SSN) REFERENCES Persons(SSN)
);

CREATE TABLE familyMembers(
    SSN char(9),
    PRIMARY KEY (SSN),
    FOREIGN KEY (SSN) REFERENCES Persons(SSN)
);

CREATE TABLE associatedFamily(
    familyMemberSSN char(9),
    membershipNumber int,
    relationship varchar(22),
    startDate date,
    endDate date,
    PRIMARY KEY (familyMemberSSN, membershipNumber, startDate),
    FOREIGN KEY (familyMemberSSN) REFERENCES Persons(SSN),
    FOREIGN KEY (membershipNumber) REFERENCES ClubMembers(membershipNumber)
);



CREATE TABLE associatedLocation(
    familyMemberSSN char(9),
    locationID int,
    startDate date,
    endDate date,
    PRIMARY KEY (familyMemberSSN, locationID, startDate),
    FOREIGN KEY (familyMemberSSN) REFERENCES Persons(SSN),
    FOREIGN KEY (locationID) REFERENCES Locations(LocationID)
);

CREATE TABLE Head(
    locationID int,
    PRIMARY KEY (LocationID),
    FOREIGN KEY (locationID) REFERENCES Locations(LocationID)
);

