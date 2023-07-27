<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    
<br>
<br>
<p class="text-center fs-3">Enter correct details for admin login!!</p>
<br>


    <!-- login form -->
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
      
        <form action="{{url('/')}}/admin_login_req" method="POST">
            @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" aria-describedby="emailHelp" required>
    @error('email')
    <span style="color:red;">{{$message}}</span>
    @enderror
</div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" required>
    @error('password')
    <span style="color:red;">{{$message}}</span>
    @enderror 
</div>
  <div class="mb-3">
    <label for="sec_string" class="form-label">Security String</label>
    <input type="text" class="form-control" name="sec_string" id="sec_string" value="{{old('sec_string')}}" required>
    @error('sec_string')
    <span style="color:red;">{{$message}}</span>
    @enderror 
</div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>

        </div>
        <div class="col-2"></div>
    </div>

</body>
<script src="bootstrap.min.js"></script>
</html>