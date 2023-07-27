
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Admin Panel ~ Delete Category</title>
    
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
     <div class="app-wrapper">
	    

        <!-- app content -->
          <div class="app-content">
    
         <br>
    
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
        
            <p class="text-center fs-4" style="color:black;">Are you sure to delate this category, posts related to it would not work properly... </p>
    
            <br>
            <br>
    
            <form action="{{url('/')}}/admin_category_delete_req" method="POST">
                @csrf
                <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Creation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cat as $cat)
    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>{{$cat->datetime}}</td>
      <td> <input type="hidden" value="{{$cat->id}}" name="deletecatid" id="deletecatid" required> <button class="btn btn-danger" type="submit" style="color:white;">delete category</button> </td>
    </tr>
    @endforeach
  </tbody>
</table>
     
    <br>
    <br>
      <!-- <button type="submit" class="btn btn-warning">Submit</button> -->
    </form>
        
        </div>
            <div class="col-1"></div>
          </div>
         
          </div>
        
        
        
            <!-- end of custom app content -->
            <!--//app-content-->
 
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







