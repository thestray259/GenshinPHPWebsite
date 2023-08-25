<?php
include_once "MyHeader.php";
$teams = GetTeam($myDbConn);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Set Name</th>
    </tr>
    <?php
    foreach ($teams as $team)
    {
        $data = mysqli_fetch_row($team);
        echo "<tr> <td> " . $data[0] . "</td> <td> <a href=\"\\Artifact?ArtifactID=" . $data[0] . " . \" >" . $data[1] . "</a> </td> </tr>";
    }

    unset($data)
    ?>
</table>