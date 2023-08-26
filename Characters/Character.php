<?php
$myHeader = "Character " . $_GET["CharacterID"];
include_once "../MyHeader.php";
$character = GetCharacterContent($myDbConn, $_GET["CharacterID"]);
$data = mysqli_fetch_row($character);
?>
<div>
    <?php
    echo "<img src = \"data:image/jpg;base64," . base64_encode($data[0]) . "\" height=50%/>";
    echo "<h2>Character Name: " . $data[1] . "</h2>";
    echo "<p>Element: " . $data[2] . "</p>";
    echo "<p>Star Rating: " . $data[3] . " out of 5 </p>";
    echo "<p>Weapon Type: " . $data[4] . " </p>";
    if ($data[5]) {
        echo "<p>Weapon Type: " . $data[5] . " </p>";
    }
    echo "<br><br><br>"
    ?>
</div>


<?php
include_once "..\MyFooter.php";
?>