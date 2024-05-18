<?php
session_start();
require "../conn.php";
if(isset($_REQUEST['api'])){
$api = $_REQUEST['api'];
if ($api == 'fm') {
  $data = array();
  $door = $_SESSION["door_no"];
  $flat = $_SESSION["flat_name"];

  $query = "SELECT area_code FROM r_area_code WHERE door_no = ? AND flat_name = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ss", $door, $flat);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $i = 1;
  while ($row = mysqli_fetch_assoc($result)) {
      $ais = $row['area_code'];

      $fm_query = "SELECT flowmeter_id FROM r_flowmeter_detail WHERE area_code = ?";
      $fm_stmt = mysqli_prepare($conn, $fm_query);
      mysqli_stmt_bind_param($fm_stmt, "s", $ais);
      mysqli_stmt_execute($fm_stmt);
      $fm_result = mysqli_stmt_get_result($fm_stmt);

      $fmid = null; // Initialize $fmid in case there are no matching records
      while ($fm_row = mysqli_fetch_assoc($fm_result)) {
          $fmid = $fm_row['flowmeter_id'];
      }

      $flow = 0;
      $tot = 0;
      $day_tot = 0;
      $first_tot = 0;
      $last_tot = 0;

      // Fetching current month flow
      $flow_qry = "SELECT tot, flow FROM radiance_live WHERE FlowmeterID = ? AND DATE(time_received_data) = ?";
      $flow_stmt = mysqli_prepare($conn, $flow_qry);
      $currentDate = date('Y-m-d');
      mysqli_stmt_bind_param($flow_stmt, "ss", $fmid, $currentDate);
      mysqli_stmt_execute($flow_stmt);
      $flow_result = mysqli_stmt_get_result($flow_stmt);

      while ($flow_row = mysqli_fetch_assoc($flow_result)) {
          $flow = $flow_row['flow'];
          $tot = $flow_row['tot'];
      }

      // Fetching current month flow
      $daytot_qry = "SELECT * FROM daytot_radiance WHERE fm_id = ? ORDER BY id DESC LIMIT 1";
      $daytot_stmt = mysqli_prepare($conn, $daytot_qry);
      mysqli_stmt_bind_param($daytot_stmt, "s", $fmid);
      mysqli_stmt_execute($daytot_stmt);
      $daytot_result = mysqli_stmt_get_result($daytot_stmt);

      while ($daytot_row = mysqli_fetch_assoc($daytot_result)) {
          $last_tot = $daytot_row['last_tot'];
          $first_tot = $daytot_row['first_tot'];
          $day_tot = $daytot_row['day_tot'];
      }

      $data[] = array(
          'aic' . $i => $ais,
          'fmid' . $i => $fmid,
          'tot' . $i => $tot,
          'flow' . $i => $flow,
          'last_tot' . $i => $last_tot,
          'first_tot' . $i => $first_tot,
          'day_tot' . $i => $day_tot,
      );

      $i++;
  }

  echo json_encode($data);
}
else if($api == 'ystcon'){
$door =  $_SESSION["door_no"]; 
$flat = $_SESSION["flat_name"];
$query = "SELECT area_code from r_area_code where door_no ='$door' and  flat_name = '$flat' ";

$result = mysqli_query($conn, $query);
  $i = '1';
 while ($row = $result->fetch_assoc()) {
     $ais = $row['area_code'];
 
 
     $fm_query = "SELECT flowmeter_id from r_flowmeter_detail where r_area_code ='$ais'";
     $fm_result = mysqli_query($conn, $fm_query);
     while ($fm_row = mysqli_fetch_assoc($fm_result)) {
             $fmid = $fm_row['flowmeter_id'];
      
     }

     if(empty($fmid)){
      $fmid = null;
     }else{

      $fmid = $fmid;

     }
	 //echo $fmid;
	 
	 //FETCHING CURRENT MONTH FLOW
       $daytot_qons = "SELECT day_tot FROM `daytot_radiance` WHERE fm_id = '$fmid' and DATE(created_time) = DATE(NOW() - INTERVAL 1 DAY) order by id desc limit 1";
	   
	   //echo $daytot_qons;
       $daytot_consres = mysqli_query($conn, $daytot_qons);
	   if($daytot_consres){
       while ($daytot_consrow = $daytot_consres->fetch_assoc()) {

          
          $dayday_tot = $daytot_consrow['day_tot'];
       }
	   }else {
		   $dayday_tot = 0;
	   }
 

//echo $dayday_tot;

  // add this category and its subcategories to the data array
    $data1[] = array( 'ystcons'.$i.'' => $dayday_tot);
    $i++;

        
         





}
echo json_encode($data1);
}
}

// ?>