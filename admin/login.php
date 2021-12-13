<?php include('../config/constants.php');?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login form starts here -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            
            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>

            <p class="text-center">Created by - <a href="https://www.youtube.com/watch?v=5X4s4demdXk" target="_blank">Cabansag's Group</a></p>
        </div>
    </body>
</html>

<?php 

    //Check whether the submit is clicked or not
    if(isset($_POST['submit']))
    {
        //Process login
        //1. Get data of login form
        //$username = $_POST['username'];
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        //$password = md5($_POST['password']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);


        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin1 WHERE username='$username' AND password='$password'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User exists and login success
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in and logout will unset it

            //Redirect to home page
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User doesn't exist
            $_SESSION['login'] = "<div class='error text-center'>Username or Password didn't match</div>";
            //Redirect to home page
            header('location:'.SITEURL.'admin/login.php');
        }
    }
    

?>