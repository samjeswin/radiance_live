function swm1() {

    //FETCHING DATA FROM API
    $.getJSON('api/api.php?api=fm', function(data) {
        receiveddata1 = data[0];
        receiveddata2 = data[1];
        receiveddata3 = data[2];
        receiveddata4 = data[3];
        receiveddata5 = data[4];
        receiveddata6 = data[5];


     if (receiveddata1 === undefined) {
            $('#div1').hide();
        } else {
            $('#div2').show();
            /////////////////////////TAP - 1 FETCHING DATA FROM API STARTS HERE///////////////////////////////////////////////////////////////////
            fm1data = receiveddata1.fmid1;
           
            // IF NO AREACODE  THIS WILL HAPPEN
          

                lrt1 = receiveddata1.lrt1;
                daytot_lrt1 = receiveddata1.daytot_lrt1;

                time = receiveddata1.fm_time1;
               
                if (time == undefined) {
                 
                    $('#wifi1').removeClass('wifi-connected');
                    $('#wifi1').addClass('wifi-disconnected');

                    if(lrt1 == undefined){
                        $('#connect1').html('Disconnected');
                    }else if(lrt1 == 0){
                        if (daytot_lrt1 == 0){
                            $('#connect1').html('Disconnected');
                        }else if(daytot_lrt1 != undefined){
                            $('#connect1').html('LTR:'+daytot_lrt1);
                        }else{
                            $('#connect1').html('Disconnected');
                        }
                    }else{
                        $('#connect1').html('LTR:'+lrt1);
                    }

                }else if (time == 0) {

                    $('#wifi1').removeClass('wifi-connected');
                    $('#wifi1').addClass('wifi-disconnected');


                    if(lrt1 == undefined){
                        $('#connect1').html('Disconnected');
                    }else if(lrt1 == 0){
                        if (daytot_lrt1 == 0){
                           
                            $('#connect1').html('Disconnected');
                        }else if(daytot_lrt1 != undefined){
                            $('#connect1').html('LTR:'+daytot_lrt1);
                        }else{
                            $('#connect1').html('Disconnected');
                        }
                    }else{
                        $('#connect1').html('LTR:'+lrt1);
                    }


                } else {
                   
                    $('#wifi1').removeClass('wifi-disconnected');
                    $('#wifi1').addClass('wifi-connected');

                 
                    

                }

                //PREVIOUS MONTH TOT 
                first_tot1 = receiveddata1.first_tot1;

                if (first_tot1 == null) {
                    first_tot1 = '0';
                } else {
                    first_tot1 = parseInt(first_tot1);
                }
				
                //CURRENT MONTH TOT 
                tot1 = receiveddata1.tot1;

                 if (tot1 == null) {
                    tot1 = '0';
                }else if (tot1 == undefined) {
                    tot1 = '0';    
                } else {
                    tot1 = parseInt(tot1);
                }
				
				
				
				
				
                if(tot1 > first_tot1){
                    
					tap1 = tot1 - first_tot1;
                }else{
                    tap1 = 0;
                }
				
                
                
                //INLET 1 VALUE SHOWS HERE
                if (tap1 == null) {
                    $('#ltr_consump1').html('0');
                } else {
                    $('#ltr_consump1').html(tap1);
                }

                //INLET 1 fLOW SPINS  HERE 
                flow1 = receiveddata1.flow1;

                if (flow1 == undefined) {
               
                    $('#flowstatus1').removeClass('bg-blue');
                    $('#flowstatus1').addClass('bg-grey');
                    $('#flowing1').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img1').attr('src','assets/img/tap-notflow.jpg');
                    
                } else if (flow1 > 0.01) {
    
                    $('#flowstatus1').removeClass('bg-grey');
                    $('#flowstatus1').addClass('bg-blue');
                    $('#flowing1').attr('src','assets/img/flowing.gif');
                    $('#flow-img1').attr('src','assets/img/tap-flow.png');
    
                } else {
    
                    $('#flowstatus1').removeClass('bg-blue');
                    $('#flowstatus1').addClass('bg-grey');
                    $('#flowing1').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img1').attr('src','assets/img/tap-notflow.jpg');
                }

            
        }
   


 
        
        if (receiveddata2 === undefined) {
                $('#div2').hide();
              
            } else {
        
            $('#div2').show();
            /////////////////////////TAP - 1 FETCHING DATA FROM API STARTS HERE///////////////////////////////////////////////////////////////////
            fm2data = receiveddata2.fmid2;
           
            // IF NO AREACODE  THIS WILL HAPPEN
            if (fm2data == undefined) {
             
   
            } else {
                lrt2 = receiveddata2.lrt2;
                daytot_lrt2 = receiveddata2.daytot_lrt2;

                time2 = receiveddata2.fm_time2;
               
                if (time2 == undefined) {
                 
                    $('#wifi2').removeClass('wifi-connected');
                    $('#wifi2').addClass('wifi-disconnected');
                    if(lrt2 == undefined){
                        $('#connect2').html('Disconnected');
                    }else if(lrt2 == 0){
                        if (daytot_lrt2 == 0){
                           
                            $('#connect2').html('Disconnected');
                        }else if(daytot_lrt2 != undefined){
                            $('#connect2').html('LTR: '+daytot_lrt2);
                        }else{
                            $('#connect2').html('Disconnected');
                        }
                    }else{
                        $('#connect2').html('LTR: '+lrt2);
                    }

                }else if (time2 == 0) {
                    $('#wifi2').removeClass('wifi-connected');
                    $('#wifi2').addClass('wifi-disconnected');
                    if(lrt2 == undefined){
                        $('#connect2').html('Disconnected');
                    }else if(lrt2 == 0){
                        if (daytot_lrt2 == 0){
                           
                            $('#connect2').html('Disconnected');
                        }else if(daytot_lrt2 != undefined){
                            $('#connect2').html('LTR: '+daytot_lrt2);
                        }else{
                            $('#connect2').html('Disconnected');
                        }
                    }else{
                        $('#connect2').html('LTR: '+lrt2);
                    }
                } else {
                   
                    $('#wifi2').removeClass('wifi-disconnected');
                    $('#wifi2').addClass('wifi-connected');
                   

                }

                //PREVIOUS MONTH TOT 
                first_tot2 = receiveddata2.first_tot2;

                if (first_tot2 == null) {
                    first_tot2 = '0';
                } else {
                    first_tot2 = parseInt(first_tot2);
                }

                //CURRENT MONTH TOT 
                tot2 = receiveddata2.tot2;

                 if (tot2 == null) {
                    tot2 = '0';
                }else if (tot2 == undefined) {
                    tot2 = '0';    
                } else {
                    tot1 = parseInt(tot2);
                }
                
                //CALCULATING   TOT = CURRENT MONTH TOT - PREVIOUS MONTH TOT :
                if(tot2 > first_tot2){
					tap2 = tot2 - first_tot2;
                }else{
                    tap2 = 0;
                }
               
                //INLET 2 VALUE SHOWS HERE
                if (tap2 == null) {
                    $('#ltr_consump2').html('0');
                } else {
                    $('#ltr_consump2').html(tap2);
                }

                //INLET 1 fLOW SPINS  HERE 
                flow2 = receiveddata2.flow2;

                if (flow2 == undefined) {
               
                    $('#flowstatus2').removeClass('bg-blue');
                    $('#flowstatus2').addClass('bg-grey');
                    $('#flowing2').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img2').attr('src','assets/img/tap-notflow.jpg');
                    
                } else if (flow2 > 0.01) {
    
                    $('#flowstatus2').removeClass('bg-grey');
                    $('#flowstatus2').addClass('bg-blue');
                    $('#flowing2').attr('src','assets/img/flowing.gif');
                    $('#flow-img2').attr('src','assets/img/tap-flow.png');
    
                } else {
    
                    $('#flowstatus2').removeClass('bg-blue');
                    $('#flowstatus2').addClass('bg-grey');
                    $('#flowing2').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img2').attr('src','assets/img/tap-notflow.jpg');
                }

            }
        }
    



      
    //FETCHING DATA FROM API


        if (receiveddata3 === undefined) {
            $('#div3').hide();
        } else {
            $('#div3').show();
            
            /////////////////////////TAP - 1 FETCHING DATA FROM API STARTS HERE///////////////////////////////////////////////////////////////////
            fm3data = receiveddata3.fmid3;
          
            // IF NO AREACODE  THIS WILL HAPPEN
            if (fm2data == undefined) {
                
            } else {

                lrt3 = receiveddata3.lrt3;
                daytot_lrt3 = receiveddata3.daytot_lrt3;
                time3 = receiveddata3.fm_time3;
            //    alert(daytot_lrt3);
                if (time3 == undefined) {
                 
                    $('#wifi3').removeClass('wifi-connected');
                    $('#wifi3').addClass('wifi-disconnected');
                    if(lrt3 == undefined){
                        $('#connect3').html('Disconnected');
                    }else if(lrt3 == 0){
                        if (daytot_lrt3 == 0){
                           
                            $('#connect3').html('Disconnected');
                        }else if(daytot_lrt3 != undefined){
                            $('#connect3').html('LTR: '+daytot_lrt3);
                        }else{
                            $('#connect3').html('Disconnected');
                        }
                    }else{
                        $('#connect3').html('LTR: '+lrt3);
                    }

                }else if (time3 == 0) {
                    $('#wifi3').removeClass('wifi-connected');
                    $('#wifi3').addClass('wifi-disconnected');
                    if(lrt3 == undefined){
                        $('#connect3').html('Disconnected');
                    }else if(lrt3 == 0){
                        if (daytot_lrt3 == 0){
                           
                            $('#connect3').html('Disconnected');
                        }else if(daytot_lrt3 != undefined){
                            $('#connect3').html('LTR: '+daytot_lrt3);
                        }else{
                            $('#connect3').html('Disconnected');
                        }
                    }else{
                        $('#connect3').html('LTR: '+lrt3);
                    }
                } else {
                   
                    $('#wifi3').removeClass('wifi-disconnected');
                    $('#wifi3').addClass('wifi-connected');
                    

                }
                //PREVIOUS MONTH TOT 
                first_tot3 = receiveddata3.first_tot3;

                if (first_tot3 == null) {
                    first_tot3 = '0';
                } else {
                    first_tot3 = parseInt(first_tot3);
                }

                //CURRENT MONTH TOT 
                tot3 = receiveddata3.tot3;

                 if (tot3 == null) {
                    tot3 = '0';
                }else if (tot3 == undefined) {
                    tot3 = '0';    
                } else {
                    tot3 = parseInt(tot3);
                }
                
                //CALCULATING   TOT = CURRENT MONTH TOT - PREVIOUS MONTH TOT :
                if(tot3 > first_tot3){
					tap3 = tot3 - first_tot3;
                }else{
                    tap3 = 0;
                }
               
                //INLET 2 VALUE SHOWS HERE
                if (tap3 == null) {
                    $('#ltr_consump3').html('0');
                } else {
                    $('#ltr_consump3').html(tap3);
                }

                //INLET 1 fLOW SPINS  HERE 
                flow3 = receiveddata3.flow3;

                if (flow3 == undefined) {
               
                    $('#flowstatus3').removeClass('bg-blue');
                    $('#flowstatus3').addClass('bg-grey');
                    $('#flowing3').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img3').attr('src','assets/img/tap-notflow.jpg');
                    
                } else if (flow3 > 0.01) {
    
                    $('#flowstatus3').removeClass('bg-grey');
                    $('#flowstatus3').addClass('bg-blue');
                    $('#flowing3').attr('src','assets/img/flowing.gif');
                    $('#flow-img3').attr('src','assets/img/tap-flow.png');
    
                } else {
    
                    $('#flowstatus3').removeClass('bg-blue');
                    $('#flowstatus3').addClass('bg-grey');
                    $('#flowing3').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img3').attr('src','assets/img/tap-notflow.jpg');
                }
				
				
				var today_tot = tap3 + tap2 + tap1;
                $('#ttconsumption').html(today_tot);
            }
        }




    
    
    //FETCHING DATA FROM API

        
        if (receiveddata4 === undefined) {
         
            $('#div4').hide();
         } else {
            $('#div4').show();
            /////////////////////////TAP - 1 FETCHING DATA FROM API STARTS HERE///////////////////////////////////////////////////////////////////
            fm4data = receiveddata4.fmid4;

            // IF NO AREACODE  THIS WILL HAPPEN
            if (fm4data == undefined) {
             $('#div4').hide();
            }else if (fm4data == "") {
               
                
            } else {

                lrt4 = receiveddata4.lrt4;
                daytot_lrt4 = receiveddata4.daytot_lrt4;
                time4 = receiveddata4.fm_time4;
               
                if (time4 == undefined) {
                 
                    $('#wifi4').removeClass('wifi-connected');
                    $('#wifi4').addClass('wifi-disconnected');
                    if(lrt4 == undefined){
                        $('#connect4').html('Disconnected');
                    }else if(lrt4 == 0){
                        if (daytot_lrt4 == 0){
                           
                            $('#connect4').html('Disconnected');
                        }else if(daytot_lrt4 != undefined){
                            $('#connect4').html('LTR: '+daytot_lrt4);
                        }else{
                            $('#connect4').html('Disconnected');
                        }
                    }else{
                        $('#connect4').html('LTR: '+lrt4);
                    }

                }else if (time4 == 0) {
                    $('#wifi4').removeClass('wifi-connected');
                    $('#wifi4').addClass('wifi-disconnected');
                    if(lrt4 == undefined){
                        $('#connect4').html('Disconnected');
                    }else if(lrt4 == 0){
                        if (daytot_lrt4 == 0){
                           
                            $('#connect4').html('Disconnected');
                        }else if(daytot_lrt4 != undefined){
                            $('#connect4').html('LTR: '+daytot_lrt4);
                        }else{
                            $('#connect4').html('Disconnected');
                        }
                    }else{
                        $('#connect4').html('LTR: '+lrt4);
                    }
                } else {
                   
                    $('#wifi4').removeClass('wifi-disconnected');
                    $('#wifi4').addClass('wifi-connected');
                  

                }
                //PREVIOUS MONTH TOT 
                first_tot4 = receiveddata4.first_tot4;

                if (first_tot4 == null) {
                    first_tot4 = '0';
                } else {
                    first_tot4 = parseInt(first_tot4);
                }

                //CURRENT MONTH TOT 
                tot4 = receiveddata4.tot4;

                 if (tot4 == null) {
                    tot4 = '0';
                }else if (tot4 == undefined) {
                    tot4 = '0';    
                } else {
                    tot4 = parseInt(tot4);
                }
                
                //CALCULATING   TOT = CURRENT MONTH TOT - PREVIOUS MONTH TOT :
                if(tot4 > first_tot4){
					tap4 = tot4 - first_tot4;
                }else{
                    tap4 = 0;
                }
               
                //INLET 2 VALUE SHOWS HERE
                if (tap4 == null) {
                    $('#ltr_consump4').html('0');
                } else {
                    $('#ltr_consump4').html(tap4);
                }

                //INLET 1 fLOW SPINS  HERE 
                flow4 = receiveddata4.flow4;
                
                if (flow4 == undefined) {
              
                    $('#flowstatus4').removeClass('bg-blue');
                    $('#flowstatus4').addClass('bg-grey');
                    $('#flowing4').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img4').attr('src','assets/img/tap-notflow.jpg');
                    
                } else if (flow4 > 0.01) {
                    
                    $('#flowstatus4').removeClass('bg-grey');
                    $('#flowstatus4').addClass('bg-blue');
                    $('#flowing4').attr('src','assets/img/flowing.gif');
                    $('#flow-img4').attr('src','assets/img/tap-flow.png');
    
                } else {
                    
                    $('#flowstatus4').removeClass('bg-blue');
                    $('#flowstatus4').addClass('bg-grey');
                    $('#flowing4').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img4').attr('src','assets/img/tap-notflow.jpg');
                }

                var today_tot = tap1 + tap2 + tap3 + tap4;
                $('#ttconsumption').html(today_tot || '0');
    
            

            }
        }
  



        if (receiveddata5 === undefined) {
            $('#div5').hide();
            
         } else {
            $('#div5').show();
            /////////////////////////TAP - 1 FETCHING DATA FROM API STARTS HERE///////////////////////////////////////////////////////////////////
            fm5data = receiveddata5.fmid5;

            // IF NO AREACODE  THIS WILL HAPPEN
            if (fm5data == undefined) {
             $('#div5').hide();
            }else if (fm5data == "") {
               
                
            } else {

                lrt5 = receiveddata5.lrt5;
                daytot_lrt5 = receiveddata5.daytot_lrt5;
                time5 = receiveddata5.fm_time5;
               
                if (time5 == undefined) {
                 
                    $('#wifi5').removeClass('wifi-connected');
                    $('#wifi5').addClass('wifi-disconnected');
                    if(lrt5 == undefined){
                        $('#connect5').html('Disconnected');
                    }else if(lrt5 == 0){
                        if (daytot_lrt5 == 0){
                           
                            $('#connect5').html('Disconnected');
                        }else if(daytot_lrt5 != undefined){
                            $('#connect5').html('LTR: '+daytot_lrt5);
                        }else{
                            $('#connect5').html('Disconnected');
                        }
                    }else{
                        $('#connect5').html('LTR: '+lrt5);
                    }

                }else if (time5 == 0) {
                    $('#wifi5').removeClass('wifi-connected');
                    $('#wifi5').addClass('wifi-disconnected');
                    if(lrt5 == undefined){
                        $('#connect5').html('Disconnected');
                    }else if(lrt5 == 0){
                        if (daytot_lrt5 == 0){
                           
                            $('#connect5').html('Disconnected');
                        }else if(daytot_lrt5 != undefined){
                            $('#connect5').html('LTR: '+daytot_lrt5);
                        }else{
                            $('#connect5').html('Disconnected');
                        }
                    }else{
                        $('#connect5').html('LTR: '+lrt5);
                    }
                } else {
                   
                    $('#wifi5').removeClass('wifi-disconnected');
                    $('#wifi5').addClass('wifi-connected');
                  

                }
                //PREVIOUS MONTH TOT 
                first_tot5 = receiveddata5.first_tot5;

                if (first_tot5 == null) {
                    first_tot5 = '0';
                } else {
                    first_tot5 = parseInt(first_tot5);
                }

                //CURRENT MONTH TOT 
                tot5 = receiveddata5.tot5;

                 if (tot5 == null) {
                    tot5 = '0';
                }else if (tot5 == undefined) {
                    tot5 = '0';    
                } else {
                    tot5 = parseInt(tot5);
                }
                
                //CALCULATING   TOT = CURRENT MONTH TOT - PREVIOUS MONTH TOT :
                if(tot5 > first_tot5){
					tap5 = tot5 - first_tot5;
                }else{
                    tap5 = 0;
                }
               
                //INLET 2 VALUE SHOWS HERE
                if (tap5 == null) {
                    $('#ltr_consump5').html('0');
                } else {
                    $('#ltr_consump5').html(tap5);
                }

                //INLET 1 fLOW SPINS  HERE 
                flow5 = receiveddata5.flow5;
                
                if (flow5 == undefined) {
              
                    $('#flowstatus5').removeClass('bg-blue');
                    $('#flowstatus5').addClass('bg-grey');
                    $('#flowing5').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img5').attr('src','assets/img/tap-notflow.jpg');
                    
                } else if (flow5 > 0.01) {
                    
                    $('#flowstatus5').removeClass('bg-grey');
                    $('#flowstatus5').addClass('bg-blue');
                    $('#flowing5').attr('src','assets/img/flowing.gif');
                    $('#flow-img5').attr('src','assets/img/tap-flow.png');
    
                } else {
                    
                    $('#flowstatus5').removeClass('bg-blue');
                    $('#flowstatus5').addClass('bg-grey');
                    $('#flowing5').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img5').attr('src','assets/img/tap-notflow.jpg');
                }

                var today_tot = tap1 + tap2 + tap3 + tap4 + tap5;
                $('#ttconsumption').html(today_tot || '0');
    
            

            }
        }


        if (receiveddata6 === undefined) {
            $('#div6').hide();
         } else {
            $('#div6').show();
            /////////////////////////TAP - 1 FETCHING DATA FROM API STARTS HERE///////////////////////////////////////////////////////////////////
            fm6data = receiveddata6.fmid6;

            // IF NO AREACODE  THIS WILL HAPPEN
            if (fm6data == undefined) {
             $('#div6').hide();
            }else if (fm6data == "") {
               
                
            } else {

                lrt6 = receiveddata6.lrt6;
                daytot_lrt6 = receiveddata6.daytot_lrt6;
                time6 = receiveddata6.fm_time6;
               
                if (time6 == undefined) {
                 
                    $('#wifi6').removeClass('wifi-connected');
                    $('#wifi6').addClass('wifi-disconnected');
                    if(lrt6 == undefined){
                        $('#connect6').html('Disconnected');
                    }else if(lrt6 == 0){
                        if (daytot_lrt6 == 0){
                           
                            $('#connect6').html('Disconnected');
                        }else if(daytot_lrt6 != undefined){
                            $('#connect6').html('LTR: '+daytot_lrt6);
                        }else{
                            $('#connect6').html('Disconnected');
                        }
                    }else{
                        $('#connect6').html('LTR: '+lrt6);
                    }

                }else if (time6 == 0) {
                    $('#wifi6').removeClass('wifi-connected');
                    $('#wifi6').addClass('wifi-disconnected');
                    if(lrt6 == undefined){
                        $('#connect6').html('Disconnected');
                    }else if(lrt6 == 0){
                        if (daytot_lrt6 == 0){
                           
                            $('#connect6').html('Disconnected');
                        }else if(daytot_lrt6 != undefined){
                            $('#connect6').html('LTR: '+daytot_lrt6);
                        }else{
                            $('#connect6').html('Disconnected');
                        }
                    }else{
                        $('#connect6').html('LTR: '+lrt6);
                    }
                } else {
                   
                    $('#wifi6').removeClass('wifi-disconnected');
                    $('#wifi6').addClass('wifi-connected');
                  

                }
                //PREVIOUS MONTH TOT 
                first_tot6 = receiveddata6.first_tot6;

                if (first_tot6 == null) {
                    first_tot6 = '0';
                } else {
                    first_tot6 = parseInt(first_tot6);
                }

                //CURRENT MONTH TOT 
                tot6 = receiveddata6.tot6;

                 if (tot6 == null) {
                    tot6 = '0';
                }else if (tot6 == undefined) {
                    tot6 = '0';    
                } else {
                    tot6 = parseInt(tot6);
                }
                
                //CALCULATING   TOT = CURRENT MONTH TOT - PREVIOUS MONTH TOT :
                if(tot6 > first_tot6){
					tap6 = tot6 - first_tot6;
                }else{
                    tap6 = 0;
                }
               
                //INLET 2 VALUE SHOWS HERE
                if (tap6 == null) {
                    $('#ltr_consump6').html('0');
                } else {
                    $('#ltr_consump6').html(tap6);
                }

                //INLET 1 fLOW SPINS  HERE 
                flow6 = receiveddata6.flow6;
                
                if (flow6 == undefined) {
              
                    $('#flowstatus6').removeClass('bg-blue');
                    $('#flowstatus6').addClass('bg-grey');
                    $('#flowing6').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img6').attr('src','assets/img/tap-notflow.jpg');
                    
                } else if (flow6 > 0.01) {
                    
                    $('#flowstatus6').removeClass('bg-grey');
                    $('#flowstatus6').addClass('bg-blue');
                    $('#flowing6').attr('src','assets/img/flowing.gif');
                    $('#flow-img6').attr('src','assets/img/tap-flow.png');
    
                } else {
                    
                    $('#flowstatus6').removeClass('bg-blue');
                    $('#flowstatus6').addClass('bg-grey');
                    $('#flowing6').removeAttr('src','assets/img/flowing.gif');
                    $('#flow-img6').attr('src','assets/img/tap-notflow.jpg');
                }

                var today_tot = tap1 + tap2 + tap3 + tap4 + tap5 + tap6;
                $('#ttconsumption').html(today_tot || '0');
    
            

            }
        }






    })

}

