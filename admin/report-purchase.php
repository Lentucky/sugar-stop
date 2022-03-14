<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Purchases</h1>
        <form action="" method="POST" enctype="multipart/form-data" id="foodform">

            <br><br>

            <h3>Select date:</h3>
            <br>
            <form action="" method="POST">
            <input type="search" name="foodsearch" placeholder="Search for Food.." required>               
            <input type="submit" value="GetData" name="submit">

        </form>

                <br /><br /><br />
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                    </tr>

                    <?php 
                        if(isset($_POST['submit']))
                        {                  
                            $foodsearch = mysqli_real_escape_string($conn, $_POST['foodsearch']);

                            $sql2 = "SELECT * FROM tbl_order1 WHERE status='Delivered' AND food LIKE '$foodsearch' ";

                            //Execute the query
                            $res2 = mysqli_query($conn, $sql2);

                            //Count the rows
                            $count2 = mysqli_num_rows($res2);

                            $sn=1;

                            //Check whether the categories are available or not
                            if($count2>0)
                            {
                                //Categories available
                                while($row2=mysqli_fetch_assoc($res2))
                                {
                                    //Get the values
                                    $id = $row2['id'];
                                    $food = $row2['food'];
                                    $price = $row2['price'];
                                    $qty = $row2['qty'];
                                    $total = $row2['total'];
                                    $order_date = $row2['order_date'];
                                    $customer_name = $row2['customer_name'];
                                    $customer_email = $row2['customer_email'];
                                    //Display values
                                    ?>

                                    <tr>
                                            <td><?php echo $sn++;?></td>
                                            <td><?php echo $food; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $qty;?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $order_date; ?></td>
                                            <td><?php echo $customer_name;?></td>
                                            <td><?php echo $customer_email; ?></td>
                                    </tr>

                                    <?php

                                }
                            }
                            else
                            {
                                //Categories not available
                                echo "<div class='error'>No Data to be displayed</div>";
                            }

                        }

                    ?>

                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>