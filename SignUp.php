<?php
$myHeader = "Sign up";
include_once "MyHeader.php";
// Use this page to change the value of
// $_SESSION["isAdmin"] or such

if (isset($_POST['newUsername']) && isset($_POST['newPassword'])) {
    $_SESSION['isAdmin'] = 0;
}

if($_SESSION['isAdmin'] == 1) {
    header("Location: ManagePages.php");
    exit();
}
?>

<div class="login-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <p>Enter a username</p>
        <?php if (CheckIfUsernameExists(ConnGet(), $_POST['newUsername'])) {
            echo "<p> Username is taken </p>";
        }
        ?>
        <input type="text" name="newUsername" placeholder="Username" />
        <p>Enter a password</p>
        <input type="password" name="newPassword" placeholder="Password" />
        <button class="signup-btn" type="submit"> Sign up</button>
    </form>


</div>
<br />
<br />
<?php
include_once "MyFooter.php";
?>

