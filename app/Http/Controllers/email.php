<?php

namespace App\Http\Controllers;
use App\Models\contactus;
use Illuminate\Http\Request;
use Mail;
use session;

class email extends Controller
{
        public function basic_email(Request $req) {
            if(session()->has('dataall')){
                
                $dataall=session()->get('dataall');
                 $email = array_values($dataall)[0];
                 $password = array_values($dataall)[1];
            
            
           
           $data = array('email'=>$email,'password'=>$password);
            //echo array_values($data)[0];
           Mail::send(['text'=>'mails'], $data,function($message) {
              $dataall=session()->get('dataall');
              $message->to(array_values($dataall)[0])->subject
                 ('Immigrantshaeven Credentials');
              $message->from('immigrantservicess@gmail.com','Immigrants Haeven');
           });
           return redirect('loginhtml');
        }
    }

         public function contactus(Request $req)
        {
            $user= new contactus;
            $user->username=$req->input("name");
            $user->email=$req->input("email");
            $user->contact_no=$req->input("contact");
            $user->query_subject=$req->input("subject");
            $user->query_message=$req->input("message");
            $user->country=$req->input("country");
            $user->save();
            $username=$req->input("name");
            $email=$req->input("email");
            $contact_no=$req->input("contact");
            $query_subject=$req->input("subject");
            $query_message=$req->input("message");
            $data = array('name'=>$username,'email'=>$email,'contact'=>$contact_no,'subject'=>$query_subject,'messages'=>$query_message);
            Mail::send(['text'=>'contact_mail'], $data,function($message) {
                $message->to('immigrantservicess@gmail.com')->subject
                   ('Immigrantshaeven Feedback');
                $message->from('immigrantservicess@gmail.com','Immigrants Haeven');
             });
             return redirect('contactus');


        }
    }
