
<?php 
include('constants.php');

if (isset($_POST["submit"])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];

    require_once 'functions.inc.php';
    //error handlers
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== FALSE) { //empty boxes
        header("location:".SITEURL."signup.php?error=emptyinput");
        exit();
    }//invalid username
    if (invalidUid($username) !== FALSE) {
        header("location:".SITEURL."signup.php?error=invaliduid");
        exit();
    }//invalid email
    if (invalidEmail($email) !== FALSE) {
        header("location:".SITEURL."signup.php?error=invalidemail");
        exit();
    }//passwords dont match
    if (pwdMatch($pwd, $pwdrepeat) !== FALSE) {
        header("location:".SITEURL."signup.php?error=pwddontmatch");
        exit();
    }//username already exists
    if (uidExists($conn, $username, $email) !== FALSE) {
        header("location:".SITEURL."signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);
}
else
{
    header("location:".SITEURL."signup.php");
    exit();
}

?>