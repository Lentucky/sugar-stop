<?php include('partials-front/menu.php'); ?>    

    <?php 
        if (isset($_SESSION["useruid"])){

            //2. Create SQL Query to get the details
            $sql="SELECT * FROM tbl_users";

            //3. execute
            $res=mysqli_query($conn, $sql);

            //4. Check
            if($res==TRUE)
            {
                //Data is available or not
                $count = mysqli_num_rows($res);
                //Check wether if we have admin data or not
                if($count==1)
                {
                    // Get the details
                    // echo "Admin Avaidable";
                    $row=mysqli_fetch_assoc($res);

                    $id = $row['usersId'];
                    $name = $row['usersName'];
                    $email = $row['usersEmail'];
                    $username = $row['usersUsername'];
                }
                else
                {
                    //Redirect to manage admiin page
                    header('location:'.SITEURL);
                }
            }
        }   
    ?>

    <section class="food-search">
        <div class="container">
           
                <fieldset>
                    <legend>Contact Details</legend>
                    <div class="order-label">

                        <p class="food-price"><?php echo $username; ?></p>

                    </div>


                </fieldset>

        </div>
    </section>

<?php include('partials-front/footer.php'); ?>    