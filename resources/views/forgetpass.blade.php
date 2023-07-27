
<!DOCTYPE html>

<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>Forget Password ~ LaraBlogs</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="forget password page ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">

   <x-users.cssfiles />

</head>

<body>
 
<x-users.header />



<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <br>
        <font style="font-size:30px;margin-left:auto;">Enter your email & phone number for reset your password</font>
        <br>
        <br>
           
        <form method="POST" action="{{url('/')}}/change_pass">
                    @csrf
				<div class="form-group">
						<label for="email">Your Email Address (Required)</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>
                    <div class="form-group">
						<label for="phone">Your Phone Number(Required)</label>
						<input type="text" name="phone" id="phone" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary">Send Now</button>
				</form>
                <br>
<br>
        </div>
        <div class="col-3"></div>
        



   <x-users.footer />

   <x-users.jsfiles />

</body>

</html>