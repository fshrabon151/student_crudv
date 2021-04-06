<?php
include_once "autoload.php";




/**
 * Isseting Student add form
 */
if (isset($_POST['submit'])) {
    // get value 
    $productName = $_POST['productName'];
    $regularPrice = $_POST['regularPrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $category = $_POST['category'];
    $brandName = $_POST['brandName'];
    $tag = $_POST['tag'];
    $description = $_POST['description'];

    $id = $_GET['edit_id'];
    $updated_at = date('Y-m-d g:i:h', time());


    /**  
     * Form validation
     */
    if (empty($productName) || empty($regularPrice) || empty($sellingPrice) || empty($category) || empty($brandName) || empty($tag) || empty($description)) {
        $msg =  validate('All fields are required');
    } else {
        if (!empty($_FILES['new_photo']['name'])) {
            $data = move($_FILES['new_photo'], 'photos/');
            $photo_name = $data['unique_name'];
            unlink('photos/' . $_POST['old_photo']);
        } else {
            $photo_name = $_POST['old_photo'];
        }
        //updating data using function
        update("UPDATE products SET productName='$productName', regularPrice='$regularPrice', sellingPrice='$sellingPrice', category='$category', brandName='$brandName', tag='$tag', description='$description', photo='$photo_name', updated_at = '$updated_at'  WHERE id='$id'");
        header("location:index.php?update");
    }
}

/**
 * Find Edit Student Data
 */
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];

    $edit_data = find('products', $id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicon  -->
    <link rel="icon" href="assets/img/favicon-16x16.png">

    <!-- SlickNav CSS  -->
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- Owl Carousel CSS  -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- FontAwesome CSS  -->
    <link rel="stylesheet" href="assets/fonts/fontAwesome/css/all.min.css">



    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- Main CSS   -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Responsive CSS     -->
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>




    <div id="wrapper" class="menuDisplayed">

        <!-- sidebar  -->
        <div id="sidebar-wrapper">

            <div class="logo">
                <i class="fas fa-user-graduate"></i>
                <span>Product CRUDV Application</span>
            </div>
            <ul class="sidebar-nav">
                <li><a href="index.php"><i class="fas fa-user-graduate"></i> All Products</a></li>
                <li><a href="add.php"><i class="fas fa-user-plus"></i> Add Product</a></li>
                <li><a href="trash.php"><i class="far fa-trash-alt"></i> Trash</a></li>
                <li><a href="../index.php">Logout</a></li>
            </ul>
        </div>
        <!-- Page content  -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="page-title bg-info"><a href="#" class="btn btn-success" id="menu-toggle"><i class="fas fa-bars"></i> Menu </a> <span class="span-title"> <i class="fas fa-user-plus"></i></i> Add New Student</span></p>

                        <?php
                        if (isset($msg)) {
                            echo $msg;
                        }
                        

                        ?>


                        <div class="card shadow mx-auto col-lg-6">
                            <div class="card-body p-4">
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="form-label" for="productName">Product Name</label>
                                        <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $edit_data->productName; ?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label class="form-label" for="regularPrice">Regular Price </label>
                                        <input type="text" class="form-control" id="regularPrice" name="regularPrice" value="<?php echo $edit_data->regularPrice; ?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label class="form-label" for="sellingPrice">Selling Price </label>
                                        <input type="text" class="form-control" id="sellingPrice" name="sellingPrice" value="<?php echo $edit_data->sellingPrice; ?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" name="category" id="">
                                            <option>-- Select category --</option>
                                            <option <?php echo ($edit_data->category == 'Mans') ? 'selected' : ''; ?> value="Mans">Mans</option>
                                            <option <?php echo ($edit_data->category == 'Womens') ? 'selected' : ''; ?> value="Womens">Womens</option>
                                            <option <?php echo ($edit_data->category == 'Electronics') ? 'selected' : ''; ?> value="Electronics">Electronics</option>
                                            <option <?php echo ($edit_data->category == 'Furniture') ? 'selected' : ''; ?> value="Furniture">Furniture</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="brandName">Brand Name </label>
                                        <input type="text" class="form-control" id="brandName" name="brandName" value="<?php echo $edit_data->brandName; ?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="">Tag</label>
                                        <select class="form-control" name="tag" id="">
                                            <option>-- Select Tag --</option>
                                            <option <?php echo ($edit_data->tag == 'Dresses') ? 'selected' : ''; ?> value="Dresses">Dresses</option>
                                            <option <?php echo ($edit_data->tag == 'Gadgets') ? 'selected' : ''; ?> value="Gadgets">Gadgets</option>
                                            <option <?php echo ($edit_data->tag == 'House Holds') ? 'selected' : ''; ?> value="House Holds">House Holds</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input class="form-control" id="description" name="description" rows="3" value="<?php echo $edit_data->description; ?>">
                                    </div><br>



                                    <div class="form-group">
                                        <label for="">Product Photo</label> <br>
                                        <img id="load_photo_edit" style="max-width:100%;" src="photos/<?php echo $edit_data->photo; ?>" alt="">
                                        <br>
                                        <label for="data_photo_edit"> <img width="100" src="assets/img/uloadphoto.png" alt=""></label>
                                        <input id="data_photo_edit" name="new_photo" type="file" style="display: none;" class="form-control">
                                        <input type="hidden" value="<?php echo $edit_data->photo; ?>" name="old_photo">

                                    </div>



                                    <br>

                                    <div class="form-group">
                                        <label for=""></label>
                                        <input name="submit" class="btn btn-primary" type="submit" value="Update Student">
                                    </div>
                                </form>


                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>



    <!-- JS FILES  -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {

            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");

        });

        $('#data_photo_edit').change(function(e) {

            let file_url = URL.createObjectURL(e.target.files[0]);
            $('#load_photo_edit').attr('src', file_url);
            //$("#student_up").hide();

        });
    </script>
</body>

</html>