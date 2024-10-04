<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login form</title>
</head>
<body>
     <form id="login_form" method="post">
          <input type="text" name="username" placeholder="Username" class="login_element"> <br><br>
          <input type="password" name="password" placeholder="Password" class="login_element"> <br><br>
          <input type="submit" value="Login" name="login">
          <a href="index.php">Sign up</a>
     </form>             

     <script>
          document.getElementById('login_form').addEventListener('submit',(e)=>{
               e.preventDefault();
               let form_element =document.querySelectorAll('.login_element');
               let form_data = new FormData();

               form_element.forEach(i=>{
                    form_data.append(i.name , i.value);
               });

               let xhr = new XMLHttpRequest();
               xhr.open('POST' , 'login.php' , true);
               xhr.onload = function() 
               {
                    if (xhr.status === 200) 
                    {
                         if (xhr.responseText.includes('Success')) 
                         {
                              window.location.href = 'index.php';
                         } 
                         else 
                         {
                              alert(xhr.responseText);
                         }
                    }
               };
               xhr.send(form_data);

               document.getElementById('login_form').reset();
          })
     </script>
</body>
</html>