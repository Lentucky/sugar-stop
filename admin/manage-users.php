<?php include('partials/menu.php'); ?>

        <!-- Main Content Section -->
        <div class="main-content">
        <div class="wrapper">
                <h1>Manage Customers</h1>

                <br />

                <?php

                        if(isset($_SESSION['delete']))
                        {
                                echo $_SESSION['delete-user'];
                                unset($_SESSION['delete-user']);
                        }
                ?>
                <br/><br/><br/>
                <!-- btn to add admin -->
                <br /><br /><br />
                <table class="tbl-full">
                        <tr>
                                <th>S.N</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Actions</th>
                        </tr>

                        <?php
                                //Query to get admin
                                $sql = "SELECT * FROM tbl_users1";
                                //execute Query
                                $res = mysqli_query($conn, $sql);

                                //check whether the qery is executed or not
                                if($res==TRUE)
                                {
                                        // Count Rows to check wether we have data in database or not
                                        $count = mysqli_num_rows($res); // function to get all the rows in database

                                        $sn=1; //Create a variable and assign the value 

                                        //Check the num of rows
                                        if($count>0)
                                        {
                                                //we have data in database
                                                while($rows= mysqli_fetch_assoc($res))
                                                {
                                                        //Using while loop to get all the data from the database
                                                        //While loop will run as long as we have data in database

                                                        //Get individual data
                                                        $id=$rows['id'];
                                                        $username=$rows['username'];
                                                        $email=$rows['email'];
                                                        
                                                        //Display the values in our Table
                                                        ?>

                                                        <tr>
                                                                <td><?php echo $sn++;?></td>
                                                                <td><?php echo $username; ?></td>
                                                                <td><?php echo $email; ?></td>
                                                                <td>
                                                                        <a href="<?php echo SITEURL; ?>admin/delete-users.php?id=<?php echo $id; ?>" class="btn-danger">Delete Customer</a>
                                                                </td>
                                                        </tr>

                                                        <?php
                                                }
                                        }
                                        else
                                        {
                                                //we don't have data in database
                                        }
                                }
                        ?>

                        
                </table>
            </div>
        </div>
        <!-- Main Content Section -->

<?php include('partials/footer.php'); ?>