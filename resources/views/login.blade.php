<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="login & registration ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>



    <title>Login & Registration Form</title> 

    <style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #4070f4;
}

.container{
    position: relative;
    max-width: 430px;
    width: 100%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 0 20px;
}

.container .forms{
    display: flex;
    align-items: center;
    height: 440px;
    width: 200%;
    transition: height 0.2s ease;
}


.container .form{
    width: 50%;
    padding: 30px;
    background-color: #fff;
    transition: margin-left 0.18s ease;
}

.container.active .login{
    margin-left: -50%;
    opacity: 0;
    transition: margin-left 0.18s ease, opacity 0.15s ease;
}

.container .signup{
    opacity: 0;
    transition: opacity 0.09s ease;
}
.container.active .signup{
    opacity: 1;
    transition: opacity 0.2s ease;
}

.container.active .forms{
    height: 600px;
}
.container .form .title{
    position: relative;
    font-size: 27px;
    font-weight: 600;
}

.form .title::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    background-color: #4070f4;
    border-radius: 25px;
}

.form .input-field{
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 30px;
}

.input-field input{
    position: absolute;
    height: 100%;
    width: 100%;
    padding: 0 35px;
    border: none;
    outline: none;
    font-size: 16px;
    border-bottom: 2px solid #ccc;
    border-top: 2px solid transparent;
    transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid){
    border-bottom-color: #4070f4;
}

.input-field i{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
    transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid) ~ i{
    color: #4070f4;
}

.input-field i.icon{
    left: 0;
}
.input-field i.showHidePw{
    right: 0;
    cursor: pointer;
    padding: 10px;
}

.form .checkbox-text{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
}

.checkbox-text .checkbox-content{
    display: flex;
    align-items: center;
}

.checkbox-content input{
    margin-right: 10px;
    accent-color: #4070f4;
}

.form .text{
    color: #333;
    font-size: 14px;
}

.form a.text{
    color: #4070f4;
    text-decoration: none;
}
.form a:hover{
    text-decoration: underline;
}

.form .button{
    margin-top: 35px;
}

.form .button input{
    border: none;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    letter-spacing: 1px;
    border-radius: 6px;
    background-color: #4070f4;
    cursor: pointer;
    transition: all 0.3s ease;
}

.button input:hover{
    background-color: #265df2;
}

.form .login-signup{
    margin-top: 30px;
    text-align: center;
}
    </style>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="{{url('/')}}/user_login" action="get">
                    @csrf
                    <div class="input-field">
                        <input type="text" name="uemail"  placeholder="Enter your email" required>
                        @error('uemail')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                        <i class="bi bi-envelope-at-fill"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="upassword" class="password"  placeholder="Enter your password" required>
                        @error('upassword')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                        <i class="bi bi-pass-fill"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    

                    <div class="checkbox-text" >
                        <div class="checkbox-content" style="display:none;">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="{{url('/')}}/forgetpass" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form action="{{url('/')}}/user_registration" method="get">
                    @csrf
                    <div class="input-field">
                        <input type="text" name="name" value="{{old('name')}}" placeholder="Enter your name" required>
                        @error('name')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" id="email" value="{{old('email')}}" placeholder="Enter your email" required>
                        {{ csrf_field() }}
                        @error('email')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                        <i class="bi bi-envelope-at-fill"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" value="{{old('password')}}" placeholder="Create a password" required>
                        @error('password')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                        <i class="bi bi-pass-fill"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="phone" id="phone" class="text" value="{{old('phone')}}" placeholder="Enter your phone number" required>
                        {{ csrf_field() }}
                        @error('phone')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                        <i class="bi bi-phone"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" name="termCon" id="termCon" required>
                            @error('termCon')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                            <label for="termCon" class="text">I accepted all <a href="{{url('/')}}/termsconditions">terms and conditions</a></label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" id="Signup" value="Signup">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="{{url('/')}}/login" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

     
</body>
<script>
    const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });
</script>

<script>
    $(document).ready(function(){
        let email,ph;
        
        $('#email').blur(function(){
            let email = $('#email').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('checkemail')}}",
        method:"POST",
        data: {email: email, _token:_token},
        success:function(data){
                if(data){
                    alert('This email id already exist!! Please provide your another email-id');
                }else{
                    console.log('email not exist!!');
                }
              }
            });

        });
        
        
        $('#phone').blur(function(){
            let ph = $('#phone').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('checkphone')}}",
        method:"POST",
        data: {phone: ph, _token:_token},
        success:function(data){
                if(data){
                    alert('This Phone Number already exist!! Please provide your another!! ');
                }else{
                    console.log('phone number not exist!!');
                }
              }
            });

        });

    });
</script>

</html>