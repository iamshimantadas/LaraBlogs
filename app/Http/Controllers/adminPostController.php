<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use DB;

class adminPostController extends Controller
{
    public function redirect(Request $request){
        if(session('adminmail')){
            $cat = DB::table('categories')->get();

            // getting admin details
            $admin = DB::table('admins')->where('email','=',session('adminmail'))->get();

            return view('admin/posts',['cat'=>$cat,'admin'=>$admin]);
        
        }else{
            return view('admin/login');
        }
    }

    public function save(Request $request){
        if(session('adminmail')){
            
            $request->validate([
                'postname' => 'required',
                'postCategoryid' => 'required',
                'thumbcontent' => 'required',
                'file-upload1' => 'required|image',
                'thumbimgcap' => 'required',
                'bodycontent1' => 'required',
                'file-upload2' => 'required|image',
                'bodycontent1imgcap' => 'required',
                'bodycontent2' => 'required'
            ]);

                $postname =  $request['postname'];
                $postCategoryid  =  $request['postCategoryid'];
                $thumbcontent  =  $request['thumbcontent'];
                $file_upload1 =   $request['file-upload1'];
                $thumbimgcap =  $request['thumbimgcap'];
                $bodycontent1 =   $request['bodycontent1'];
                $file_upload2  =  $request['file-upload2'];
                $bodycontent1imgcap  =  $request['bodycontent1imgcap'];
                $bodycontent2  =  $request['bodycontent2'];
                $file_upload3  =  $request['file-upload3'];
                $bodycontent2imgcap  =  $request['bodycontent2imgcap'];
                $bodycontent3  =  $request['bodycontent3'];
                $file_upload4  =  $request['file-upload4'];
                $bodycontent3imgcap  =  $request['bodycontent3imgcap'];
                $bodycontent4  =  $request['bodycontent4'];
                $file_upload5  =  $request['file-upload5'];
                $bodycontent4imgcap  =  $request['bodycontent4imgcap'];
                $youtubevid  =  $request['youtubevid'];
                $postVisBility  =  $request['postVisBility'];
                $adminid  =  $request['adminid'];

                $post = new Posts;

                // saving record...
                $post->pname = $postname;
                $post->category_id = $postCategoryid;
                date_default_timezone_set("Asia/Kolkata");
                $post->time = date("h:i:sa");;
                $post->post_admin_id = $adminid;
                $post->thumbcontent = $thumbcontent;
                // storing thumbimg to public folder
                if($file_upload1){
                    $public_des_path='public/images';
                $fname = $request->file('file-upload1');
                $post->thumbimg =  $fname = $request->file('file-upload1')->store('');
                $request->file('file-upload1')->storeAs($public_des_path,$fname);
                $request->file('file-upload1')->move('img/',$fname);
                }
                

                $post->thumbimgcap = $thumbimgcap;
                $post->bodycontent1 = $bodycontent1;

                // storing thumbimg to public folder
                if($file_upload2){
                    $public_des_path='public/images';
                $fname = $request->file('file-upload2');
                $post->bodycontent1_img =  $fname = $request->file('file-upload2')->store('');
                $request->file('file-upload2')->storeAs($public_des_path,$fname);
                $request->file('file-upload2')->move('img/',$fname);

                }else{

                }
                
               

                $post->bodycontent1_img_cap = $bodycontent1imgcap;
                $post->bodycontent2 = $bodycontent2;

                 // storing thumbimg to public folder
                 if($file_upload3){
                    $public_des_path='public/images';
                 $fname = $request->file('file-upload3');
                 $post->bodycontent2_img =  $fname = $request->file('file-upload3')->store('');
                 $request->file('file-upload3')->storeAs($public_des_path,$fname);
                 $request->file('file-upload3')->move('img/',$fname);

                 }else{

                 }
                 
               
                $post->bodycontent2_img_cap = $bodycontent2imgcap;
                $post->bodycontent3 = $bodycontent3;

                // storing thumbimg to public folder
                if($file_upload4){
                    $public_des_path='public/images';
                $fname = $request->file('file-upload4');
                $post->bodycontent3_img =  $fname = $request->file('file-upload4')->store('');
                $request->file('file-upload4')->storeAs($public_des_path,$fname);
                $request->file('file-upload4')->move('img/',$fname);

                }else{

                }

                $post->bodycontent3_img_cap = $bodycontent3imgcap;
                $post->bodycontent4 = $bodycontent4;

                // storing thumbimg to public folder
                if($file_upload5){
                    $public_des_path='public/images';
                $fname = $request->file('file-upload5');
                $post->bodycontent4_img =  $fname = $request->file('file-upload5')->store('');
                $request->file('file-upload5')->storeAs($public_des_path,$fname);
                $request->file('file-upload5')->move('img/',$fname);

                }else{

                }
               
                
                
                $post->bodycontent4_img_cap = $bodycontent4imgcap;
                $post->youtubevideo = $youtubevid;
                $post->wpshare = 0;
               
                $post->public_visibility = $postVisBility;
                $post->save();
                
                return redirect('/admin');
                


        }else{
            return view('admin/login');
        }
    }

    public function allPosts(Request $request){
        if(session('adminmail')){
            

           $posts = DB::table('posts')
            ->join('categories', 'posts.category_id','=','categories.id')
            ->join('admins', 'admins.adminid', '=', 'posts.post_admin_id')
            ->get()->reverse();
        
            // $admin = DB::table('posts')->join('admins','posts.postid','=','admins.adminid')->get(['adminname']);

         return view('admin/allposts',['posts'=>$posts]);

        }else{
            return view('admin/login');
        }
    }

    public function getPost(Request $request){
        if(session('adminmail')){
            $request->validate([ 'postid' => 'required' ]);

       $postid = $request['postid'];

       $post = DB::table('posts')->where('postid','=',$postid)->get();
       $cat = DB::table('categories')->get();

       return view('admin/editpost',['post'=>$post,'cat' => $cat]);

        }else{
            return view('admin/login');
        }

      
    }

    public function updatePost(Request $request){
        if(session('adminmail')){
            
            $request->validate([
                'postname' => 'required',
                'postCategoryid' => 'required',
                'thumbcontent' => 'required',
                'thumbimgcap' => 'required',
                'bodycontent1' => 'required',
                'bodycontent1imgcap' => 'required',
                'bodycontent2' => 'required',
                'postid' => 'required'
            ]);


            // getting all input fields requests
            $postname =  $request['postname'];
            $postCategoryid  =  $request['postCategoryid'];
            $thumbcontent  =  $request['thumbcontent'];
            $file_upload1 =   $request['file-upload1'];
            $thumbimgcap =  $request['thumbimgcap'];
            $bodycontent1 =   $request['bodycontent1'];
            $file_upload2  =  $request['file-upload2'];
            $bodycontent1imgcap  =  $request['bodycontent1imgcap'];
            $bodycontent2  =  $request['bodycontent2'];
            $file_upload3  =  $request['file-upload3'];
            $bodycontent2imgcap  =  $request['bodycontent2imgcap'];
            $bodycontent3  =  $request['bodycontent3'];
            $file_upload4  =  $request['file-upload4'];
            $bodycontent3imgcap  =  $request['bodycontent3imgcap'];
            $bodycontent4  =  $request['bodycontent4'];
            $file_upload5  =  $request['file-upload5'];
            $bodycontent4imgcap  =  $request['bodycontent4imgcap'];
            $youtubevid  =  $request['youtubevid'];
            $postVisBility  =  $request['postVisBility'];
            $adminid  =  $request['adminid'];
            $postid  =  $request['postid'];
            
            

            $post = Posts::find($postid);


            // saving record...
            $post->pname = $postname;
            $post->category_id = $postCategoryid;
            date_default_timezone_set("Asia/Kolkata");
            $post->time = date("h:i:sa");;
            $post->post_admin_id = $adminid;
            $post->thumbcontent = $thumbcontent;
            // storing thumbimg to public folder
            if($file_upload1){
                $public_des_path='public/images';
            $fname = $request->file('file-upload1');
            $post->thumbimg =  $fname = $request->file('file-upload1')->store('');
            $request->file('file-upload1')->storeAs($public_des_path,$fname);
            $request->file('file-upload1')->move('img/',$fname);
            }
            

            $post->thumbimgcap = $thumbimgcap;
            $post->bodycontent1 = $bodycontent1;

            // storing thumbimg to public folder
            if($file_upload2){
                $public_des_path='public/images';
            $fname = $request->file('file-upload2');
            $post->bodycontent1_img =  $fname = $request->file('file-upload2')->store('');
            $request->file('file-upload2')->storeAs($public_des_path,$fname);
            $request->file('file-upload2')->move('img/',$fname);

            }else{

            }
            
           

            $post->bodycontent1_img_cap = $bodycontent1imgcap;
            $post->bodycontent2 = $bodycontent2;

             // storing thumbimg to public folder
             if($file_upload3){
                $public_des_path='public/images';
             $fname = $request->file('file-upload3');
             $post->bodycontent2_img =  $fname = $request->file('file-upload3')->store('');
             $request->file('file-upload3')->storeAs($public_des_path,$fname);
             $request->file('file-upload3')->move('img/',$fname);

             }else{

             }
             
           
            $post->bodycontent2_img_cap = $bodycontent2imgcap;
            $post->bodycontent3 = $bodycontent3;

            // storing thumbimg to public folder
            if($file_upload4){
                $public_des_path='public/images';
            $fname = $request->file('file-upload4');
            $post->bodycontent3_img =  $fname = $request->file('file-upload4')->store('');
            $request->file('file-upload4')->storeAs($public_des_path,$fname);
            $request->file('file-upload4')->move('img/',$fname);

            }else{

            }

            $post->bodycontent3_img_cap = $bodycontent3imgcap;
            $post->bodycontent4 = $bodycontent4;

            // storing thumbimg to public folder
            if($file_upload5){
                $public_des_path='public/images';
            $fname = $request->file('file-upload5');
            $post->bodycontent4_img =  $fname = $request->file('file-upload5')->store('');
            $request->file('file-upload5')->storeAs($public_des_path,$fname);
            $request->file('file-upload5')->move('img/',$fname);

            }else{

            }
           
            
            
            $post->bodycontent4_img_cap = $bodycontent4imgcap;
            $post->youtubevideo = $youtubevid;
            // $post->wpshare = 0;
            
            $post->public_visibility = $postVisBility;
            $post->save();
            
            return redirect('/admin');

        }else{
            return view('admin/login');
        }
    }

    public function deletePost(Request $request){
        if(session('adminmail')){
            // echo "<pre>";
            // print_r($request->all());
           
            $request->validate([ 'postid' => 'required' ]);
            $postid = $request['postid'];
            
            $post = DB::table('posts')->where('postid', '=',$postid)
            ->get();

            return view('admin/deletepost',['post'=>$post]);
        }else{
            return view('admin/login');
        }
    }

    public function deletePost_req(Request $request){
        if(session('adminmail')){
            
            $request->validate([ 'postid' => 'required']);

            $postid = $request['postid'];

            $post = Posts::find($postid);

            $post->delete();

            return redirect('/admin');

        }else{
            return view('admin/login');
        }
    }

    public function findEditPost(Request $request){
        if(session('adminmail')){
            $request->validate([ 'search_query' => 'required' ]);

       $search_query = $request['search_query'];

       $postNum = Posts::select('postid')->where('pname', 'like', '%'.$search_query.'%')
       ->get()->count();

       if($postNum == 0){
         return redirect('/admin');   
       }

       
       $postid = Posts::select('postid')->where('pname', 'like', '%'.$search_query.'%')
       ->first()->postid;

       

       $post = DB::table('posts')->where('postid','=',$postid)->get();
       $cat = DB::table('categories')->get();

       return view('admin/editpost',['post'=>$post,'cat' => $cat]);

        }else{
            return view('admin/login');
        }
    }

    public function postNameExist(Request $request){
        $name = $request['postname'];

        $num = DB::table('posts')
        ->where('pname', 'like', '%'.$name.'%')
        ->get()->count();

        if($num == 1){
            return "POST NAME EXIST";
        }
        else{
            // return "POST NAME NOT EXIST";
        }

    }

}
