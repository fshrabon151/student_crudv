<?php
include_once "autoload.php";
/**
 * Show single student
 */
if (isset($_GET['show_id'])) {
    $id = $_GET['show_id'];

    $product = find('products', $id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product->productName;?></title>

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

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 mx-auto mt-5">
                                    <div class="card p-5">
                                        <img src="photos/<?php echo $product->photo ?>" class="simg shadow mb-4" alt="">
                                        <h2 class="text-center"><?php echo $product->productName ?></h2>
                                        <p class="text-center"><?php echo $product->description ?></p>

                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <td>Regular Price</td>
                                                    <td>$<?php echo $product->regularPrice ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Selling Price</td>
                                                    <td><?php echo $product->sellingPrice ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Category</td>
                                                    <td><?php echo $product->category ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Brand Name</td>
                                                    <td><?php echo $product->brandName ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tag</td>
                                                    <td><?php echo $product->tag ?></td>
                                                </tr>
                                            </table>

                                            <a href="index.php" class="btn btn-primary btn-sm">Back</a>
                                        </div>
                                    </div>

                                </div>
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

        $("#insertPhoto").change(function(e) {
            let file_url = URL.createObjectURL(e.target.files[0]);
            $("#uploadPhoto").attr("src", file_url);
            $("#insertPhotoLabel").hide();
        });
    </script>
</body>

</html>