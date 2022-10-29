<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/tips.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/cardlayout.css')); ?>">

    
    <script src="<?php echo e(URL::asset('js/tips.js')); ?>"></script>
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
    <form method="POST" action="searchtip">
    <?php echo csrf_field(); ?>
    <div class="main">
        <div class="clearfix">
            <div class="main1">
                <h2 class="heading">Welcome to Tips Page</h2>
                <p class="para">Here you can find the tips regarding many aspects</p>
                <div class="browsetip">
                    <input type="text" name="tip" class="tip" placeholder="Enter the Tip Name">
                    <input type="submit" id="search" value="Search" name="search" class="button" class="pointer" style="background-color: rgb(25,45,78);">
                    <div class="extrabtn">
                    <button type="button" class="button" onclick="openPopup()" class="pointer" style="float: right;background-color: rgb(25,45,78);">Add Tip</button>
                    </div>
               <!-- <img src="../assets/images/Add Tip.jpg" alt="Add Tip" style="float:center;width:62%;height:52%;">-->

            </div>
        </div>
</div>
</form>
        <form action="addtip" method="POST">
        <?php echo csrf_field(); ?>
        <div class="fullscreen-container" id="fullscreen-container">
            <div class="tips-form">
                <div class="closebtn pointer" onclick="closePopup()">
                    x
                </div>
                <div>
                    <h4 class="heading">Add Tips</h4>
                </div>
                <div>
                    <select name="types" id="types">
                        <option value="restaurants">Restaurants</option>
                        <option value="schools">Schools</option>
                        <option value="hospitals">Hospitals</option>
                        <option value="placestovisit">Places to Visit</option>
                    </select>
                </div><br>
                <div><input type="text" name="tipname" id="tipname" placeholder="Type Tip"></div>
                <br>
                <div>
                    <textarea rows="7" cols="50" style="resize: none; outline: none;" placeholder="Type the Tip description" name="desc"
                        required></textarea>
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="button"  style="margin-left: 3%;" onclick="submitPopup()" name="submit" value="Submit"
                        class="pointer">
                </div>

            </div>
        </div>
</form>
</div>

<style>
    h5{
        margin-left:20%
    }
  h6,h3{
    display:inline
  }
  </style>

   <?php echo csrf_field(); ?>
  
   <?php $__currentLoopData = $dataall['tips']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
    <div class="tips-container">
        <div class="username-coontainer">
            <img src="../assets/images/aboutus.jpg">
            <p style="float: right; margin-right: 66%;margin-top:6%;wrap:normal">PostedBy:<b><?php echo e($tip->username); ?></b></p>
        </div>
        <div class="tip-name">
        <p>About:<?php echo e($tip->tip_name); ?></p>
                      </div>
        <div class="category-container">
            <p>Category:<?php echo e($tip->tip_category); ?></p>
        </div>
        <div class="desc-container">
                    <p>Description:<?php echo e($tip->tip_description); ?></p>
        </div>
        
        <div class="tipsbtn">
            <div>
             <form action="deletetip" method="GET">
                <?php echo csrf_field(); ?>
            <td><input type="submit" name="delete"  value="Delete" id="delete"></td>
            <td><a href="managetips/<?php echo e($tip->tip_id); ?>">update</a></td>
            <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value= <?php echo e($tip->tip_id); ?>></td>
         </div>
    </div>
   
</form>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

</body>

</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/managetips.blade.php ENDPATH**/ ?>