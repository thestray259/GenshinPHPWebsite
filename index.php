<?php

$myHeader = "Star Rail Database";
include_once "MyHeader.php";
?>

<?php
// Move to Index
//$PageId = "0";
// Get the page parameter
//if (array_key_exists("PageId", $_GET) == true) {
//    $PageId = $_GET["PageId"];
//}
?>

<?php

// Get given page
//$PageData = PageContentGet($myDbConn, $PageId);
// Display page data
//PageDisplay($PageData);
//mysqli_free_result($PageData);

// Display sub page links

//$SubPages = MyPagesGet($myDbConn, $PageId); 
//if (($PageId == "0")) { && ($SubPages) && ($SubPages->num_rows > 0)) {
//    echo "Sub page links: ";
//     Display the main menu
//    MenuDisplay($SubPages);
//    mysqli_free_result($SubPages);
//}
//else
//{
//    echo "<br /> Welcome. . . Click a menu link";
//}

?>
<h1>Welcome!</h1>
<p>Thanks for choosing the Star Rail Database! Here you can analyze and compare stats of characters, Light Cones, and Relics. You can also find info on the Various Aeons here!</p>

<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "MyFooter.php";
?>