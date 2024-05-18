<?php
  // $dbHost = "172.28.64.3";
  // $dbUser = "gowatr_api_user";
  // $dbPass = "FdsG!54eED^";
  // $dbName = "gowatr_api";
  // $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
  // if (!$conn) {
  // die("Cannot connect to the database");
  // }

  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "";
  $dbName = "radiance";
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
  if (!$conn) {
  die("Cannot connect to the database");
  }


 ?>