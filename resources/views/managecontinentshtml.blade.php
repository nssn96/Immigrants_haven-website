<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/tips.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
    <script src="{{URL::asset('js/admin.js')}}"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <div class="heading1">
            <h3>Add or Delete or Edit Continents</h3>
            
    </div>
    <form action="searchcontinent" method="POST">
    @csrf
    <div class="main">

        <input type="text" name="continent" class="continent" placeholder="Enter the Continent Name">
        <input type="submit" id="search" value="Search" name="search" class="button" class="pointer">
        <div class="modify">
            <button type="button" value="Add" name="add"  class="button" onclick="openPopup()">Add</button>
        </div><br>
        
       
    </div>
</form>

    <br>
    <form action="addcontinent" method="POST">
    @csrf
    <div class="fullscreen-container" id="fullscreen-container">
        <div class="schoolform">
            <div class="closebtn pointer" onclick="closePopup()">
                X
            </div>
            <div>
                <input type="text" name="continentname" id="continentname" placeholder="Continent Name">
            </div><br>
            
            <div>
                <input type="submit" name="submit" class="button" onclick="submitPopup()">
                <input type="submit" name="update" value="update" class="button" onclick="submitPopup()" >
                
              
                        </div>
                         </div>
       </div>  
   
    </form> 
    <div>
            <table class="w3-table-all" style="width:70%;margin-left:20%">
            
                  <thead>
                    <tr class="w3-grey">
                      <th>Continent ID</th>
                      <th>Continent Name</th>
                      <th>Check</th>
                      <th>Update</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
                  @csrf
            
            @foreach($dataall['continents'] as $continent)
                  <tr>
                       
                          <td>{{$continent->continent_id}}</td>
                          <td>{{$continent->continent_name}}</td>
                          <form action="manage" method="GET">
                          @csrf
                          <td><input type="submit" name="delete" class="w3-btn w3-white w3-border w3-round-large" value="Delete" id="delete"></td>
                          <td><a href="managecontinent/{{$continent->continent_id}}">Update</a></td>
                          <td><label class="container">
                            <input type="checkbox" name="checkbox[]" type="checkbox" id="checkbox[]" value= {{$continent->continent_id}}>
                            <span class="checkmark"></span></label> 
                          </td>
                          </tr>
                          

                        
                        @endforeach


    
                     
  
                    </table>
                </div>
            </div>  
</body>
</html>