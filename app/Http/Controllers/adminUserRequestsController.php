<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use DB;

class adminUserRequestsController extends Controller
{
    public function articles(Request $request){
        if(session('adminmail')){
            $article = DB::table('articles')->orderBy('articleid', 'DESC')->get();

           return view('admin/articles',['article'=>$article]);
        }
        else{
            return redirect('/admin');
        }
    }

    public function contacts(Request $request){
        if(session('adminmail')){
                 $contact = DB::table('contactus')->orderBy('tokenid', 'DESC')->get();
    
               return view('admin/contact',['contact'=>$contact]);
            }
            else{
                return redirect('/admin');
            }
    }

    public function letter(Request $request){
        if(session('adminmail')){
                $news = DB::table('newsletter')->orderBy('id', 'DESC')->get();
    
               return view('admin/newsletter',['letter'=>$news]);
            }
            else{
                return redirect('/admin');
            }
    }

    public function donations(Request $request){
        if(session('adminmail')){
            $donate = DB::table('payfulldetails')
            ->join('visitors','payfulldetails.userid','=','visitors.id')
            ->orderBy('payfulldetails.payid', 'DESC')->get();

           return view('admin/donation',['donate' => $donate]);
        }
        else{
            return redirect('/admin');
        }
    }

    public function serches(Request $request){
        if(session('adminmail')){
            $search = DB::table('searches')
            ->orderBy('id', 'DESC')->get();

           return view('admin/searches',['search' => $search]);
        }
        else{
            return redirect('/admin');
        }
    }

    public function logs(Request $request){
        if(session('adminmail')){
            $logs = DB::table('adminlog')
            ->orderBy('id', 'DESC')->get();

           return view('admin/logs',['logs' => $logs]);
        }
        else{
            return redirect('/admin');
        }
    }

}
