<?php
include_once "../MyHeader.php";
$artifact = GetArtifactContent($myDbConn, $_GET["ArtifactID"]);
$data = mysqli_fetch_row($artifact);
//Code for Uploading Images

//if (count($_FILES) > 0) {
//    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
//        $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
//        $imgType = $_FILES['userImage']['type'];
//        $sql = "UPDATE ArtifactSets SET Image = ? WHERE ArtifactSetId =" . $data[0];
//        $statement = $myDbConn->prepare($sql);
//        $statement->bind_param('b', $imgData);
//        $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
//    }
//}
?>

<?php
echo "Set Name: " . $data[1];
echo "Image: <img src = \"data:image/jpg;base64," . base64_encode($data[2]) . "\"/>"
?>