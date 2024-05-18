<?php
require "left-menu.php";

require 'header.php';


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="generator" content="">



  <!-- manifest meta -->
  <meta name="apple-mobile-web-app-capable" content="yes">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- swiper css -->


  <!-- style css for this template -->
  <link href="assets/css/style.css" rel="stylesheet" id="style">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="body-scroll consumption_background" data-page="home">
  <div class="blob_div">
    <img class="blob_img_1" src="./assets/img/blob.png">
    <img class="blob_img_2" src="./assets/img/blob.png">
    <!-- <img class="blob_img_2" src="./assets/img/blob.png"> -->
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 full_calendar">
        <div class="col-sm-6 calendar_left">
          <p class="calendar_txt" style="margin-bottom: 0px;">Last Week</p>
          <div class="cal_div">
            <svg class="calendar_icon_left" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
            </svg>
          </div>

        </div>
        <div class="col-sm-6 calendar_right">
          <div class="cal_div">
            <svg class="calendar_icon_left" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
            </svg>
          </div>

          <p class="month_txt">Last Month</p>
        </div>
      </div>


    </div>


  </div>
  <div class="container total_container">
    <div class="total">
      <div class="container total_content_calendar">
        <p class="yesterday_consumption"> Last Month <br>Usage</p><span class="ltr_consumption"> 2,837 Ltr</span><span class="price">&#8377; 257 <span class="paid">Paid</span></span>
      </div>

    </div>
  </div>
  <div class="container" style="margin-top: 15px;">


    <div class="card chart_card">
      <canvas class="chart_line" id="myChart"></canvas>
    </div>


  </div>
  <div class="container" style="margin-top: 15px;">
    <div class="full_small">
      <div class="small_card">
        <div class="icon">
          <img class="img_small" src="./assets/img/bathtub.png">
        </div>
        <div>
          <p class="place">Rest Room</p>
        </div>
      </div>
      <div class="ltr_div">
        <p class="ltr_small">68 Ltr</p>
      </div>
    </div>

  </div>

  <div class="col-sm-12">
    <div class="row">
      <div class="col">
        <div class="container last_container" style="margin-top: 15px;">
          <div class="up_div">
            <div>
              <p class="up_last"> Last Month</p>
              <p class="">10,085 Ltr</p>
            </div>
            <div>
              <img class="up_img" src="./assets/img/up.png">
            </div>
          </div>


        </div>
      </div>
      <div class="col">
        <div class="container last_container" style="margin-top: 15px;">
          <div class="up_div">
            <div>
              <img class="up_img" src="./assets/img/down.png">
            </div>
            <div>
              <p class="up_last"> Current Month</p>
              <p class="up_ltr">10,085 Ltr</p>
            </div>

          </div>


        </div>
      </div>
    </div>
  </div>









  <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        datasets: [{
          label: '', // Empty label
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1,
          borderColor: '#7adcdf',
          pointBackgroundColor: '#6ce5e8',
          cubicInterpolationMode: 'monotone', // Set this option for smooth curve

        }]
      },
      options: {
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            enabled: false // Disable tooltips
          },
          title: {
            display: true,
            text: 'Water Usage in Litres',
            color: 'black',
            font: {
              size: 18, // Set font size to 18px
              weight: 'normal', // Set font weight to normal
              color: 'black' // Set font color to black
            }
          }
        },
        interaction: {
          mode: 'nearest', // Disable interaction mode
        },
        scales: {
          x: {
            grid: {
              color: 'rgba(0, 0, 0, 0)', // Set the color of x-axis grid lines to transparent
            },
            ticks: {
              color: 'black', // Set the color of x-axis ticks to black
              borderWidth: 0 // Set the width of x-axis ticks border to 0
            },
            display: true // Show the x-axis line
          },
          y: {
            grid: {
              color: 'rgba(0, 0, 0, 0)', // Set the color of y-axis grid lines to transparent
              borderWidth: 0 // Set the width of y-axis grid lines border to 0 to hide the border line
            },
            ticks: {
              color: 'black', // Set the color of y-axis ticks to black
            },
            display: true // Show the y-axis line
          }
        }
      },
      plugins: {
        legend: {
          labels: {
            boxWidth: 0 // Set the width of legend color boxes to 0 to hide them
          }
        }
      }
    });
  </script>
  
  <script src="https://kit.fontawesome.com/cd2d9c3abd.js" crossorigin="anonymous"></script>

</body>

</html>
<!-- Footer -->
<?php
require 'footer.php';
?>