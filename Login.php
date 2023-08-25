<?php
$myHeader = "Login";
include_once "MyHeader.php";

$exists = true;
$showError = false;
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = CheckIfUsernameExists($myDbConn, $username);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        if ($exists == true && strlen($username) > 0 && strlen($password) > 0) {

            $row = mysqli_fetch_array(GetHashedPassword($myDbConn, $username));

            $hashedPassword = $row['Pswd'];

            if(password_verify($password, $hashedPassword)) {
                    
                $resultUser = GetUser($myDbConn, $username, $hashedPassword);
                $row = mysqli_fetch_array($resultUser);

                $isAdmin = $row['isAdmin'];
                $_SESSION['loggedIn'] = true;
                $_SESSION['loggedInUsername'] = $row['UserID'];
                $_SESSION['isAdmin'] = $isAdmin;
            } else {
                $showError = true;
                $errorMessage = "Incorrect Password";
            }

        }
    }

    if ($num <= 0) {
        $exists = false;
        $errorMessage = "Username nonexistent or incorrect";
    }
}
if ($_SESSION['isAdmin'] == 1) {
    header("Location: ManagePages.php");
    exit();
}
else if ($_SESSION['loggedIn'])
{
    header("Location: index.php");
    exit();
}
?>

<div class="login-form">
    <?php

        if ($showError) {

            echo ' <div>
                    <strong>Error!</strong> ' . $errorMessage . '
                    </div> ';
        }

        if (!$exists) {
            echo ' <div>
                    <strong>Error!</strong> ' . $errorMessage . '
                    </div> ';
        }

    ?>
    <form action="Login.php" method="post">

        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <button class="login-btn" type="submit" name="login">Login</button>

    </form>
    <form action="/SignUp.php">
        <button class="signup-btn" type="submit"> Sign up</button>
    </form>
</div>
<br />
<br />
<?php
include_once "MyFooter.php";
?>

