<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>GoWatr Smart Water Management System</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json"   />

    <!-- Favicons -->
    <link rel="icon" href="assets/img/fav-logo.png">
    <link rel="apple-touch-icon" href="assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- swiper css -->
    <link rel="stylesheet" href="assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="assets/css/style.css" rel="stylesheet" id="style">

    <!-- Required jquery and libraries -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- cookie js -->
    <script src="assets/js/jquery.cookie.js"></script>

    <!-- swiper script -->
    <script src="assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js"></script>

    <!-- page level custom script -->
    <script src="assets/js/app.js"></script>

    <!-- Customized jquery file  -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="assets/js/pwa-services.js"></script>

    <style>
        .p-viewer {
            position: relative;
            margin: -42px 16px;
            float: right;
        }
        .fa-eye {
            color: #0c4880;
            cursor: pointer;
            font-size: 18px;
        }
        ::placeholder {
            color: #dfdfdf !important;
            font-size: 14px !important;
        }
    </style>

    <!-- script to choose dropdown -->
    <script>
        function doorno(val) {
            $.ajax({
                type: "POST",
                url: "drop.php",
                data: { flat: val },
                success: function(data) {
                    $("#door_no").html(data);
                }
            });
        }
    </script>

</head>
<body class="body-scroll" data-page="signin">

<?php
    require 'conn.php';
    if (isset($_REQUEST['flatname'])) {
        $flatname_url = $_REQUEST['flatname'];
    } else {
        $flatname_url = '';
    }
    if (isset($_REQUEST['doornum'])) {
        $doornum_url = $_REQUEST['doornum'];
    } else {
        $doornum_url = '';
    }
    if (isset($_REQUEST['pwd'])) {
        $pw_url = $_REQUEST['pwd'];
    } else {
        $pw_url = '';
    }

    if (isset($_POST['submit'])) {
        $flatname = $_POST['flatname'];
        $door = $_POST['door'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM `r_owner_detail` WHERE `flat_name` = '$flatname' AND door_num_latest='$door' AND `password` = '$password'") or die(mysqli_error($conn));
        $fetch = mysqli_fetch_assoc($query);
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $fetch["id"];
            $_SESSION["name"] = $fetch["name"];
            $_SESSION["email"] = $fetch["email"];
            $_SESSION["number"] = $fetch["number"];
            $_SESSION["door_no"] = $fetch["door_no"];
            $_SESSION["flat_name"] = $fetch["flat_name"];
            $_SESSION["door_num_latest"] = $fetch["door_num_latest"];

            header('location:index.php');
        } else {
?>
            <script>
                window.addEventListener('load', function() {
                    swal({
                        title: "Wrong",
                        text: "Email or Password",
                        icon: "error",
                        button: "OK!",
                    }).then((okey) => {
                        if (okey) {
                            window.location.href = "signin.php";
                        }
                    });
                })
            </script>
<?php
        }
    }
?>

<div class="blob_div">
    <img class="blob_img_1" src="./assets/img/blob.png">
    <img class="blob_img_2" src="./assets/img/blob.png">
</div>

<div class="container-fluid header sign_header">
    <div class="row">
        <div class="col-sm-12 header_content">
            <div class="col left_right">
                <img class="gw-logo gowatr_logo" src="assets/img/logo.png">
            </div>
            <div class="col-sm-6 flat_name left_right">
                <p>Sign in</p>
            </div>
            <div class="col left_right">
                <div class="sign_logo"> <img class="gw-logo" src="./assets/img/r_flourish_logo.png"></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="signin_img_div">
        <img class="signin_img" src="./assets/img/signin_graphic.png" alt="">
    </div>
    <div class="form_div">
        <form action="signin.php" method="POST" style="width: 100%;">
            <div class="col select_input">
                <select onChange="doorno(this.value);" name="flatname" id="state" class="form-select sign_in_select" aria-label="Default select example" required>
                    <option value="">Select Apartment </option>
                    <!--- Fetching States--->
                    <?php if (!empty($flatname_url)) { ?>
                        <option value="Radiance" selected>Radiance</option>
                    <?php } else {
                        $sql = "SELECT * FROM r_flat_details where flat_name !='Office'";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <option value="<?php echo $row['flat_name']; ?>"><?php echo $row['flat_name']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>

            <div class="col select_input">
                <?php if (empty($doornum_url)) { ?>
                    <select name="door" id="door_no" class="form-select sign_in_select" aria-label="Default select example" required>
                        <option value="">Select Door No</option>
                    </select>
                <?php } else {  ?>
                    <select name="door" id="door_no" class="form-select sign_in_select" aria-label="Default select example" required>
                        <option value="<?php echo $doornum_url; ?>" selected><?php echo $doornum_url; ?></option>
                    </select>
                <?php  } ?>
            </div>

            <div class="col select_input" style="position: relative;">
                <?php if (empty($pw_url)) { ?>
                    <input type="password" class="sign_in_select" id="password" placeholder="Enter Password" name="password" required>
                <?php } else {  ?>
                    <input type="password" class="sign_in_select" id="password" value="<?php echo $pw_url; ?>" placeholder="Enter Password" name="password" required>
                <?php  } ?>
                <span id="togglePassword" class="password-toggle-icon"><i class="fas fa-eye-slash"></i></span>
            </div>

            <div class="col select_input">
                <button class="submit_btn_signin sign_in_select" type="submit" name="submit">Sign in</button>
            </div>

            <div class="col select_input">
                <a class="forget" href="#">Forget Password?</a>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/sweetalert.min.js"></script>
<script>
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // Toggle the eye slash icon
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Add code to populate door numbers based on flatname selection
    $(document).ready(function () {
        $('select[name="flatname"]').change(function () {
            const flatname = $(this).val();
            if (flatname) {
                $.ajax({
                    type: 'POST',
                    url: 'drop.php',
                    data: { flat: flatname },
                    success: function (response) {
                        $('#door_no').html(response);
                    }
                });
            } else {
                $('#door_no').html('<option value="">Select Door No</option>');
            }
        });
    });
</script>

</body>
</html>
