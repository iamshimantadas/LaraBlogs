<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Posts;
use App\Models\Searches;


class searchPostController extends Controller
{
    public function find(Request $request){
        $request->validate([ 'search_query' => 'required' ]);

        $search_query = $request['search_query'];

        $catid = $request['catid'];
        if($catid){ }else{ $catid = (rand(1,10)); }

        // saving record of search
        $search = new Searches;
        $search->name = $search_query;
        $search->date = date("Y/m/d");
        date_default_timezone_set("Asia/Kolkata");
        $search->time = date("h:i:sa");
        $search->loc =  $_SERVER['REMOTE_ADDR'];
        $search->save();

        
 // checks record existence
 $pcount = Posts::where('pname', 'LIKE', '%'.$search_query.'%')->get()->count();
 if($pcount == 0){
     return redirect('/');
 }

        $postid = Posts::select('postid')
        ->where('pname', 'LIKE', '%'.$search_query.'%')
        ->first()->postid;


        $post = DB::table('posts')
        ->join('categories','categories.id','=','posts.category_id')
        ->join('admins','posts.post_admin_id','=','admins.adminid')
        ->where('posts.postid','=',$postid)->get();

        $otherpost = DB::table('posts')
        ->where('category_id','=',$catid)
        ->get();

        $cat = DB::table('categories')->get();

        



       
        
        // $postid = Posts::where('pname', 'LIKE', '%'.$search_query.'%')->get()->postid;
        $postid = Posts::select('postid')
        ->where('pname', 'LIKE', '%'.$search_query.'%')
        ->first()->postid;


        $comment = DB::table('comments')
        ->join('posts','posts.postid','=','comments.postid')
        ->where('posts.postid','=',$postid)->limit(3)
        ->orderBy('comments.id','DESC')->get();

        return view('post',['post'=>$post,'other'=>$otherpost,'cat'=>$cat,'comment'=>$comment]);
    }
}
