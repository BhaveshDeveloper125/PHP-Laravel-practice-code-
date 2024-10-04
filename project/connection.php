<?php


$con=mysqli_connect("localhost","root","","login");

if ($con) 
{
     echo "<script>
               console.log('Connection Established');
          </script>";
}
else
{
     echo "<script>
               console.log('OOps something went wrong...');
          </script>";
}