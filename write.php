<?php

$con = mysqli_connect ("localhost","root","","db_direction");  
if (!$con)  
  {  
  die ('Could not connect: ' . mysql_error());  
  }  

if(isset($_POST['button']))
{
  $button_value = $_POST['button'];
 // print_r($button_value);
  // Insert the data into the database
  $sql = "INSERT INTO buttons (direction) VALUES ('$button_value')";
  mysqli_query($con, $sql);
 header("refresh:1,url=index.html");
 
}
?>