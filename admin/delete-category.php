<?php
    //include constants file
    include('../config/constants.php');

    //echo "Delete Page";
    //Check whether the id and image_name value is set or not

    if(isset($_GET['id']) and isset($_GET['image_name']))
    {
        //Get the Value and Delete
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available
        if($image_name != "")
        {
            //image is available. so remove it
            $path = "../images/category/".$image_name;
            //remove the image 
            $remove = unlink($path);

            //if failed to remove image then add an error message and stop the process
            if($remove==FALSE)
            {
                //Set the session the message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }

        //Delete data from database
        //SQL Query to Delete data from database
        $sql = "DELETE FROM tbl_category1 WHERE id=$id";

        //Execure the query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res==TRUE)
        {
            //SET Success message and redirect
            $_SESSION['delete'] = "<div class='success'>Deleted Successfully</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //SEt fail message
            //SET Success message and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        ///Redirect to manage category page with message

    }
    else
    {
        //redirect to manage category page
        header('location'.SITEURL.'admin/manage-category.php');

    }

?>