<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Payfulldetails;

class donationController extends Controller
{
    public function getRedirect(Request $request){
       
        if(session()->get('usermail')){
            $blogid = $request['blogid'];
        $visitorid = $request['visitorid'];

    if($visitorid){
            $request->validate([
            'blogid'=>'required',
            'visitorid'=>'required']);

        
       $visitor = DB::table('visitors')
        ->where('id','=',$visitorid)
        ->get();

           return view('donate',compact('blogid','visitorid'),['visitor'=>$visitor]);

        }else{
             return redirect('/login');
        }
        }
        else{
            return redirect('/login');
        }
    }

    public function pay(Request $request){
        $request->validate([
            'name'=>'required',
            'amt'=>'required',
            'userid'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);
    
        $name = $request['name'];
        $amt = $request['amt'];
        $userid = $request['userid'];
        $email = $request['email'];
        $phone = $request['phone'];
        $blogid = $request['blogid'];
    
        session_start();
    
        // setting database connection
        $host="localhost";
        $user=env('DB_USERNAME');
        $pass=env('DB_PASSWORD');
        $db=env('DB_DATABASE');
    
        $con = mysqli_connect($host,$user,$pass,$db);
    
    if(isset($_POST['amt']) && isset($_POST['name'])){
        $amt=$_POST['amt'];
        $name=$_POST['name'];
        $payment_status="pending";
        $added_on=date('Y-m-d h:i:s');
        mysqli_query($con,"insert into payment(name,amount,payment_status,added_on) values('$name','$amt','$payment_status','$added_on')");
        $_SESSION['OID']=mysqli_insert_id($con);
    }
    
    
    if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
        $payment_id=$_POST['payment_id'];
                                    
        mysqli_query($con,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
    
        // making a global session variable for payment
    $donate = $userid.$name.$_POST['payment_id'].$_SESSION['OID'];
    session()->put('donateuser',$donate);
    
    
    
        $pay = new Payfulldetails;
    $pay->blogid = $blogid;
    $pay->userid = $userid;
    $pay->username = $name;
    $pay->phone = $phone;
    $pay->email = $email;
    $pay->loc = $_SERVER['REMOTE_ADDR'];
    $pay->amount = $amt;
    $pay->paymentid = $payment_id;
    $pay->date = date("Y/m/d");
    date_default_timezone_set("Asia/Kolkata");
    $pay->time =  date("h:i:sa");
    $pay->save();
    
    }
    
       }

       public function return(Request $request){
        if(session()->get('donateuser')){
            return  view('paysuccess');
        }
        else{
            return redirect('/');
        }
       
       }
}
