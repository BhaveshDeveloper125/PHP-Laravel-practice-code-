<?php include 'connection.php'; ?>

<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) 
{
     $fname = $_POST['fname'];
     $from = $_POST['from'];
     $to = $_POST['to'];
     $state = $_POST['state'];

     $display = "SELECT * FROM `tester` WHERE 1=1";

     if (!empty($fname)) 
     {
          $display .= " AND `first name` LIKE '%$fname%'";
     }

     if (!empty($state)) 
     {
          $display .= " AND `state` = '$state'";
     }

     if (!empty($from) && !empty($to)) 
     {
          $display .= " AND `DOB` BETWEEN '$from' AND '$to'";
     }

     $display_res = mysqli_query($con , $display);

     if ($display_res && mysqli_num_rows($display_res)>0) 
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
     else
     {
          echo "<tr> No result Found </tr>";
     }
}

?>