<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <br>
        <br>
        
        <h1>Add Category</h1>

        

        <?php
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>


        <br><br>
        <!--Add Category form starts-->
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Category Title">
                </td>
            </tr>

            <tr>
                <td>Select Image: </td>
                <td>
                    <input type="file" name="image" >
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" id="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" value="Add Category" name="submit" class="btn-secondary">
                </td>
            </tr>

        </table>

        </form>
        <!--Add Category form endsc -->

        <?php
            if(isset($_POST['submit']))
            {
                //echo "Button Cliked";
                //1.Get the values from  category form
                $title = $_POST['title'];

                //For Radio input, we need to check whether the button is selected or not
                if(isset($_POST['featured']))
                {
                    //Get the value from forrm
                    $featured = $_POST['featured'];
                }
                else
                {
                    //Set default value
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //Check whether the image is selected or not and set the value for image name accordingly
                //print_r($_FILES['image']); //print_r displayes arrays
                
                //die(); //break the code here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the image
                    //To upload image we need image name source path and destination path
                    $image_name = $_FILES['image']['name'];
                    
                    if($image_name != "")
                    {

                    

                    //Auto rename or image
                    /*Get extension (jpg png ejt) */
                    $ext = end(explode('.', $image_name));

                    //Rename the image
                    $image_name = "Product_Category_".rand(000,999).'.'.$ext;

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../pictures/category/".$image_name;

                    //Finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    //If the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        //stop the process
                        die();
                    }

                    }
                }
                else
                {
                    //Dont upload image and set the image_name value as blank
                    $image_name="";
                }


                //2.Create SQL query to insert category into database
                $sql = "INSERT INTO tbl_category SET
                    title = '$title',
                    image_name='$image_name',
                    featured = '$featured',
                    active= '$active'
                ";

                //3.Execute the query and save in database
                $res = mysqli_query($conn, $sql);

                //4.Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query executed
                    $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }

        ?>
    </div>
</div>


<?php include('partials/footer.php'); ?>