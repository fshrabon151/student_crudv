<?php
include_once "autoload.php";


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

    $id = $_GET['edit_id'];


    /**
     * Form validation
     */
    if (empty($name) || empty($email) || empty($cell) || empty($username)) {
        $msg =  validate('All fields are required');
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $msg =  validate('Invalid Email address');
    } else {
        if (!empty($_FILES['new_photo']['name'])) {
            $data = move($_FILES['new_photo'], 'photos/');
            $photo_name = $data['unique_name'];
            unlink('photos/' . $_POST['old_photo']);
        } else {
            $photo_name = $_POST['old_photo'];
        }
        connect()->query("UPDATE students SET name='$name', email='$email', cell='$cell', username='$username', location='$location', age='$age', gender='$gender', course='$course', photo='$photo_name' WHERE id='$id'");
        $msg =  validate('Data Updated Successfully', 'success');
    }
}

/**
 * Find Edit Student Data
 */
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];

    $edit_data = find('students', $id);
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
                                        <label class="form-label" for="">Student Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $edit_data->name;?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $edit_data->email;?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label class="form-label" for="pNumber">Phone Number</label>
                                        <input type="text" name="pNumber" class="form-control" value="<?php echo $edit_data->cell; ?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $edit_data->username; ?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label for="">Location</label>
                                        <select class="form-control" name="location">
                                            <option>-- Select Location --</option>
                                            <option <?php echo ($edit_data->location == 'Barishal') ? 'selected' : ''; ?> value="Barishal">Barishal</option>
                                            <option <?php echo ($edit_data->location == 'Dhaka') ? 'selected' : ''; ?> value="Dhaka">Dhaka</option>
                                            <option <?php echo ($edit_data->location == 'Mymensingh') ? 'selected' : ''; ?> value="Mymensingh">Mymensingh</option>
                                            <option <?php echo ($edit_data->location == 'Khulna') ? 'selected' : ''; ?> value="Khulna">Khulna</option>
                                            <option <?php echo ($edit_data->location == 'Rajshahi') ? 'selected' : ''; ?> value="Rajshahi">Rajshahi</option>
                                            <option <?php echo ($edit_data->location == 'Rangpur') ? 'selected' : ''; ?> value="Rangpur">Rangpur</option>
                                            <option <?php echo ($edit_data->location == 'Sylhet') ? 'selected' : ''; ?> value="Sylhet">Sylhet</option>
                                        </select>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label class="form-label" for="age">Age</label>
                                        <input type="text" name="age" class="form-control" value="<?php echo $edit_data->age;?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label for="">Gender</label> <br>
                                        <input name="gender" type="radio" <?php echo ($edit_data->gender == 'Male') ? 'checked' : ''; ?> value="Male"> <label for="Male">Male</label>
                                        <input name="gender" type="radio" <?php echo ($edit_data->gender == 'Female') ? 'checked' : ''; ?> value="Female"> <label for="Female">Female</label>
                                    </div> <br>

                                    <div class="form-group">
                                        <label for="">Course</label>
                                        <select class="form-control" name="course" id="">
                                            <option value="">-- Select Course --</option>
                                            <option <?php echo ($edit_data->course == 'Photoshop') ? 'selected' : ''; ?> value="Photoshop">Photoshop</option>
                                            <option <?php echo ($edit_data->course == 'Web Design') ? 'selected' : ''; ?> value="Web Design">Web Design</option>
                                            <option <?php echo ($edit_data->course == 'Digital Marketing') ? 'selected' : ''; ?> value="Digital Marketing">Digital Marketing</option>
                                            <option <?php echo ($edit_data->course == 'Android Development') ? 'selected' : ''; ?> value="Android Development">Android Development</option>
                                            <option <?php echo ($edit_data->course == 'Ethical Hacking') ? 'selected' : ''; ?> value="Ethical Hacking">Ethical Hacking</option>
                                            <option <?php echo ($edit_data->course == 'Data Analysis') ? 'selected' : ''; ?> value="Data Analysis">Data Analysis</option>
                                            <option <?php echo ($edit_data->course == 'Auto CAD') ? 'selected' : ''; ?> value="Auto CAD">Auto CAD</option>
                                        </select>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label for="">Profile Photo</label> <br>
                                        <img id="load_student_photo" style="max-width:100% ;" src="photos/<?php echo $edit_data->photo; ?>" alt="">
                                        <br>
                                        <label for="student_photo" id="student_up"> <img width="100" src="assets/img/uloadphoto.png" alt=""></label>
                                        <input id="student_photo" name="photo" style="display:none;" class="form-control" type="file">
                                        <input type="hidden" value="<?php echo $edit_data->photo; ?>" name="old_photo">

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for=""></label>
                                        <input name="stc" class="btn btn-primary" type="submit" value="Update Student">


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