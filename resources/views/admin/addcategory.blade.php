
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Admin Panel ~ add categories</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <x-cssfiles />

</head> 

<body class="app">   	
<x-header />

<div class="app-wrapper">
	    

		<!-- app content -->
		  <div class="app-content">
	
		 <br>
	
		  <div class="row">
			<div class="col-1"></div>
			<div class="col-10">
		
			<p class="text-center fs-4" style="color:black;"> Add New Category </p>
	
			<br>
			<br>
	
			<form action="{{url('/')}}/admin_add_new_category_req" method="POST">
				@csrf
	  <div class="mb-3">
		<label for="catgory_name" class="form-label" style="color:black;">Category Name</label>
		<input type="text" class="form-control" name="catgory_name" id="catgory_name" value="{{old('catgory_name')}}" aria-describedby="enter category name..." required>
	  </div>
	  <label for="navbar_show" style="color:black;">Navbar Visibility</label>
	  <select class="form-select" name="navbar_show" id="navbar_show" aria-label="show this category to navbar ?" required>
	  <option value="0" selected>No</option>
	  <option value="1">Yes</option>
	</select>
	<br>
	<br>
	  <button type="submit" class="btn btn-warning">Submit</button>
	</form>
		
		</div>
			<div class="col-1"></div>
		  </div>
		 
		  </div>
		
		
		
			<!-- end of custom app content -->
			<!--//app-content-->
			
	
	
	
	
	
			<footer class="app-footer">
				<div class="container text-center py-3">
					 <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
				<!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
					-->
				</div>
			</footer><!--//app-footer-->
			
		</div><!--//app-wrapper-->    		





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

