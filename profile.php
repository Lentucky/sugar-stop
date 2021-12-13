<?php include('partials-front/menu.php'); ?>    

    <?php 
        //Create SQL query to get all the fucking users
        $sql = "SELECT * FROM tbl_users1 ";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //Count rows to check whether we have food or not
        $count = mysqli_num_rows($res);

        if($count>0)
        {
                //We have food in database
                //Get the food from database and display
                while($row=mysqli_fetch_assoc($res))
                {
                        //get the value from the individual columns
                        $id = $row['id'];
                        $username = $row['username'];
                        $email = $row['email'];
                }

        }

    ?>

    <section class="categories">
        <div class="container">
                <h2 class="text-center">Account Details</h2>
                    
                    <div class="order-label">

                        <p class="food-price"><?php echo $username?></p>
                        <p class="food-price"><?php echo $email?></p>

                    </div>
                        
        </div>
    </section>

    <section class="food-search">
        <div class="container">

            <fieldset>
                <legend>Order Details</legend>

                <?php 
                    //Create SQL query to get all the fucking users
                    $sql2 = "SELECT * FROM tbl_order1";

                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //Count rows to check whether we have food or not
                    $count2 = mysqli_num_rows($res2);

                    if($count2>0)
                    {
                            //We have food in database
                            //Get the food from database and display
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                    //get the value from the individual columns
                                    $id = $row2['id'];
                                    $food = $row2['food'];
                                    $price = $row2['price'];
                                    $qty = $row2['qty'];
                                    $total = $row2['total'];
                                    $order_date = $row2['order_date'];
                                    $status = $row2['status'];
                            }
                    }

                ?>


                    <p class="food-price"><?php echo $food;?></p>
            </fieldset>

        </div>
    </section>

<?php include('partials-front/footer.php'); ?>    