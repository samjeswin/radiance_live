function swm1() {
  let tot1 = 0, tot2 = 0, tot3 = 0, tot4 = 0;
  let tap1 = 0, tap2 = 0, tap3 = 0, tap4 = 0;
  let tot_total1 = 0, tot_total2 = 0, tot_total3 = 0, tot_total4 = 0;
  let last_tot1 = 0, last_tot2 = 0, last_tot3 = 0, last_tot4 = 0;
  let first_tot1 = 0, first_tot2 = 0, first_tot3 = 0, first_tot4 = 0;

  $.getJSON('api/totalapi.php?api=fm', function(data1) {
    const receiveddata1 = data1[0];
    const receiveddata2 = data1[1];
    const receiveddata3 = data1[2];
    const receiveddata4 = data1[3];

    if (receiveddata1) {
      fm1data = receiveddata1.fmid1;
      first_tot1 = receiveddata1.first_tot1;
      first_tot1 = parseInt(first_tot1);
      last_tot1 = receiveddata1.last_tot1;
      tot1 = receiveddata1.tot1;
      tot1 = parseInt(tot1);
      tot_total1 = first_tot1;


      if(tot1 > first_tot1){
        tap1 = tot1 - first_tot1;
      }else{
       
        tap1 = 0;
      }
    }else{
      fm1data = 0;
      first_tot1 = 0;
      last_tot1 = 0;
      tot1 = 0;
      tot_total1 = 0;
      tap1 = 0;

    }


    if (receiveddata2) {
      fm2data = receiveddata2.fmid2;
      first_tot2 = receiveddata2.first_tot2;
      first_tot2 = parseInt(first_tot2);
      last_tot2 = receiveddata2.last_tot2;
      tot2 = receiveddata2.tot2;
      tot2 = parseInt(tot2);
      tot_total2 = first_tot2;
      if(tot2 > first_tot2){
        tap2 = tot2 - first_tot2;
      }else{
        tap2 = 0;
      }
     
    }else{
      fm2data = 0;
      first_tot2 = 0;
      last_tot2 = 0;
      tot2 = 0;
      tot_total2 = 0;
      tap2 = 0;

    }

    if (receiveddata3) {
      fm3data = receiveddata3.fmid3;
      first_tot3 = receiveddata3.first_tot3;
      first_tot3 = parseInt(first_tot3);
      last_tot3 = receiveddata3.last_tot3;
      tot3 = receiveddata3.tot3;
      tot3 = parseInt(tot3);
      tot_total3 = first_tot3;

      if(tot3 > first_tot3){
        tap3 = tot3 - first_tot3;
      }else{
        tap3 = 0;
      }
     
    }else{
      fm3data = 0;
      first_tot3 = 0;
      last_tot3 = 0;
      tot3 = 0;
      tot_total3 = 0;
      tap3 = 0;

   
    }

    if (receiveddata4) {
      fm4data = receiveddata4.fmid4;
      first_tot4 = receiveddata4.first_tot4;
      first_tot4 = parseInt(first_tot4);
      last_tot4 = receiveddata4.last_tot4;
      tot4 = receiveddata4.tot4;
      tot_total4 = first_tot4;


      if(tot4 > first_tot4){
        tap4 = tot4 - first_tot4;
      }else{
        tap4 = 0;
      }

    }else{
      fm4data = 0;
      first_tot4 = 0;
      last_tot4 = 0;
      tot4 = 0;
      tot_total4 = 0;
      tap4 = 0;

    }




    const total_tot = +tot_total1 + +tot_total2 + +tot_total3 + +tot_total4;
    $('#fmtotal').html(total_tot || '0');
    
    const today_tot = +tap1 + +tap2 + +tap3 + +tap4;
  
    $('#today').html(today_tot || '0');

  });



  $.getJSON('api/totalapi.php?api=ystcon', function(datay) {
    
    const yesterdaydata1 = datay[0];
    const yesterdaydata2 = datay[1];
    const yesterdaydata3 = datay[2];
    const yesterdaydata4 = datay[3];
    

    if (yesterdaydata1) {
      ydaydata1 = yesterdaydata1.ystcons1;
    }else{
      ydaydata1 = 0;
    }
    
    if (yesterdaydata2) {
      ydaydata2 = yesterdaydata2.ystcons2;
    }else{
      ydaydata2 = 0;
    }
    if (yesterdaydata3) {
      ydaydata3 = yesterdaydata3.ystcons3;
    }else{
      ydaydata3 = 0;
    }
    if (yesterdaydata4) {
      ydaydata4 = yesterdaydata4.ystcons4;
    }else{
      ydaydata4 = 0;
    }



    yesterday_tot = +ydaydata1 + +ydaydata2 + +ydaydata3 + +ydaydata4 ;
  
    if(yesterday_tot == undefined){
        $('#yesterday').html('0')
    }else{
        $('#yesterday').html(yesterday_tot)
    }

  });
  // Similar code for data2, data3, and data4 fetching...
}