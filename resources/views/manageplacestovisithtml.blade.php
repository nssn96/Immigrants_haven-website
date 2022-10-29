<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/tips.css')}}">
    <script src="{{URL::asset('js/admin.js')}}"></script>
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
            <h3>Add or Delete or Edit Places</h3>
            
    </div>

    <form action="searchplace" method="GET">
    <div class="main">
    <input type="text" id="place" name="placename" class="place" placeholder="Enter the Place Name">
        <input type="submit" name ="search" id="search" value="Search" class="button" class="pointer" >
        <div class="modify">
            <button type="button" value="Add"  class="button" onclick="openPopup()">Add</button>
            
        </div><br>
    </div>
</form>
<br>
<form action="addplacestovisit" method="POST">
@csrf
    <div class="fullscreen-container" id="fullscreen-container">
        <div class="schoolform">
            <div class="closebtn pointer" onclick="closePopup()">
                X
            </div>
            <div>
                <input type="text" name="placename" id="placename" placeholder="Place Name">
            </div><br>
            <div>
                <textarea name="Address" placeholder="Address" rows="5" cols="8"></textarea>
            </div><br>
            <div>
                <input type="text" name="city" placeholder="City">
            </div><br>
            <div>
                <input type="text" name="country" placeholder="Country">
            </div><br>
            <div>
                <input type="text" name="contactno" placeholder="Contact Number">
            </div><br>
            <div>
                <select name="types" id="types">
                    <option value="restaurants">Restaurants</option>
                    <option value="temples">Templesr</option>
                    <option value="Museums">Museums</option>
                    <option value="places">Places</option>
                </select>
            </div><br>
            <div>
                <input type="submit" name="submit" class="button" onclick="submitPopup()">
            </div>

            

        </div>
    </div>
</form>
<table class="w3-table-all" style="width:70%;margin-left:20%">
     <thead>
            <tr class="w3-grey">
            <th>Place ID</th>
                    <th>Place Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Contact Number</th>
                    <th>categoty</th>
                    <th>Remove</th>
                    <th>check</th>
                    <th>Update</th>
            </tr>
          </thead>
          
          @foreach($dataall['placestovisit'] as $placestovisits)
                    <tr>
                        <td>{{$placestovisits->place_id}}</td>
                       <td>{{$placestovisits->place_name}}</td>
                        <td>{{$placestovisits->place_address}}</td>
                        <td>{{$placestovisits->city}}</td>
                        <td>{{$placestovisits->country}}</td>
                        <td>{{$placestovisits->contact_no}}</td>
                        <td>{{$placestovisits->category}}</td>
                
                        <form action="deleteplacestovisit" method="GET">
                        @csrf
                        <td><input type="submit" name="delete" class="w3-btn w3-white w3-border w3-round-large" value="Delete" id="delete"></td>
                          <td><a href="updateplacesform/{{$placestovisits->place_id}}">Update</a></td>
                          <td><label class="container">
                            <input type="checkbox" name="checkbox[]" type="checkbox" id="checkbox[]" value= {{$placestovisits->place_id}}>
                            <span class="checkmark"></span></label> 
                            </tr>  
                                    </form>
                       </tr>
                       </form>
                       @endforeach
                       

</body>
</html>