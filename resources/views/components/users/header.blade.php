 <!--connection  -->
 <?php
$user = env('DB_USERNAME'); $pass = env('DB_PASSWORD'); $db = env('DB_DATABASE');
$host = "localhost";
$conn = mysqli_connect($host,$user,$pass,$db);

$sql = "SELECT * FROM categories WHERE navbar_show='1'";
$query = mysqli_query($conn,$sql);
?>
 
 
 <!-- navigation -->
 <header class="sticky-top bg-white border-bottom border-default">
      <div class="container">

         <nav class="navbar navbar-expand-lg navbar-white">
         <a class="navbar-brand" href="{{url('/')}}/">
               <img class="img-fluid" style="max-height:50px;max-width:150px;" src="images/logo.png" alt="LaraBlogs">
            </a>
            <!-- <font class="d-block navbar-brand" style="font-size:20px;"><font style="color:#cc0000;">Lara</font><font style="color:#0000b3;">Blogs</font></font> -->

            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
               <i class="ti-menu"></i>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
               <ul class="navbar-nav ml-auto">
                  <!-- <li class="nav-item dropdown">
                     <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        homepage <i class="ti-angle-down ml-1"></i>
                     </a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="index-full.html">Homepage Full Width</a>
                        <a class="dropdown-item" href="index-full-left.html">Homepage Full With Left Sidebar</a>
                        <a class="dropdown-item" href="index-full-right.html">Homepage Full With Right Sidebar</a>
                        <a class="dropdown-item" href="index-list.html">Homepage List Style</a>
                        <a class="dropdown-item" href="index-list-left.html">Homepage List With Left Sidebar</a>
                        <a class="dropdown-item" href="index-list-right.html">Homepage List With Right Sidebar</a>
                     </div>
                  </li> -->
                  <!-- <li class="nav-item">
                     <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.html">Contact</a>
                  </li> -->
                  <li class="nav-item">
                     <a class="nav-link" href="{{url('/')}}/">Home</a>
                  </li>

                  <?php while($row = mysqli_fetch_assoc($query)){ $id = $row['id']; $name = $row['name']; ?>
                  <li class="nav-item nav-link">
                     <form action="{{url('/')}}/category_view" method="get">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" value="<?php echo $id; ?>" name="catid">
                        <button style="background-color:white;border:white;"><?php echo $name; ?></button>
                     </form>
                  </li>
                     <?php } ?>

                     <li class="nav-item">
                     <a class="nav-link" href="{{url('/')}}/articlereq">Article Request</a>
                  </li>

               </ul>

               <!-- <select class="m-2 border-0" id="select-language">Hi! User
                  <option id="en" value="about/" selected></option>
                  <option id="fr" value="fr/about/">DashBoard</option>
               </select> -->
               <font class="m-2 border-0" style="font-size:17px;text-decoration:none;">
            @php
            if(session()->get('usermail')){ $fname = session()->get('username'); }
            else{ $fname = "login"; }
            @endphp
            <i class="bi bi-universal-access"></i> <b><a href="{{url('/')}}/login">@php echo $fname; @endphp</a></b>! 
            </font>

               <!-- search -->
               <!-- <div class="search px-4">
                  <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
                  <div class="search-wrapper">
                     <form action="" method="" class="h-100">
                        <input class="search-box pl-4" id="search-query" name="s" type="search"
                           placeholder="Type &amp; Hit Enter...">
                     </form>
                     <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
                  </div>
               </div> -->

            </div>
         </nav>
      </div>
   </header>
   <!-- /navigation -->

   <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
