<?php
$myHeader = "Preferences";

if (isset($_POST["style"])){
    if ($_POST['style'] == 0) {
        $myStyle = 1;
    } else if ($_POST['style'] == 1) {
        $myStyle = 2;
    } else if ($_POST['style'] == 2){
        $myStyle = 3;
    }
}

include_once "MyHeader.php";

// Use this page to change the value of
// $_COOKIE["MyStyle"] or such

?>

<form method='post'>
    <button name='style' value='0'>Blue</button>
    <button name='style' value='1'>Red</button>
    <button name='style' value='2'>Light</button>
</form>



<?php
include_once "MyFooter.php";
?>

