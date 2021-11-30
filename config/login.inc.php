
<?php
include('constants.php');
include('functions.inc.php');

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    if (emptyInputLogin($username, $pwd) !== FALSE) { //empty boxes
        header("location:".SITEURL."login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location:".SITEURL."login.php");
    exit();
}

?>