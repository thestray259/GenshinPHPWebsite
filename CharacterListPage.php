<?php
include_once "MyHeader.php";
include_once "Helper.php";

$myHeader = "Characters";
$obtained = true;
?>

<!--<h2>March 7th</h2>
<p>A girl who once slumbered in eternal ice and knows nothing about her past. To find out the truth about her origins, she decided to travel with the Astral Express. 
    As of right now, she has prepared about 67 different versions of her life story for herself.</p>
<br />
<h4>Path:</h4> <p>Preservation</p>
<h4>Element:</h4> <p>Ice</p>
<h4>Star Rarity:</h4> <p>4</p>-->

<?php
echo '<form method="get"> <button name="btnAll" value="getAll"> Get All Characters </button> </form>';
echo '<form method="get"> <button name="btnObtained" value="getObtained"> Get Obtained Characters </button> </form>';
echo '<form method="get"> <button name="btnNotObtained" value="getNotObtained"> Get Not Obtained Characters </button> </form>';


echo '<form method="get"> Input a character index: <input type="text" name="chaIndex"> <button name="btnSubmitId" value="Submit"> Submit </button> </form>';
echo '<form method="get"> Input a character name: <input type="text" name="chaName"> <button name="btnSubmitName" value="Submit"> Submit </button> </form>';
?>

<?php

if (array_key_exists("btnObtained", $_GET))
{
    $obtained = 1;
    GetDBObtainedCharacters();
}

if (array_key_exists("btnNotObtained", $_GET)) {
    $obtained = 0;
    //GetDBNotObtainedCharacters();
}

if (array_key_exists("btnAll", $_GET)) {
    GetAllData();
}



if (array_key_exists("btnSubmitId", $_GET)) {
    $chaIndex = $_GET["chaIndex"];
    if (preg_match('~[0-9]+~', $chaIndex)) {
        GetDBDataWithId();
    } else {
        echo "Index must be a number. Your input: " . $chaIndex . "<br>";
    }
}

if (array_key_exists("btnSubmitName", $_GET)) {
    $chaName = $_GET["chaName"];
    if (preg_match("/^[a-zA-Z\s]+$/", $chaName)) {
        GetDBDataWithName();
    } else {
        echo "Name must be only letters. Your input: " . $chaName . "<br>";
    }
}

?>


