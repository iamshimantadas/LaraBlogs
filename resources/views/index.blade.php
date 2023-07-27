
<!DOCTYPE html>

<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>LaraBlogs ~ explore programming ...</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="index ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">

   <x-users.cssfiles />
   
  
</head>

<body>
   

<x-users.header />

   <section class="section">
      <div class="container">
         <div class="row">
            <div class="col-lg-8  mb-5 mb-lg-0">


            @foreach($posts as $post)
               <article class="row mb-5">
                  <div class="col-md-4 mb-4 mb-md-0">
                     <div class="post-slider slider-sm">
                        <img loading="lazy" src="img/{{$post->thumbimg}}" class="img-fluid" alt="post-thumb"
                           style="height:200px; object-fit: cover;">
                     </div>
                  </div>
                  <div class="col-md-8">
                     <h3 class="h5">
                        <font class="post-title"> {{$post->pname}} </font>
                     </h3>
                     <ul class="list-inline post-meta mb-2">
                        <li class="list-inline-item"><i class="ti-user mr-2"></i> <font> {{$post->adminname}} </font>
                        </li>
                        <li class="list-inline-item">Date: {{date('d-m-Y h:i:sa', strtotime($post->post_created_at)) }}</li>
                        <li class="list-inline-item">Categories : <font> {{$post->name}} </font>
                        </li>
                     </ul>
                     <p> 
                     <?php 
                      $arr = str_split($post->thumbcontent);
                    for($i = 0; $i < 250; $i++) {
                        print($arr[$i]);
                    } echo ' .........';
                    ?>  
                  </p>
                  <form action="{{url('/')}}/post_view" method="get">
                        @csrf
                        <input type="hidden" name="postid" value="{{$post->postid}}" required>
                        <input type="hidden" name="catid" value="{{$post->category_id}}">
                        <button class="btn btn-outline-primary">Continue Reading</button>
                     </form>
                     <!-- <a href="post-details-1.html" class="btn btn-outline-primary">Continue Reading</a> -->
                  </div>
               </article>
               @endforeach

               

              <!-- pagination buttons  -->
              <div class="row">
                  <a href="{{$posts->previousPageUrl()}}" style="margin-left: auto;margin-right:auto;"><button class="btn btn-outline-dark">Previous Page</button></a>
                  <button class="btn btn-primary" style="margin-left: auto;margin-right:auto;">{{$posts->currentPage()}}</button>
                  <a href="{{$posts->nextPageUrl()}}" style="margin-left: auto;margin-right:auto;"> <button class="btn btn-outline-dark" >Next Page</button> </a>
               </div>
               <!-- end of pagination -->


            </div>
            <aside class="col-lg-4">


               <!-- Search -->
               <div class="widget">
                  <h5 class="widget-title"><span>Search</span></h5>
                  <form action="{{url('/')}}/search" method="get" class="widget-search">
                     @csrf
                     <input id="search_query" name="search_query" type="search" placeholder="Type &amp; Hit Enter...">
                     <div id="search_results"></div>
                     {{ csrf_field() }}
                     <button type="submit"><i class="ti-search"></i>
                     </button>
                  </form>
               </div>
               <script>
$(document).ready(function(){
 
    $('#search_query').keyup(function(){ 
        var query = $(this).val(); 
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('searchsuggestion') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                  console.log("string found!");
                $('#search_results').fadeIn();  
                    $('#search_results').html(data);
                }
            });
        }
    });
 
    $(document).on('click', 'li', function(){  
        $('#search_query').val($(this).text());  
        $('#search_results').fadeOut();  
    });  
 
});
</script>
   <!-- end of search -->

               <!-- categories -->
               <div class="widget">
                  <h5 class="widget-title"><span>Categories</span></h5>
                  <ul class="list-unstyled widget-list">
                     
                  @foreach($cat as $cat)
                     <li>
                        <form action="{{url('/')}}/category_view" method="get">
                           @csrf
                           <input type="hidden" name="catid" id="catid" value="{{$cat->id}}" required>
                           <button type="submit" class="d-flex"
                              style="background-color: white;border: 1px solid white;font-size: 16px;">{{$cat->name}}</button>
                        </form>
                     </li>
                    @endforeach
                     
                  </ul>
               </div>
               
               <!-- latest post -->
               <div class="widget">
                  <div>
                     <h4 class="fst-italic">Last Week</h4>
                     <ul class="list-unstyled">
                       
                         
                        @foreach($lastweek as $lastweek)
                        <li>
                           <font
                              class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                              <img src="img/{{$lastweek->thumbimg}}" class="bd-placeholder-img img-thumbnail" alt=""
                                 style="max-height: 150px;max-width: 100px;">
                              <br>
                              <div class="col-lg-8">
                                 <h6 class="mb-4">{{$lastweek->pname}}</h6>
                                 <small class="text-body-secondary"
                                    style="color: rgb(1, 1, 99);font-size: 13px;float: left;display: inline;">{{date('d-m-Y h:i:sa', strtotime($lastweek->post_created_at)) }}</small>
                                 <small>
                                    <form action="{{url('/')}}/post_view" method="get"> 
                                       <input type="hidden" value="{{$lastweek->postid}}" name="postid"> 
                                       <input type="hidden" name="catid" value="{{$lastweek->category_id}}">
                                    <input type="submit"
                                          value="Read More"
                                          style="float: right;border: white;color: blue;font-size: 13px;background-color: white;">
                                    </form>
                                 </small>
                              </div>
                           </font>
                        </li>
                        @endforeach


                        <!-- <li>
                           <font
                              class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                              <img src="images/post/post-6.jpg" class="bd-placeholder-img img-thumbnail" alt=""
                                 style="max-height: 200px;max-width: 200px;">
                              <br>
                              <div class="col-lg-8">
                                 <h6 class="mb-4">Elements That You Can Use To Create A New Post On This Template.</h6>
                                 <small class="text-body-secondary"
                                    style="color: rgb(1, 1, 99);font-size: 13px;float: left;display: inline;">January
                                    13, 2023</small>
                                 <small>
                                    <form action="" method=""> <input type="hidden" name=""> <input type="submit"
                                          value="Read More"
                                          style="float: right;border: white;color: blue;font-size: 13px;background-color: white;">
                                    </form>
                                 </small>
                              </div>
                           </font>
                        </li> -->

                        <!-- <li>
                           <font
                              class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                              <img src="images/post/post-6.jpg" class="bd-placeholder-img img-thumbnail" alt=""
                                 style="max-height: 200px;max-width: 200px;">
                              <br>
                              <div class="col-lg-8">
                                 <h6 class="mb-4">Elements That You Can Use To Create A New Post On This Template.</h6>
                                 <small class="text-body-secondary"
                                    style="color: rgb(1, 1, 99);font-size: 13px;float: left;display: inline;">January
                                    13, 2023</small>
                                 <small>
                                    <form action="" method=""> <input type="hidden" name=""> <input type="submit"
                                          value="Read More"
                                          style="float: right;border: white;color: blue;font-size: 13px;background-color: white;">
                                    </form>
                                 </small>
                              </div>
                           </font>
                        </li> -->

                     </ul>
                  </div>
               </div>
            </aside>
         </div>
      </div>
   </section>

   
   <x-users.footer />

  <x-users.jsfiles />

</body>

</html>