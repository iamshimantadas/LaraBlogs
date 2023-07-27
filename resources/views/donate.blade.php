
<!DOCTYPE html>

<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>LaraBlogs ~ donation page </title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="donation ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">
   <x-users.cssfiles />
   
  
</head>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<body>
   

<x-users.header />

   
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <br>
    <br>







@foreach($visitor as $visitor)
    <form>
        @csrf
    <input type="hidden" value="{{$visitorid}}"  name="userid" id="userid" required/>
    <input type="hidden" value="{{$blogid}}" name="blogid" id="blogid" required/>
  
  <div class="form-group">
    <label for="name">Enter Your Name</label>
    <input class="form-control" type="textbox" value="{{$visitor->name}}" name="name" id="name" placeholder="Enter your name which keeps donation record ... " required/>
  </div>
  <div class="form-group">
    <label for="email">Enter Your Email(primary)</label>
    <input class="form-control" type="textbox" value="{{$visitor->email}}" name="email" id="email" placeholder="Enter your valid email id.. " required/>
  </div>
  <div class="form-group">
    <label for="phone">Enter Your Phone</label>
    <input  class="form-control" type="textbox" value="{{$visitor->phone}}" name="phone" id="phone" placeholder="Enter phone number" required/>
  </div>
  <div class="form-group">
    <label for="amt">Enter Donation Amount (min: 5/~)</label>
    <input class="form-control" type="textbox"  value="5" name="amt" id="amt" placeholder="Enter amount .. " required/>
  </div>
  {{ csrf_field() }}
  <input type="button" name="btn" id="btn" value="Donate Now" onclick="pay_now()" class="btn btn-primary">
</form>
@endforeach


<br>
<br>

    </div>
    <div class="col-3"></div>
</div>

   
   <x-users.footer />

  <x-users.jsfiles />

</body>


<script>
    function pay_now(){
        var userid=jQuery('#userid').val();
        var blogid=jQuery('#blogid').val();
        var email=jQuery('#email').val();
        var phone=jQuery('#phone').val();
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();

        var _token = $('input[name="_token"]').val();
        
         jQuery.ajax({
               type:'post',
               url:"{{route('pay')}}",
               data: {amt: amt,name:name,userid:userid,blogid:blogid,email:email,phone:phone,_token:_token},
               success:function(result){
                   var options = {
                    // apply your own test key/prod key
                        "key": "rzp_test_6K4iMl",
                        // 1 rupee = 100 paise, so 50 rupee = 50*100 
                        "amount": amt*100, 
                        // INR currency indian.
                        "currency": "INR",
                        "name": "LaraBlogs(microcodes.in) ~ Shimanta Das",
                        "description": "donate for blogs",
                        "image": "https://microcodes.in/mc_logo/logo.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:"{{route('pay')}}",
                               data: {amt: amt,name:name,userid:userid,blogid:blogid,email:email,phone:phone,payment_id:response.razorpay_payment_id,_token:_token},
                               success:function(result){
                                   window.location.href="{{route('paysuccess')}}";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>

</html>



