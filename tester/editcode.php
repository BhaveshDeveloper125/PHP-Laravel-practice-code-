<?php include 'connection.php'; ?>

<?php 

     echo $id = $_GET['id'];

     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $dob = $_POST['dob'];
     $city = $_POST['city'];
     $state = $_POST['state'];

     $insert = "UPDATE `tester` SET `first name`='$fname',`last name`='$lname',`DOB`='$dob',`city`='$city',`state`='$state' WHERE `id`='$id'";
     $insert_res = mysqli_query($con , $insert);  

     if ($insert_res) 
     {
          header('Location:index.php');
     } 
     else 
     {
          echo "<script> alert('oops can not edit Data Entered...') </script>";

          echo "<a href='index.php'> Home Page </a>";
     }
?>