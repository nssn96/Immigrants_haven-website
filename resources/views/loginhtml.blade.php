<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="{{URL::asset('css/home.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">

        <script src="../script/loginvalidation.js"></script>


        <title>Login</title>

    </head>

    <body>
        
        <ul>
        <li class="act" id="float"><a href="services">Services</a></li>
        <li class="act" id="float"><a href="contactus">Contact Us</a></li>
        <li class="act" id="float"><a href="aboutus">About Us</a></li>
        <li class="act" id="float"><a href="http://sxn7873.uta.cloud/blog/">Blog</a></li>
        <li class="act" id="float"><a href="homepage">Home</a></li>
           
          </ul>      
        <div id="login-card">
            <div class="subpart left">
                <h3>Login</h3>
                <form class="login-form" action="check" method="POST">
                @csrf
                    <div>
                        <input type="email" id="username" name="email" placeholder="Username" autocomplete="off"  required/>
                    </div>
                    <div class="pt20">
                        <input type="password" id="password" name="password" placeholder="Password" required/>
                    </div>
                    <br>

                    <div class="pt20">
                        <input type="submit" id='submit' name='submit'  value="Sign In" />

                    </div>
                    
                </form>
                <div class="pt21">
                    <p>Don't have an account ? <a href="signuphtml" class="ctm-link">Sign Up Now</a></p>
                </div>
            </div>
            <div class="subpart right">
                <div class="immigrants-image">
                    
                </div>
            </div>

        </div>        

    
    </body>
</html>