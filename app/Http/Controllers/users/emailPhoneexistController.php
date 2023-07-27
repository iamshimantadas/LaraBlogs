<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class emailPhoneexistController extends Controller
{
    public function emailchek(Request $request){
      $email = $request['email'];
      $num = DB::table('visitors')->where('email','=',$email)->get()->count();
      if($num){
        return "email exist!!";
      }else{

      }
    }
    public function phonecheck(Request $request){
        $phone = $request['phone'];
        $num = DB::table('visitors')->where('phone','=',$phone)->get()->count();
        if($num){
          return "phone exist!!";
        }else{
  
        }
    }
}
