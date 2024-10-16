<?php 

$con = mysqli_connect("localhost" , "root" , "" , "tester");
if ($con) 
{
     echo "<script> console.log('Conneaction Established Successfully...') </script>";
}
else 
{
     echo "<script> alert('oops something went wrong can not connect to the database...'); </script>";
}
