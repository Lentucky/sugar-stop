<?php include('partials-front/menu.php'); ?>
    <section class="food-search">
        <div class="container">
            <h2 class="text-center text-main">Fill in this form to Sign-up!</h2>

                <form action="" method="POST" class="order">           
                    <fieldset>
                        <legend>Account Details</legend>

                        <div class="order-label">Username</div>
                        <input type="text" name="username" placeholder="E.g. JohnDoe" class="input-responsive" required>

                        <div class="order-label">Email</div>
                        <input type="email" name="email" placeholder="E.g. johndoe@email.com" class="input-responsive" required>

                        <div class="order-label">Password</div>
                        <input type="password" name="password" placeholder="Password" class="input-responsive" required>

                        <div class="order-label">Repeat Password</div>
                        <input type="password" name="pwdrepeat" placeholder="Confirm Password" class="input-responsive" required>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </fieldset>

                </form>
        </div>

<?php include('partials-front/footer.php'); ?>    

<?php 
    //process the value form and save it in the database

    //Check if submit button is clicked or not

        // button clicked
        //echo "Button clicked";

        //get the data from the form

        $username = "";
        $email = "";
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql_u = "SELECT * FROM tbl_users1 WHERE username='$username'";
            $sql_e = "SELECT * FROM tbl_users1 WHERE email='$email'";
            $res_u = mysqli_query($conn, $sql_u);
            $res_e = mysqli_query($conn, $sql_e);

            if (mysqli_num_rows($res_u) > 0) {
                echo"Sorry... username already taken"; 	
            }else if(mysqli_num_rows($res_e) > 0){
                echo"Sorry... email already taken"; 
            }
        else
        { 

            $raw_password = md5($_POST["password"]);
            $password = mysqli_real_escape_string($conn, $raw_password);

            //to save to database
            $sql2 = "INSERT INTO tbl_users1 SET
                username = '$username',
                email = '$email',
                password = '$password'
            ";
        

            // Executing quer and saving data to database
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

            //check whether the data is inserted or not 
            if($res2==TRUE)
            {
                //Data inserted
                //echo "Data Inserted";
                //Create a variable to display
                $_SESSION['signup'] = "<div class='success'>Admin Added Succesfully</div>";
                
                //redirect page to manage admin
                header("location:".SITEURL.'login.php');
            }
            else
            {
                //Failed
                //echo "Error";
                $_SESSION['signup'] = "Admin Failed to Process";
                
                //redirect page to add admin
                header("location:".SITEURL.'login.php');
            }

        }
    }
?>