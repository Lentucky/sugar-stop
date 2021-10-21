<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br/><br/>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <Input type="pasword" name="current_password" placeholder="Current Password"></Input>
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <Input type="pasword" name="new_password" placeholder="New Password"></Input>
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value='<?php echo $id; ?>'>
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php 
        //Check whether the submit b utton  is clicked or not
        if(isset($_POST['submit']))
        {
            //echo "clicked";

            //1. Get the Data from Form
            $id=$_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //2. Check whether the user with current ID and Current Password Exista or not
            $sql = "SELECT * FROM tbl_admin1 WHERE id=$id AND password='$current_password'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                //Check whether data is avaidable
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //User Exist and Password can be changed
                    //echo "User Found";
                    
                    //Check whether the new password and confirm match
                    if($new_password==$confirm_password)
                    {
                        //Update the Password
                        $sql2 = "UPDATE tbl_admin1 SET
                            password='$new_password'
                            WHERE id=$id
                        ";
                        
                        //Execute query
                        $res2 = mysqli_query($conn, $sql2);

                        //Check whether the query executed or not
                        if($res2==TRUE)
                        {
                            //DIsplay success message
                            //Redirect to Manage Admin with 
                            $_SESSION['change-pwd'] = "<div class='success'>Password changed successfully</div>";
                            //Redirect User
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                        else
                        {
                            //Display error message
                            $_SESSION['change-pwd'] = "<div class='error'>Password didn't change successfully</div>";
                            //Redirect User
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else
                    {
                        //Redirect to Manage Admin with error
                        $_SESSION['pwd-not-match'] = "<div class='error'>Password didn't match</div>";
                        //Redirect User
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                }
                else
                {
                    //Does not exist set message and redirect
                    $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                    //Redirect User
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

            //3. Check whether the New Password and confirm password match or not

            //4. Change Password if all above is true
        }
?>

<?php include('partials/footer.php')?>