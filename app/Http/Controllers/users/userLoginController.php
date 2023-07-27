<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitors;
use App\Models\Articles;
use App\Models\Contactus;
use DB;


use vendor\autoload;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;


class userLoginController extends Controller
{
   public function auth(){
    if(session('usermail')){
        
        $id = session('userid');
        
        $user = DB::table('visitors')
        ->join('payfulldetails','payfulldetails.userid','=','visitors.id')
        ->where('visitors.id','=',$id)
        ->orderBy('payfulldetails.payid', 'desc')
        ->get();

        return view('user_dashboard\dashboard',['user'=>$user]);
    }else{
        return view('login');
    }
   }
   public function register(Request $request){
    
    $request->validate([
        'name' => 'required',
        'password' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'termCon' => 'required'
    ]);

    $name  =  $request['name'];
    $email =    $request['email'];
     $password =   $request['password'];
    $termcon =    $request['termCon'];
    $phone =    $request['phone'];

    // filtering user inputs
    $host="localhost";
    $user = env('DB_USERNAME');
    $pass = env('DB_PASSWORD');
    $db = env('DB_DATABASE');
    
    $conn = mysqli_connect($host,$user,$pass,$db);

    $name = mysqli_real_escape_string($conn,$name);
    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);
    $phone = mysqli_real_escape_string($conn,$phone);

    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $phone = htmlspecialchars($phone);
    

    //  EMAIL VALIDITY CHECKING
    $validator = new EmailValidator();
    $multipleValidations = new MultipleValidationWithAnd([
        new RFCValidation(),
    new DNSCheckValidation()
]);
    //ietf.org has MX records signaling a server with email capabilities
$res = $validator->isValid("$email", $multipleValidations); //true

if($res){
    

    // next processing
    $visitor = new Visitors;

    // emil existence check in server side
    $Emailexist = DB::table('visitors')
    ->where('email','=',$email)
    ->get()->count();
    if($Emailexist == 1){
        return "your email already exist!! try another!!";

        $Phoneexist = DB::table('visitors')
        ->where('phone','=',$phone)
        ->get()->count();
        if($Phoneexist == 1){
            return "Your Phone Number already exist!! try another!!";
        }
    }

    if($termcon){
        $visitor->name = $name;
        $visitor->email = $email;
        $visitor->passwd = $password;
        $visitor->phone = $phone;
        $visitor->save();
        
        echo "<font style='font-size:20px;color:green;'>user registerted successfully!!</font>";

       
        //sleep for 3 seconds
        sleep(4);

        // storing session 
        session()->put('usermail', $email);
        session()->put('username', $name);

        // getting userid 
        $userid = Visitors::select('id')->where('email','=',$email)->where('phone','=',$phone)->first()->id;

        session()->put('userid', $userid);
  

        return redirect('/');
    }else{
        return "Please select our terms & conditions ... ";
    }

}
else{
    return "IT SEEMS YOUR EMAIL ID IS NOT VALID!! PLEASE PUT ANOTHER ONE!";
}



   }

   public function login(Request $request){
    $request->validate([
        'uemail'=>'required|email',
        'upassword'=>'required'
    ]);

    
    $email=$request['uemail'];
    $password= $request['upassword'];

    // filtering user inputs
    $host="localhost";
    $user = env('DB_USERNAME');
    $pass = env('DB_PASSWORD');
    $db = env('DB_DATABASE');

    $conn = mysqli_connect($host,$user,$pass,$db);

    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);




   $num = DB::table('visitors')->where('email','=',$email)->where('passwd','=',$password)->get()->count();
   
   if($num==1){
    // storing session 
    session()->put('usermail', $email);

    $name = Visitors::select('name')->where('email','=',$email)->where('passwd','=',$password)->first()->name;
  
    session()->put('username', $name);

    sleep(2);

      // getting phone 
      $phone = Visitors::select('phone')->where('email','=',$email)->first()->phone;

      // getting userid 
      $userid = Visitors::select('id')->where('email','=',$email)->where('phone','=',$phone)->first()->id;

      session()->put('userid', $userid);


     return redirect('/');
   }
   else{
    return redirect('/login');
   }

}
  public function store(Request $request){
    $request->validate([
        'userid'=>'required',
        'name'=>'required',
        'email'=>'required',
        'message'=>'required'
    ]);

    $userid = $request['userid'];
    $name = $request['name'];
    $email = $request['email'];
    $message = $request['message'];

    $article = new Articles;
    $article->visitor_id = $userid;
    $article->fname = $name;
    $article->email = $email;
    $article->msg = $message;
    $article->save();

    return redirect('/');
  }

  public function contact(Request $request){
    // echo "<pre>";
    // print_r($request->all());
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'message'=>'required'
    ]);

    $name=$request['name'];
    $email=$request['email'];
    $phone=$request['phone'];
    $msg=$request['message'];

    $contact = new Contactus;
    		
       //  EMAIL VALIDITY CHECKING
       $validator = new EmailValidator();
       $multipleValidations = new MultipleValidationWithAnd([
           new RFCValidation(),
       new DNSCheckValidation()
   ]);
       //ietf.org has MX records signaling a server with email capabilities
   $res = $validator->isValid("$email", $multipleValidations); //true

   if($res){

    $contact->fname = $name;
    $contact->email = $email;
    $contact->phone = $phone;
    $contact->msg = $msg;
    $contact->date = date("Y/m/d");
    date_default_timezone_set("Asia/Kolkata");
    $contact->time = date("h:i:sa");
    $contact->loc = $_SERVER['REMOTE_ADDR'];
    $contact->save();
    
    return redirect('/');
    
   }else{
    return "IT SEEMS YOUR EMAIL ID NOT VALID PLEASE GO BACK, TRY AGAIN!!";
   }
  }

  public function updateInfo(Request $request){
    echo "<pre>";
    print_r($request->all());


    $request->validate([
        'userid' => 'required',
        'email' => 'required',
        'password' => 'required',
        'phone' => 'required',
    ]);

    $userid = $request['userid'];
    $name = $request['fname'];
    $email = $request['email'];
    $password = $request['password'];
    $phone = $request['phone'];
    $Country = $request['Country'];
   
    if($name == ""){
        $name = "change this name";
    }

    $visitor = Visitors::find($userid);

    $visitor->name = $name;
    $visitor->email = $email;
    $visitor->passwd = $password;
    $visitor->phone = $phone;
    $visitor->country = $Country;
    $visitor->save();

    return redirect('/login');

  }
  public function resetPass(Request $request){
    // echo "<pre>";
    // print_r($request->all());
    $request->validate([
        'email'=>'required',
        'phone'=>'required'
    ]);

    $emailid = $request['email'];
    $ph = $request['phone'];

    $id = Visitors::select('id')
    ->where('email','=',$emailid)
    ->where('phone','=',$ph)
    ->get()->count();

    if($id==0){
        return "IT SEEMS YOUR EMAIL ID OR PHONE NUMBER NOT MATCHED WITH <br>
        OUR RECORDS, PLEASE TRY AGAIN!!
        ";
    }

    $id = Visitors::select('id')
    ->where('email','=',$emailid)
    ->where('phone','=',$ph)
    ->first()->id;



    session()->put('resetPassReq',$id);

    return view('resetpass',['userid'=>$id]);


    // return redirect('/resetpass',compact('userid'));

    }

    public function resetPassReq(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        if(session()->get('resetPassReq')){
           
            $request->validate([
                'password1'=>'required',
                'password2'=>'required',
                'userid'=>'required'
            ]);

            $pass1=$request['password1'];
            $pass2=$request['password2'];
            $userid=$request['userid'];
        
            if($pass1==$pass2){
                
               $visitor = Visitors::find($userid);
               $visitor->passwd = $pass1;
               $visitor->save();

               return redirect('/login');

            }
            else{
                return redirect('/resetpass');
                
                return "SORRY HACKER PASSWORD NOT MATCHED!";                                                                                                                 
            
                
            }

        }
        else{
           return redirect('/forgetpass');
        }

        
    }

}
