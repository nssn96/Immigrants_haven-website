<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">
    <style>
body,p{
    border: 0;
    margin: 0%;
}
.card {
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
    transition: 0.3s;
    width: 21%;
    /* height: 19%; */
    /* margin: auto; */
    border: 0;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
h4{
    border:0
}
.card-container {
    height: 30%;
    margin: 41%;
    width: 157%;
    margin-top: 3%;
    margin-bottom: auto;
}
}
img{
    width: 100%;
}
</style>

<head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{URL::asset('css/visitorpagesstyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/tips.css')}}">
    <script src="{{URL::asset('js/tips.js')}}"></script>
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
                <button type="button" class="button" onclick="openPopup()" class="pointer" style="float: right;">Add Media</button>

                <h2 class="heading">Welcome to Media Page</h2>
                <p class="para">Here you can find images and videos related to many aspects</p>
                
    
            </div>
        </div>
        
        <div id="names">
           
        </div>
        <form action="uploadimages" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="fullscreen-container" id="fullscreen-container">
            <div class="tips-form">
                <div class="closebtn pointer" onclick="closePopup()">
                    x
                </div>
                <div>
                    <h4 class="heading">Upload Videos / Images</h4>
                </div>
                <div>
                    <select name="types" id="types">
                        <option value="restaurants">Restaurants</option>
                        <option value="schools">Schools</option>
                        <option value="hospitals">Hospitals</option>
                        <a href="../html/uploadimages.html">Upload Photos/Videos</a>
                        <a href="../html/chat.html">Chat</a>
                        <option value="placestovisit">Places to Visit</option>
                    </select>
                </div><br>

                <div class="upload">
                    <input type="text" name="desc" placeholder="Enter Description";>
                    <p>Click on the "Choose File" button to upload a file:</p>
                    <input type="file" id="fileToUpload" name="fileToUpload" >
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="button" onclick="submitPopup()"name="submit" value="Submit" class="pointer">
                </div>

            </div>
        </div>
    </div>


</form>



@csrf
       
        @foreach($dataall['fetch'] as $image)
    <div class="card-container"> 
         <div class="card">
        <img src="{{asset($image->image_path)}}" style='width:100%'>
        <div class="container">
          <h4>Posted By:{{$image->username}}</h4> 
          <p>{{$image->image_description}}</p> 
        </div>
      </div>
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