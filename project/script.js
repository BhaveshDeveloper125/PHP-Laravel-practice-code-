// For Registration
document.getElementById('registration_form').addEventListener('submit',(e)=>{
     e.preventDefault();
     let form_element = document.querySelectorAll('.registration_field');
     let form_data = new FormData();

     form_element.forEach(i=>{
         form_data.append(i.name , i.value);
         console.log(i.value);
     });

     let xhr = new XMLHttpRequest();
     xhr.open('POST','register.php',true);
     xhr.onload=function () 
     {
          if (this.status == 200) 
          {
               console.log(`Status : ${this.status}`);
          }     
     }

     xhr.send(form_data);

     document.getElementById('registration_form').reset();
 })

 
