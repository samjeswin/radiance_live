

<?php
    require "left-menu.php";
    require 'conn.php';
    require 'header.php';
   // require 'note.php';
 
    $door =  $_SESSION["door_no"]; 
    $flat = $_SESSION["flat_name"];
/*************************************/

echo $query12 = "select area_code from r_area_code where door_no = '$door' and flat_name = '$flat' ";

$result12 = mysqli_query($conn, $query12);

// Check if the query was successful
if ($result12 && mysqli_num_rows($result12) > 0) {
    // Fetch all rows from the result set
    $rows = mysqli_fetch_all($result12, MYSQLI_ASSOC);

    // Extract the column values into separate variables
    $column1Values = array_column($rows, 'area_code');
    
    // Use the values as needed
    foreach ($column1Values as $value) {
          $value . "<br>";

        $query1 = "SELECT flowmeter_id from r_flowmeter_detail where area_code = '$value'";
        $result1 = mysqli_query($conn, $query1);
        while ($row34 = mysqli_fetch_assoc($result1)) {

            $value = $row34['flowmeter_id'];
            $column2Values[] = $value;
      
        }
    }
    if (!empty($column2Values)) {
        $value1 = $column2Values[0];
        $value2 = $column2Values[1];
        $value3 = $column2Values[2];
        
        if(empty($column2Values[3])){
            $value4  = '';
        }else{
        $value4 = $column2Values[3];
        }
       
    }

    
   

    // Free the result set
    mysqli_free_result($result12);
} else {
    // Handle the query error or no rows returned
    echo "Error: " . mysqli_error($conn);
}

?>
  
<!doctype html>    <!--     consumption-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    
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


    <!-- swiper css -->
    

    <!-- style css for this template -->
    <link href="assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll" data-page="home">

    <!-- loader section -->
      <div class="container-fluid loader-wrap">
          <div class="row h-100">
              <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                  <div class="loader-cube-wrap mx-auto">
                </div>
                <p>Let's Manage Water Smartly<br><strong>Please wait...    </strong></p>
                
                <div id="box">
                    <img src="assets/img/calender.gif" alt="" width="40px" >
                    </div>
                    </div> 
            </div>
        </div>
  

          
<?php   
// For DROPDOWN
$dropdown = "
<option value ='".$value1."' >Inlet 1</option>
<option value ='".$value2."' >Inlet 2</option>
<option value ='".$value3."' >Inlet 3</option>
<option ".(empty($value4) ? 'hidden' : '')." value='".$value4."'>Inlet 4</option>
<option value ='total' selected >Total</option>";

?>
    <!-- loader section ends -->

    <!-- Begin page -->

    <!-- main & header removed -->
    <main class="has-header has-footer">

    <!--current month-->
    <div class="form-floating mb-3 select-area">
    <form id="a" method="POST" action="kld.php" >
                        <select  class="form-select"  id="sel" name="sel" >
                            <option <?php if (['val'] == '') {
                                echo 'selected';
                            } ?> value=" "><?php

                            if(empty($vals)){
                              echo 'Inlet 1';
                            }else if($vals == $value1){
                              echo 'Inlet 1';
                            }else if($vals == $value2){
                              echo 'Inlet 2';
                            }else if($vals == $value3){
                              echo 'Inlet 3';
                            }else if($vals == $value4){
                              echo 'Inlet 4';
                            }else{
                              echo 'Select';
                            }
                            
                            ?></option>
                            <?php echo $dropdown; ?>
                        </select>
                    </form>
        <button type="button" class="btn btn-link text-success tooltip-btn valid-tooltip"
            data-bs-toggle="tooltip" data-bs-placement="left" >
            170px
        </button>
        
    </div> <br><br><br><br>
    
<p class="week"><i class="bi bi-calendar2-check-fill"> <i class="bi bi-send"></i></i> &nbsp; Total Consumption - <?php echo $door; ?></p> <br><br>


<?php 


$door_array = [];
$aic_codes = [];
$flowmeter_ids = [];
$date = [];
$tot = [];

// GETTING DOOR NUMBERS
$get_door_num = "SELECT DISTINCT door_no FROM r_area_code WHERE door_no='$door' ORDER BY id ASC";
$door_res_num = mysqli_query($conn, $get_door_num);

while ($fetch_doors = mysqli_fetch_assoc($door_res_num)) {
    $door_array[] = $fetch_doors["door_no"];

    $get_door = "SELECT area_code FROM r_area_code WHERE door_no='$door_array[0]'";
    $result = mysqli_query($conn, $get_door);

    while ($row = mysqli_fetch_assoc($result)) {
        $aic_codes[] = $row["area_code"];
    }
}

// FETCHING FLOWMETER IDs AND TOTALS
foreach ($aic_codes as $aic) {
    $get_fm = "SELECT flowmeter_id FROM r_flowmeter_detail WHERE area_code='$aic'";
    $result_fm = mysqli_query($conn, $get_fm);

    while ($fmrow = mysqli_fetch_assoc($result_fm)) {
        $flowmeter_ids[] = $fmrow["flowmeter_id"];
    $fms = $fmrow["flowmeter_id"];

    // foreach ($flowmeter_ids as $fms) {
        $get_tot = "SELECT date,day_tot FROM daytot_radiance WHERE fm_id='$fms'";
        $result_tot = mysqli_query($conn, $get_tot);

        while ($totrow = mysqli_fetch_assoc($result_tot)) {
            $date[] = $totrow["date"];
            $tot[] = (int)$totrow["day_tot"];
        }
   // }
    }
}

// COMBINE DAYTOT VALUES BASED ON SAME DATES
$combinedData = array();
for ($i = 0; $i < count($date); $i++) {
    $d = $date[$i];

    if (!isset($combinedData[$d])) {
        $combinedData[$d] = 0;
    }

    $combinedData[$d] += $tot[$i];
}


$combinedDate = array_keys($combinedData);
$combinedTot = array_values($combinedData);

// CREATED JSON DATA
$jsondata = [
    "door_no" => $door_array,
    "fm" => $flowmeter_ids,
    "date" => $combinedDate,
    "daytot" => $combinedTot
];



?>
<!--chart area-->
<div class="chartCard ">
    <div class="chartBox">
      <canvas id="myChart" height="250px" ></canvas>
    </div>
</div> 

<br>

  <!-- <div class=" download-btn-container"><button class="download" disabled> <i class="bi-download "></i> Download</button></div> -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</main>
  <script>
  

   
      $( document ).ready(function() {
        
      
      setInterval(function(){
        var currentdate = new Date();
        $('.timestamp').html("<span> <b>  "+ formatDate(currentdate) +" </b> </span>");
       },1000);
     
     
     });
  
    

     var jsonData = <?php echo json_encode($jsondata); ?>;
     var dates = jsonData.date;
        var daytot = jsonData.daytot;
  const labeled = dates;
  // setup 
  const data = {
   
  labels: labeled,
  datasets: [{
  label: 'Consumption : Water Usage in Litres',
  data: daytot,
  backgroundColor: ['#21385a','#ffd000'],
  borderRadius:10,
  borderWidth: 1,
  borderSkipped:'bottom',
  hoverBorderColor: 'black ',
  barThickness: 7,
  }
]};
  

  
   // config 
   const config = {
      type: 'bar',
      data,
      options: {
      scales: {
        
      x:{
        ticks:{
            color:'#042444',
        }
      },
      y: {
        ticks:{
          color:'grey',
		  callback: (val) => {
								return val + ' Liters';
								},
        },
      beginAtZero: true,

      grid:{
        borderColor:'#042444',
        borderWidth:0,
        display:false,
      } 
    },
      x:{
        grid:{
            lineWidth:5,
            display:false,
        }
      }
      }
      }
      };
  
  // render init block
  const myChart = new Chart(
  document.getElementById('myChart'),
  config
  );
  
  </script>
  <!--<h6 class="weeks"><a  class="weeks" href="consumption.php">1st Week</a> <br></h6>  -->


<script>
    function downloadCode(link, code) {
  link.href = 'data:text/html;charset=utf-8,' + code;
}

document.getElementById('link').addEventListener('click', function () {
  downloadCode(this, txt.value);
}, false);
  
  
  </script> 
  <!--Download link code end-->

  
  
   <!-- Footer -->
   <footer class="footer">
    <!-- <div class="Notes-container">  Project Data Started on 00<sup>st</sup> &nbsp;Month </div> -->

<div class="container  bottom-icon">
    <div class="row">
        <div class="col">  <a href="index.php"> <i class="fa fa-home b" aria-hidden="true " style="font-size:24px; width: 40px;"></i>  </a>    </div>
        <div class="col">  <a href="consumption.php"> <i class="fa fa-bar-chart h fa-beat" aria-hidden="true" style="font-size:24px; width: 40px;"></i> </a> <br> <div id="tile011"> <div id="mask1">Consumption </div></div> </div>
        <div class="col">  <a href="support.php"> <i class="fa fa-comments b" aria-hidden="true" style="font-size:24px; width: 40px;"></i></a> </div>
        <div class="col">  <a href="profile.php"> <i class="fa fa-user b" aria-hidden="true" style="font-size:24px; width: 40px;"></i></a> </div>
   </div>
  </div>  

</footer>
<!-- Footer ends-->

   

<script> 
  $(document).ready(function() {
        $(document).on("change", "#sel", function() {
            var val = $(this).val();
            console.log(val);
            $.ajax({
                type: 'post',
                url: 'consumption.php?action=data',
                datatype: 'json',
                data: {
                    "option": val
                },
                success: function(response) {

                    location.href = "consumption.php";
                }
            });
        });
    });
  </script>

   

    


    <!-- Required jquery and libraries -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- cookie js -->
    <script src="assets/js/jquery.cookie.js"></script>

    <!-- PWA app service registration and works -->
    <script src="assets/js/pwa-services.js"></script>

    <!-- swiper script -->
    <script src="assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js"></script>

    <!-- nouislider js -->
    <script src="assets/vendor/nouislider/nouislider.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/color-scheme.js"></script>

    <!-- page level custom script -->
    <script src="assets/js/app.js"></script>

</body>

</html>