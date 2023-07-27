
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>All Categories ~ LaraBlogs</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <x-cssfiles />
 
  
</head> 

<body class="app">   	
<x-header />

<div class="app-wrapper">



	    
<div class="app-content">
  
  <br>

   <div class="row">
	 <div class="col-1"></div>
	 <div class="col-10">
	  
	 <!-- enter your form content -->
     <table class="table table-success">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Navbar Show</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cat as $cat)
    <tr>
      <td>{{$cat->name}}</td>
      <td><?php if($cat->navbar_show == 1){echo "Yes";}else{ echo "No"; } ?></td>
      <td> <form action="{{url('/')}}/admin_category_update" method="post">@csrf <input type="hidden" name="catid" id="catid" value="{{$cat->id}}" required> <input type="submit" value="Edit" class="btn btn-warning"></form> </td>
     <td> <form action="{{url('/')}}/admin_category_delete" method="post">@csrf <input type="hidden" name="catid" id="catid" value="{{$cat->id}}" required> <input type="submit" value="Delete" class="btn btn-danger" style="color:white;"></form> </td>
    </tr>
    @endforeach
  </tbody>
</table>

	 
 

 
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



