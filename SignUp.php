<?php
$myHeader = "Sign up";
include_once "MyHeader.php";

$exists = false;
$showAlert = false;
$showError = false;
$errorMessage = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["newUsername"];
    $password = $_POST["newPassword"];

    $result = CheckIfUsernameExists($myDbConn, $username);

    $num = mysqli_num_rows($result);

    if($num == 0) {
        if($exists==false && strlen($username) > 0 && strlen($password)) {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $result = AddNewUser($myDbConn, $username, $hash);

            if ($result) {
                $showAlert = true;
            }
        }
        else {
            $showError = true;
            $errorMessage = 'You must enter something for username and password';
        }
    }

   if($num>0)
   {
      $exists="Username not available";
   }
}
?>

<div class="login-form">
    <form action="SignUp.php" method="post">
        <p>Enter a username</p>

        <?php

        if ($showAlert) {

            echo ' <div>
                    <strong>Success!</strong> Your account is
                    now created and you can login.
                    </div> ';
        }

        if ($showError) {

            echo ' <div>
                    <strong>Error!</strong> ' . $erro . '
                    </div> ';
        }

        if ($exists) {
            echo ' <div>
                    <strong>Error!</strong> ' . $exists . '
                    </div> ';
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

