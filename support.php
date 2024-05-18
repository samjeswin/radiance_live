<?php
require "left-menu.php";
require 'conn.php';
require 'header.php';

$door =  $_SESSION["door_no"];
?>
<!doctype html> <!--     support-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>GoWatr Support</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- swiper css -->


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
    <!-- <div class="sidebar-wrap  sidebar-overlay">
        Add pushcontent or fullmenu instead overlay
        <div class="closemenu text-opac">Close Menu</div>
        <div class="sidebar">
            <div class="row mt-4 mb-3">
                <div class="col-auto">
                    <figure class="avatar avatar-60 rounded mx-auto my-1">
                        <img src="assets/img/logo.png" alt="">
                    </figure>
                </div>
                <div class="col align-self-center ps-0">
                    <h6 class="mb-0">GoWatr Pvt Ltd</h6>
                    <p class="text-opac">Smart Water Management</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Dashboard</div>
                                <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">Logout</div>
                                <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Sidebar main menu ends -->
    <!-- Begin page -->
    <main class="">

        <!-- chat area start -->
        <div class="chat_heading_div">
            <div class="container gowatr_chat">

                <p class="">Chat</p>
            </div>
            <div class="container bell_div">
                <div class="bell_icons"> <svg class="bell_icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                    </svg></div>


            </div>



        </div>

        <div class="card-chat">

            <form action="" class="form">
                <div class="d-flex flex-row p-3">
                    <img src="assets/img/logo.png" width="30" height="30" style="margin: 6px">
                    <div class="chat ml-2 p-3">Hi, Thanks for Visiting! GoWatr. </div>
                </div>

                <?php
                $sts1 = 0;

                $slt_qry1 = "SELECT queries,status_qry from `user_queries` where  door_no = '$door' order by id desc limit 1 ";

                $slt_res1 = mysqli_query($conn, $slt_qry1);
                while ($slt_row1 = mysqli_fetch_array($slt_res1)) {


                    $qry1 = $slt_row1['queries'];


                    if (isset($slt_row1['status_qry'])) {
                        $sts1 =  $slt_row1['status_qry'];
                    } else {
                        $sts1 = 0;
                    }

                    if (empty($slt_row1['status_qry'])) {
                        $sts1 = 0;
                    } else {
                        $sts1 = $slt_row1['status_qry'];
                    }



                    if ($sts1 == '1') {
                ?>

                        <div class="d-flex flex-row p-3">
                            <!-- <div class="bg-white1 mr-2 p-3"><span class="client-msg"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia enim ad ut laborum laboriosam.</span></div> -->

                            <svg style="color: #0fb0cd;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                        </div>

                        <div class="d-flex flex-row p-3">
                            <img src="assets/img/logo.png" width="30" height="30" style="margin: 6px">
                            <div class="chat ml-2 p-3"> your issue will be solved within 24 hrs</div>
                        </div>
                <?php }
                } ?>

        </div>


        </form>
        <footer class="send1">
            <div class="container" style="margin-top: 85px;">
                <div class="send_container">
                    <div style="width: 90%;"> <input class="input_send" type="text" placeholder="Message" id='data'></div>

                    <div class="send_icon_div" id='send-btn'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                        </svg>
                    </div>
                </div>

        </footer>

        </div>

    </main>

    <?php
    require 'footer.php';
    ?>
    <script src="https://kit.fontawesome.com/cd2d9c3abd.js" crossorigin="anonymous"></script>
</body>
<script>
    $(document).ready(function() {
        // Function to handle sending message
        function sendMessage() {
            var res = <?php echo $sts1; ?>;
            if (res == 0) {
                var $value = $("#data").val();
                var $msg = '<div class="d-flex flex-row p-3"> <div class="bg-white1 mr-2 p-3"><span class="client-msg">' + $value + '</span></div><svg style="color: #0fb0cd;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"> <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" /> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" /> </svg> </div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function(result) {
                        var $replay = '<div class="d-flex flex-row p-3"> <img src="assets/img/logo.png" width="35" height="35" style="margin: 6px"><div class="chat ml-2 p-3">' + result + '</div> </div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);

                        if (result == "your issue will be solved within 24 hrs") {
                            // $('#send-btn').prop('disabled', true);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error here
                    }
                    });
                } else {
                    $('#send-btn').prop('disabled', true);
                }
            }

                // Trigger sendMessage function when Enter key is pressed
                $('#data').keydown(function(event) {
                    if (event.keyCode == 13) {
                        event.preventDefault(); // Prevent default behavior of Enter key
                        $('#send-btn').click(); // Trigger click event of send button
                    }
                });

                // Send message when send button is clicked
                $("#send-btn").on("click", sendMessage);
                // Scroll to bottom of chat area
                $(".form").scrollTop($(".form")[0].scrollHeight);

    });
</script>


</html>