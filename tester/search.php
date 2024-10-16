<?php include 'connection.php'; ?>

<form id="search_form" action="searchcode.php" method="post">
     First Name : <input type="text" name="fname" class="user_data" placeholder="First Name" > <br><br>
     DOB : from<input type="date" name="from" class="user_data"> to <input type="date" name="to" class="user_data"> <br><br>
     <select name="state" class="user_data">
          <option value=""></option>
          <option value="Gujarat"> Gujarat </option>
          <option value="Maharashtra"> Maharashtra </option>
     </select> <br><br>

     <input type="submit" name="submit" value="Submit" class="user_data"><br><br>

     <table border="1" id="search_tbl">
     <tr>
          <?php include 'searchcode.php'; ?>
     </tr>
     </table>


     <script>
          document.getElementById('search_form').addEventListener('submit',SearchResults);

          function SearchResults(e) 
          {
               e.preventDefault();

               let form_element = document.querySelectorAll('.user_data');
               let form_data = new FormData();

               form_element.forEach(i=>{
                    form_data.append(i.name , i.value);
               })

               let xhr = new XMLHttpRequest();
               xhr.open('POST' , 'searchcode.php' , true);
               xhr.onload=function()
               {
                    if (this.status == 200) 
                    {
                         document.getElementById('search_tbl').innerHTML = `<tr>
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

</form>