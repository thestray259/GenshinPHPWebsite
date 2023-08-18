<?php

// Create constants
DEFINE('DB_USER', 'root');
DEFINE('DB_PSWD', 'Booboo1204!');
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
function MyPageremove($dbConn, $Id) {

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
        ON cha.ArtifactId = art.ArtifactSetID WHERE cha.CharacterName = '" . $element . "'";

    return @mysqli_query($dbConn, $query);
}

function MyJoinWhereGetCharacterObtained($dbConn, $obtained)
{
    $query = "SELECT cha.CharacterName, cha.CharacterLevel, cha.Element, cha.ConstellationLevel, cha.StarRating, cha.WeaponType, cha.ArtifactId, cha.Obtained, art.ArtifactSetName
        FROM Characters cha LEFT JOIN ArtifactSets art
        ON cha.ArtifactId = art.ArtifactSetID WHERE cha.CharacterName = '" . $obtained . "'";

    return @mysqli_query($dbConn, $query);
}

?>


