<?php
require "left-menu.php";
require 'conn.php';
require 'sidebar.php';

?>
<!Doctype html> <!--INDIVUAL WATER CONSUMPTION 150723-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Home Page || GoWatr</title>
    <!--Title Favicon link-->
    <link rel="icon" href="assets/img/fav-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
    $door = $_SESSION["door_no"];
    if ($door == 158) { ?>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@0;1&display=swap" rel="stylesheet">
    <?php } else if ($door == 143) { ?>
    <link href="assets/css/style.css" rel="stylesheet" id="style">
    <?php } else { ?>
    <script src='api/fetch.js'></script>
    <?php }
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body class="body-scroll" data-page="home">
    <div class="blob_div">
        <img class="blob_img_1" src="./assets/img/blob.png">
        <img class="blob_img_2" src="./assets/img/blob.png">
        <!-- <img class="blob_img_2" src="./assets/img/blob.png"> -->
    </div>
    <!-- <div class="blob">
        This SVG is from https://codepen.io/Ali_Farooq_/pen/gKOJqx
        <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 350">
            <path d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z" />
        </svg>
    </div> -->

    <!--Header for index only-->
    <div class="container-fluid header">

        <div class="row ">

            <div class="col-sm-12 header_content">
                <div class="col left_right">
                    <img class="gw-logo" src="assets/img/logo.png">
                </div>
                <div class="col-sm-6 flat_name left_right">
                    <p>Radiance Flourish</p>
                </div>
                <div class="col left_right">
                    <button type="button" class="btn btn-link menu-btn hamburger">
                        <i class="fa-solid fa-bars" style="color: black"></i>
                    </button>
                </div>



            </div>



        </div>


    </div>


    <div class="container-fluid flat_content" style=" padding-left: 0px">
        <div class="col flat_block"> <?php echo  $_SESSION["flat_name"]; ?> </div>
        <div class=" flat_number">
        <div class="door_img">
    <img style="width: 23px; color: white" src="./assets/img/door.png">
    <p class="number"><?php echo isset($door) ? str_replace('F', '', $door) : ''; ?></p>
</div>



        </div>
    </div>
    <div class="total">
        <div class="container total_content_calendar">
            <p class="yesterday">Yesterday Total Usage</p><span class="ltr">37 Ltr</span>
        </div>

    </div>

        
    <div class="container card_container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card_div">
                    <div class="col">
                        <img class="card_img" src="./assets/img/bathtub.png">
                    </div>
                    <div class="col">
                        <p class="area" style="margin-bottom: 0px;">Restroom</p>
                        <p class="deactive"><span class="deactive_dot"></span>Deactive
                        </p>
                    </div>

                    <div class="col card_ltr">
                        <span class="ltr ltr_background">12 Ltr</span>
                    </div>


                </div>
            </div>

            <div class="col-sm-12 card_container">
                <div class="card card_div">
                    <div class="col">
                        <img class="card_img" src="./assets/img/kitchen-set.png">
                    </div>
                    <div class="col">
                        <p class="area" style="margin-bottom: 0px;">Kitchen</p>
                        <p class="active"><span class="active_dot"></span>Active
                        </p>
                    </div>

                    <div class="col card_ltr">
                        <span class="ltr ltr_background">18 Ltr</span>
                    </div>


                </div>
            </div>
            <div class="col-sm-12 card_container">
                <div class="card card_div">
                    <div class="col">
                        <img class="card_img" src="./assets/img/balcony.png">
                    </div>
                    <div class="col">
                        <p class="area" style="margin-bottom: 0px;">Balcony</p>
                        <p class="active"><span class="active_dot"></span>Active
                        </p>
                    </div>

                    <div class="col card_ltr">
                        <span class="ltr ltr_background">07 Ltr</span>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- main page content -->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">EXACT LOCATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="assets/img/loc-marked/f-11.jpg" width="100%">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/color-scheme.js"></script>

    <!-- page level custom script -->
    <script src="assets/js/app.js"></script>
    <script src="https://kit.fontawesome.com/cd2d9c3abd.js" crossorigin="anonymous"></script>
</body>

</html>
<?php
require 'footer.php';
?>