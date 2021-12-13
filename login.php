<?php include('partials-front/menu.php'); ?>
    <section class="food-search">
        <div class="container">

            <?php

            if(isset($_SESSION['userlogin']))
            {
                echo $_SESSION['userlogin'];
                unset($_SESSION['userlogin']);
            }
            
            if(isset($_SESSION['signup']))
                {
                    echo $_SESSION['signup'];
                    unset($_SESSION['signup']);
                }

            if(isset($_SESSION['no-login']))
                {
                    echo $_SESSION['no-login'];
                    unset($_SESSION['no-login']);
                }
            
            ?>

                <form action="" method="POST" class="order">           
                    <fieldset>
                        <legend>Log-In Details</legend>

                        <div class="order-label">Username</div>
                        <input type="text" name="username" placeholder="Username/E-mail" class="input-responsive" required>

                        <br>

                        <div class="order-label">Password</div>
                        <input type="password" name="password" placeholder="Password" class="input-responsive" required>

                        <br>
                        
                        <div><a href="<?php echo SITEURL; ?>signup.php">Don't have an account?</a></div>

                        <br>

                        <div><a href="<?php echo SITEURL; ?>admin/login.php">Admin Page</a></div>

                        <br>
    
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </fieldset>

                </form>
        </div>

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
        $sql = "SELECT * FROM tbl_users1 WHERE (username= '$username' OR email = '$username') and password='$password'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User exists and login success
            $_SESSION['userlogin'] = "<div class='success'>Login Successful</div>";
            $_SESSION['loggedIn'] = $username; //to check whether the user is logged in and logout will unset it

            //Redirect to home page
            header('location:'.SITEURL);
        }
        else
        {
            //User doesn't exist
            $_SESSION['userlogin'] = "<div class='error text-center'>Username or Password didn't match</div>";
            //Redirect to home page
            header('location:'.SITEURL.'login.php');
        }
    }
    

?>

    </section>

<?php include('partials-front/footer.php'); ?>    