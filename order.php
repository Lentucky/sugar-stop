<?php include('partials-front/menu.php'); ?>
<?php include('partials-front/login-check.php'); ?>
<?php 
require 'config/PHPMailer.php';
require 'config/SMTP.php';
require 'config/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php ob_start(); ?>

    <?php 
        //Check whether food ID is set or not 
        if(isset($_GET['food_id']))
        {
            //Get the food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the details of the selected food
            $sql = "SELECT * FROM tbl_food1 WHERE id=$food_id";
            //execute the query
            $res = mysqli_query($conn, $sql);
            //count the rows
            $count = mysqli_num_rows($res);
            //Check whether the data is available or not
            if($count==1)
            {
                //We have data
                //Get the data from database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];

            }
            else
            {
                //Food not available
                //Redirect to home page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //redirect to home page
            header('location:'.SITEURL);
        }
    ?>

<!-- fOOD order Section Starts Here -->
    <section class="order-bg">
        <div class="container">
            
            <h2 class="text-center text-main">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //Check whether the image avai or not
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>Image Unavailable</div>";
                            } 
                            else
                            {
                                //Image is available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Sweets" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">???<?php echo $price; ?> (per pack)</p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <p class="disclaimer">Our Policies</p>
                    <ul class="disclaimer-list">
                        <li>Currently, our business is not able to accept credit or online transactions. </li>
                        <li>We are only able to accept payment through Cash on Delivery.</li>
                        <li>Our business Is only able to make orders inside San Pedro, Laguna. Any orders made outside of San Pedro City, will be automatically rejected, so please do kindly fill the form properly without any mistakes.</li>
                        <li>Additionally, there will be a 1 hour time window in which the order can be recalled after being placed, once this window has passed, the order is considered final and is no longer refundable</li>

                    </ul>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. John Doe" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 09xxxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. johndoe@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. House No./Building No., Street No., Subdivision, Baranggay, City" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
            
                //Check whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    //get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $userid = $_SESSION['loggedIn'];

                    $total = $price * $qty; //total is = price x qty

                    $order_date = date("Y-m-d h:i:sa"); //order date

                    $status = "Ordered"; //Ordered, on delivery, delivered, cancelled

                    $customer_name = mysqli_real_escape_string($conn, $_POST['full-name']);
                    $customer_contact = mysqli_real_escape_string($conn, $_POST['contact']);
                    $customer_email = mysqli_real_escape_string($conn, $_POST['email']);
                    $customer_address = mysqli_real_escape_string($conn, $_POST['address']);

                    //Save the order in database
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order1 SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        userid = '$userid',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed succesfuly or not
                    if($res2==TRUE)
                    {
                        //query executed and order saved 
                        $_SESSION['order'] = "<div class='success'> Your order 
                        <span style='color: #ec217b'>$food</span> is now being prepared! Please check your E-mail or Text Messages for further information!
                        </div>";
                        header('location:'.SITEURL);

                        //sending an email or define name spaces
                        //create instance of phpmailer
                        $mail = new PHPMailer();
                        //set mailer to use smtp
                        $mail->isSMTP();
                        //define smtp host
                        $mail->Host = "smtp.gmail.com";
                        //enable smtp authetication
                        $mail->SMTPAuth = "true";
                        //set type of encryption (ssl/tls)
                        $mail->SMTPSecure = "tls";
                        //set port to connect smtp
                        $mail->Port = "587";
                        //set gmail username
                        $mail->Username = "sugarstopsanpedro@gmail.com";
                        //set gmail password
                        $mail->Password = "sugarstopcookies";
                        //set email subject
                        $mail->Subject = "SugarStop Order Confirmation";
                        //set sender email
                        $mail->setFrom("sugarstopsanpedro@gmail.com");
                        //email body
                        $mail->Body = "Hello we would like to confirm that your order is being prepared! If the phone number you have set on our order page is working, you will be sent an SMS on the location of the delivery.
                                        
                        Thank you for ordering at SugarStop San Pedro!";
                        //add recipient
                        $mail->addAddress($customer_email);
                        //finally send email
                        if ($mail->Send() ){
                            echo "Email Sent..!";
                        }else{
                            echo "Error";
                        }
                        //closing smtp connection
                        $mail->smtpClose();

                        ob_end_flush(); 
                    }
                    else
                    {
                        //Failed to save order
                        $_SESSION['order'] = "<div class='error'> There has been an error with your order 
                        <span style='color: #ec217b'>$food</span>. Please try again or contact us!
                        </div>";
                        header('location:'.SITEURL);
                    }
                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <div class="loader">
        <img src="images/imageload.png" alt="Loading..." />
    </div>

<script src="js/script.js"></script>

<?php include('partials-front/footer.php'); ?>    