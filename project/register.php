<div style="display: none;"> <?php include 'connection.php' ?> </div>
<?php

session_start();

if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['register']) 
{
     $username=$_POST['username'];
     $email=$_POST['email'];
     if ($_POST['password'] == $_POST['confirm_password']) 
     {
          $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
          $checking="SELECT * FROM `logins` WHERE user='$username' or email='$email'";
          $check_result=mysqli_query($con,$checking);
          if (mysqli_num_rows($check_result)==1) 
          {
               echo "<script>
                         alert('Username or Email is already registered');
                    </script>";
          }
          else
          {
               $insert_query="INSERT INTO `logins`( `user`, `password`, `email`) VALUES ('$username','$password','$email')";
               $res_insert=mysqli_query($con,$insert_query);
               if ($res_insert) 
               {
                    header('Location:index.php');
               }
               else
               {
                    echo "OOps Something went wrong...";
               }
          }
     }
}