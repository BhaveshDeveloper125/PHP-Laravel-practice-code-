<?php

include 'connection.php';

session_start();


if ($_SERVER['REQUEST_METHOD']=='POST') 
{
     $username=$_POST['username'];
     $password=$_POST['password'];

     $check="SELECT * FROM `logins` WHERE user='$username'";
     $res_check=mysqli_query($con,$check);

     if ($res_check) 
     {
          if (mysqli_num_rows($res_check)==1) 
          {
               $fetching=mysqli_fetch_assoc($res_check);

               if (password_verify($password, $fetching['password'])) 
               {
                    $_SESSION['username']=$fetching['user'];
                    $_SESSION['logged']=true;
                    echo "Success";
                    // header('location:index.php');
               }
               else
               {
                    echo "<h1> Wrong Password </h1>";
               }
          }
          else
          {
               echo "<h1> User does not exists </h1>";
          }
     }
     else
     {
          echo "<h1> Query does not executed </h1>";
     }
}