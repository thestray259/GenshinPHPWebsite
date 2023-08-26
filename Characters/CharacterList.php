<?php
$myHeader = "Characters";
include_once "../MyHeader.php";
$Characters = GetCharacters($myDbConn);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Character Name</th>
        <th>Element</th>        
        <th>Star Rating</th>
        <th>WeaponType</th>
        <th>Artifact Set</th>
        <th>Obtained</th>
    </tr>
    <?php
    while ($data = mysqli_fetch_row($Characters)) {
        if (!$data[5]) {
            $data[5] = "None";
        }

        $obtained = null;
        if ($data[6]) {
            $obtained = "true";
        } else {
            $obtained = "false";
        }

        echo "<tr>
                <td>
                    " . $data[0] . "
                </td>
                <td>
                    <a href=\"Character.php?CharacterID=" . $data[0] . "\" >
                        " . $data[1] . "
                    </a>
                </td>
                <td>"
                    . $data[2] .
                "</td>
                <td>"
                    . $data[3] .
                "</td>
                <td>"
                    . $data[4] .
                "</td>
                <td>"
                . $data[5] .
                "</td>
                <td>"
                . $obtained .
                "</td>
            </tr>";
    }

    unset($data);
    unset($obtained);
    ?>
</table>

<?php
include_once "..\MyFooter.php";
?>