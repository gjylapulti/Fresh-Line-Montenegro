<?php
    include('../config/constants.php');

    // Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //1.Get value 
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2.Remove the physical image file if is available
        if($image_name != "")
        {
            
            $path = "../pictures/category/".$image_name;

            //unlink removes file
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to remove Category Image</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        }

        //Delete Data from Database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Category deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to delete category</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }



    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }
     
?>


