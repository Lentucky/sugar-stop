<?php include('partials/menu.php'); ?>

        <!-- Main Content Section -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br>

                <div class="col-4 text-center">

                    <?php 
                        //get sql
                        $sql = "SELECT * FROM tbl_category1";
                        //Execute query
                        $res = mysqli_query($conn, $sql);
                        //Count rows
                        $count = mysqli_num_rows($res);

                    ?>
                    
                    <h1><?php echo $count; ?></h1>
                    <br/>
                    categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //get sql
                        $sql2 = "SELECT * FROM tbl_food1";
                        //Execute query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count rows
                        $count2 = mysqli_num_rows($res2);

                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br/>
                    Foods
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //get sql
                        $sql3 = "SELECT * FROM tbl_order1";
                        //Execute query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count rows
                        $count3 = mysqli_num_rows($res3);

                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br/>
                    Total Orders
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Create sql query
                        //aggregate function in sql
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order1 WHERE status='Delivered' ";

                        //execute the query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the value
                        $row4 = mysqli_fetch_assoc($res4);

                        //Get the total revenue
                        $total_revenue = $row4['Total'];
                    ?>

                    <h1><?php echo $total_revenue; ?></h1>
                    <br/>
                    Revenue Generated
                </div>
                
                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Section -->

<?php include('partials/footer.php'); ?>