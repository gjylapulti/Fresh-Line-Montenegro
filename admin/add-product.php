<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add product </h1>

        <br><br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the product">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="product description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" min="1" step="any" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                            //Create PHP code to display categories from database
                            //1.Create sql to get all active categories from database
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                            //executing query
                            $res = mysqli_query($conn, $sql);

                            //count rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);

                            //if count is greates than 0 we have categories else we do not have cateogires
                            if ($count > 0) {
                                //We have categories
                                while ($row = mysqli_fetch_assoc($res)) {
                                    //get the details of category
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            } else {
                                //We do not have categories
                                ?>
                                <option value="0">No Category Found</option>
                                <?php
                            }

                            //2.Display on Dropdown
                            ?>

                        </select>
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
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add product" name="submit" class="btn-secondary">

                    </td>
                </tr>
            </table>

        </form>

        <?php
        //Check whether the button is clicked or not
        if (isset($_POST['submit'])) {
            //add product in database
            //1.Get the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //check whether radio button for featured and active are checked or not
            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No"; //setting the default value
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No"; //default value
            }

            //2.Upload the image of selected
        
            if (isset($_FILES['image']['name'])) {
                //get the details of selected image
                $image_name = $_FILES['image']['name'];

                //check whether image is opened or not
                if ($image_name != "") {
                    //image selected
                    // A) Rename the image
                    $ext = end(explode('.', $image_name));

                    $image_name = "product-Name-" . rand(000, 999) . "." . $ext; //sets new image name to product-name-555.jpg
        
                    // B) upload the image
                    //Get the src path and destination path
        
                    //Source path is the current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //destination path for the image to be uploaded
                    $dst = "../pictures/product/" . $image_name;

                    //finally upload the product image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether image uploaded or not
                    if ($upload == false) {
                        //failed to upload the image
        
                        //redirect to add product page with error message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload image.</div>";
                        header('location:' . SITEURL . 'admin/add-product.php');

                        //stop the process
                        die();
                    }
                }
            } else {
                $image_name = ""; //setting deefault value as blank
            }


            //3.Insert into database
        

            //Create sql query to save or add product
            //for numerical we do not need to pass value inside quotes 
            $sql2 = "INSERT INTO tbl_product SET
                    title = '$title',
                    description ='$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

            //execute quuery
            $res2 = mysqli_query($conn, $sql2);


            //check whether rdata inserted or not
            //4.Redirect with message to manage product page
        
            if ($res2 == true) {
                //data inserted successfully
                $_SESSION['add'] = "<div class='success'>product added successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-product.php');
            } else {
                //failed to insert data
                $_SESSION['add'] = "<div class='error'>Failed to add product.</div>";
                header('location:' . SITEURL . 'admin/manage-product.php');
            }

        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>