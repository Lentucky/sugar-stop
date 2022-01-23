<?php 
    //Include constants.php file here
    include('config/constants.php');

    //1.Get the idea of the admin
    $id = $_GET['id'];


    //2.Create SQL Query to delete admin
    $sql = "DELETE FROM tbl_order1 WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed succesfully or not
    if($res==TRUE)
    {
        //Query executed successfully and admin deleted
        //echo "Admin Deleted";
        //Create Session Varaible to Display Message
        $_SESSION['delete'] = "<div class='success'>Order Deleted Succesfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'profile.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to delete order, try again later.</div>";
        header('location:'.SITEURL.'profile.php');
    }

    //3.Redirect to manage admin page with messages (success/error)

?>