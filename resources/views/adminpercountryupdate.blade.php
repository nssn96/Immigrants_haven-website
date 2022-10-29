

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
   <?php $admins=$dataall['admins'];?>
    <form method="GET" action="/editadminpercountry/<?php echo $admins->admin_id?>" method="POST">  
     @csrf  

     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
    <div><input type="text" name="adminname" id="adminname" value= "<?php echo $admins->admin_name?>" style="margin-left:40%;margin-top:10%"></div><br>
    <div><input type="text" name="admincountry" id="admincountry" value= "<?php echo $admins->admin_country?>" style="margin-left:40%;margin-top:2%"> </div><br>           
    <div><input type="text" name="status" id="status" value= "<?php echo $admins->status?>" style="margin-left:40%;margin-top:2%"> </div><br>    

          <div>  <input type="submit"  style="margin-left:52%"name="update" value="update" class="button"></div>
</form>



</body>
</html>