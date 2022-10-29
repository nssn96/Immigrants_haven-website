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
    <img src="../assets/images/person_1058425.png" style="margin-left:5%">
        <div class="user-info">
        </div>
          ?><a href="../php/superadmindashboard.php">Dashboard</a>
          <a href="../php/managecontinentshtml.php">Manage Continents</a>
          <a href="../php/manageadminpercountry.php">Manage Admin per Country</a>
          <a href="../php/adminpercountrydashboard.php">Dashboard</a>
        <a href="../php/managecountrieshtml.php">Manage Country</a>
        <a href="../php/managetipshtml.php">Manage Tips</a>
        <a href="../php/manageschoolshtml.php">Manage Schools</a>
        <a href="../php/managehospitalshtml.php">Manage Hospitals</a>
        <a href="../php/manageplacestovisithtml.php">Manage Places</a>
        <a href="../php/managecontributionshtml.php">Manage Contributions</a>
        <a href="../php/managecategoriesofleavinghtml.php">Manage Categories for Leaving </a>
        <a href="../php/homepage.php">Logout</a> 


    </div>
    <form method="GET" action="/edit/<?php echo $continents->continent_id?>" method="POST">   
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
    <input type="text" name="cid" id="id" value="<?php echo $continents->continent_id?>" style="margin-left:40%;margin-top:10%"></div>
    <input type="text" name="continentname" id="continentname" value="<?php echo $continents->continent_name?>" placeholder=""style="margin-left:40%;margin-top:10%">
            </div>
            <input type="submit" name="update" value="update" class="button"></div>
</form><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/continentupdate.blade.php ENDPATH**/ ?>