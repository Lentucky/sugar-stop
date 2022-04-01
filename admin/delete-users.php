<?php 
    //Include constants.php file here
    include('../config/constants.php');

    //1.Get the idea of the admin
    $id = $_GET['id'];


    //2.Create SQL Query to delete admin
    $sql = "DELETE FROM tbl_users1 WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed succesfully or not
    if($res==TRUE)
    {
        //Query executed successfully and admin deleted
        //echo "Admin Deleted";
        //Create Session Varaible to Display Message
        $_SESSION['delete-user'] = "<div class='success'>Customer Deleted Succesfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-users.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to delete Admin";

        $_SESSION['delete-user'] = "<div class='error'>Failed to delete Customer, try again later.</div>";
        header('location:'.SITEURL.'admin/manage-users.php');
    }

    //3.Redirect to manage admin page with messages (success/error)

?>