<!DOCTYPE html>
<html>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{URL::asset('css/tips.css')}}">
    <script src="{{URL::asset('js/tips.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/cardlayout.css')}}">

   
</head>

<body>

    <div class="sidenav" style="background-color: rgb(32,85,138);">
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
    <form action="searchhospital" method="POST">
    @csrf
    <div class="main">
        <div class="clearfix">
            <div class="main1">
                <h2 class="heading" style="color: rgb(32,85,138);">Welcome to Hospitals Page</h2>
                <p class="para">Here you can find details of many Hospitals</p>
                <div class="browse">
                    <input type="text" name="hospital" class="hospital" placeholder="Enter the Hospital Name">
                    <input type="submit" id="search" name="search" value="Search" class="button" class="pointer">
                </div>
                <!--<img src="../assets/images/Student.png" alt="Add Tip" style="float:center;width:30%;height:50%;margin-top:6%;margin-right: 8%;">-->
            </div>
        </div>
    </div>
</form>
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

<style>
  h6,h5,h3{
    display:inline
  }
  .tip{
    text-align:center
  }
  </style>

  
       <html>
         <body>
              
                
         @csrf
        
        @foreach($dataall['fetch'] as $hospital)      
        <div class="tips-container">
       <div class="username-coontainer">
       <img src="../assets/images/aboutus.jpg" style="width:50px;height:50px">
           <p style="float: right; margin-right: 66%;margin-top:6%;wrap:normal"><b>{{$hospital->hospital_name}}</b></p>
       </div>
       <div class="tip-name">
       <p>Address:{{$hospital->hospital_address}}</p>
                     </div>
       <div class="category-container">
           <p>City:{{$hospital->city}}</p>
       </div>
       <div class="desc-container">
                   <p>Country:{{$hospital->country}}</p>
       </div>
       <div class="desc-container">
                   <p>Contact:{{$hospital->contact_no}}</p>
       </div>
   </div>
   @endforeach

  

</body>

</html>