<?php
     include 'connection.php'; 
     session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Page</title>
</head>
<body>
     <?php  if (isset($_SESSION['logged']) == true && $_SESSION['logged']) { ?>

          <h1>Welcome <?php echo $_SESSION['username'] ?> </h1>
          <a href="logout.php"> Logout </a>
     <?php 
     }
     else
     {
      ?>
<div class="container">
     <form method="post" id="registration_form">
          <input type="text" name="username" id="username" placeholder="Username" class="registration_field"> <br><br>
          <input type="email" name="email" id="email" placeholder="E-mail" class="registration_field"> <br><br>
          <input type="password" name="password" id="password" placeholder="password" class="registration_field"> <br><br>
          <input type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" class="registration_field"> <br><br>
          <input type="submit" value="SignUp" name="register" class="registration_field"> 
          <a href="log_code.php"> Login </a>
     </form>
     </div>
<?php } ?>

   <script src="script.js"></script>

</body>
</html>