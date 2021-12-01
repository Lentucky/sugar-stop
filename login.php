<?php include('partials-front/menu.php'); ?>
    <section class="food-search">
        <div class="container">

            <?php
            
            if(isset($_SESSION['no-login']))
                {
                    echo $_SESSION['no-login'];
                    unset($_SESSION['no-login']);
                }
            
            ?>

                <form action="config/login.inc.php" method="POST" class="order">           
                    <fieldset>
                        <legend>Log-In Details</legend>

                        <div class="order-label">Username</div>
                        <input type="text" name="uid" placeholder="Username/E-mail" class="input-responsive" required>

                        <div class="order-label">Password</div>
                        <input type="password" name="pwd" placeholder="Password" class="input-responsive" required>

                        <div><a href="<?php echo SITEURL; ?>signup.php">Don't have an account?</a></div>
                        <br>
    
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </fieldset>

                </form>
        </div>

        <?php 
    
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Incorrect Login Information!</p>";
                }
                
            }

        ?>

    </section>

<?php include('partials-front/footer.php'); ?>    