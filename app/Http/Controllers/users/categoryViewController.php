<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Http;
use App\Models\Item;
use Carbon\Carbon;


class categoryViewController extends Controller
{
    public function view(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $request->validate([ 'catid' => 'required' ]);

        $catid = $request['catid'];

        if($catid){ }else{ $catid = (rand(1,10)); }

        $catpost = DB::table('posts')
        ->join('categories','categories.id','=','posts.category_id')
        ->join('admins','posts.post_admin_id','=','admins.adminid')
        ->where('categories.id','=',$catid)
        ->where('posts.public_visibility','=',1)
        ->orderBy('posts.postid', 'desc')->get();

        $othercat = DB::table('categories')->where('categories.id','!=',$catid)->get();

        $otherPosts = DB::table('posts')
        ->join('categories','categories.id','=','posts.category_id')
        ->where('categories.id','!=',$catid)
      ->whereBetween('post_created_at', 
          [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
      )
      ->where('posts.public_visibility','=',1)
      ->limit(6)->get()->reverse();


        return view('category',['catpost'=>$catpost,'othercat'=>$othercat,'otherposts'=>$otherPosts]);

       }
}
