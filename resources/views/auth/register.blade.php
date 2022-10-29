<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/signup.css')}}">
    <!--<link rel="stylesheet" href="../styles/homepage.css">-->
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="{{URL::asset('scripts/email.js')}}"></script>


    <title>SignUp</title>
</head>
<body>
    <ul>
        <ul>
            <li class="act active" id="float"><a href="../html/services.html">Services</a></li>
            <li class="act" id="float"><a href="../html/contact.html">Contact Us</a></li>
            <li class="act" id="float"><a href="../html/aboutus.html">About Us</a></li>
            <li class="act" id="float"><a href="http://sxn7873.uta.cloud/blog/">Blog</a></li>
            <li class="act" id="float"><a href="../html/homepage.html">Home</a></li>
           
          </ul>
    </ul>

    <h2 style="text-align: center;">Registration Form</h2>
    <div id="signup-card">
        <form class="signup-form" name="form" action="submit" method="POST" onsubmit='return sendemail(this)'>
        @csrf
            <div>
                <input type="text" id="name" name='name' placeholder="Name" autocomplete="off"  required/><br><br>
                <input type="date" id="dob" placeholder="Date of Birth" name='dob'autocomplete="off"  required/><br><br>
                <select id="gender" placeholder="Gender" name='gender'>  
                    <option value="0">Gender</option>                  
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                    <option value="other">Other</option>
                </select><br><br>
                <select id="role" placeholder="Role" name='role'>  
                    <option value="Immigrant">Immigrant</option>                  
                    <option value="Visitor">Visitor</option>
                </select><br><br>
                <input type="email" id="email" placeholder="Email" name='email' autocomplete="off"  required/><br><br>
                <input type="password" id="password" placeholder="Password" name='password' autocomplete="off"  required/><br><br>
                <input type="password" id="confirmpassword" placeholder="Confirm Password" name='confirmpassword' autocomplete="off"  required/><br><br>
                <input type="tel" id="phone" name="phone" placeholder="Contact Number" name='phone' required><br><br>
                <input type="text" id="nationality" placeholder="Nationality" name='nationality' autocomplete="off"  required/><br><br>
                <input type="text" id="immigratedcountry" placeholder="Immigrated Country" name='immigratedcountry' autocomplete="off"  required/><br><br>
                <input type="text" id="categoryofleaving" placeholder="Category Of Leaving" name='categoryofleaving' autocomplete="off"  required/><br><br>
                <input type="textarea" id="address" placeholder="Flat No, Building Name, Area, City, pincode" name='address' autocomplete="off" required/><br> <br>
                <input type="submit" value="Submit" name="submit"/>

            </div>
</body>
</html>


            
            



           