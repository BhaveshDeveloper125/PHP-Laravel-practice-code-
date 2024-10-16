<?php include 'connection.php'; ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) 
{
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $dob = $_POST['dob'];
     $city = $_POST['city'];
     $state = $_POST['state'];

     $insert = "INSERT INTO `tester`(`first name`, `last name`, `DOB`, `city`, `state`) VALUES ('$fname','$lname','$dob','$city','$state')";
     $insert_res = mysqli_query($con , $insert);

     if ($insert_res) 
     {
          echo "<script> console.log('Data Entered Successfully...') </script>";

          
          $display = "SELECT * FROM `tester`";
          $display_res = mysqli_query($con , $display);
               
          if ($display_res && mysqli_num_rows($display_res)) 
          {
               while ($row = mysqli_fetch_assoc($display_res)) 
               {
                    echo "<tr> 
                              <td> {$row['id']} </td>
                              <td> {$row['first name']} </td>
                              <td> {$row['last name']} </td>
                              <td> {$row['DOB']} </td>
                              <td> {$row['city']} </td>
                              <td> {$row['state']} </td>
                              <td> <a href='edit.php?id={$row['id']}'> Edit <a> </td>
                              <td> <a href='delete.php?id={$row['id']}'> Delete <a> </td>
                          </tr>";
               }
          } 

          // header("location:index.php");
     } 
     else
     {
          echo "<script> alert('oops Data can not Entered...') </script>";
     }
}
?>