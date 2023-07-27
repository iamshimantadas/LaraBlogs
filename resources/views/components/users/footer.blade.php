<footer class="section-sm pb-0 border-top border-default">
      <div class="container">
         <div class="row justify-content-between">
            <div class="col-md-3 mb-4">
            <a class="mb-4 d-block" href="{{url('/')}}/">
                  <img class="img-fluid" style="max-height:50px;max-width:150px;" src="images/logo.png" alt="LogBook">
               </a>
               <!-- <font class="d-block" style="font-size:30px;"><font style="color:#cc0000;">Lara</font><font style="color:#0000b3;">Blogs</font></font> -->
               <p>LaraBlogs: Tech, Programming, Movies & Laravel Love! 🚀 Discover, learn, and be inspired!</p>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
               <h6 class="mb-4">Quick Links</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="{{url('/')}}/aboutus">About</a></li>
                  <li><a href="{{url('/')}}/contactus">Contact</a></li>
                  <!-- <li><a href="privacy-policy.html">Privacy Policy</a></li> -->
                  <li><a href="{{url('/')}}/termsconditions">Terms Conditions</a></li>
               </ul>
            </div>
            
            <div class="col-lg-2 col-md-3 col-6 mb-4">
               <h6 class="mb-4">Social Links</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="https://www.facebook.com/profile.php?id=100078406112813">facebook</a></li>
                  <li><a href="https://twitter.com/Shimantadas247">twitter</a></li>
                  <li><a href="https://www.linkedin.com/in/shimanta-das-497167223/">linkedin</a></li>
                  <li><a href="https://github.com/iamshimantadas?tab=repositories">github</a></li>
                  <li><a href="https://www.youtube.com/@microcodes6887/videos">YouTube</a></li>
               </ul>
            </div>

            <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


            <div class="col-md-3 mb-4">
               <h6 class="mb-4">Subscribe Newsletter</h6>
               <form class="subscription" action="{{url('/')}}/projectemailSubscribe" method="post">
                  @csrf
                  <div class="position-relative">
                     <i class="ti-email email-icon"></i>
                     <input type="email" name="subscribeemailname" id="subscribeemailname" class="form-control" placeholder="Your Email Address" required>
                     {{ csrf_field() }}
                  </div>
                  <button class="btn btn-primary btn-block rounded" name="subsEmailBtn" id="subsEmailBtn" type="submit">Subscribe now</button>
               </form>
            </div>
         </div>
         <div class="scroll-top">
            <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>
         </div>
         <div class="text-center">
            <p class="content">© 2022 -<?php echo date("Y");?> - Made <font color="red">❤</font> Laravel MVC - Theme Credit: <a href="https://themefisher.com/products/logbook"
                  target="_blank">Themefisher</a></p>
         </div>
      </div>
   </footer>


   <!-- <script>
      $(document).ready(function(){
         $('#subsEmailBtn').click(function(){
            var mail = $('#subscribeemailname').val();
            var _token = $('input[name="_token"]').val();

            console.log(mail);
            $.ajax({
               url:"{{route('checkSubsEmail')}}",
               method:"POST",
               data:{ email:mail,  _token:_token},
               success:function(data){
                  console.log(data);
                  // if(data){
                  //    alert(data);
                  // }else{

                  // }
                  alert(data);
               }
            });
         });
      });
   </script> -->