<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Sales</h1>
        <form action="" method="POST" enctype="multipart/form-data" id="foodform">

            <br><br>
                        
            <label for="saledate" class=Sales-size>Date from:</label>
            <input type="datetime-local" id="from_date" name="from_date" class=Sales-size value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>">

            <label for="saledate" class=Sales-size>Date to:</label>
            <input type="datetime-local" id="to_date" name="to_date" class=Sales-size value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>">

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
                            $fromOrig = strtotime($_POST['from_date']);
                            $toOrig = strtotime($_POST['to_date']);

                            $from = date("Y-m-d h:i:sa", $fromOrig);
                            $to = date("Y-m-d h:i:sa", $toOrig);

                            $sql = "SELECT * FROM tbl_order1 WHERE status='Delivered' AND order_date >= '$from' && order_date <= '$to'";

                            //Execute the query
                            $res = mysqli_query($conn, $sql);

                            //Count the rows
                            $count = mysqli_num_rows($res);

                            $sn=1;

                            //Check whether the categories are available or not
                            if($count>0)
                            {
                                //Categories available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //Get the values
                                    $id = $row['id'];
                                    $food = $row['food'];
                                    $price = $row['price'];
                                    $qty = $row['qty'];
                                    $total = $row['total'];
                                    $order_date = $row['order_date'];
                                    $customer_name = $row['customer_name'];
                                    $customer_email = $row['customer_email'];
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