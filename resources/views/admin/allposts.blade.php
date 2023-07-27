
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>All Posts ~ LaraBlogs</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <x-cssfiles />
 
   <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</head> 

<body class="app">   	
<x-header />

<div class="app-wrapper">



	    
<div class="app-content">
  
  <br>

   <div class="row">
	 <div class="col-1"></div>
	 <div class="col-10">

   <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
    <form class="d-flex" action="{{url('/')}}/admin_search_post" method="post">
      @csrf
        <input class="form-control me-2" id="search_query" name="search_query" type="search" placeholder="Search" aria-label="Search">
        
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <div id="search_results"></div>
                     {{ csrf_field() }}
    </div>
    <div class="col-2"></div>
   </div>

   <br>
   <br>
	  
	 <!-- enter your form content -->
     <table class="table table-light">
  <thead>
    <tr>
      <!-- <th scope="col">ID</th> -->
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Visibility</th>
      <th scope="col">Post By</th>
      <th scope="col">Last Updated</th>
      <th scope="col">Created</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
   @foreach($posts as $post)
    <tr>
      <td>{{$post->pname}}</td>
      <td>{{$post->name}}</td>
      <td><?php if($post->public_visibility==1){echo "Public";}else{echo "Draft";} ?></td>
      <td>{{$post->adminname}}</td>
      <td>{{ date("d/m/Y", $post->updated_at) }}</td>
      <td>{{ date("d/m/Y", $post->created_at) }}</td>
      <td> <span><form action="{{url('/')}}/admin_post_update" method="post">@csrf <input type="hidden" name="postid" id="postid" value="{{$post->postid}}" required> <input type="submit" value="Edit" class="btn btn-warning" style="color:black;"></form></span></td>
    <td><span><form action="{{url('/')}}/admin_post_delete" method="post">@csrf <input type="hidden" name="postid" id="postid" value="{{$post->postid}}" required> <input type="submit" value="Delete" class="btn btn-danger" style="color:black;"></form></span></td>
    
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

<script>
$(document).ready(function(){
 
    $('#search_query').keyup(function(){ 
        var query = $(this).val(); 
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('adminsearchsuggestion') }}",
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

</html> 





