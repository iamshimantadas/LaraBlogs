<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Newsletter;

use vendor\autoload;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;


class subscribeEmailController extends Controller
{
    public function save(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $request->validate([
            'subscribeemailname' => 'required'
        ]);
        $subscribeemailname = $request['subscribeemailname'];

        $email = $subscribeemailname;

        $num = DB::table('newsletter')->where('email','=',$email)->get()->count();
        if($num == 1){
            return "THIS EMAIL ALREADY EXIST <br> Try another one!!";

            // echo "<a href='{{url('/')}}/'>go to homepage</a>";
            // echo "<b>hello</b>";
        }
        else{

            // validate emailid 
            $validator = new EmailValidator();
    $multipleValidations = new MultipleValidationWithAnd([
        new RFCValidation(),
    new DNSCheckValidation()
]);
    //ietf.org has MX records signaling a server with email capabilities
$res = $validator->isValid("$email", $multipleValidations); //true

if($res){

    $letter = new Newsletter;
            $letter->email = $subscribeemailname;
            date_default_timezone_set("Asia/Kolkata");
            $letter->date = date("Y/m/d");
            $letter->loc = $_SERVER['REMOTE_ADDR'];
            $letter->save();
            
            return redirect('/');

}else{
    return "IT SEEMS YOUR EMAIL ID IS NOT VALID!! PLEASE PUT ANOTHER ONE!";
}
            
        }


    }

    // public function check(Request $request){
    //     $request->validate([ 'email' => 'required']);
    //     $email = $request['email'];

    //     $num = DB::table('newsletter')->where('email','=',$email)->get()->count();
    //     if($num == 1){
    //         return "EMAIL EXIST";
    //     }
    //     else{
    //          return "EMAIL NOT EXIST";
    //     }
    // }
}
