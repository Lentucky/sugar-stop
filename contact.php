<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-main">Fill in this form for any issues you may have.</h2>

            <?php 
                $Msg = "";
                if(isset($_GET['error']))
                {
                    $Msg = " Please Fill in the Blanks ";
                    echo '<div class="error">'.$Msg.'</div>';
                }

                if(isset($_GET['success']))
                {
                    $Msg = " Your Message Has Been Sent ";
                    echo '<div class="alert alert-success">'.$Msg.'</div>';
                }       
            ?>

            <form action="contactform.php" method="POST" class="order">           
                <fieldset>
                    <legend>Contact Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="name" placeholder="E.g. John Doe" class="input-responsive" required>

                    <div class="order-label">Subject</div>
                    <input type="text" name="subject" placeholder="E.g. Order Details" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. johndoe@gmail.com" class="input-responsive" required>

                    <div class="order-label">Message</div>
                    <textarea name="message" rows="8" cols="80" placeholder="Message" class="input-responsive" required></textarea>
                    
                    <button type="submit" name="btn-send" class="btn btn-primary">Send E-mail</button>
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php include('partials-front/footer.php'); ?>    