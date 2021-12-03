<?php include('config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugarstop Laguna</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/sugarstop2.png" alt="Restaurant Logo" class="img-responsive-logo" >
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>

                    <?php
                    
                        if (isset($_SESSION["useruid"])) {
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='config/logout.inc.php'>Logout</a></li>";
                        }
                        else {
                            echo "<li><a href='login.php'>Login</a></li>";
                            echo "<li><a href='signup.php'>Sign Up</a></li>";
                        }
                    
                    ?>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->