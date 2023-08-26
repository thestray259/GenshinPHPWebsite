<?php
$myHeader = "Artifact ". $_GET["ArtifactID"];
include_once "../MyHeader.php";
$artifact = GetArtifactContent($myDbConn, $_GET["ArtifactID"]);
$data = mysqli_fetch_row($artifact);
?>

<?php
echo "Set Name: " . $data[1];
echo "Image: <img src = \"data:image/jpg;base64," . base64_encode($data[2]) . "\"/>";
?>

<?php
include_once "..\MyFooter.php";
?>