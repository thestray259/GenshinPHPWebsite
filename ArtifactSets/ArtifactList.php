<?php
include_once "../MyHeader.php";
$artifacts = GetArtifacts($myDbConn);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Set Name</th>
    </tr>
    <?php
    while ($data = mysqli_fetch_row($artifacts))
    {
        echo "<tr>
                <td>
                    " . $data[0] . "
                </td>
                <td>
                    <a href=\"Artifact.php?ArtifactID=" . $data[0] . "\" >
                        " . $data[1] . "
                    </a>
                </td>
            </tr>";
    }

    unset($data)
    ?>
</table>