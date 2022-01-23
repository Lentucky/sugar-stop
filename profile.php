<?php include('partials-front/menu.php'); ?>    

    <?php 
        //Create SQL query to get all the fucking users
        $sql = "SELECT * FROM tbl_users1 where username='" . $_SESSION['loggedIn'] . "'";

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

    <?php 
            
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);

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

    <h3 class="text-center">Current Orders</h4>
    <section class="categories">
        <div class="container">

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Option</th>
                    
                </tr>

                <?php 
                    //Create SQL query to get all the fucking users
                    $sql2 = "SELECT * FROM tbl_order1 where userid='" . $_SESSION['loggedIn'] . "'";
                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //Count rows to check whether we have food or not
                    $count2 = mysqli_num_rows($res2);

                    $sn=1; //Create a variable and assign the value 

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
                                    $userid = $row2['userid'];

                                    //Display the values in our Table
                                    ?>

                                    <tr>
                                            <td><?php echo $sn++;?></td>
                                            <td><?php echo $food; ?></td>
                                            <td>₱<?php echo $price; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td>₱<?php echo $total; ?></td>
                                            <td><?php echo $order_date; ?></td>
                                            <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>delete-order.php?id=<?php echo $id; ?>" class="btn-remove">Delete Order</a>
                                            </td>
                                    </tr>

                                    <?php
                            }
                    }
                    else
                    {
                        //Order not Available
                        echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                    }

                ?>

                    <!-- where order will be seen -->

            </table>

        </div>
    </section>

    <h3 class="text-center">Delivered Orders</h4>
    <section class="categories">
        <div class="container">

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    
                </tr>

                <?php 
                    //Create SQL query to get all the fucking users
                    $sql3 = "SELECT * FROM tbl_order1 WHERE status='Delivered' AND userid='" . $_SESSION['loggedIn'] . "'";
                    //execute the query
                    $res3 = mysqli_query($conn, $sql3);

                    //Count rows to check whether we have food or not
                    $count3 = mysqli_num_rows($res3);

                    $sn=1; //Create a variable and assign the value 

                    if($count3>0)
                    {
                            //We have food in database
                            //Get the food from database and display
                            while($row3=mysqli_fetch_assoc($res3))
                            {
                                    //get the value from the individual columns
                                    $id = $row3['id'];
                                    $food = $row3['food'];
                                    $price = $row3['price'];
                                    $qty = $row3['qty'];
                                    $total = $row3['total'];
                                    $order_date = $row3['order_date'];
                                    $status = $row3['status'];
                                    $userid = $row3['userid'];

                                    //Display the values in our Table
                                    ?>

                                    <tr>
                                            <td><?php echo $sn++;?></td>
                                            <td><?php echo $food; ?></td>
                                            <td>₱<?php echo $price; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td>₱<?php echo $total; ?></td>
                                            <td><?php echo $order_date; ?></td>
                                            <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                            ?>
                                            </td>
                                    </tr>

                                    <?php
                            }
                    }
                    else
                    {
                        //Order not Available
                        echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                    }

                ?>

            </table>

        </div>
    </section>



<?php include('partials-front/footer.php'); ?>    