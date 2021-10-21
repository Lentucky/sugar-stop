<?php 
    //Delete contents Page
    include('../config/constants.php');

    //echo "Delete Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either && or AND works
    {
        //Process to Delete
        //echo "Process to Delete";

        //1. Get ID and Image name 
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove the Image if avaidable
        //Check whetehr the image is avaidable or not and delete only if available
        if($image_name != "")
        {
            //It has image and need to remove from folder
            //Get the image path
            $path = "../images/food/".$image_name;

            //Remove image file from folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==FALSE)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file </div>";
                //redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process of deleting food
                die();
            }
        }

        //3. Delete food from database
        $sql = "DELETE FROM tbl_food1 WHERE id=$id";
        //Execute the query
        $res = mysqli_query($conn, $sql);
        
        //Check whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Food with Session Message
        if($res=TRUE)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //failed to delete
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }



    }
    else
    {
        //Redirect to manage food page
        //echo "Redirect";
        $_SESSION['unauthorized'] = "<div class='error'>unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>