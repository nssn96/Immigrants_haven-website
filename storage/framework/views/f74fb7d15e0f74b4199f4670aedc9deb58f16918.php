<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/tips.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/admin.css')); ?>">
    <script src="<?php echo e(URL::asset('js/admin.js')); ?>"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
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
        <div class="heading">
        <h3>Add or Delete or Edit Admins per Country</h3>
        
</div>
<form action="searchadminpercountry" method="POST">
<?php echo csrf_field(); ?>
<div class="main">

    <input type="text" name="admin" class="admin" placeholder="Enter the Admin per Country Name">
    <input type="submit" id="search" value="Search" name="search" class="button" class="pointer">
    <div class="modify">
        <button type="button" value="Add"  class="button" onclick="openPopup()">Add</button>
       
    </div><br>
</div><br>
</form>
<form action="addadminpercountry" method="POST">
<?php echo csrf_field(); ?>
    <div class="fullscreen-container" id="fullscreen-container">
        <div class="schoolform">
            <div class="closebtn pointer" onclick="closePopup()">
                X
            </div>
            <div>
                <input type="text" name="adminname" id="adminpercountry" placeholder="Enter the Admin Name">
            </div><br>
            <div>
            <input type="text" name="admincountry" id="admincountry" placeholder="Enter the Country Name">
            </div><br>
            
            <div>
                <input type="submit" name="submit" onclick="submitPopup()" class="button">
            </div>

            

        </div>
    </div>
</form>

    
<table class="w3-table-all" style="width:70%;margin-left:20%">
     <thead>
            <tr class="w3-grey">
            <th>Admin ID</th>
                      <th>Admin Name</th>
                      <th>Admin Country</th>
                      <th>Status</th>
                      <th>Check</th>
                      <th>Update</th>
                      <th>Remove</th>
            </tr>
          </thead>
          <?php echo csrf_field(); ?>
            
            <?php $__currentLoopData = $dataall['admins']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
       
              
              <tr >
                    <td> <?php echo e($admin->admin_id); ?></td>
                          <td><?php echo e($admin->admin_name); ?></td>
                          <td><?php echo e($admin->admin_country); ?></td>
                          <td><?php echo e($admin->status); ?></td>
                          <form method="GET" action="deleteadminpercountry">
                              <?php echo csrf_field(); ?>
                          <td><input type="submit" name="delete" class="w3-btn w3-white w3-border w3-round-large" value="Delete" id="delete"></td>
                          <td><a href="manageadminpercountry/<?php echo e($admin->admin_id); ?>">Update</a></td>
                          <td><label class="container">
                            <input type="checkbox" name="checkbox[]" type="checkbox" id="checkbox[]" value= <?php echo e($admin->admin_id); ?>>
                            <span class="checkmark"></span></label> 
                        
                        
                </form>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




  

  





</body>
</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/manageadminpercountry.blade.php ENDPATH**/ ?>