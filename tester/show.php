<?php include 'connection.php'; ?>

<?php 

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
?>