<?php include('partials-front/menu.php'); ?>
    <section class="food-search">
        <div class="container">
            <h2 class="text-center text-main">Fill in this form to Sign-up!</h2>

                <form action="config/signup.inc.php" method="POST" class="order">           
                    <fieldset>
                        <legend>Account Details</legend>
                        <div class="order-label">Full Name</div>
                        <input type="text" name="name" placeholder="E.g. John Doe" class="input-responsive" required>

                        <div class="order-label">Email</div>
                        <input type="email" name="email" placeholder="E.g. johndoe@email.com" class="input-responsive" required>

                        <div class="order-label">Username</div>
                        <input type="text" name="uid" placeholder="E.g. Order Details" class="input-responsive" required>

                        <div class="order-label">Password</div>
                        <input type="password" name="pwd" placeholder="Password" class="input-responsive" required>

                        <div class="order-label">Password</div>
                        <input type="password" name="pwdrepeat" placeholder="Confirm Password" class="input-responsive" required>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </fieldset>

                </form>
        </div>
        <?php 
    
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Choose a proper username!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Choose a proper email!</p>";
                }
                else if ($_GET["error"] == "pwddontmatch") {
                    echo "<p>password dont match!</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>username already taken!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, please try again.</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>You have signed up.</p>";
                }
            }

        ?>
    </section>



<?php include('partials-front/footer.php'); ?>    