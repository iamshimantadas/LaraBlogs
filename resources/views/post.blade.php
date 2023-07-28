<!DOCTYPE html>


<html lang="en-us">

<head>
   <meta charset="utf-8">
 

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

   <!-- prints loop -->
   @foreach($post as $post)
   <title>{{$post->pname}}</title>

   <?php $postid = $post->postid; ?>
   <meta name="description" content="{{$post->pname}}">
   <meta name="author" content="Shimanta Das">

   <meta property="og:title" content="{{$post->pname}}" />
    <meta property="og:type" content="article" />
 <meta property="og:site_name" content="LaraBlogs"> 
 <meta property="og:image" content="img/{{$post->thumbimg}}" /> 
 <!-- generating full url -->
 <?php $fullURL = url()->full(); ?>
    <meta property="og:url" content="{{$fullURL}}" />
    <link rel="canonical" href="{{$fullURL}}" />
    <meta name="twitter:card" content="{{$post->pname}}">
 <meta name="twitter:site" content="LaraBlogs">
   <meta name="twitter:title" content="{{$post->pname}}">  
   <meta name="twitter:image" content="img/{{$post->thumbimg}}" /> 



   <x-users.cssfiles />

</head>

<!-- google ads -->
<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8447"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8447"
     data-ad-slot="5754947726"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->

<body>


<x-users.header />

   <section class="section">
      <div class="container">
         <div class="row">
            <div class="col-lg-8  mb-5 mb-lg-0">

           

            
                <article class="row mb-4">

                  <!-- thumb content -->
                    <div class="col-lg-10 mx-auto mb-4">
                        <h1 class="h2 mb-3">{{$post->pname}}</h1>
                        <ul class="list-inline post-meta mb-3">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i> <font> {{$post->adminname}} </font>
                            </li>
                            <li class="list-inline-item">Created At: {{date('d-m-Y h:i:sa', strtotime($post->post_created_at)) }}</li>
                            <li class="list-inline-item">Last Updated: {{date('d-m-Y h:i:sa', strtotime($post->post_updated_at)) }}</li>
                            
                            <li class="list-inline-item">Categories : <font> {{$post->name}} </font>
                            </li>
                            <!-- <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="col-12 mb-3">
                     <img src="img/{{$post->thumbimg}}" class="img-fluid" alt="post-thumb" style='margin-left:auto;margin-right:auto;'>
                     <font style="margin-left: 10px;">Image Credit: {{$post->thumbimgcap}} </font>
                    </div>
                    <font style='font-size: 30px;margin-left: 20px;margin-right: 10px;' class='text-start'>
                    <?php echo $post->thumbcontent; ?>
                    </font>
                        <!-- end of thumb content -->
                    
                    <br>

                    <!-- new section -->
                    <div class="row">
                     <img src="img/{{$post->bodycontent1_img}}" class="img-fluid" style='margin-left:auto;margin-right:auto;'>
                     <font style="margin-left: 20px;">Image Credit: <font>{{$post->bodycontent1_img_cap}}</font> </font>
                     <br>
                     <br>
                    </div>
                    <font style="font-size: 17px;margin-left: 20px;margin-right: 10px;" class="text-start">
                    <?php echo $post->bodycontent1; ?>   
                    </font>
                    <!-- end of new section -->

                    <br>

                    <!-- google ads -->
                    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-84947"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8417"
     data-ad-slot="5754947726"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->

                    <br>

                      <!-- new section -->
                      <div class="row">
                        <?php if($post->bodycontent2_img){ echo "<img src='img/".$post->bodycontent2_img."' class='img-fluid' style='margin-left:auto;margin-right:auto;' >"; } ?> 
                        <?php if($post->bodycontent2_img_cap){ echo '<font style="margin-left: 20px;">Image Credit: '.$post->bodycontent2_img_cap.' </font>'; } ?>  
                        <br>
                        <br>
                       </div>
                       <font style="font-size: 17px;margin-left: 20px;margin-right: 10px;" class="text-start">
                       <?php echo $post->bodycontent2; ?>
                    </font>
                       <!-- end of new section -->

                       <br>


                         <!-- new section -->
                    <div class="row">
                    <?php if($post->bodycontent3_img){ echo "<img src='img/".$post->bodycontent3_img."' class='img-fluid' style='margin-left:auto;margin-right:auto;' >"; } ?> 
                        <?php if($post->bodycontent3_img_cap){ echo '<font style="margin-left: 20px;">Image Credit: '.$post->bodycontent3_img_cap.' </font>'; } ?>  
                        <br>
                     <br>
                    </div>
                    <font style="font-size: 17px;margin-left: 20px;margin-right: 10px;" class="text-start">
                    <?php echo $post->bodycontent3; ?>   
                    </font>
                    <!-- end of new section -->


                    <br>

                    <!-- google ads -->
<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-846947"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8415947"
     data-ad-slot="575726"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->

<br>

                      <!-- new section -->
                      <div class="row">
                      <?php if($post->bodycontent4_img){ echo "<img src='img/".$post->bodycontent4_img."' class='img-fluid' style='margin-left:auto;margin-right:auto;' >"; } ?> 
                        <?php if($post->bodycontent4_img_cap){ echo '<font style="margin-left: 20px;">Image Credit: '.$post->bodycontent4_img_cap.' </font>'; } ?>  
                        
                        <br>
                        <br>
                       </div>
                       <font style="font-size: 17px;margin-left: 20px;margin-right: 10px;" class="text-start">
                        <?php echo $post->bodycontent4; ?>
                    </font>
                       <!-- end of new section -->

                      

                       <!-- 16:9 aspect ratio -->
                       <?php if($post->youtubevideo){
                        echo '<div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="'.$post->youtubevideo.'"></iframe>
                      </div>';
                       } ?>

 <?php if($post->youtubevideo){ echo ' <br><font style="font-size: 17px;">Video Credit: '.$post->youtubevideo.' </font>'; } ?>


 
                </article>
                @endforeach

                <?php  $userid = session()->get('userid');  ?>

                <div class="row">
                  
                <!-- donation form -->
                <!-- <form action="{{url('/')}}/donate" method="GET">
                     @csrf
                     <input type="hidden" name="blogid" id="blogid" value="{{$postid}}" required>
                     <input type="hidden" name="visitorid" id="visitorid" value="{{$userid}}">
                      <button style="margin-left: auto;margin-right: auto;font-size: 20px;" class="btn btn-dark" type="submit">
                      <i class="bi bi-currency-rupee"></i> Donate Me</button>
                     </form> -->
                  
                  <button name="whatsAppShareBtn" id="whatsAppShareBtn" style="margin-left: auto;margin-right: auto;font-size: 20px;" class="btn btn-success" onclick="openWhatsApp()"><i class="bi bi-whatsapp"></i> Share to WhatsApp</button>
                  {{ csrf_field() }}
                 <script>  
                     //user-defined function to open and share web content on WhatsApp  
                     function openWhatsApp() {  
                         window.open('whatsapp://send?text= {{$fullURL}}');  
                         }  
                     </script> 

                  
               </div>  



               <br>


               <!-- post comment area -->
               <div class="row">
               <font style="font-size: 20px;color: black;margin-left: auto;margin-right: auto;">Recent Comments</font>
               </div>

               <br>
               <br>

               <div class="row">
                 <div class="col-1"></div>
                 <div class="col-10">

                 <p>
                 @foreach($comment as $comment)
                 <font style="font-size:15px;"><b>{{$comment->name}}</b> says,</font>
                  <small>{{$comment->date}}</small>
                  <br>
                  {{$comment->msg}}
                   <br>      
                  @endforeach
               </p>


                 <?php  $userid = session()->get('userid');  ?>

                  <!-- comment form -->
                  <form action="{{url('/')}}/post_comment_req" method="post">
                     @csrf
                     <input type="hidden" name="postid" id="postid" value="{{$postid}}" required>
                     <input type="hidden" name="visitorid" id="visitorid" value="{{$userid}}" required>
                     
                     <div class="mb-3">
                        <label for="fname" class="form-label">Full Name</label>
                        <input type="text" placeholder="Enter your full name ..." class="form-control" name="fname" id="fname" required>
                      </div>
                     <div class="mb-3">
                        <label for="commentbox" class="form-label">Example textarea</label>
                        <textarea class="form-control" name="commentbox" id="commentbox" rows="6" style="max-width: auto;" required></textarea>
                      </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
                   <!--  end of commment form -->

                 </div>
                 <div class="col-1"></div>
               </div>

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
                     <h4 class="fst-italic">Related Posts</h4>
                     <ul class="list-unstyled">

                    
                     @foreach($other as $other)
                        <li>
                           <font
                              class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                              <img src="img/{{$other->thumbimg}}" class="bd-placeholder-img img-thumbnail" alt=""
                                 style="max-height: 100px;max-width: 150px;">
                              <br>
                              <div class="col-lg-8">
                                 <h6 class="mb-4">{{$other->pname}}</h6>
                                 <small class="text-body-secondary"
                                    style="color: rgb(1, 1, 99);font-size: 13px;float: left;display: inline;">Date: {{date('d-m-Y', strtotime($other->post_created_at)) }}</small>
                                 <small>
                                    <form action="{{url('/')}}/post_view" method="get">
                                        <input type="hidden" name="postid" value="{{$other->postid}}">
                                        <input type="hidden" name="catid" value="{{$other->category_id}}">
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

   

   <x-users.footer />

<x-users.jsfiles />

</body>

<script>
   $(document).ready(function(e){
      $('#whatsAppShareBtn').click(function(e){
         e.preventDefault();
         console.log('whatsapp button clicked!');
         
         var postid = $('#postid').val();
         var _token = $('input[name="_token"]').val();

         console.log(postid);

         $.ajax({
            url:"{{route('whatsappbutton')}}",
            method:"POST",
            data: { postid:postid,_token:_token },
            success:function(data){
               if(data){
                  console.log(data);
               }else{
                  console.log(data);
               }
            }
         });


      });
   });
</script>


</html>