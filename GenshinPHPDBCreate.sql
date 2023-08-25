CREATE DATABASE IF NOT EXISTS GenshinPHP;
USE GenshinPHP;

drop table IF EXISTS MyUsers;
drop table IF EXISTS MyWebDocs;
drop table IF EXISTS Characters;
drop table IF EXISTS ArtifactSets;
drop table IF EXISTS Teams;



create table if not exists MyUsers(
 ID int not null AUTO_INCREMENT PRIMARY KEY,
 UserId varchar(25),
 Pswd varchar(100),
 isAdmin tinyint(1),
 isActive tinyint(1)
);

create table if not exists MyWebDocs(
 WebDocID int not null AUTO_INCREMENT PRIMARY KEY,
 Title varchar(25) Not null,
-- Category varchar(25),
 Header1 varchar(25),
 Text1 varchar(225),
 ParentPage int DEFAULT 0,
 SortOrder int DEFAULT 2,
 isActive tinyint
);

CREATE TABLE IF NOT EXISTS Characters(
	CharacterID int not null auto_increment primary key,
    CharacterName varchar(45) not null,
    CharacterLevel int DEFAULT 1,
    Element varchar(10) not null,
    ConstellationLevel int DEFAULT 1,
    StarRating int,
    WeaponType varchar(25),
    ArtifactId int,
	isActive tinyint,
    Obtained bool DEFAULT false
);

CREATE TABLE IF NOT EXISTS ArtifactSets(
	ArtifactSetID int not null auto_increment primary key,
    ArtifactSetName varchar(50) not null,
    Info varchar(225),
	isActive tinyint
);

CREATE TABLE IF NOT EXISTS Teams(
	TeamID int not null auto_increment primary key,
    TeamName varchar(50) not null,
    Info varchar(225),
    CharacterId1 int not null,
    CharacterId2 int not null,
    CharacterId3 int not null,
    CharacterId4 int not null,
    isActive tinyint default 1
);

SELECT * FROM myusers where myusers.userid = 'myuser';
SELECT * FROM MyUsers WHERE MyUsers.UserID = 'admin' AND MyUsers.Pswd = '$2y$10$MWuQ1e7u2esZVBxhT1E5keOkdRfIPQsj7SY7BkYycsyasRxGA0hJm';

-- Sample data
INSERT INTO MyUsers (UserId, Pswd, isAdmin, isActive)
VALUES    ('users', 'a', 0, 1)
ON DUPLICATE KEY UPDATE
UserId = 'myuser', Pswd = 'a', isAdmin = 0, isActive = 1;

INSERT INTO MyUsers (UserId, Pswd, isAdmin, isActive)
VALUES    ('myadmin', 'a', 1, 1)
ON DUPLICATE KEY UPDATE
UserId = 'myadmin', Pswd = 'a', isAdmin = 1, isActive = 1;

INSERT INTO MyUsers ( id,  UserId, Pswd, isAdmin, isActive)
VALUES    (2, 'myadmin', 'a', 1, 1)
ON DUPLICATE KEY UPDATE
UserId = 'myadmin', Pswd = 'a', isAdmin = 1, isActive = 1;

-- Main links/pages
INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, SortOrder, isActive)
VALUES    (1, 'Home', 'Header number 1', 'My text, asfaf af af af a sag asf saf', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home', Header1 = 'Header number 1', Text1 = 'My text, asfaf af af af a sag asf saf', SortOrder = 0, isActive = 1;

INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, SortOrder, isActive)
VALUES    (2, 'Something', 'Header number 2', 'My text, asfaf af af af a sag asf saf', 2, 1)
ON DUPLICATE KEY UPDATE
Title = 'something', Header1 = 'Header number 2', Text1 = 'My text, asfaf af af af a sag asf saf', SortOrder = 2, isActive = 1;

INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, SortOrder, isActive)
VALUES    (3, 'About', 'Header number 3', 'My text, asfaf af af af a sag asf saf', 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'About', Header1 = 'Header number 3', Text1 = 'My text, asfaf af af af a sag asf saf', SortOrder = 3, isActive = 1;

INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, SortOrder, isActive)
VALUES    (4, 'Contact Us', 'Header number 4', 'My text, asfaf af af af a sag asf saf', 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Contact Us', Header1 = 'Header number 4', Text1 = 'My text, asfaf af af af a sag asf saf', SortOrder = 4, isActive = 1;

-- ---------------------
-- Sub pages
-- Note Parent Id points to the record with id=1
INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, ParentPage, SortOrder, isActive)
VALUES    (5, 'Home 1', 'Sub Header number 1', 'My text, asfaf af af af a sag asf saf', 1, 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home 1', Header1 = 'Sub Header number 1', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = 1, SortOrder = 3, isActive = 1;

INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, ParentPage, SortOrder, isActive)
VALUES    (6, 'Home 2', 'Sub Header number 2', 'My text, asfaf af af af a sag asf saf', 1, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home 2', Header1 = 'Sub Header number 2', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = 1, SortOrder = 4, isActive = 1;

-- Note Parent Id points to the record with id=2
INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, ParentPage, SortOrder, isActive)
VALUES    (7, 'Something 1', 'Sub Header number 1', 'My text, asfaf af af af a sag asf saf', 2, 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Something 1', Header1 = 'Sub Header number 1', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = 2, SortOrder = 3, isActive = 1;

INSERT INTO MyWebDocs ( WebDocID, Title, Header1, Text1, ParentPage, SortOrder, isActive)
VALUES    (8, 'Something 2', 'Sub Header number 2', 'My text, asfaf af af af a sag asf saf', 2, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Something 2', Header1 = 'Sub Header number 2', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = 2, SortOrder = 4, isActive = 1;

-- ---------------------
-- Characers

INSERT INTO Characters (CharacterName, Element, StarRating, WeaponType, ArtifactId, Obtained)
values ("Traveler", "Anemo", 5, "Sword", 1, true);

INSERT INTO Characters (CharacterName, Element, StarRating, WeaponType, ArtifactId, Obtained)
values ("Amber", "Pyro", 4, "Bow", 1, true);

INSERT INTO Characters (CharacterName, Element, StarRating, WeaponType, Obtained)
values ("Lisa", "Electro", 4, "Catalyst", false);

INSERT INTO Characters (CharacterName, Element, StarRating, WeaponType, Obtained)
values ("Kaeya", "Cryo", 4, "Sword", false);

INSERT INTO Characters (CharacterName, Element, StarRating, WeaponType, Obtained)
values ("Noelle", "Geo", 4, "Claymore", false);

INSERT INTO Characters (CharacterName, Element, StarRating, WeaponType, Obtained)
values ("Collei", "Dendro", 4, "Bow", false);

INSERT INTO Characters (CharacterName, Element, StarRating, WeaponType, ArtifactId, Obtained)
values ("Barbra", "Hydro", 4, "Catalyst", 3, false);

INSERT INTO ArtifactSets (ArtifactSetName, isActive) values ("Adventurer", 1);
INSERT INTO ArtifactSets (ArtifactSetName, isActive) values ("Instructor", 1);
INSERT INTO ArtifactSets (ArtifactSetName, isActive) values ("Berserker", 1);
INSERT INTO ArtifactSets (ArtifactSetName, isActive) values ("Traveling Doctor", 1);

Select * FROM ArtifactSets;

SELECT cha.CharacterID, cha.CharacterName, cha.CharacterLevel, cha.Element, cha.ConstellationLevel, cha.StarRating, cha.WeaponType, cha.ArtifactId, cha.Obtained, artSets.ArtifactSetName
   FROM Characters cha LEFT JOIN ArtifactSets artSets
   ON cha.ArtifactId = artSets.ArtifactSetID;