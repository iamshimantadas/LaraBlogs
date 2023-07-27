
<!DOCTYPE html>

<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>Reset Password ~ LaraBlogs</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="reset password gateway ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">

   <x-users.cssfiles />

</head>

<body>
 
<x-users.header />



<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <br>
        <font style="font-size:30px;margin-left:auto;">Enter Both Passwords(same)</font>
        <br>
        <br>
           
        <form action="{{url('/')}}/change_pass_req" method="post" id="myForm">
                    @csrf
                    <input type="hidden" value="{{$userid}}" name="userid" id="userid" required>
				<div class="form-group">
						<label for="password1">Enter Password</label>
						<input type="text" name="password1" id="password1" placeholder="Enter your password" class="form-control" required>
					</div>
                    <div class="form-group">
						<label for="password2">Enter Password(again)</label>
						<input type="text" name="password2" id="password2" placeholder="Enter your password again!! " class="form-control" required>
					</div>
                    {{ csrf_field() }}
					<button type="submit" id="submitBtn" class="btn btn-primary">Send Now</button>
				</form>
                <br>
<br>
        </div>
        <div class="col-3"></div>
        



   <x-users.footer />

   <x-users.jsfiles />

</body>

<script>
    $(document).ready(function(){
        $('#submitBtn').click(function(){
           var pass1 = $('#password1').val();
           var pass2 = $('#password2').val();
           var userid = $('#userid').val();
           

           var _token = $('input[name="_token"]').val();

           if(pass1 == pass2){
            // $.ajax({
            //     url:"{{ route('userpasswordReset') }}",
            //     method:"POST",
            //     data:{password1:pass1,password2:pass2,userid:userid,_token:_token},
            //     success:function(data){
            //         alert('data');
            //     }
            // });
           }
           else{
            alert("BOTH PASSWORD NOT MATCHED!");
            document.getElementById("myForm").reset();

           }

        });
    });
</script>

</html>

