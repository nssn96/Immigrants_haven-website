<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/tips.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/admin.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/cardlayout.css')); ?>">
    

</head>

<body style="background-color: rgb(226,237,255);">


    <div class="sidenavp">

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
    <div class="main">
        <div class="clearfix">
            <div class="main1">
                <h2 class="heading">Welcome <?php echo e(session('user')); ?>

                
                </h2>
                
                <img src="../assets/images/Immigrantvector.jpeg" alt="Add Tip" style="float:center;width:65%;height:50%;margin-top:4%;margin-right: 0%;">
            </div>
        </div>
        
    </div>
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

</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/Immigranthtml.blade.php ENDPATH**/ ?>