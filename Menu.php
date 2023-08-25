<?php
if (array_key_exists("logout", $_POST)) {
    $_SESSION['loggedIn'] = false;
    $_SESSION['loggedInUsername'] = "";
    $_SESSION['isAdmin'] = $_POST["logout"];
    header("Location: \Login.php");
    exit();
}
?>
<nav>
    <ul>
        <li><a href="/index.php">Home</a></li>
        <li><a href="/About/AboutPage.php">About</a></li>
        <li><a href="/CharacterListPage.php">Characters</a></li>
        <li><a href="/Contact/ContactPage.php">Contact</a></li>
        <li><a href="/Preferences.php">My Preferences </a></li>

        <?php
        if ($_SESSION['loggedIn'] == true) {
            if ($_SESSION["isAdmin"] == 1) {
                echo '<li> <a href="\ManagePages.php">Manage Pages</a> </li>';
            }
            echo '<form method="post">
                      <button name="logout" value="0">Logout</button>
                  </form>';
        } else {
            echo '<li><a href="\Login.php">Login</a></li>';
        }

        ?>
</ul>
</nav>