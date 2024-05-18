<?php
require "left-menu.php";
require 'conn.php';
require 'header.php';
// require 'footer.php';
$user = $_SESSION["name"];
$flat = $_SESSION["flat_name"];
$door_no = $_SESSION["door_no"];

/*************************************/
/*************************************/

?>
<!doctype html> <!--     support-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Profile Page || GoWatr</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- nouislider CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.css" rel="stylesheet">


    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.7/css/swiper.min.css">

    <?php $door = $_SESSION["door_no"];
    if ($door == 158) { ?>
        <script src='https://cityof1000tanks.gowatr.com/api/profile_fetch158.js'></script>
    <?php } else if ($door == 143) { ?>
        <script src='https://cityof1000tanks.gowatr.com/api/profile_fetch143.js'></script>
    <?php } else { ?>
        <script src='api/profile_fetch.js'></script>
    <?php }
    ?>

    <!-- style css for this template -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="assets/css/style.css" rel="stylesheet" id="style">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- style css for this template -->
    <link href="assets/css/style.css" rel="stylesheet" id="style">
</head>
<style>
    .btm-typing-card {
        background-color: #fdf6e5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #21385a;
        font-size: 0.9rem;
    }

    .form-control-chat:focus {
        outline: none;

    }

    ::placeholder {
        color: "#d9d9d9d";
        opacity: 1;
        margin-left: 10px;
        /* Firefox */
    }

    ::-ms-input-placeholder {
        /* Edge 12 -18 */
        color: "#d9d9d9";
    }
</style>

<body class="body-scroll" data-page="home">
    <div class="blob_div">
        <img class="blob_img_1" src="./assets/img/blob.png">
        <img class="blob_img_2" src="./assets/img/blob.png">
        <!-- <img class="blob_img_2" src="./assets/img/blob.png"> -->
    </div>
    <!-- loader section -->


    <!-- loader section ends -->

    <!-- Sidebar main menu -->

    <!-- Sidebar main menu ends -->
    <!-- Begin page -->
    <main class="">

        <!-- chat area start -->
        <div class="chat_heading_div">
            <div class="container gowatr_profile">
                <p class="">Profile</p>
            </div>
            <div class="container bell_div">
                <div class="bell_icons">
                    <img class="profile_img" src="./assets/img/profile.png">
                </div>


            </div>
        </div>

        <div class="container ">
            <div class="complete_profile">
                <p class="complete_txt">Complete Water Consumption</p>
                <p class="complete_usage">WATER USAGE</p>
            </div>
            <div class="card chart_card" style="box-shadow: none ;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6 tabs_container">
                            <div class="container tab_container">
                                <div class="parent_div">
                                    <div class="tab-container">
                                        <div class="tab active" onclick="openTab('tab1')">
                                            <p class="day">YESTERDAY</p>
                                        </div>
                                        <div class="tab" onclick="openTab('tab2')">
                                            <p class="day">TODAY</p>
                                        </div>
                                        <div class="tab tab3" onclick="openTab('tab3')">
                                            <p class="day">OVERALL</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 tabs_container">
                            <div class="container profile_small">

                                <div id="tab1" class="tab-content active">
                                    <div class="row ">
                                        <div class="col-sm-12 d-flex">
                                            <div class="col-sm-5 pad_rm_profile">
                                                <div class="days_profile">
                                                    <div class="profile_num"> 0 
                                                        <span class="ltr_profile" id='yesterday'>Ltr</span></div>
                                                    <div>
                                                        <p class="total_profile">Total Usage</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pad_rm_profile padding_profile" style="text-align: center;">
                                                <img class="drop_img" src="./assets/img/drops.png">
                                            </div>
                                            <div class="col-sm-5 pad_rm_profile">
                                                <div id="yesterdayDate" class="days_profile">
                                                    <div class="profile_num"> 08 <span class="ltr_profile">May</span>
                                                    </div>
                                                    <div>
                                                        <p class="total_profile">2024</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="tab2" class="tab-content">
                                    <div class="row ">
                                        <div class="col-sm-12 d-flex">
                                            <div class="col-sm-5 pad_rm_profile">
                                                <div class="days_profile">
                                                    <div class="profile_num"> 0 
                                                        <span class="ltr_profile" id='today'>Ltr</span>
                                                    </div>
                                                    <div>
                                                        <p class="total_profile">Total Usage</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pad_rm_profile padding_profile" style="text-align: center;">
                                                <img class="drop_img" src="./assets/img/drops.png">
                                            </div>
                                            <div class="col-sm-5 pad_rm_profile">
                                                <div id="todayDate" class="days_profile">
                                                    <div class="profile_num"> 09 
                                                        <span class="ltr_profile">May</span>
                                                    </div>
                                                    <div>
                                                        <p class="total_profile">2024</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div id="tab3" class="tab-content">
                                    <div class="row ">
                                        <div class="col-sm-12 d-flex">
                                            <div class="container overall_container">
                                                <div class="card overall_card">
                                                    <p class="overall_ltr_txt">0 <span class="overall_ltr" id='fmtotal'>Ltr</span></p>
                                                    <p class="overall_font_txt">Overall Usage from all flow meters</p>
                                                </div>
                                                <div>
                                                    <img class="drop_overall_img" src="./assets/img/drops.png">
                                                </div>
                                            </div>

                                        </div>

                                        <?php
                                        $usr_qry = "SELECT * FROM `r_owner_detail` where door_no = '$door_no' ";
                                        $usr_res = mysqli_query($conn, $usr_qry);
                                        while ($usr_row = mysqli_fetch_assoc($usr_res)) {
                                            $name = $usr_row['name'];
                                            $email = $usr_row['email'];
                                            $number = $usr_row['number'];
                                        }

                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
        <div class="container ">
            <div class="complete_profile_div">

                <p class="complete_profile_heading">OWNER DETAIL</p>
            </div>
            <div class="card chart_card below_card">
                <div class="tab_container profile_left">
                    <div class="profile_txt"> <img class="card_profile" src="./assets/img/profile.png">
                        <p class="name_profile"><?php echo empty($name) ? 'USER NOT FOUND' : $name; ?>
                        </p>
                    </div>
                    <div class="list_profile" style="margin-top: 10px;">
                        <p class="name_profile"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                            </svg></p>
                        <p class="ans"><?php echo empty($number) ? 'USER NOT FOUND' : $number; ?>
                        </p>

                    </div>
                    <div class="list_profile">
                        <p class="name_profile"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg></p>
                        <p class="ans"><?php echo empty($email) ? 'USER NOT FOUND' : $email; ?>
                        </p>

                    </div>
                    <div class="list_profile">
                        <p class="name_profile">Flat :</p>
                        <p class="ans"><?php echo isset($door_no) ? str_replace('F', '', $door_no) : 'USER NOT FOUND'; ?></p>
                    </div>

                    <div class="list_profile">
                        <p class="name_profile">Block :</p>
                        <p class="ans"><?php echo isset($_SESSION["flat_name"]) ? substr($_SESSION["flat_name"], 6) : 'USER NOT FOUND'; ?></p>
                    </div>

                </div>

                <div class="tab_container profile_right">
                    <div class="row" style="align-items: center; border-left: 1px solid #0fb0cd">
                        <div class="img_profile_container">

                            <div class="img_col">
                                <img class="logo_radiance" src="./assets/img/r_flourish_logo.png">
                            </div>
                        </div>
                        <div class="block_name">
                            <p class="block_txt"><?php echo isset($_SESSION["flat_name"]) ? $_SESSION["flat_name"] : 'USER NOT FOUND'; ?></p>
                        </div>
                        <div class="edit">
                            <button class="btn_edit">
                                <p class="edit_txt">Edit Profile</p>
                                <p class="edit_icon">
                                    <svg class="edit_svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </p>
                            </button>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <?php
    require 'footer.php';
    ?>
    <script>
        function openTab(tabName) {
            var i, tabContent, tabLinks;
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }
            tabLinks = document.getElementsByClassName("tab");
            for (i = 0; i < tabLinks.length; i++) {
                tabLinks[i].classList.remove("active");
            }
            document.getElementById(tabName).style.display = "block";
            event.currentTarget.classList.add("active");
        }
    </script>

    <script src="https://kit.fontawesome.com/cd2d9c3abd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        function formatDate(date) {
            const day = date.getDate().toString().padStart(2, '0');
            const month = date.toLocaleString('default', {
                month: 'short'
            });
            const year = date.getFullYear();
            return {
                day,
                month,
                year
            };
        }

        function setDate() {
            const today = new Date();
            const yesterday = new Date(today);
            yesterday.setDate(today.getDate() - 1);

            const todayFormatted = formatDate(today);
            const yesterdayFormatted = formatDate(yesterday);

            document.getElementById('todayDate').innerHTML = `
            <div class="profile_num"> ${todayFormatted.day} <span class="ltr_profile">${todayFormatted.month}</span></div>
            <div>
                <p class="total_profile">${todayFormatted.year}</p>
            </div>
        `;

            document.getElementById('yesterdayDate').innerHTML = `
            <div class="profile_num"> ${yesterdayFormatted.day} <span class="ltr_profile">${yesterdayFormatted.month}</span></div>
            <div>
                <p class="total_profile">${yesterdayFormatted.year}</p>
            </div>
        `;
        }

        document.addEventListener('DOMContentLoaded', setDate);
    </script>

</body>

</html>