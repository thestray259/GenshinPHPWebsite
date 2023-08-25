<?php
include_once "../MyHeader.php";
$artifact = GetArtifactContent($myDbConn, $_GET["ArtifactID"])
?>

<?php
$data = mysqli_fetch_row($artifact);
echo "Set Name:" . $data[1];
?>