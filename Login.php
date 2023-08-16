<?php
$myHeader = "Login";
include_once "MyHeader.php";
// Use this page to change the value of
// $_SESSION["isAdmin"] or such

if (isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION['isAdmin'] = 1;
}

if($_SESSION['isAdmin'] == 1) {
    header("Location: ManagePages.php");
    exit();
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="text" name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password" />
    <button class="btn" type="submit" name="login">Login</button>

</form>
<br />
<br />
<?php
include_once "MyFooter.php";
?>

