<?php
    include('../config/constants.php');
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        
        
        if($image_name != "")
        {
            $path = "../pictures/product/".$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file</div>";
            
                header('location:'.SITEURL.'admin/manage-product.php');
            
                die();
            }
        }

        Delete product from db
        $sql = "DELETE FROM tbl_product WHERE id=$id";

        //execute query
        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>product Deleted Successfully</div";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to delete product</div";
            header('location:'.SITEURL.'admin/manage-product.php');
        }

        
    }
    else
    {
        
       header('location:'.SITEURL.'admin/manage-product.php');
    }
?>
