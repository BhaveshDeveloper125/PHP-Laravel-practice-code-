<?php include 'connection.php'; ?>

<?php 

     echo $id = $_GET['id'];

     $display = "DELETE FROM `tester` WHERE `id`=$id;";
     $display_res = mysqli_query($con , $display);

     if ($display_res) 
     {
          header('Location:index.php');
     } 
     else 
     {
          echo "<script> alert('oops can not delete Data Entered...') </script>";

          echo "<a href='index.php'> Home Page </a>";
     }

?>