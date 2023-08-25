<?php

// Create constants
DEFINE('DB_USER', 'root');
DEFINE('DB_PSWD', 'stupid');
DEFINE('DB_SERVER', 'localhost');
DEFINE('DB_NAME', 'genshinphp');

// ///////////////////////////////////////////////////
// Get db connection
function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

function AddNewUser($dbConn, $newUsername, $newPassword) {
    $isAdmin = 0;
    $query = "INSERT INTO MyUsers (UserId, Pswd, isAdmin, isActive)
                VALUES ('$newUsername', '$newPassword', $isAdmin, 1)";

    return @mysqli_query($dbConn, $query);
}

function CheckIfUsernameExists($dbConn, $newUsername) {
    $query = "SELECT UserID FROM MyUsers WHERE MyUsers.UserID = '$newUsername'";

    return @mysqli_query($dbConn, $query);
}

function GetUser($dbConn, $userName, $password) {
    $query = "SELECT * FROM MyUsers WHERE MyUsers.UserID = '$userName' AND MyUsers.Pswd = '$password'";

    return @mysqli_query($dbConn, $query);
}

function GetHashedPassword($dbConn, $userName) {
    $query = "SELECT Pswd FROM MyUsers WHERE MyUsers.UserID = '$userName'";

    return @mysqli_query($dbConn, $query);
}

// ///////////////////////////////////////////////////
// Get Select records based on the Parent Id
function MyPagesGet($dbConn, $Parent=0) {
    $query = "SELECT id, Title, Header1, Text1 FROM MyWebDocs where isActive = 1 and ParentPage = " . $Parent . " order by ParentPage asc, SortOrder Asc;";
    // SELECT id, Title, Header1, Text1 FROM MyWebDocs where isActive = 1 and ParentPage = " . $Parent . " order by ParentPage asc, SortOrder Asc;

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get all the page records
function MyPagesAllGet($dbConn) {
    $query = "SELECT id, Title, Header1, Text1, ParentPage, SortOrder, isActive FROM MyWebDocs order by ParentPage asc, SortOrder Asc;";

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get Select page
function PageContentGet($dbConn, $Id) {
    $return = null;

    $query = "SELECT id, Title, Header1, Text1 FROM MyWebDocs where isActive = 1 and id = " . $Id;
    $return = @mysqli_query($dbConn, $query);

    if ((!$return) || ($return->num_rows < 1)){
        // return a defaul fault page
        $query = "SELECT id, Title, Header1, Text1 FROM MyWebDocs where isActive = 1 order by SortOrder asc limit 1;";

        $return = @mysqli_query($dbConn, $query);
    }

return $return;
}

// ///////////////////////////////////////////////////
// Get all the page records
function MyPageRemove($dbConn, $Id) {

    // Never delete a page. set it to incative
    $query = "Update FROM MyWebDocs set isActive = 0 where id = " . $Id;

    return @mysqli_query($dbConn, $query);
}

function MyJoinJsonGet($dbConn)
{
    $query = "SELECT JSON_OBJECT(
        'CharacterName', cha.CharacterName,
        'CharacterLevel', cha.CharacterLevel,
        'Element', cha.Element,
        'ConstellationLevel', cha.ConstellationLevel,
        'StarRating', cha.StarRating,
        'WeaponType', cha.WeaponType,
        'ArtifactId', cha.ArtifactId,
        'Obtained', cha.Obtained,
        'ArtifactSetName', art.ArtifactSetName) as Json1
        FROM Characters cha LEFT JOIN ArtifactSets art
        ON cha.ArtifactId = art.ArtifactSetID;";

    return @mysqli_query($dbConn, $query);
}

function MyJoinWhereGetCharacterID($dbConn, $id)
{
    $query = "SELECT cha.CharacterName, cha.CharacterLevel, cha.Element, cha.ConstellationLevel, cha.StarRating, cha.WeaponType, cha.ArtifactId, cha.Obtained, art.ArtifactSetName
        FROM Characters cha LEFT JOIN ArtifactSets art
        ON cha.ArtifactId = art.ArtifactSetID WHERE cha.CharacterID = '" . $id . "' limit 1";

    return @mysqli_query($dbConn, $query);
}

function MyJoinWhereGetCharacterName($dbConn, $name)
{
    $query = "SELECT cha.CharacterName, cha.CharacterLevel, cha.Element, cha.ConstellationLevel, cha.StarRating, cha.WeaponType, cha.ArtifactId, cha.Obtained, art.ArtifactSetName
        FROM Characters cha LEFT JOIN ArtifactSets art
        ON cha.ArtifactId = art.ArtifactSetID WHERE cha.CharacterName = '" . $name . "' limit 1";

    return @mysqli_query($dbConn, $query);
}

function MyJoinWhereGetCharacterElement($dbConn, $element)
{
    $query = "SELECT cha.CharacterName, cha.CharacterLevel, cha.Element, cha.ConstellationLevel, cha.StarRating, cha.WeaponType, cha.ArtifactId, cha.Obtained, art.ArtifactSetName
        FROM Characters cha LEFT JOIN ArtifactSets art
        ON cha.ArtifactId = art.ArtifactSetID WHERE cha.Element = '" . $element . "'";

    return @mysqli_query($dbConn, $query);
}

function MyJoinWhereGetCharacterObtained($dbConn, $obtained)
{
    $query = "SELECT cha.CharacterName, cha.CharacterLevel, cha.Element, cha.ConstellationLevel, cha.StarRating, cha.WeaponType, cha.ArtifactId, cha.Obtained, art.ArtifactSetName
        FROM Characters cha LEFT JOIN ArtifactSets art
        ON cha.ArtifactId = art.ArtifactSetID WHERE cha.CharacterName = '" . $obtained . "'";

    return @mysqli_query($dbConn, $query);
}

function GetArtifacts($dbConn)
{
    $query = "SELECT ArtifactSetID, ArtifactSetName FROM ArtifactSets WHERE isActive = 1 order by ArtifactSetID asc";

    return @mysqli_query($dbConn, $query);
}

function GetArtifactContent($dbConn, $Id)
{
    $return = null;

    $query = "SELECT art.ArtifactSetID, art.ArtifactSetName, img.ImageData, art.isActive FROM ArtifactSets art LEFT JOIN Images img ON art.ImageId = img.ImageId WHERE art.isActive = 1 AND art.ArtifactSetID = " . $Id;
    $return = @mysqli_query($dbConn, $query);

    return $return;
}

function GetTeams($dbConn)
{
    $query = "SELECT team.TeamID, team.TeamName, team.Info, cha1.CharacterName, cha2.CharacterName, cha3.CharacterName, cha4.CharacterName
            FROM Teams team LEFT JOIN Characters cha1 ON team.CharacterId1 = cha1.CharacterID
            LEFT JOIN Characters cha2 ON team.CharacterId2 = cha2.CharacterID
            LEFT JOIN Characters cha3 ON team.CharacterId3 = cha3.CharacterID
            LEFT JOIN Characters cha4 ON team.CharacterId4 = cha4.CharacterID WHERE team.isActive = 1";
    return @mysqli_query($dbConn, $query);
}
?>


