<?php
include_once "autoload.php";
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

    <?php

    /**
     * Isseting Student add form
     */
    if (isset($_POST['stc'])) {
        // get value 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $cell = $_POST['pNumber'];
        $username = $_POST['username'];
        $location = $_POST['location'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];


        /**
         * Form validation
         */
        if (empty($name) || empty($email) || empty($cell) || empty($username)) {
            $msg =  validate('All fields are required');
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $msg =  validate('Invalid Email address');
        } else {


            // Upload ptofile photo			
            $data = move($_FILES['photo'], 'photos/');

            // get function 
            $unique_name = $data['unique_name'];
            $err_msg = $data['err_msg'];

            if (empty($err_msg)) {
                // Data insert 
                create("INSERT INTO students (name, email, cell, username, location, age, gender, course, photo) VALUES ('$name','$email','$cell','$username', '$location', '$age', '$gender', '$course', '$unique_name')");
                $msg =  validate('Data stable', 'success');
            } else {
                $msg = $err_msg;
            }
        }
    }

    ?>

    <div id="wrapper" class="menuDisplayed">

        <!-- sidebar  -->
        <div id="sidebar-wrapper">

            <div class="logo">
                <i class="fas fa-user-graduate"></i>
                <span>Student CRUDV Application</span>
            </div>
            <ul class="sidebar-nav">
                <li><a href="index.php"><i class="fas fa-user-graduate"></i> All Student</a></li>
                <li><a href="add_students.php"><i class="fas fa-user-plus"></i> Add Student</a></li>
                <li><a href="#">Logout</a></li>
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
                        <div class="card shadow mx-auto col-lg-4">
                            <div class="card-body p-4">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Student Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div><br>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div><br>
                                    <div class="form-group">
                                        <label class="form-label" for="pNumber">Phone Number</label>
                                        <input type="text" class="form-control" id="pNumber" name="pNumber">
                                    </div><br>
                                    <div class="form-group">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div><br>

                                    <div class="form-group">
                                        <label for="">Location</label>
                                        <select class="form-control" name="location" id="">
                                            <option>-- Select Location --</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label class="form-label" for="age">Age</label>
                                        <input type="text" id="age" name="age" class="form-control">
                                    </div><br>

                                    <div class="form-group">
                                        <label for="">Gender</label> <br>
                                        <input name="gender" type="radio" checked value="Male" id="Male"> <label for="Male">Male</label>
                                        <input name="gender" type="radio" value="Female" id="Female"> <label for="Female">Female</label>
                                    </div> <br>

                                    <div class="form-group">
                                        <label for="">Course</label>
                                        <select class="form-control" name="course" id="">
                                            <option value="">-- Select Course --</option>
                                            <option value="Photoshop">Photoshop</option>
                                            <option value="Web Design">Web Design</option>
                                            <option value="Digital Marketing">Digital Marketing</option>
                                            <option value="Android Development">Android Development</option>
                                            <option value="Ethical Hacking">Ethical Hacking</option>
                                            <option value="Data Analysis">Data Analysis</option>
                                            <option value="Auto CAD">Auto CAD</option>
                                        </select>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label for="">Profile Photo</label> <br>
                                        <img id="load_student_photo" style="max-width:100% ;" src="" alt="">
                                        <br>
                                        <label for="student_photo" id="student_up"> <img width="100" src="assets/img/uloadphoto.png" alt=""></label>
                                        <input id="student_photo" name="photo" style="display:none;" class="form-control" type="file">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for=""></label>
                                        <input name="stc" class="btn btn-primary" type="submit" value="Add student">


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

        $('#student_photo').change(function(e) {

            let file_url = URL.createObjectURL(e.target.files[0]);
            $('#load_student_photo').attr('src', file_url);
            $("#student_up").hide();

        });
    </script>
</body>

</html>