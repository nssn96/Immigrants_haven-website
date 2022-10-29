<?php

namespace App\Http\Controllers;
use session;
use Illuminate\Http\Request;
use App\Models\register;
use App\Models\addtip;
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
            $user ->user_password = hash::make($req->input('password'));
            $user->phone = $req->input('phone');
            $user->nationality = $req->input('nationality');
            $user->immigratedcountry = $req->input('immigratedcountry');
            $user->categoryofleaving = $req->input('categoryofleaving');
            $user->user_address = $req->input('address');
            $user->save();
            echo "alert('user registered successfully')";
            return redirect('loginhtml');
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
                        else{
                                return 'false';
                        }
                }
            }
            public function addtip(Request $req)
            {
                    if(session()->has('loggeduser'))
                    {
                        $data=session()->get('user');
                    }
                        $tip = new addtip;
                        $tip->tip_name = $req->input('tipname');
                        $tip->tip_description = $req->input('desc');
                        $tip->tip_category = $req->input('types');
                        $tip->username= $data;
                        $tip->save();
                        echo "alert('tip added successfully')";
                        return redirect('Immigranttipshtml');
                }
                public function gettips()
                {
                    $fetch = addtip::all();
                    return view('Immigranttipshtml',compact('fetch'));
                    

                }
    }


