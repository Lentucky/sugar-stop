<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br/>

        <?php 
            if(isset($_SESSION['add'])) //Check is set or not
            {
                echo $_SESSION['add']; //Display Session
                unset($_SESSION['add']); //Remove Session
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter user's full name">
                    </td>
                    
                </tr>
                
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter a username">
                    </td>
                    
                </tr>
                
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter a password">
                    </td>
                    
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //process the value form and save it in the database

    //Check if submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // button clicked
        //echo "Button clicked";

        //get the data from the form
        $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);

        $raw_password = md5($_POST["password"]);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //to save to database
        $sql = "INSERT INTO tbl_admin1 SET
            full_name = '$full_name',
            username= '$username',
            password= '$password'
        ";

        
        // Executing quer and saving data to database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //check whether the data is inserted or not 
        if($res==TRUE)
        {
            //Data inserted
            //echo "Data Inserted";
            //Create a variable to display
            $_SESSION['add'] = "<div class='success'>Admin Added Succesfully</div>";
            
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed
            //echo "Error";
            $_SESSION['add'] = "Admin Failed to Process";
            
            //redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
?>