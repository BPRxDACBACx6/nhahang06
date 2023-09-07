<?php
$con = mysqli_connect("localhost","root","","reservation");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Không thể kết nối với MySQL: " . mysqli_connect_error();
  }
?>