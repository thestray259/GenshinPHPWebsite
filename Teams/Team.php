<?php
$myHeader = "Team " . $_GET["TeamID"];
include_once "../MyHeader.php";
$team = GetTeamContent($myDbConn, $_GET["TeamID"]);
$data = mysqli_fetch_row($team);
?>

    <?php
    echo "<h2>Team Name: " . $data[1] . "</h2>";
    echo "<p>Description: " . $data[2] . "</p>";
    ?>
    <table>
        <tr>
             <th>Character Name</th>
             <th>Image</th>
        </tr>
            <td><?php echo "Character 1: " . $data[3];?></td>
            <td><?php echo "<img src=\"data:image/jpg;base64," . base64_encode($data[4]) . "\" width=10%/ />";?></td>
        <tr>
        </tr>
            <td><?php echo "Character 1: " . $data[5];?></td>
            <td><?php echo "<img src=\"data:image/jpg;base64," . base64_encode($data[6]) . "\" width=10%/ />";?></td>
        <tr>
        </tr>
            <td><?php echo "Character 1: " . $data[7];?></td>
            <td><?php echo "<img src=\"data:image/jpg;base64," . base64_encode($data[8]) . "\" width=10%/ />";?></td>
        <tr>
        </tr>
            <td><?php echo "Character 1: " . $data[9];?></td>
            <td><?php echo "<img src=\"data:image/jpg;base64," . base64_encode($data[10]) . "\" width=10%/ />";?></td>
        <tr>
    </table>


<?php
include_once "..\MyFooter.php";
?>