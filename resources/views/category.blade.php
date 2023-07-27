
<!DOCTYPE html>
<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>Category Posts</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="categories ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">

   <x-users.cssfiles />

</head>

<body>
   
<x-users.header />


   <section class="section">
      <div class="container">
         <div class="row">
            <div class="col-lg-8  mb-5 mb-lg-0">

   
            @foreach($catpost as $catpost)
               <article class="row mb-5">
                  <div class="col-md-4 mb-4 mb-md-0">
                     <div class="post-slider slider-sm">
                        <img loading="lazy" src="img/{{$catpost->thumbimg}}" class="img-fluid" alt="post-thumb"
                           style="height:200px; object-fit: cover;">
                     </div>
                  </div>
                  <div class="col-md-8">
                     <h3 class="h5">
                        <font class="post-title">{{$catpost->pname}}</font>
                     </h3>
                     <ul class="list-inline post-meta mb-2">
                        <li class="list-inline-item"><i class="ti-user mr-2"></i> <font> {{$catpost->adminname}} </font>
                        </li>
                        <li class="list-inline-item">Date: {{$catpost->post_created_at}} </li>
                        <li class="list-inline-item">Categories : <font> {{$catpost->name}} </font>
                        </li>
                        <!-- <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!"
                              class="ml-1">Image </a>
                        </li> -->
                     </ul>
                     <p> <?php 
                      $new_string =  mb_strimwidth($catpost->thumbcontent, 0, 200, " ...... ");
                      echo $new_string;
                    ?> </p>
                     <form action="{{url('/')}}/post_view" method="get">
                        @csrf
                        <input type="hidden" name="catid" value="{{$catpost->category_id}}">
                        <input type="hidden" name="postid" value=" {{$catpost->postid}} " required>
                        <button class="btn btn-outline-primary">Continue Reading</button>
                     </form>
                     <!-- <a href="post-details-1.html" class="btn btn-outline-primary">Continue Reading</a> -->
                  </div>
               </article>
               @endforeach

            

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
                  <h5 class="widget-title"><span>Other Categories</span></h5>
                  <ul class="list-unstyled widget-list">
                   
                   
                   @foreach($othercat as $othercat)
                     <li>
                        <form action="{{url('/')}}/category_view" method="get">
                           @csrf
                           <input type="hidden" name="catid" id="catid" value="{{$othercat->id}}" required>
                           <button type="submit" class="d-flex"
                              style="background-color: white;border: 1px solid white;font-size: 16px;">{{$othercat->name}}</button>
                        </form>
                     </li>
                    @endforeach
                    
                    
                  </ul>
               </div>
              
               <!-- latest post -->
               <div class="widget">
                  <div>
                     <h4 class="fst-italic">Other's Posts</h4>
                     <ul class="list-unstyled">

            
                     @foreach($otherposts as $otherposts)
                        <li>
                           <font
                              class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                              <img src="img/{{$otherposts->thumbimg}}" class="bd-placeholder-img img-thumbnail" alt=""
                                 style="max-height: 100px;max-width: 250px;">
                              <br>
                              <div class="col-lg-8">
                                 <h6 class="mb-4">{{$otherposts->pname}}</h6>
                                 <small class="text-body-secondary"
                                    style="color: rgb(1, 1, 99);font-size: 13px;float: left;display: inline;"> {{date('d-m-Y', strtotime($otherposts->post_created_at)) }} </small>
                                 <small>
                                    <form action="{{url('/')}}/post_view" method="get"> @csrf
                                    <input type="hidden" name="catid" value="{{$otherposts->category_id}}">
                                        <input type="hidden" name="postid" value="{{$otherposts->postid}}"> 
                                        <input type="submit"
                                          value="Read More"
                                          style="float: right;border: white;color: blue;font-size: 13px;background-color: white;">
                                    </form>
                                 </small>
                              </div>
                           </font>
                        </li>
                        @endforeach
                     
                        

                     </ul>
                  </div>
               </div>
            </aside>
         </div>
      </div>
   </section>

   <!-- <footer class="section-sm pb-0 border-top border-default">
      <div class="container">
         <div class="row justify-content-between">
            <div class="col-md-3 mb-4">
               <a class="mb-4 d-block" href="index.html">
                  <img class="img-fluid" width="150px" src="images/logo.png" alt="LogBook">
               </a>
               <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                  labore et dolore magna aliquyam erat, sed diam voluptua.</p>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
               <h6 class="mb-4">Quick Links</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                  <li><a href="privacy-policy.html">Privacy Policy</a></li>
                  <li><a href="terms-conditions.html">Terms Conditions</a></li>
               </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
               <h6 class="mb-4">Social Links</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="#">facebook</a></li>
                  <li><a href="#">twitter</a></li>
                  <li><a href="#">linkedin</a></li>
                  <li><a href="#">github</a></li>
               </ul>
            </div>

            <div class="col-md-3 mb-4">
               <h6 class="mb-4">Subscribe Newsletter</h6>
               <form class="subscription" action="javascript:void(0)" method="post">
                  <div class="position-relative">
                     <i class="ti-email email-icon"></i>
                     <input type="email" class="form-control" placeholder="Your Email Address">
                  </div>
                  <button class="btn btn-primary btn-block rounded" type="submit">Subscribe now</button>
               </form>
            </div>
         </div>
         <div class="scroll-top">
            <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>
         </div>
         <div class="text-center">
            <p class="content">&copy; 2020 - Design &amp; Develop By <a href="https://themefisher.com/"
                  target="_blank">Themefisher</a></p>
         </div>
      </div>
   </footer> -->

   <x-users.footer />

<x-users.jsfiles />
  
</body>

</html>