<?php

session_start();
$door = $_SESSION["door_no"];
$flat = $_SESSION["flat_name"];

require "../conn.php";




$query = "SELECT area_code FROM r_area_code WHERE door_no ='$door' AND flat_name = '$flat'";

$result = mysqli_query($conn, $query);

$data = array();
$i = 1;
while ($row = $result->fetch_assoc()) {
    $ais = $row['area_code'];

    $fm_query = "SELECT flowmeter_id FROM r_flowmeter_detail WHERE area_code ='$ais'";
    $fm_result = mysqli_query($conn, $fm_query);

    while ($fm_row = mysqli_fetch_assoc($fm_result)) {
        $fmid = $fm_row['flowmeter_id'];
    }

    // Initialize variables inside the loop to get the correct values for each iteration
    $tot = 0;
    $flow = 0;
    $last_tot = 0;
    $first_tot = 0;
    $day_tot = 0;
    $time = 0;
    $lrt = 0;
    $day_tot_lrt = 0;
    $time_DTOT = 0;
    if (empty($fmid)) {
        $fmid = null;
    }


	
	 // FETCHING flowmeter test time
        $time_qry = "SELECT time_received_data FROM `radiance_live`  where FlowmeterID = '$fmid' and  time_received_data > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 30 MINUTE) ORDER by id DESC LIMIT 1";
        $time_result = mysqli_query($conn, $time_qry);
        if($time_result){
        while ($time_row = $time_result->fetch_assoc()) {
            $time = $time_row['time_received_data'];
           
        }	
        }else {
            $time = 0;
            $lrt = 0;
           
        }

   $tm_rcvd_qry = "SELECT time_received_data,time_received_data FROM `radiance_live`  where FlowmeterID = '$fmid'  and DATE(time_received_data) =CURDATE() ORDER by id DESC LIMIT 1";
        $tm_rcvd_result = mysqli_query($conn, $tm_rcvd_qry);
        if($tm_rcvd_result){
        while ($tm_rcvd_row = $tm_rcvd_result->fetch_assoc()) {
            
            $lrt = $tm_rcvd_row['time_received_data'];
        }	
        }else {
            
            $lrt = 0;
           
        }
		


    // FETCHING CURRENT MONTH FLOW
    $flow_qry = "SELECT tot, flow FROM `radiance_live` WHERE FlowmeterID = '$fmid' and DATE(time_received_data) =CURDATE() ORDER BY id DESC LIMIT 1";
    $flow_result = mysqli_query($conn, $flow_qry);
	if($flow_result){
	while ($flow_row = $flow_result->fetch_assoc()) {
        $flow = $flow_row['flow'];
        $tot = $flow_row['tot'];
    }	
	}else {
		$flow = 0;
        $tot = 0;
	}



    $daytot_qry = "SELECT * FROM `daytot_radiance` WHERE fm_id = '$fmid'  and DATE(created_time) = CURDATE() ORDER BY id DESC LIMIT 1";
    $daytot_result = mysqli_query($conn, $daytot_qry);
	if($daytot_result){
    while ($daytot_row = $daytot_result->fetch_assoc()) {
        $last_tot = $daytot_row['last_tot'];
        $first_tot = empty($daytot_row['first_tot']) ? 0 : $daytot_row['first_tot'];
        $day_tot = empty($daytot_row['day_tot']) ? 0 : $daytot_row['day_tot'];
        $day_tot_lrt = empty($daytot_row['time_received']) ? 0 : $daytot_row['time_received'];
        $time_DTOT = empty($daytot_row['created_time']) ? 0 : $daytot_row['created_time'];
    }
	}else{
		 $last_tot = 0;
        $first_tot = 0;
        $day_tot = 0;
        $time_DTOT = 0;
        $day_tot_lrt = 0;
		
	}

    // add this category and its subcategories to the data array
    $data[] = array(
        'aic'.$i => $ais,
        'fmid'.$i => $fmid,
        'flow'.$i => $flow,
        'tot'.$i => $tot,
        'first_tot'.$i => $first_tot,
        'lrt'.$i => $lrt,
        'last_tot'.$i => $last_tot,
        'day_tot'.$i => $day_tot,
        'fm_time'.$i => $time,
        'daytot_time'.$i => $time_DTOT,
        'daytot_lrt'.$i => $day_tot_lrt,
    );

    $i++;
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);


?>
