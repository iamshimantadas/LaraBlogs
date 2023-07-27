<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Posts;

class postViewController extends Controller
{
   public function show(Request $request){
    // echo "<pre>";
    //   print_r($request->all());
    $request->validate([ 'postid' => 'required']);

    $postid = $request['postid'];
    $catid = $request['catid'];

    if($catid){ }else{ $catid = (rand(1,10)); }

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

}

    public function updateBtn(Request $request){
    $postid = $request['postid'];

    $wpshareNum = Posts::select('wpshare')->where('postid','=',$postid)
    ->first()->wpshare;
    
    $wpshareNum = $wpshareNum+1;

    $post = Posts::find($postid);
    $post->wpshare = $wpshareNum;
    $post->save();

    return "whatsapp share number incremented!";
    
    }

}
