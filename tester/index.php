<form id="insert_form" method="post">
     <input type="text" name="fname" class="user_data" placeholder="First Name" required><br><br>
     <input type="text" name="lname" class="user_data" placeholder="Last Name" required><br><br>
     <input type="date" name="dob" class="user_data" required> <br><br>

     <select name="city" class="user_data">
          <option value="Ahmedabad"> Ahmedabad </option>
          <option value="Mumbai"> Mumbai </option>
     </select> <br><br>

     <select name="state" class="user_data">
          <option value="Gujarat"> Gujarat </option>
          <option value="Maharashtra"> Maharashtra </option>
     </select> <br><br>

     <input type="submit" name="submit" value="Submit" class="user_data"><br><br>

</form>

<a href="search.php">Search</a>

<br><br>


<table id="display_table" border="1">
     <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>DOB</th>
          <th>City</th>
          <th>State</th>
     </tr>

     <tr>
          <?php include 'show.php'; ?>
     </tr>
</table>


<script>
     document.getElementById('insert_form').addEventListener('submit' , SubmitFormData);

     function SubmitFormData(e) 
     {
          e.preventDefault();
          
          let form_element =document.querySelectorAll('.user_data');
          let form_data = new FormData();

          form_element.forEach(i=>{
               form_data.append(i.name , i.value);
               console.log(`Name : ${i.name} , Value : ${i.value} `);
          });

          let xhr = new XMLHttpRequest();
          xhr.open('POST' , 'insert.php' , true);
          xhr.onload=function()
          {
               if (this.status == 200) 
               {
                    document.getElementById('insert_form').reset();
                    document.getElementById('display_table').innerHTML =`<tr>
                                                                           <th>ID</th>
                                                                           <th>First Name</th>
                                                                           <th>Last Name</th>
                                                                           <th>DOB</th>
                                                                           <th>City</th>
                                                                           <th>State</th>
                                                                      </tr>`+ this.responseText;     
               }
          }
          xhr.send(form_data);
          
     }
</script>