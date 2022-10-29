<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/tips.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
    <script src="{{URL::asset('js/admin.js')}}"></script>
    <title>Document</title>
</head>

<body >
<div class="sidenav">
    <?php
    $data=$dataall['data'];
    $role=$data->user_role;
    $name=$data->username;
    ?>
    <img src="../assets/images/person_1058425.png" style="margin-left:5%">
        
        <?php
       echo $name;
        
        if($role == "Super Admin"){?>
        <a href="superadmindashboard">Dashboard</a>
          <a href="managecontinentshtml">Manage Continents</a>
          <a href="manageadminpercountry">Manage Admin per Country</a>
          <?php

        }else{?>
        <a href="adminpercountrydashboard">Dashboard</a>
            <?php
        }
        ?>
          
          
          <a href="managecountrieshtml">Manage Country</a>
          <a href="managetips">Manage Tips</a>
          <a href="manageschools">Manage Schools</a>
          <a href="managehospitals">Manage Hospitals</a>
          <a href="manageplacestovisit">Manage Places</a>
          <a href="managecontributions">Manage Contributions</a>
          <a href="managecategoriesofleaving">Manage Categories for Leaving </a>
          <a href="loginhtml">Logout</a>


    </div>
   <?php $fetch=$dataall['fetch'];?>
    <form method="GET" action="/editschool/<?php echo $fetch->school_id?>" method="POST">
    @csrf
  
    <input type="text" name="name" id="schoolname" value="<?php echo $fetch->school_name?>" placeholder="School Name" style="margin-left:40%;margin-top:3%">
    <input type="text" name="address" id="schooladdress" value="<?php echo $fetch->school_address?>" placeholder="School Address" style="margin-left:40%;margin-top:3%">
    <input type="text" name="city" id="city" value="<?php echo $fetch->city?>" placeholder="City" style="margin-left:40%;margin-top:3%">
    <input type="text" name="country" id="country" value="<?php echo $fetch->country?>" placeholder="Country" style="margin-left:40%;margin-top:3%">
    <input type="text" name="contact" id="contact" value="<?php echo $fetch->contact_no?>" placeholder="Contact no" style="margin-left:40%;margin-top:3%">
            </div>
        
            <input type="submit" name="update" value="update" class="button"></div>
</form>


</body>
</html>