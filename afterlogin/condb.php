<?php 
//connect database
$condb = mysqli_connect("localhost","root","","arherelee") or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");

?>