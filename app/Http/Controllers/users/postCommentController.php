<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Posts;
use DB;

class postCommentController extends Controller
{
    public function save(Request $request){
        
        if(session()->get('usermail')){


            $request->validate([
                'postid' => 'required',
                'visitorid' => 'required',
                 'fname' => 'required',
                  'commentbox' => 'required'
            ]);
    
            $postid = $request['postid'];
            $visitorid = $request['visitorid'];
            $fname = $request['fname'];
            $commentbox = $request['commentbox'];
    
            $comment = new Comments;
            $comment->postid = $postid;
            $comment->visitorid = $visitorid;
            $comment->name = $fname;
            $comment->msg = $commentbox;
            $comment->date = date("Y/m/d");
            date_default_timezone_set("Asia/Kolkata");
            $comment->time = date("h:i:sa");
            $comment->spam = 0;
            $comment->save();
            
            $catid  = Posts::select('category_id')->where('postid','=',$postid)->first()->category_id;
    
        // filter user inputs
        $host = "localhost";
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $db = env('DB_DATABASE');
    
        $conn = mysqli_connect($host,$user,$pass,$db);
        $postid = htmlspecialchars($postid);
        $postid = mysqli_real_escape_string($conn,$postid);
    
        $post = DB::table('posts')
        ->join('categories','categories.id','=','posts.category_id')
        ->join('admins','posts.post_admin_id','=','admins.adminid')
        ->where('posts.postid','=',$postid)->get();
        
        $cat = DB::table('categories')->get();
    
        $otherpost = DB::table('posts')
        ->where('category_id','=',$catid)
        ->get();


        $comment = DB::table('comments')
        ->join('posts','posts.postid','=','comments.postid')
        ->where('posts.postid','=',$postid)->limit(3)
        ->orderBy('comments.id','DESC')->get();
    
        return view('post',['post'=>$post,'other'=>$otherpost,'cat'=>$cat,'comment'=>$comment]);
    

        
        }else{
            return redirect('/login');
        }

       
    }
}
