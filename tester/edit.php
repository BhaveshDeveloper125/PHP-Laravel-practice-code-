<?php include 'connection.php'; ?>

<?php 

     $id = $_GET['id'];

     $display = "SELECT * FROM `tester` WHERE `id` = $id";
     $display_res = mysqli_query($con , $display);
     // 
     if ($display_res && mysqli_num_rows($display_res)) 
     {
          while ($row = mysqli_fetch_assoc($display_res)) 
          {
               // echo "<tr> 
                         // <td> {$row['id']} </td>
                         // <td> {$row['first name']} </td>
                         // <td> {$row['last name']} </td>
                         // <td> {$row['DOB']} </td>
                         // <td> {$row['city']} </td>
                         // <td> {$row['state']} </td>
                    //  </tr>";
?>

<form action="editcode.php?id=<?php echo $row['id']; ?>" method="post">
<input type="text" name="fname" class="user_data" placeholder="First Name"  value="<?php echo $row['first name'] ?>" required><br><br>
     <input type="text" name="lname" class="user_data" placeholder="Last Name"  value="<?php echo $row['last name'] ?>" required><br><br>
     <input type="date" name="dob" class="user_data"  value="<?php echo $row['DOB'] ?>" required> <br><br>

     <select name="state" class="user_data" >
     <option value="Gujarat" <?php echo ($row['state'] == 'Gujarat') ? 'selected' : '' ; ?>> Gujarat </option>
     <option value="Maharashtra" <?php echo ($row['state'] == 'Maharashtra') ? 'selected' : '' ; ?>> Maharashtra </option>

     </select> <br><br>

     <select name="city" class="user_data" >
     <option value="Ahmedabad" <?php echo ($row['city'] == 'Ahmedabad') ? 'selected' : ''; ?>> Ahmedabad </option>
     <option value="Mumbai" <?php echo ($row['city'] == 'Mumbai') ? 'selected' : ''; ?>> Mumbai </option>
     </select> <br><br>

     <input type="submit" name="submit" value="Submit" class="user_data"><br><br>
</form>

<?php
     }
} 

?>