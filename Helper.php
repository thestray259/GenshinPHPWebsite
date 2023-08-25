<?php
include_once "dbConnector.php";
?>

<?php
function MenuDisplay($dataset) {

// &nbsp; &nbsp;<a href="ContactUs.php">

    if ($dataset){
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        while($row = mysqli_fetch_array($dataset)){
            echo ' &nbsp; &nbsp; <a href="Index.php?PageId=' . $row['id'] .  '" >' . $row['Title'] . '</a>';
        }
    } // End if
    else {
        echo "No menu items<br />";
        echo mysqli_error($myDbConn);
    }

}

function PageDisplay($PageData) {

    if ($PageData){
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        $row = mysqli_fetch_array($PageData);

        echo ' &nbsp; &nbsp; <h2> ' . $row['Header1'] .  ' </h2> <br />';
        echo ' &nbsp; &nbsp; <p> ' . $row['Text1'] .  '</p> <br />';

    } // End if
    else {
        echo "No Page data to display <br />";
    }

}

function GetDBObtainedCharacters()
{
    $myDbConn = ConnGet();
    $myGet = $_GET["obtained"];

    $DataSet = MyJoinWhereGetCharacterObtained($myDbConn, $myGet);

    if ($DataSet)
    {
        if ($row = mysqli_fetch_array($DataSet))
        {
            $myJson = '[{"CharacterName":' . $row['CharacterName'] . '","CharacterLevel":"' . $row['CharacterLevel']
                . '","Element":"' . $row['Element'] . '","ConstellationLevel":"' . $row['ConstellationLevel'] . '","StarRating":"'
                . $row['StarRating'] . '"WeaponType":"' . $row['WeaponType'] . '"}]';
        }
    }
    mysqli_close($myDbConn);
    echo $myJson;
}

function GetAllData()
{
    $myDbConn = ConnGet();
    $myJsonResult = MyJoinJsonGet($myDbConn);

    $myJSON = null;
    $row = null;

    if ($myJsonResult) {
        while ($row = mysqli_fetch_array($myJsonResult)) {
            $rowArray[] = json_decode($row[0]);
        }

        $myJSON = json_encode($rowArray, JSON_PRETTY_PRINT);
    }

    mysqli_close($myDbConn);
    echo "<pre>" . $myJSON . "<pre/>";
}

function GetDBDataWithId()
{
    $myDbConn = ConnGet();
    $myGet = $_GET["chaIndex"];

    $DataSet = MyJoinWhereGetCharacterID($myDbConn, $myGet);

    if ($DataSet) {
        if ($row = mysqli_fetch_array($DataSet)) {
            $myJson = '[{"CharacterName":' . $row['CharacterName'] . '","CharacterLevel":"' . $row['CharacterLevel']
                . '","Element":"' . $row['Element'] . '","ConstellationLevel":"' . $row['ConstellationLevel'] . '","StarRating":"'
                . $row['StarRating'] . '"WeaponType":"' . $row['WeaponType'] . '"}]';
        }
    }
    mysqli_close($myDbConn);
    echo $myJson;
}

function GetDBDataWithName()
{
    $myDbConn = ConnGet();
    $myGet = $_GET["chaName"];

    $DataSet = MyJoinWhereGetCharacterName($myDbConn, $myGet);

    if ($DataSet) {
        if ($row = mysqli_fetch_array($DataSet)) {
            $myJson = '[{"CharacterName":' . $row['CharacterName'] . '","CharacterLevel":"' . $row['CharacterLevel']
                . '","Element":"' . $row['Element'] . '","ConstellationLevel":"' . $row['ConstellationLevel'] . '","StarRating":"'
                . $row['StarRating'] . '"WeaponType":"' . $row['WeaponType'] . '"}]';
        }
    }
    mysqli_close($myDbConn);
    echo $myJson;
}
?>