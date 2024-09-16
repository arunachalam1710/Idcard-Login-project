<?php
$con=mysqli_connect("localhost","root","","register");
//check connection
if (mysqli_connect_error())
{
  echo " Failed to connect to MYSQL:".mysqli_connect_error();
}
?>
