<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>
        <?php
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_category WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                //count the rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                        if($current_image != "")
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>pictures/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>Image Not Added.</div>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image: </td>
                <td>
                    <input type="file" name="image" id="">
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes;
                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No;
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Update Category" class="btn-secondary" name="submit">
                </td>
            </tr>

        </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                echo "Clicked";
                //1.Get all values from our form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];


                //updating new image if selected
                //CHECK whether the choose file is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get image details
                    $image_name = $_FILES['image']['name'];

                    //if image is selected
                    if($image_name != "")
                    {
                        //Image available
                        
                    //Auto rename or image
                    /*Get extension (jpg png ejt) */
                    $ext = end(explode('.', $image_name));

                    //Rename the image
                    $image_name = "Food_Category_".rand(000,999).'.'.$ext;

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../pictures/category/".$image_name;

                    //Finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    //If the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                        //stop the process
                        die();
                    }

                        //REMOVE CURRENT IMAGE if available
                        if($current_image!="")
                        {
                            $remove_path = "../pictures/category/".$curent_image;

                            $remove = unlink($remove_path);
                            if($remove==false)
                            {
                                //Failed to remove the image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die(); //stop the process
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


                //update the database
                $sql2 = "UPDATE tbl_category SET 
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2); //execute query

                //redirect to manage category with message
                //Check whether query executed or not
                if($res2==true)
                {
                    //category updated
                    $_SESSION['update'] = "<div class='success'>Category updated successfully</div";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to update category.</div";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            
            }
        ?>

    </div>
</div>


<?php include('partials/footer.php'); ?>