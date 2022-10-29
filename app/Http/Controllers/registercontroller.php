<?php

namespace App\Http\Controllers;
use session;
use DB;
use Illuminate\Http\Request;
use App\Models\register;
use App\Models\addtip;
use App\Models\contributions;
use App\Models\schools;
use App\Models\hospitals;
use App\Models\media;
use App\Models\places;
use App\Models\continents;
use App\Models\countries;
use App\Models\adminpercountry;
use App\Models\category;
use Illuminate\Support\Facades\Mail;
class registercontroller extends Controller
{
public function registerdetails(Request $req)
{
$user=new register;
$user->username = $req->input('name');
$user->dateofbirth = $req->input('dob');
$user ->gender = $req->input('gender');
$user -> user_role= $req->input('role');
$user ->email = $req->input('email');
$user ->user_password = $req->input('password');
$user->phone = $req->input('phone');
$user->nationality = $req->input('nationality');
$user->immigratedcountry = $req->input('immigratedcountry');
$user->categoryofleaving = $req->input('categoryofleaving');
$user->user_address = $req->input('address');
$emailtyped=$req->input('email');
            $userAlreadyExist=register::where('email',"=",$emailtyped)->get();
            $count=$userAlreadyExist->count();
            if($count>1)
            {
              return redirect('signuphtml');
            }
            else{
                    $dataall=[
                            'User_email'=>$emailtyped,
                            'User_password'=>$req->input('password'),

                    ];
                    $user->save();
                    $dataall=session()->put('dataall',$dataall);
                    return redirect('email');
            }




}

public function validaterequest(Request $req)
{
$useremail= $req->input('email');
$userpassword = $req->input('password');

$user = register::where("email",'=',$useremail)->first();
if($user)
{
if($userpassword==$user->user_password && $user->user_role=='Immigrant')
{
//session::put('values',$user->email);

$req->session()->put('loggeduser',$user);

$value = $req->session()->get('loggeduser');
//$user = register::where("email",'=',$value)->first();
$usernamee=$value->username;
$req->session()->put('user',$usernamee);
$userrole=$value->user_role;
$req->session()->put('role',$userrole);
return redirect('Immigranthtml');
}

else if($userpassword==$user->user_password && $user->user_role=='Visitor')
{
$req->session()->put('loggeduser',$user);

$value = $req->session()->get('loggeduser');
//$user = register::where("email",'=',$value)->first();
$usernamee=$value->username;
$req->session()->put('user',$usernamee);
return redirect('Immigranthtml');
} 
else if($userpassword==$user->user_password && $user->user_role=='Super Admin')
{
$req->session()->put('loggeduser',$user);

$value = $req->session()->get('loggeduser');
//$user = register::where("email",'=',$value)->first();
$usernamee=$value->username;
$req->session()->put('user',$usernamee);
return redirect('managecontinentshtml');
} 
else if($userpassword==$user->user_password && $user->user_role=='AdminperCountry')
{
$req->session()->put('loggeduser',$user);

$value = $req->session()->get('loggeduser');
//$user = register::where("email",'=',$value)->first();
$usernamee=$value->username;
$req->session()->put('user',$usernamee);
return redirect('managecountrieshtml');
} 

else{
return 'false';
}
}
}
public function addtip(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');

}
$user=$data->username;
$role=$data->user_role;
$tip = new addtip;
$tip->tip_name = $req->input('tipname');
$tip->tip_description = $req->input('desc');
$tip->tip_category = $req->input('types');
$tip->username= $user;
$tip->user_role=$role;
$tip->save();
echo "alert('tip added successfully')";
return redirect('Immigranttipshtml');
}
public function gettips()

{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$fetch = addtip::all();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('Immigranttipshtml')->with('dataall',$dataall);


}
public function searchtips(Request $req)

{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$tipname=$req->input('tip');
// $get = addtip::all();
// $get->where('tip_name', 'REGEXP', '[{]("backend\.[[:alpha:]\.\_]+":true[,]?)+[}]');

$tip=preg_replace("#[^0-9a-z\s]#i","",$tipname);
$fetch = addtip:: where('tip_name','LIKE','%'.$tipname.'%') ->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('Immigranttipshtml')->with('dataall',$dataall);


}

public function addcontribution(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('user');
$role=session()->get('role');
}
$contribution = new contributions;
$contribution->contribution_name = $req->input('contributionname');
$contribution->contribution_description = $req->input('desc');
$contribution->contribution_category = $req->input('types');
$contribution->username= $data;
$contribution->user_role= $role;
$contribution->save();
echo "alert('contribution added successfully')";
return redirect('contributionshtml');
}
public function getcontributions()

{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;
$fetch = contributions::all();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('contributionshtml')->with('dataall',$dataall);


}
public function searchcontributions(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}

$contributionname=$req->input('contribution');


$contribution=preg_replace("#[^0-9a-z\s]#i","",$contributionname);
$fetch = contributions:: where('contribution_name','LIKE','%'.$contribution.'%') ->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('contributionshtml')->with('dataall',$dataall);


}
public function getschools()
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
if ($data->user_role=="Immigrant" || $data->user_role=="Visitor" ){
$fetch = schools::where ('country',"=",$data->nationality)->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('schoolshtml')->with('dataall',$dataall);}
else if ($data->user_role=="Super Admin"){
$fetch=schools::all();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('manageschools')->with('dataall',$dataall);
}
else{
$fetch = schools::where ('country',"=",$data->nationality)->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('manageschools')->with('dataall',$dataall);    
}


}
public function searchschool(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$schoolname=$req->input('school');


$school=preg_replace("#[^0-9a-z\s]#i","",$schoolname);
$fetch = schools:: where('school_name','LIKE','%'.$school.'%') ->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'fetch'=>$fetch];
if ($data->user_role=="Immigrant" || $data->user_role=="Visitor" ){
return view('schoolshtml')->with('dataall',$dataall);
}
else{
return view('manageschools')->with('dataall',$dataall);
}


}

public function uploadimages(Request $req){
$validatedData = $req->validate([
'fileToUpload' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048']);

$name = $req->file('fileToUpload')->getClientOriginalName();

//  $path = $req->file('fileToUpload')->store('assets/images');
//Storage::disk('uploads')->put($namme, $file_content);
disk: $req->file('fileToUpload')->storeAs('assets/images', $name, "uploads");

$data=session()->get('user');
$save = new media;

$save->username=$data;
$save->image_description=$req->input('desc');
$save->image_name = $name;
$save->image_path = 'assets/images/'.$name;

$save->save();

return redirect('uploadimageshtml')->with('status', 'Image Has been uploaded');







}



public function getimages()
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;

$fetch = media::all();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('uploadimageshtml')->with('dataall',$dataall);


}
public function getmuseums()
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;  

$fetch = places::where("category",'=',"Museums")->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('museums')->with('dataall',$dataall);


}

public function searchmuseum(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;  

$museumname=$req->input('museum');


$museum=preg_replace("#[^0-9a-z\s]#i","",$museumname);
$fetch = places:: where('place_name','LIKE','%'.$museum.'%')->where("category",'=',"Museums") ->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('museums')->with('dataall',$dataall);


}
public function gettemples()
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;  
$fetch = places::where("category",'=',"Temples")->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('temples')->with('dataall',$dataall);


}

public function searchtemple(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role; 
$templename=$req->input('temple');


$temple=preg_replace("#[^0-9a-z\s]#i","",$templename);
$fetch = places:: where('place_name','LIKE','%'.$temple.'%')->where("category",'=',"Temples") ->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('temples')->with('dataall',$dataall);


}
public function getrestaurants()
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;

$fetch = places::where("category",'=',"Restaurants")->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('restaurants')->with('dataall',$dataall);


}

public function searchrestaurant(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$restname=$req->input('restaurant');


$rest=preg_replace("#[^0-9a-z\s]#i","",$restname);
$fetch = places:: where('place_name','LIKE','%'.$rest.'%')->where("category",'=',"Restaurants") ->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('restaurants')->with('dataall',$dataall);


}
public function getplaces()
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$fetch = places::where("category",'=',"Places")->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('places')->with('dataall',$dataall);


}

public function searchplace(Request $req)
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;

$placename=$req->input('place');


$place=preg_replace("#[^0-9a-z\s]#i","",$placename);
$fetch = places:: where('place_name','LIKE','%'.$place.'%')->where("category",'=',"Places") ->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('places')->with('dataall',$dataall);


}

public function managetable(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=continents::where("continent_id","=",$ids)->first();
DB::delete('delete from continents where continent_id =? ',[$ids]);
}
$continent_name = continents::all();
//return view('managecontinentshtml')->with('continents',$continent_name);
return redirect('managecontinentshtml');
}

public function manageupdate(Request $req,$id)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$record=continents::where("continent_id","=",$id)->first();
$dataall=['data'=>$data,'continents'=>$record];
return view('continentupdatehtml')->with('dataall',$dataall);


}
public function updatecontinent(Request $req,$id)
{
$continent_to_update=$req->input('continentname');
$record=continents::where("continent_id","=",$id);
DB::update('update  continents set continent_name=? where continent_id =? ',[$continent_to_update,$id]);
return redirect("managecontinentshtml");


}
public function getcontinents()
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;            
$continent_name = continents::all();
$dataall=['data'=>$data,'continents'=>$continent_name];
//return $continent_name;
return view('managecontinentshtml')->with('dataall',$dataall);
}
public function addcontinents(Request $req)
{
$user=new continents;
$user->continent_name = $req->input('continentname');
$user->save();
echo "alert('Continent added successfully')";
return redirect('managecontinentshtml');
}
public function searchcontinent(Request $req)
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;  
$continent=$req->input('continent');


$continentname=preg_replace("#[^0-9a-z\s]#i","",$continent);
$fetch = continents:: where('continent_name','LIKE','%'.$continentname.'%')->get();

$dataall=['data'=>$data,'continents'=>$fetch];
return view('managecontinentshtml')->with('dataall',$dataall);


}



//countries table
public function deletecountry(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=countries::where("country_id","=",$ids)->first();
DB::delete('delete from countries where country_id =? ',[$ids]);
}
$country_name = countries::all();
return redirect('managecountrieshtml');
}

public function managecountry(Request $req,$id)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role; 


$record=countries::where("country_id","=",$id)->first();
$dataall=['data'=>$data,'countries'=>$record];

return view('countryupdatehtml')->with('dataall',$dataall);
//return redirect('countryupdatehtml');

}
public function updatecountry(Request $req,$id)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;    

$country_to_update=$req->input('country');
$continent_to_update=$req->input('continent');
$record=countries::where("country_id","=",$id);
DB::update('update  countries set country_name=? , continent_name=? where country_id =? ',[$country_to_update,$continent_to_update,$id]);
return redirect("managecountrieshtml");


}
public function getcountries(Request $req)
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$country=$data->nationality;
if($data->user_role=="Super Admin"){
$country_name = countries::all();
//return $continent_name;
$dataall=['data'=>$data,'countries'=>$country_name];
return view('managecountrieshtml')->with('dataall',$dataall);
}else{

$country_name = countries::where('country_name','=',$country);
$dataall=['data'=>$data,'countries'=>$country_name];
return view('managecountrieshtml')->with('dataall',$dataall);   
}
}
public function addcountries(Request $req)
{
$user=new countries;
$user->country_name = $req->input('countryname');
$user->continent_name = $req->input('continentname');
$user->save();
echo "alert('COuntry added successfully')";
return redirect('managecountrieshtml');
}
public function searchcountry(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;  
$country=$req->input('country');


$countryname=preg_replace("#[^0-9a-z\s]#i","",$country);
$fetch = countries:: where('country_name','LIKE','%'.$countryname.'%')->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'countries'=>$fetch];
return view('managecountrieshtml')->with('dataall',$dataall);


}

//admin per country updates

public function deleteadminpercountry(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=adminpercountry::where("admin_id","=",$ids)->first();
DB::delete('delete from adminpercountry where admin_id =? ',[$ids]);
}
return redirect('manageadminpercountry');
}

public function manageadminpercountry(Request $req,$id)
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;

$record=adminpercountry::where("admin_id","=",$id)->first();
$dataall=['data'=>$data,'admins'=>$record];
return view('adminpercountryupdate')->with('dataall',$dataall);


}
public function updateadminpercountry(Request $req,$id)
{
$admin_to_update=$req->input('adminname');
$country_to_update=$req->input('admincountry');
$status_to_update=$req->input('status');
$record=adminpercountry::where("admin_id","=",$id);
DB::update('update  adminpercountry set admin_name=? , admin_country=?, status=? where admin_id =? ',[$admin_to_update,$country_to_update,$status_to_update,$id]);
return redirect("manageadminpercountry");


}
public function getadmins(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;


$admin_name = adminpercountry::all();
$dataall=['data'=>$data,'admins'=>$admin_name];
//return $continent_name;
return view('manageadminpercountry')->with('dataall',$dataall);

}
public function addadminpercountry(Request $req)
{
$user=new adminpercountry;
$user->admin_name = $req->input('adminname');
$user->admin_country = $req->input('admincountry');
$user->save();
echo "alert('Admin added successfully')";
return redirect('manageadminpercountry');
}
public function searchadminpercountry(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$admin=$req->input('admin');


$adminname=preg_replace("#[^0-9a-z\s]#i","",$admin);
$fetch = adminpercountry:: where('admin_name','LIKE','%'.$adminname.'%')->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'admins'=>$fetch];
return view('manageadminpercountry')->with('dataall',$dataall);


}

// Manage tips

public function deletetip(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=addtip::where("tip_id","=",$ids)->first();
DB::delete('delete from tips where tip_id =? ',[$ids]);
}
$tip_name = addtip::all();
return redirect('managetips');
}

public function managetips(Request $req,$id)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;       
$record=addtip::where("tip_id","=",$id)->first();
$dataall=['data'=>$data,'tips'=>$record];
return view('tipupdate')->with('dataall',$dataall);


}
public function updatetip(Request $req,$id)
{
$tip_to_update=$req->input('name');
$category_to_update=$req->input('category');
$desc_to_update=$req->input('desc');
$record=addtip::where("tip_id","=",$id);
DB::update('update  tips set tip_name=? , tip_category=?, tip_description=? where tip_id =? ',[$tip_to_update,$category_to_update,$desc_to_update,$id]);
return redirect("managetips");


}
public function retrievetips(Request $req)
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;            
$tip_name = addtip::all();
//return $continent_name;
$dataall=['data'=>$data,'tips'=>$tip_name];
return view('managetips')->with('dataall',$dataall);

}
public function addtipbyadmin(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}

$username=$data->username;
$role=$data->user_role;
$user=new addtip;
$user->tip_name = $req->input('tipname');
$user->tip_description = $req->input('desc');
$user->tip_category = $req->input('types');
$user->username = $username;
$user->user_role = $role;
$user->save();
echo "alert('Tip added successfully')";
return redirect('managetips');
}
public function searchtip(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;    
$tip=$req->input('tip');


$tipname=preg_replace("#[^0-9a-z\s]#i","",$tip);
$fetch = addtip:: where('tip_name','LIKE','%'.$tipname.'%')->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'tips'=>$fetch];
return view('managetips')->with('dataall',$dataall);


}

//manage schools

public function manageschools(Request $req,$id)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$role=$data->user_role;    
$record=schools::where("school_id","=",$id)->first();
$dataall=['data'=>$data,'fetch'=>$record];
return view('schoolupdate')->with('dataall',$dataall);


}
public function addschool(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}

$username=$data->username;

$school=new schools;
$school->school_name = $req->input('schoolname');
$school->school_address = $req->input('Address');
$school->city = $req->input('city');
$school->country = $req->input('country');
$school->contact_no = $req->input('contactno');


$school->save();
echo "alert('School added successfully')";
return redirect('manageschools');
}
public function deleteschool(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=schools::where("school_id","=",$ids)->first();
DB::delete('delete from schools where school_id =? ',[$ids]);
}
$school_name = schools::all();
return redirect('manageschools');
}
public function updateschool(Request $req,$id)
{
$school_to_update=$req->input('name');
$address_to_update=$req->input('address');
$city_to_update=$req->input('city');
$country_to_update=$req->input('country');
$contact_to_update=$req->input('contact');
$record=schools::where("school_id","=",$id);
DB::update('update  schools set school_name=? , school_address=?, city=?, country=?,contact_no=? where school_id =? ',[$school_to_update,$address_to_update,$city_to_update,$country_to_update,$contact_to_update,$id]);
return redirect("manageschools");


}
public function gethospitals()
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
$role=$data->user_role;
}

if ($data->user_role=="Immigrant" || $data->user_role=="Visitor" ){
$fetch = hospitals::where ('country',"=",$data->nationality)->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('hospitalshtml')->with('dataall',$dataall);
echo $fetch;
}
else if ($data->user_role=="Super Admin"){
$fetch=hospitals::all();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('managehospitals')->with('dataall',$dataall);
}
else{
$fetch = hospitals::where ('country',"=",$data->nationality)->get();
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('managehospitals')->with('dataall',$dataall);}



}
public function searchhospital(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$hospitalname=$req->input('hospital');


$hospital=preg_replace("#[^0-9a-z\s]#i","",$hospitalname);
$fetch = hospitals:: where('hospital_name','LIKE','%'.$hospital.'%') ->get();

//$fetch = addtip:: find($tipname);
if ($data->user_role=="Immigrant" || $data->user_role=="Visitor" ){
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('hospitalshtml')->with('dataall',$dataall);
}

else{
$dataall=['data'=>$data,'fetch'=>$fetch];
return view('managehospitals')->with('dataall',$dataall);
}


}

public function managehospitals(Request $req,$id)
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;       

$record=hospitals::where("hospital_id","=",$id)->first();
$dataall=['data'=>$data,'fetch'=>$record];
return view('hospitalupdate')->with('dataall',$dataall);


}
public function addhospital(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}

$username=$data->username;

$hospital=new hospitals;
$hospital->hospital_name = $req->input('hospitalname');
$hospital->hospital_address = $req->input('Address');
$hospital->city = $req->input('city');
$hospital->country = $req->input('country');
$hospital->contact_no = $req->input('contactno');


$hospital->save();
echo "alert('Hospital added successfully')";
return redirect('managehospitals');
}
public function deletehospital(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=hospitals::where("hospital_id","=",$ids)->first();
DB::delete('delete from hospitals where hospital_id =? ',[$ids]);
}
$hospital_name = hospitals::all();
return redirect('managehospitals');
}
public function updatehospital(Request $req,$id)
{
$hospital_to_update=$req->input('name');
$address_to_update=$req->input('address');
$city_to_update=$req->input('city');
$country_to_update=$req->input('country');
$contact_to_update=$req->input('contact');
$record=hospitals::where("hospital_id","=",$id);
DB::update('update  hospitals set hospital_name=? , hospital_address=?, city=?, country=?,contact_no=? where hospital_id =? ',[$hospital_to_update,$address_to_update,$city_to_update,$country_to_update,$contact_to_update,$id]);
return redirect("managehospitals");


}
public function deletecontribution(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=contributions::where("contribution_id","=",$ids)->first();
DB::delete('delete from contributions where contribution_id =? ',[$ids]);
}
$contribution_name = contributions::all();
return redirect('managecontributions');
}

public function managecontributions(Request $req,$id)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role; 
$record=contributions::where("contribution_id","=",$id)->first();
$dataall=['data'=>$data,'contributions'=>$record];
return view('contributionupdate')->with('dataall',$dataall);


}
public function updatecontribution(Request $req,$id)
{
$contribution_to_update=$req->input('name');
$category_to_update=$req->input('category');
$desc_to_update=$req->input('desc');
$record=contributions::where("contribution_id","=",$id);
DB::update('update  contributions set contribution_name=? , contribution_category=?, contribution_description=? where contribution_id =? ',[$contribution_to_update,$category_to_update,$desc_to_update,$id]);
return redirect("managecontributions");


}
public function retrievecontributions(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role; 
$contribution_name = contributions::all();
//return $continent_name;
$dataall=['data'=>$data,'contributions'=>$contribution_name];
return view('managecontributions')->with('dataall',$dataall);

}
public function addcontributionbyadmin(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}

$username=$data->username;
$role=$data->user_role;
$user=new contributions;
$user->contribution_name = $req->input('contributionname');
$user->contribution_description = $req->input('desc');
$user->contribution_category = $req->input('types');
$user->username = $username;
$user->user_role = $role;
$user->save();
echo "alert('Contribution added successfully')";
return redirect('managecontributions');
}
public function searchcontribution(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role; 
$contribution=$req->input('contribution');


$contributionname=preg_replace("#[^0-9a-z\s]#i","",$contribution);
$fetch = contributions:: where('contribution_name','LIKE','%'.$contributionname.'%')->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'contributions'=>$fetch];
return view('managecontributions')->with('dataall',$dataall);


}
public function managecategoriesofleaving(Request $req,$id)
{

if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role; 
$record=category::where("category_id","=",$id)->first();
$dataall=['data'=>$data,'categories'=>$record];
return view('updatecategoryofleaving')->with('dataall',$dataall);


}
public function addcategory(Request $req)
{
//if(session()->has('loggeduser'))
//{
// $data=session()->get('loggeduser');
//echo $data;
// }

//$username=$data->username;

$category=new category;
$category->category_name = $req->input('categoryname');
$category->category_description = $req->input('categorydescription');



$category->save();
echo "alert('Category added successfully')";
return redirect('managecategoriesofleaving');
}
public function deletecategory(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=category::where("category_id","=",$ids)->first();
DB::delete('delete from categoryforleaving where category_id =? ',[$ids]);
}
$category_name = category::all();
return redirect('managecategoriesofleaving');
}
public function updatecategory(Request $req,$id)
{
$name_to_update=$req->input('name');
$desc_to_update=$req->input('desc');

$record=category::where("category_id","=",$id);
DB::update('update  categoryforleaving set category_name=? , category_description=? where category_id =? ',[$name_to_update,$desc_to_update,$id]);
return redirect("managecategoriesofleaving");


}
public function searchcategory(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role; 
$category=$req->input('categoryofleaving');                               
$categoryname=preg_replace("#[^0-9a-z\s]#i","",$category);
$fetch = category:: where('category_name','LIKE','%'.$categoryname.'%')->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'categories'=>$fetch];
return view('managecategoriesofleaving')->with('dataall',$dataall);


}
public function getcategories(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;                        
$category_name = category::all();
//return $continent_name;
$dataall=['data'=>$data,'categories'=>$category_name];
return view('managecategoriesofleaving')->with('dataall',$dataall);

}
//manage places to visit

public function addplacestovisit(Request $req)
{
$user=new places;
$user->place_name = $req->input('placename');
$user->place_address=$req->input('Address');
$user->city=$req->input('city');
$user->country=$req->input('country');
$user->contact_no=$req->input('contactno');
$user->category=$req->input('types');

$user->save();
echo "alert('user registered successfully')";
return redirect('manageplacestovisit');

}
public function manageplacestovisit(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role; 
$manageplaces=places::all();
//echo $manageplaces;
$dataall=['data'=>$data,'placestovisit'=>$manageplaces];
return view('manageplacestovisithtml')->with('dataall',$dataall);   
}
public function deleteplacestovisit(Request $req)
{
$id=$req->input('checkbox');
foreach($id as $ids)
{
$record=places::where("place_id","=",$ids)->first();
DB::delete('delete from places_to_visit where place_id =? ',[$ids]);

}
$placestovisit=places::all();
return redirect('manageplacestovisit');

}
public function updateplacestovisit(Request $req,$id)
{
$place_to_update=$req->input('placename');
$address_to_update=$req->input('placeaddress');
$city_to_update=$req->input('city');
$country_to_update=$req->input('country');
$contact_to_update=$req->input('contact');
$category_to_update=$req->input('category');
$record=places::where("place_id","=",$id);
DB::update('update  places_to_visit set place_name=?,place_address=?,city=?,country=?,contact_no=?,category=? where place_id =? ',[$place_to_update, $address_to_update, $city_to_update, $country_to_update, $contact_to_update,$category_to_update,$id]);
return redirect("manageplacestovisit");

}
public function updateplacesform(Request $req,$id)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$record=places::where("place_id","=",$id)->first(); 
$dataall=['data'=>$data,'placestovisit'=>$record];
return view('updateplacesform')->with('dataall',$dataall);
}
public function searchplacetovisit(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;
$place=$req->input('placename');


$placename=preg_replace("#[^0-9a-z\s]#i","",$place);
$fetch = places:: where('place_name','LIKE','%'.$placename.'%')->get();
//$fetch = addtip:: find($tipname);
$dataall=['data'=>$data,'placestovisit'=>$fetch];

return view('manageplacestovisithtml')->with('dataall',$dataall);


}
public function Immigranthtml(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}
$role=$data->user_role;

$dataall=['data'=>$data];

return view('Immigranthtml')->with('dataall',$dataall);


}

public function superadmindashboard(Request $req)
{
        if(session()->has('loggeduser'))
        {
        $user=session()->get('loggeduser');
        }  
$user_name=$user->username;              
$immigrants=register::where("user_role","=","Immigrant");
$immigrants_count=$immigrants->count();
$previous_week = strtotime("-1 week +1 day");
$start_week = strtotime("last tuesday midnight",$previous_week); 
$end_week = strtotime("next saturday",$start_week);
$start_week = date("Y-m-d",$start_week);
$end_week = date("Y-m-d",$end_week);

$recent_registration=register::whereBetween('date_created', [$start_week, $end_week])->get();
$recent_registration_count=$recent_registration->count();
$adminpercountry=adminpercountry::all();
$adminpercountry_count=$adminpercountry->count();
$media=media::all();
$media_count=$media->count();
$date = \Carbon\Carbon::now();
$date_today=$date->toDateString();
$birthday=register::where('dateofbirth',"=",$date_today)->get();




$data=['user'=>$user_name,
'immigrants_count'=>$immigrants_count,
'adminpercountry_count'=>$adminpercountry_count,
'recent_registration_count'=>$recent_registration_count,
'recent_registration_details'=>$recent_registration,
'media_count'=>$media_count,
'birthday'=>$birthday,

];

return view('superadmindashboardhtml')->with('data',$data);
}
public function adminpercountrydashboard(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
}
$user_name=$data->username; 
$country=$data->nationality;
// $data_tips = register::join('tips', 'tips.username', '=', 'user_details.username')->get();
//$count=0;
//echo $data_tips;
/* foreach($data_tips as $data_info)
{
if($data_info->nationality==$country)
{
$count=$count+1;
echo $count; 
$tipscountry=$data_info;
echo $tipscountry->tip_id;
echo $tipscountry->username;
}
}
echo $count;
//echo $tipscountry;*/
$date = \Carbon\Carbon::now();
$date_today=$date->toDateString();
$immigrants=register::where("user_role","=","Immigrant")->where('nationality','=',$country);
$immigrants_count=$immigrants->count();
/*$previous_week = strtotime("-1 week +1 day");
$start_week = strtotime("last friday midnight",$previous_week); 
$end_week = strtotime("next friday",$start_week);
$start_week = date("Y-m-d",$start_week);
$end_week = date("Y-m-d",$end_week);
$recent_registration=register::whereBetween('date_created', [$start_week, $end_week])->where('nationality','=',$country)->get();*/
$recent_registration=register::orderBy('date_created', 'desc')->get()->take(10);
$recent_registration_count=$recent_registration->count();
$adminpercountry=adminpercountry::all();
$adminpercountry_count=$adminpercountry->count();
$media=media::all();
$media_count=$media->count();
$birthday=register::where('dateofbirth',"=",$date_today)->get();
$tips=addtip::all();
$tips_count=$tips->count();
$contributions=contributions::all();
$contributions_count=$contributions->count();
$data=['user'=>$user_name,
'immigrants_count'=>$immigrants_count,
'tips_count'=>$tips_count,
'recent_registration_details'=>$recent_registration,
'contributions_count'=>$contributions_count,
'birthday'=>$birthday,
'recent_activity'=>$recent_registration,
'recent_registration_count'=>$recent_registration_count,
'media_count'=>$media_count,




];
//echo $recent_registration;
return view('adminpercountrydashboardhtml')->with('data',$data);



}
public function barchart(Request $req)
{
$tips=addtip::all();
$tips_count=$tips->count();
$media=media::all();
$media_count=$media->count();
$adminpercountry=adminpercountry::all();
$adminpercountry_count=$adminpercountry->count();
$contributions=contributions::all();
$contributions_count=$contributions->count();
$immigrants=register::where("user_role","=","Immigrant");
$immigrants_count=$immigrants->count();
$dataall=[
'immigrants_count'=>$immigrants_count,
'tips_count'=>$tips_count,
'contributions_count'=>$contributions_count,
'media_count'=>$media_count,
'adminpercountry_count'=>$adminpercountry_count,];
return view('barchart')->with('dataall',$dataall);
}
public function piechart(Request $req)
{
/*$count=DB::select('select nationality,count() as country_count from user_details group by nationality');
foreach($count as $e)
{
echo $e['country_count'];
}*/

$collection = register::groupBy('nationality')
->selectRaw('count(*) as total, nationality')->get();
return view('piechart')->with('dataall',$collection);
}
public function makepayment(Request $req)
{
if(session()->has('loggeduser'))
{
$data=session()->get('loggeduser');
//echo $data;
}

$username=$data->username;
$role=$data->user_role;
$money=$req->input('money');
$user=new contributions;
$user->contribution_name = "Money Contribution";
$user->contribution_description = "Money Contribution".$money;
$user->contribution_category = "Money Donation";
$user->username = $username;
$user->user_role = $role;
$user->save();
echo "alert('Contribution added successfully')";
return view('payment');
}


}