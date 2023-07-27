<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use DB;

use Illuminate\Support\Facades\Http;
use App\Models\Item;
use Carbon\Carbon;

class indexVideController extends Controller
{
   public function view(){
  
     $post = DB::table('posts')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->join('admins','admins.adminid','=','posts.post_admin_id')
        ->where('posts.public_visibility','=',1)
        ->orderBy('posts.postid', 'desc')
        ->paginate(10);

      $cat = DB::table('categories')->get();
    
      $lastWeek = DB::table('posts')
      ->whereBetween('post_created_at', 
          [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
      )
      ->where('posts.public_visibility','=',1)
      ->limit(6)->get()->reverse();


    return view('index',['posts'=>$post,'cat'=>$cat,'lastweek'=>$lastWeek]);

   }
}
