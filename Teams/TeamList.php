<?php
$myHeader = "Teams";
include_once "../MyHeader.php";
$teams = GetTeams($myDbConn);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Team Name</th>
        <th>Character 1</th>
        <th>Character 2</th>
        <th>Character 3</th>
        <th>Character 4</th>
    </tr>
    <?php
    while ($data = mysqli_fetch_row($teams)) {
        echo "<tr> 
                <td>
                    " . $data[0] . "
                </td>
                <td>
                    <a href=\"Team.php?TeamID=" . $data[0] . "\" >
                        " . $data[1] . "
                    </a>
                </td>
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
                    . $data[6] .
                "</td>
            </tr>";
    }

    unset($data)
    ?>
</table>

<?php
include_once "..\MyFooter.php";
?>