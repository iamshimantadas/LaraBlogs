<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminlog;
use App\Models\Categories;
use DB;

class adminLoginController extends Controller
{
    public function auth(Request $request){
        $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'sec_string' => 'required'
       ]);

       $host = "localhost";
       $db = env('DB_DATABASE');
       $user = env('DB_USERNAME');
       $userpass = env('DB_PASSWORD');
       $conn = mysqli_connect($host,$user,$userpass);

       $email = $request['email'];
       $pass = $request['password'];
       $secstr = $request['sec_string'];

       // filtering admin inputs
       $email = htmlspecialchars($email);
       $pass = htmlspecialchars($pass);
       $secstr = htmlspecialchars($secstr);

       $email = mysqli_real_escape_string($conn,$email);
       $pass = mysqli_real_escape_string($conn,$pass);
       $secstr = mysqli_real_escape_string($conn,$secstr);
       
       // store record to adminlog
       $adminlog = new Adminlog;
       date_default_timezone_set("Asia/Kolkata");
       $adminlog->date = date("Y/m/d");
       $adminlog->time = date("h:i:sa");
       $adminlog->email = $email;
       $adminlog->passwd = $pass;
       $adminlog->sec_string = $secstr;
       $adminlog->loc = $_SERVER['REMOTE_ADDR'];
       $adminlog->save();
       

       $admin = DB::table('admins')
                ->where('email','=',$email)
                 ->where('passwd','=',$pass)
                ->where('sec_string','=',$secstr)
                ->where('status','=',1)
                ->get()->count();
       
                if($admin == 1){
             // Store a piece of data in the session...
    session(['adminmail' => $email]);

    return redirect('/admin');

           }else{
            return redirect('/admin');
           }        
    }

    public function addNewCategory(Request $request){
        if(session('adminmail')){
            
            $request->validate([ 
                'catgory_name' => 'required' ,
                 'navbar_show' => 'required'
                ]);
        
                $catname = $request['catgory_name'];
                $navvis = $request['navbar_show'];
        
                $cat = new Categories;
                $cat->name = $catname;
                $cat->navbar_show = $navvis;
                date_default_timezone_set("Asia/Kolkata");
                $cat->datetime = date("M,d,Y h:i:s A");
                $cat->save();
        
                return redirect('/admin');

        }else{
            return view('admin/login');
        }
  
    }

    public function showall(Request $request){
        if(session('adminmail')){
            $cat = DB::table('categories')
            ->get();
        
            return view('admin/allcategries',['cat'=>$cat]);
        }else{
            return view('admin/login');
        }

       
    }

    public function cat_update(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        if(session('adminmail')){
            $request->validate([ 'catid' => 'required' ]);

            $catid = $request['catid'];
    
            $cat = DB::table('categories')
                    ->where('id', '=',$catid)
                    ->get();
    
             return view('admin/updatecategory',['cat'=>$cat]);       
        }else{
            return view('admin/login');
        }
    }

    public function cat_update_req(Request $request){
        if(session('adminmail')){
            
            $request->validate([ 'catid'=>'required','catgory_name'=>'required','navbar_show'=>'required' ]);

            $catid = $request['catid'];
            $catname = $request['catgory_name'];
            $navbar_vis = $request['navbar_show'];

            // updating the record 
            $cat = Categories::find($catid);
            $cat->name = $catname;
            $cat->navbar_show = $navbar_vis;
            $cat->save();

            return redirect('/admin_all_category');

        }else{
            return view('admin/login');
        }
    }

    public function cat_delete(Request $request){
        if(session('adminmail')){
            // echo "<pre>";
            // print_r($request->all());
           
            $request->validate([ 'catid' => 'required' ]);
           
            $catid = $request['catid'];
            
            $cat = DB::table('categories')
            ->where('id', '=',$catid)
            ->get();

            
            return view('admin/deletecategory',['cat'=>$cat]);


        }else{
            return view('admin/login');
        }
    }

    public function cat_delete_req(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        if(session('adminmail')){
            $request->validate([ 'deletecatid' => 'required']);

            $deletecatid = $request['deletecatid'];

            $cat = Categories::find($deletecatid);
            $cat->delete();

            return redirect('/admin');

        }else{
            return view('admin/login');
        }
        
    }

}

