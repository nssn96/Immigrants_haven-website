<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/tips.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/admin.css')); ?>">
    <script src="<?php echo e(URL::asset('js/admin.js')); ?>"></script>
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
         <?php $placestovisit=$dataall['placestovisit'];?>
    <form method="GET" action="/editplaces/<?php echo $placestovisit->place_id?>" method="POST">
    <?php echo csrf_field(); ?>   
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
    <input type="text" name="cid" id="id" value="<?php echo $placestovisit->place_id?>" style="margin-left:40%;margin-top:10%" readonly></div>
    <input type="text" name="placename" id="placename" value="<?php echo $placestovisit->place_name?>" placeholder=""style="margin-left:40%;margin-top:10%">
    <input type="text" name="placeaddress" id="placeaddress" value="<?php echo $placestovisit->place_address?>" placeholder=""style="margin-left:40%;margin-top:10%">
    <input type="text" name="city" id="city" value="<?php echo $placestovisit->city?>" placeholder=""style="margin-left:40%;margin-top:10%">
    <input type="text" name="country" id="country" value="<?php echo $placestovisit->country?>" placeholder=""style="margin-left:40%;margin-top:10%">
    <input type="text" name="contact" id="contact" value="<?php echo $placestovisit->contact_no?>" placeholder=""style="margin-left:40%;margin-top:10%">
    <input type="text" name="category" id="category" value="<?php echo $placestovisit->category?>" placeholder=""style="margin-left:40%;margin-top:10%">
    </div>
        <input type="submit" name="update" value="update" class="button"></div>
</form>
<?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/updateplacesform.blade.php ENDPATH**/ ?>