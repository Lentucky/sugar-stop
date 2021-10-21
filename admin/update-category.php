<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php 
        
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the id and all of the details
                //echo "Getting the data";
                $id = $_GET['id'];

                //Create sql query to get all other details
                $sql = "SELECT * FROM tbl_category1 WHERE id=$id";

                //Execute the query 
                $res = mysqli_query($conn, $sql);

                //count the rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    //redirect to manage category
                    $_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');

                }
            }
            else
            {
                //redirect to manage category
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image != "")
                            {
                                //Display the image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width=150px>
                                <?php
                            }
                            else
                            {
                                //Display message
                                echo "<div class='error'>image not added</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="yes"> Yes
                        
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="no"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="yes"> Yes
                        
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="no"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get all the values from our form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //updating new image if selected
                //Check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //Get the image details
                    $image_name = $_FILES['image']['name'];

                    //Check whether the image is avaiable or not
                    if($image_name !="")
                    {
                        //Image available
                        //Upload the new image

                        //Section A

                        //Auto Rename our image
                        //Get the Extension of our image(jpg, png, gif, etc)
                        $ext = end(explode('.', $image_name));

                        //Rename the image
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g Food_Category_000


                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //Finally upload image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image uploaded or not
                        //and if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==FALSE)
                        {
                            //SET message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image. </div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/manage-category.php');
                            //stop the process
                            die();
                        }
                        //Section B
                        //Remove the current image
                        if($current_image !="")
                        {
                            $remove_path = "../images/category/".$current_image;

                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            //if failed to remove then display message and stop the process
                            if($remove==FALSE)
                            {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current Image</div>";
                                header('location'.SITEURL.'admin/manage-category.php');
                                die();
                            }
                        }
                        
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }


                //Update the database
                $sql2 = "UPDATE tbl_category1 SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //redirect to manage category with message
                //check whether the query executed or not
                if($res2==true)
                {
                    //category uppdated
                    $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    die();
                }
            }

        ?>
    </div>
</div>

<?php include('partials/footer.php')?>