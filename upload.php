<?php
    require "left-menu.php";
    require 'conn.php';
    require 'header.php';
    // require 'footer.php';
    $user = $_SESSION["name"];
    $flat =$_SESSION["flat_name"];
    $door_no = $_SESSION["door_no"];
    $door_no_latest = $_SESSION["door_num_latest"];

/*************************************/
/*************************************/
?>



<!doctype html>    <!--   update profile-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>GoWatr Smart Water Solutions</title>
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.7/css/swiper.min.css">
    <script src='api/profile_fetch.js'></script>
    <!-- style css for this template -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="assets/css/style.css" rel="stylesheet" id="style">
</head>

<style>
.form-control-new {
    display: block;
    width: 100%;
    padding: 1.5px 7px;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #21385a;
    background-color: #ffffff;
    background-clip: padding-box;
    border: none;
    appearance: none;
    border-radius: 5px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    margin-top: 5px;
}
.form-control-new:focus {
    outline:none;
   
}
</style>



<body class="body-scroll " data-page="home">
<?php

if (isset($_POST['submit'])) {


    if (isset($_FILES['pdf_file']['name']))
    {
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];

    move_uploaded_file($file_tmp,"./upload/".$file_name);

    $insertquery = "update `r_owner_detail` set image_name = '$file_name' where door_no ='$door_no'";

    $iquery = mysqli_query($conn, $insertquery);

    ?>
    <script>
        Swal.fire('Profile Updated');
    </script>
    <?php
    }
}

if (isset($_POST['send'])) {
 
    $pass = $_POST['password'];

    $resetquery = "update `r_owner_detail` set password = '$pass' where door_no ='$door_no'";
    $reset = mysqli_query($conn, $resetquery);
                        
    ?>
    <script>
        Swal.fire('Passwword Updated');
    </script>
    <?php
}

if (isset($_POST['wifi-submit'])) {


    $wifi = $_POST['wifi'];

    $wifiquery = "update `r_owner_detail` set wifi_name = '$wifi' where door_no ='$door_no'";
    $wifi_reset = mysqli_query($conn, $wifiquery);
    
    $wifi_ins_query = "update `r_wifi_status` set wifi_name = '$wifi' where door_no ='$door_no_latest'";
    $wifi_ins_reset = mysqli_query($conn, $wifi_ins_query);

    ?>
    <script>
        Swal.fire('wifi name Updated');
    </script>
    <?php
}

if (isset($_POST['wifi-pass-submit'])) {


    $wifipass = $_POST['wifipass'];

    $wifipassquery = "update `r_owner_detail` set  wifi_pwd = '$wifipass' where door_no ='$door_no'";
    $wifipass_reset = mysqli_query($conn, $wifipassquery);
    
    $wifipass_ins_query = "update `r_wifi_status` set wifi_password = '$wifipass' where door_no ='$door_no_latest'";
    $wifipass_ins_reset = mysqli_query($conn, $wifipass_ins_query);

    ?>
    <script>
        Swal.fire('wifi password Updated');
    </script>
    <?php
    }
?>

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap mx-auto">
                   
                </div>
                <p>Let's Manage Water Smartly<br><strong>Please wait...</strong></p>
                <div id="box">
                      <img src="assets/img/profile.gif" alt="" width="40px" >
                    </div>
                    </div> 
            </div>
        </div>
    </div>
    <!-- loader section ends -->

   <!-- Begin page -->
    <main class="h-100 has-header has-footer ">
   <!-- main page content -->
       <div class="main-container container ">

    <!-- Page ends-->

 <div class="content">
    <div class="container ">
       
        <!-- end row -->
        <div class="row"> 
            
                <div class="text-center card-box ">
                    <div class="member-card  ">
                        <!-- <div class="thumb-lg member-thumb mx-auto">
                           
                            <img src="assets/img/p-active.png" class=" img-thumbnail" alt="profile-image">
                    </div> -->

                    <div class="profile-card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="thumb-lg member-thumb mx-auto">
                        <?php
                                $profile_qry = "select image_name from R_owner_detail where door_no = '$door_no'";
                                $prof_res = mysqli_query($conn,$profile_qry);
                                while($pp = mysqli_fetch_assoc($prof_res)) {
                                    $image = $pp['image_name'];
                                }

                            ?>
                           <img src="upload/<?php if($image != ''){echo $image; }else{echo 'p-active.png';} ?>" class=" img-thumbnail" alt="profile-image">
                        </div>
                    
                        <div class="mt-2">  Click on choose file to Upload </div>
                          
                            <input class="form-control mt-2" type="file" required name="pdf_file">
                       
                            
                            <div class="row  mt-2">
                                <div class="col upl-update-btn"> <button class="upload-btn" type="submit" name="submit">Update</button> </div>
                                <div class="col upl-cancel-btn">
                                 <a style="width:100%;" href="profile.php"><button class="cancel-btn">Cancel</button></a>
                                </div>
                            </div>
                            </form>
                     </div>


                     <div class="profile-card">
                     <form action="" method="POST" >
                    
                         <div class="">  
                           Update Login Password
                            <input class="form-control-new" type="text" required name="password">
                            </div>
                     
                            
                            <div class="row  mt-2">
                                <div class="col upl-update-btn"> <button class="upload-btn" type="submit" name="send">Update</button> </div>
                                <div class="col upl-cancel-btn">
                                  <a style="width:100%;" href="profile.php"><button class="cancel-btn">Cancel</button></a>
                                </div>
                            </div>
                     </form>
                     </div>
                     
                     <div class="profile-card">
                        <form action="" method="POST" >
                    
                         <div class="">  
                          Change Wifi Id
                            <input class="form-control-new" type="text" required name='wifi'>
                            </div>
                     
                            
                            <div class="row  mt-2">
                                <div class="col upl-update-btn"> <button class="upload-btn" type="submit" name="wifi-submit" >Update</button> </div>
                                <div class="col upl-cancel-btn">
                                    <a style="width:100%;" href="profile.php"><button class="cancel-btn"  >Cancel</button></a>
                                </div>
                            </div>
                        </form>
                     </div>

                     <div class="profile-card">
                     <form action="" method="POST" >
                    
                       <div class="">  
                        Change Wifi Password
                          <input class="form-control-new" type="text"  required name='wifipass' >
                          </div>
                   
                          
                          <div class="row  mt-2">
                              <div class="col upl-update-btn"> <button class="upload-btn" type="submit" name="wifi-pass-submit">Update</button> </div>
                              <div class="col upl-cancel-btn">
                                <a style="width:100%;" href="profile.php"><button class="cancel-btn">Cancel</button></a>
                              </div>
                          </div>
                     </form>
                   </div>
                    
                    




<!-- <div class=" col-sm-12 waterusage-card ">
        <div class="row">
            <div class=" waterusage-heading col-sm-12 d-flex justify-content-center align-items-center mb-2 "> WATER USAGE</div>
            <div class="col ltr-card-1"  > <span id='yesterday' > 0 </span>  <br><div class="ltr-heading" >PREVIOUS MONTH </div> </div>
            <div class="col ltr-card-2"  > <span id='fmtotal' >0 </span>  <br> <div class="ltr-heading" >TOTAL </div> </div>
            <div class="col ltr-card-3"  > <span id='today'>0 </span> <br> <div class="ltr-heading" >CURRENT MONTH </div> </div>
        </div>

     </div> -->
     <?php 
$usr_qry = "SELECT * FROM `r_owner_detail` where door_no = '$door_no' ";
$usr_res = mysqli_query($conn, $usr_qry);
while($usr_row = mysqli_fetch_assoc($usr_res)){
    $name = $usr_row['name'];
    $email = $usr_row['email'];
    $number = $usr_row['number'];
}

?>
    
    </div>
            
     
           
         </div>
        
    </div>
    

</main>
<script>
$(document).ready(function() {
        swm1();
    setInterval(function() {
        swm1();
    }, 15000);
  });



</script>

<script src="https://unpkg.com/ityped@0.0.10"></script>
    <script>
         window.ityped.init(document.querySelector('.ityped'),{
         strings: [' Thank you for using GoWatr Services '  ],
         loop: true
         })
   </script>

<!-- Footer -->
<footer class="footer">
<!-- <div class="Notes-container"> Project Data Started on 00<sup>st</sup> &nbsp;Month  </div> -->
     <div class="container  bottom-icon">
        <div class="row">
            <div class="col">  <a href="index.php"> <i class="fa fa-home b" aria-hidden="true " style="font-size:24px; width: 40px;"></i>  </a>    </div>
            <div class="col">  <a href="consumption.php"> <i class="fa fa-bar-chart b" aria-hidden="true" style="font-size:24px; width: 40px;"></i> </a>  </div>
            <div class="col">  <a href="support.php"> <i class="fa fa-comments b" aria-hidden="true" style="font-size:24px; width: 40px;"></i>  </a>  </div>
            <div class="col">  <a href="profile.php"> <i class="fa fa-user h fa-beat" aria-hidden="true" style="font-size:24px; width: 40px;"></i></a> <br> <div id="tile011"> <div id="mask1">Profile</div></div> </div>
       </div>
      </div>  
    
</footer>

<!-- Footer ends-->
    <!-- Required jquery and libraries -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- cookie js -->
    <script src="assets/js/jquery.cookie.js"></script>

    <!-- PWA app service registration and works -->
    <script src="assets/js/pwa-services.js"></script>


    <!-- Customized jquery file  -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/color-scheme.js"></script>

    <!-- page level custom script -->
    <script src="assets/js/app.js"></script>
    <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>