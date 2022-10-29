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
   <?php  $tips=$dataall['tips'];?>
    <form method="GET" action="/edittip/<?php echo $tips->tip_id?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" id="tipname" value="<?php echo $tips->tip_name?>" placeholder="Tip Category" style="margin-left:40%;margin-top:3%">
    <input type="text" name="category" id="category" value="<?php echo $tips->tip_category?>" placeholder="Tip Name" style="margin-left:40%;margin-top:3%">
    <input type="text" name="desc" id="desc" value="<?php echo $tips->tip_description?>" placeholder="Enter Tip Description" style="margin-left:40%;margin-top:3%">
           
            <input type="submit" name="update" value="update" class="button">
</form>


</body>
</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/tipupdate.blade.php ENDPATH**/ ?>