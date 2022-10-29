
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{URL::asset('css/tips.css')}}">
    <script src="{{URL::asset('js/tips.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/cardlayout.css')}}">

</head>

<body>

    <div class="sidenav">
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
            <form action="makepayment" method="POST">
                @csrf
                <h2 class="heading" style="margin-left: -6%;">Welcome to Contribution's Page</h2>
                <input type="text" name="money"  placeholder="Donate Money"style="float: right;width: 11%;  margin-top: -2%;">

                <div>
                <input type="submit" value="Money Contribution" class="button" style="margin-left: 88%;">
                <p class="para" style="margin-top:-9%">Here you can find the tips regarding Contribution's</p>

            </div>

                </form>
                <form method="POST" action="contributionsearch">
                 @csrf
                <div class="browsetip">
                    <input type="text" name="contribution" class="contribution" placeholder="Enter Contribution Name">
                    <input type="submit" id="search" value="Search" name="search" class="button" class="pointer" style="background-color: rgb(25,45,78);">
                    <div class="extrabtn">
                    <button type="button" class="button" onclick="openPopup()" class="pointer" style="float: right;background-color: rgb(25,45,78);">Add Contribution</button>
                   
                    </div>
                    </form>

               <!-- <img src="../assets/images/Add Tip.jpg" alt="Add Tip" style="float:center;width:62%;height:52%;">-->

            </div>
        </div>
</div>

        <form action="addcontributions" method="POST">
        @csrf
        <div class="fullscreen-container" id="fullscreen-container">
            <div class="tips-form">
                <div class="closebtn pointer" onclick="closePopup()">
                    x
                </div>
                <div>
                    <h4 class="heading">Add Contribution</h4>
                </div>
                <div>
                    <select name="types" id="types">
                        <option value="restaurants">Restaurants</option>
                        <option value="schools">Schools</option>
                        <option value="hospitals">Hospitals</option>
                        <option value="placestovisit">Places to Visit</option>
                    </select>
                </div><br>
                <div><input type="text" name="contributionname" id="tipname" placeholder="Type Contribution"></div>
                <br>
                <div>
                    <textarea rows="7" cols="50" style="resize: none; outline: none;" placeholder="Type the  description" name="desc"
                        required></textarea>
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="button" onclick="submitPopup()" name="submit" value="Submit"
                        class="pointer">
                </div>

            </div>
        </div>
</form>
</div>
<?php

?>
<style>
    h5{
        margin-left:20%
    }
  h6,h3{
    display:inline
  }
  </style>
 </style>
        <html>
         <body>
         @csrf
         @foreach($dataall['fetch'] as $contribution)
        
    <div class="tips-container">
        <div class="username-coontainer">
        
        <img src="../assets/images/aboutus.jpg">
            <p style="float: right; margin-right: 66%;margin-top:6%;wrap:normal"><b>PostedBy:{{$contribution->username}}</b></p>
        </div>
        <div class="category-container">
            <p>Category:{{$contribution->contribution_category}}</p>
        </div>
        <div class="tip-name">
        <p>About:{{$contribution->contribution_name}}</p>
                      </div>
        
        <div class="desc-container">
                    <p>Description:{{$contribution->contribution_description}}</p>
        </div>
    </div>
        
        @endforeach
   
      
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

</html>