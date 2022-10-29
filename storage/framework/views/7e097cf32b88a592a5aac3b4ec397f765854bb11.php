<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/home.css')); ?>">
    <script src="../script/homepage.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body onload="setNav()">
  <div id="mydiv">
      <ul>
      <li class="act" id="float"><a href="services">Services</a></li>
        <li class="act" id="float"><a href="contactus">Contact Us</a></li>
        <li class="act" id="float"><a href="aboutus">About Us</a></li>
        <li class="act" id="float"><a href="http://sxn7873.uta.cloud/blog/">Blog</a></li>
        <li class="act active" id="float"><a href="homepage">Home</a></li>
       
      </ul>   
    </div>
    <div class="image">
        <div class="w3-animate-top"><h1 style="color:  rgb(7, 85, 138); margin-left:10%;font-family: auto;"><i><b>Welcome to Immigrants-Haven</b></i></h1></div>
        <div class="w3-animate-left"><input type="submit" style="margin-left: 25%;" onclick="location.href='loginhtml';"  value="Login/Signup" class="button button2"></div>
      </div>   
</body>
</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/homepage.blade.php ENDPATH**/ ?>