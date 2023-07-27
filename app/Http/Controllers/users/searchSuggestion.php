<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
// use App\Models\Posts;

class searchSuggestion extends Controller
{
   public function search(Request $request){
    if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('posts')
                ->where('pname', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;background-color:white;margin-left:auto;margin-right:auto;">';
            foreach($data as $row)
            {
                $output .= '
                <li><a class="dropdown-item" style="color:black;">'.$row->pname.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
   }   
}
