
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/tips.css')); ?>">
    <script src="<?php echo e(URL::asset('js/tips.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/cardlayout.css')); ?>">

</head>

<body>

    <div class="sidenavt">
    <?php
    $data=$dataall['data'];
    $name=$data->username;
    ?>
    <img src="../assets/images/person_1058425.png" style="margin-left:5%: ">
        
        <?php
       echo $name;
       ?>
        <a href="Immigranthtml">Profile</a>
        <a href="Immigranttipshtml">Tips</a>
        <a href="schoolshtml">Schools</a>
        <a href="hospitalshtml">Hospitals</a>
        <a href="uploadimageshtml">Upload Photos/Videos</a>
        <a href="contributionshtml">Contributions</a>
        <a href="chat">Chat</a>
        <button class="dropdown-btn">Places to Visit
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="museums">Museums</a>
            <a href="temples">Temples</a>
            <a href="restaurants">Restaurants</a>
            <a href="places">Places</a>
        </div>
        <a href="loginhtml">Logout</a>
    </div>
    <form  action="tipssearch" method="POST">
    <?php echo csrf_field(); ?>
    <div class="main">
        <div class="clearfix">
            <div class="main1">
                <h2 class="heading">Welcome to Tips Page</h2>
                <p class="para">Here you can find the tips regarding many aspects</p>
                <div class="browsetip">
                    <input type="text" name="tip" class="tip" placeholder="Enter the Tip Name">
                    <input type="submit" id="search" value="Search" name="search" location.href="searchtips" class="button" class="pointer" style="background-color: rgb(25,45,78);">
                    </form>
                    <div class="extrabtn">
                    <button type="button" class="button" onclick="openPopup()" class="pointer" style="float: right;background-color: rgb(25,45,78);">Add Tip</button>
                    </div>
               <!-- <img src="../assets/images/Add Tip.jpg" alt="Add Tip" style="float:center;width:62%;height:52%;">-->

            </div>
        </div>
</div>

        <form action="tipssubmit" method="POST">
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
                    <input type="submit" class="button" onclick="submitPopup()" name="submit" location.href="tipsubmit" value="Submit"
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
        <html>
         <body>
         <?php echo csrf_field(); ?>

        <?php $__currentLoopData = $dataall['fetch']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="tips-container">
        <div class="username-coontainer">
        
            <img src="../assets/images/aboutus.jpg">
            <p style="float: right; margin-right: 66%;margin-top:6%;wrap:normal"><b>PostedBy:<?php echo e($tip->username); ?></b></p>
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

</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/Immigranttipshtml.blade.php ENDPATH**/ ?>