<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
      <link rel="stylesheet" href="{{URL::asset('css/signup.css')}}">
      <!--<link rel="stylesheet" href="../styles/homepage.css">-->
      <title>SignUp</title>
   </head>
   <body>
      <ul>
         <ul>
         <li class="act" id="float"><a href="services">Services</a></li>
        <li class="act" id="float"><a href="contactus">Contact Us</a></li>
        <li class="act" id="float"><a href="aboutus">About Us</a></li>
        <li class="act" id="float"><a href="http://sxn7873.uta.cloud/blog/">Blog</a></li>
        <li class="act" id="float"><a href="homepage">Home</a></li>
         </ul>
      </ul>
      <h2 style="text-align: center;">Registration Form</h2>
      <div id="signup-card">
      <form class="signup-form" name="form" action="submit" method="POST" >
     @csrf
      <div>
         <input type="text" id="name" name='name' placeholder="Name" autocomplete="off"  required/><br><br>
         <input type="date" id="dob" placeholder="Date of Birth" name='dob'autocomplete="off"  required/><br><br>
         <select id="gender" placeholder="Gender" name='gender'>
            <option value="0">Gender</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
            <option value="other">Other</option>
         </select>
         <br><br>
         <select id="role" placeholder="Role" name='role'>
            <option value="Immigrant">Immigrant</option>
            <option value="Visitor">Visitor</option>
         </select>
         <br><br>
         <input type="email" id="email" placeholder="Email" name='email' autocomplete="off"  required/><br><br>
         <input type="password" id="password" placeholder="Password" name='password' autocomplete="off" onfocusout="validatePassword()" required/><br><br>
         <input type="password" id="confirmpassword" placeholder="Confirm Password" name='confirmpassword' autocomplete="off" onfocusout="validatePassword()" required/><br><br>
         <input type="tel" id="phone" name="phone" placeholder="Contact Number" name='phone' required><br><br>
         <input type="text" id="nationality" placeholder="Nationality" name='nationality' autocomplete="off"  required/><br><br>
         <input type="text" id="immigratedcountry" placeholder="Immigrated Country" name='immigratedcountry' autocomplete="off"  required/><br><br>
         <input type="text" id="categoryofleaving" placeholder="Category Of Leaving" name='categoryofleaving' autocomplete="off"  required/><br><br>
         <input type="textarea" id="address" placeholder="Flat No, Building Name, Area, City, pincode" name='address' autocomplete="off" required/><br> <br>
         <input type="submit" value="Submit" name="submit"  />
      </div>
</form>
   </body>
</html>
<script type="text/javascript">
   var validationSuccess = true;
   
   function checkForm(form) {
       if(validationSuccess){
         //alert("invoked checkForm method");
         //sendEmailFunction(form);
         alert("validationSuccess ==> "+validationSuccess);
         return true;
       }
   }
   
   function validatePassword() {
   
     var email = document.getElementById("email");
     var password = document.getElementById("password");
     var confirmpassword = document.getElementById("confirmpassword");
     var regexFormat = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
   
     if(password.value === email.value) {
       //alert("Password must be different from Username!");
       password.setCustomValidity("Password must be different from Username!");
       validationSuccess = false;
     }else{
       password.setCustomValidity("");
       validationSuccess = true;
     }
   
     if(validationSuccess) {
       if(!password.value.match(regexFormat)) {
         //alert("Must contain at least one number, one uppercase, one lower and atleaset 6 charcters!");
         password.setCustomValidity("Must contain at least one number and one uppercase "+
                                   "and lowercase letter, and at least 6 or more characters");
         validationSuccess = false;
       }else {
         password.setCustomValidity("");
         validationSuccess = true;
       }
     }
   
     if(validationSuccess) {
       if(password.value != confirmpassword.value) {
         //alert("Password and confirm passwords should match!");
         confirmpassword.setCustomValidity("Passwords do not match!");
         validationSuccess = false;
       }else {
         confirmpassword.setCustomValidity("");
         validationSuccess = true;
       }
     }
   }
</script>
