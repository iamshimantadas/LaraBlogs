<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminLoginController;
use App\Http\Controllers\adminPostController;
use App\Http\Controllers\ImageUpdateController;
use App\Http\Controllers\admin\searchSuggestionController;
use App\Http\Controllers\adminUserRequestsController;

// user's controller
use App\Http\Controllers\users\indexVideController;
use App\Http\Controllers\users\postViewController;
use App\Http\Controllers\users\categoryViewController;
use App\Http\Controllers\users\searchSuggestion;
use App\Http\Controllers\searchPostController;
use App\Http\Controllers\users\userLoginController;
use App\Http\Controllers\users\emailPhoneexistController;
use App\Http\Controllers\users\subscribeEmailController;
use App\Http\Controllers\users\postCommentController;
use App\Http\Controllers\users\donationController;


/** admin routes identification
 * 'admin_login_req' -> post admin login form data into '\admin\adminLoginController'
 * admin_logout -> helps to admin logout with session validate.
 * admin_add_new_category -> redirect to add category by admin view.
 * admin_add_new_category_req  ->  sends add category request from admin panel to db
 * admin_all_category -> view all categories
 * admin_category_update -> redirect into update category section
 * admin_category_update_req -> sends the category update request.
 * admin_category_delete  ->  redirect admin to delete category page
 * admin_category_delete_req -> sends delete request from admin to db
 * admin_newpost -> redirect to 'add new post' if session has
 * admin_newpost_req -> sends 'new post' record saves to database.
 */


// admin routes
Route::get('/admin',function(){
    if(session('adminmail')){
        return view('admin/dashboard');
    }else{
        return view('admin/login');
    }
});
Route::post('/admin_login_req',[adminLoginController::class,'auth']);
Route::get('/admin_logout',function(){
    if(session('adminmail')){
        session()->forget('adminmail');
        session()->flush();
        return view('admin/login');
    }else{
        return view('admin/login');
    }
});
Route::get('/admin_add_new_category',function(){
    if(session('adminmail')){
        return view('admin/addcategory');
    }else{
        return view('admin/login');
    }
});
Route::post('/admin_add_new_category_req',[adminLoginController::class,'addNewCategory']);
Route::get('/admin_all_category',[adminLoginController::class,'showall']);
Route::post('/admin_category_update',[adminLoginController::class,'cat_update']);
Route::post('/admin_category_update_req',[adminLoginController::class,'cat_update_req']);
Route::post('/admin_category_delete',[adminLoginController::class,'cat_delete']);
Route::post('/admin_category_delete_req',[adminLoginController::class,'cat_delete_req']);

Route::get('/admin_newpost',[adminPostController::class,'redirect']);
Route::post('/admin_newpost_req',[adminPostController::class,'save']);
Route::get('/admin_all_posts',[adminPostController::class,'allPosts']);
Route::post('/admin_post_update',[adminPostController::class,'getPost']);
Route::post('/admin_newpost_update',[adminPostController::class,'updatePost']);
Route::post('/admin_post_delete',[adminPostController::class,'deletePost']);
Route::post('/admin_post_delete_req',[adminPostController::class,'deletePost_req']);

Route::post('/admin_search_sugg',[searchSuggestionController::class,'search'])->name('adminsearchsuggestion');
Route::post('/admin_search_post',[adminPostController::class,'findEditPost']);
Route::get('/admin_post_name_exist',[adminPostController::class,'postNameExist'])->name('adminpostnameexist');

Route::get('/admin_user_article_req',[adminUserRequestsController::class,'articles']);
Route::get('/admin_user_contact_req',[adminUserRequestsController::class,'contacts']);
Route::get('/admin_user_newsletter_req',[adminUserRequestsController::class,'letter']);
Route::get('/admin_user_donations_req',[adminUserRequestsController::class,'donations']);
Route::get('/admin_user_searches_req',[adminUserRequestsController::class,'serches']);
Route::get('/admin_user_adminlogs_req',[adminUserRequestsController::class,'logs']);


/*
indexVideController -> controls index/homepage element's visibility
postViewController -> controls post's view from user's side
categoryViewController ->  controls posts as per categories
searchSuggestion -> helps to find search string
searchsuggestion/search_sugg -> helps to find reserve strings of post names via ajax
searchPostController  -> find posts by name
termsconditions -> shows terms and condition of this site.
userLoginController -> controls user's register and logins
emailPhoneexistController -> checks email,phone number existence
subscribeEmailController -> check email-id existence from database's table
subscribeEmailController -> saves user'semail into newsleter table
postCommentController -> controls post's commenbts
donationController -> controls donations by users/visitors
*/

// user/visitor routes...
Route::get('/',[indexVideController::class,'view']);
Route::get('/post_view',[postViewController::class,'show']);
Route::get('/category_view',[categoryViewController::class,'view']);
Route::post('/search_sugg',[searchSuggestion::class,'search'])->name('searchsuggestion');
Route::get('/search',[searchPostController::class,'find']);

Route::get('/login',[userLoginController::class,'auth']);
Route::get('/logout',function(){
    if(session()->get('usermail')){
        session()->forget('usermail');
        session()->flush();

        return redirect('/');

    }else{
        return redirect('/');
    }
});


Route::get('/user_registration',[userLoginController::class,'register']);
Route::get('/user_login',[userLoginController::class,'login']);
Route::get('/updateinfo',function(){
    if(session()->get('usermail')){
        return view('/user_dashboard/update');
    }else{
        return redirect('/login');
    }
});
Route::post('/updateinfo_req',[userLoginController::class,'updateInfo']);


Route::post('/emailexist',[emailPhoneexistController::class,'emailchek'])->name('checkemail');
Route::post('/phoneexist',[emailPhoneexistController::class,'phonecheck'])->name('checkphone');

Route::get('/termsconditions',function(){
    return view('termsconditions');
});
Route::get('/articlereq',function(){
    if(session()->get('usermail')){
        return view('articlereq');
    }else{
        return redirect('/login');
    }
});
Route::post('/article_publish_req',[userLoginController::class,'store']);
Route::get('/aboutus',function(){
    return view('about');
});
Route::get('/contactus',function(){
    return view('contactus');
});
Route::post('/contactus_req',[userLoginController::class,'contact']);

Route::post('/projectemailSubscribe_exist',[subscribeEmailController::class,'check'])->name('checkSubsEmail');
Route::post('/projectemailSubscribe',[subscribeEmailController::class,'save']);

Route::post('/post_comment_req',[postCommentController::class,'save']);

Route::post('/whatsappshare',[postViewController::class,'updateBtn'])->name('whatsappbutton');

Route::get('/forgetpass',function(){
    return view('forgetpass');
});
Route::post('/change_pass',[userLoginController::class,'resetPass']);
Route::get('/resetpass',function(){
    if(session()->get('resetPassReq')){
        return view('resetpass');
    }
    else{
       return redirect('/forgetpass');
    }
});
Route::post('/change_pass_req',[userLoginController::class,'resetPassReq'])->name('userpasswordReset');



Route::get('/donate',[donationController::class,'getRedirect']);
Route::post('/accept_pay',[donationController::class,'pay'])->name('pay');
Route::get('/pay_success',[donationController::class,'return'])->name('paysuccess');