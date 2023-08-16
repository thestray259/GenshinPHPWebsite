<?php
session_start();    // Must be first, prior to any HTML. Session will expire

// Check for Priv setting
if (!isset($_SESSION["isAdmin"])) {
    $_SESSION["isAdmin"] = 0; // Set default
}
// Check for style setting
if (isset($_COOKIE["MyStyle"])) {
    if (!isset($myStyle)){
        $myStyle = $_COOKIE["MyStyle"];
    } else {
        setcookie("MyStyle", $myStyle, strtotime("+1 week"));
    }
} else {
    // Set default style
    setcookie("MyStyle", 1, strtotime("+1 week"));
}

$myTitle = "Star Rail Database";

include_once "dbConnector.php";
include_once "Helper.php";

?>

<?php 

// Set style page
switch ($myStyle) {
    case "1":
        echo '<link rel="stylesheet" type="text/css"  href="\myStyle1.css">';
        break;
    case "2":
        echo '<link rel="stylesheet" type="text/css"  href="\myStyle2.css">';
        break;
    case "3":
        echo '<link rel="stylesheet" type="text/css"  href="\myStyle3.css">';
        break;
    default:
        echo '<link rel="stylesheet" type="text/css"  href="\myStyle1.css">';
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
      <meta content="text/html; charset=ISO-8859-1"  http-equiv="content-type">
      <title><?php echo $myTitle ?></title>
    </head>
    <body>
        <header>
            <h1><?php echo $myHeader ?></h1>
            <?php
            include_once "Menu.php";
            ?>
        </header>
        <br />
        <!-- Get the menu items -->
        <?php
        //$myDbConn = ConnGet();
    
    // $recordset = MyPagesAllGet($myDbConn); 
    //$recordset = MyPagesGet($myDbConn, 0); 
    // Display the main menu
    //MenuDisplay($recordset);
    //mysqli_free_result($recordset);
        
        ?>
        <br />
        <br />