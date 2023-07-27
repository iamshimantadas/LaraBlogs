
<!DOCTYPE html>

<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>contact us ~ LaraBlogs</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="contact us page ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">


   <x-users.cssfiles />

</head>

<body>
 
<x-users.header />


<section class="section-sm">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6">
				<div class="content mb-5">
					<h1 id="ask-us-anything-br-or-just-say-hi">Drop your message <br> To us,</h1>
					<p>If you have any query for us, then please fill te form 
					<h4 class="mt-5">Hate Forms? Write Us Email</h4>
					<p><i class="ti-email mr-2 text-primary"></i><a href="mailto:shimanta@microcodes.in">shimanta@microcodes.in</a>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="{{url('/')}}/contactus_req">
                    @csrf
					<div class="form-group">
						<label for="name">Your Name (Required)</label>
						<input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Enter your full name" class="form-control" required>
						@error('name')
						<span style="color:red;">{{$message}}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="email">Your Email Address (Required)</label>
						<input type="email" name="email" id="email" value="{{old('email')}}" placeholder="Enter your valid email address" class="form-control" required>
						@error('email')
						<span style="color:red;">{{$message}}</span>
						@enderror
					</div>
                    <div class="form-group">
						<label for="phone">Your Phone Number</label>
						<input type="text" name="phone" id="phone" value="{{old('phone')}}" placeholder="Enter your phone number" class="form-control">
					</div>
					<div class="form-group">
						<label for="message">Your Message Here</label>
						<textarea name="message" id="message" value="{{old('message')}}" placeholder="What's your message for us, please let us know in detail... " class="form-control"></textarea>
						@error('message')
						<span style="color:red;">{{$message}}</span>
						@enderror
					</div>
					<button type="submit" class="btn btn-primary">Send Now</button>
				</form>
			</div>
		</div>
	</div>
</section>

   <x-users.footer />

   <x-users.jsfiles />

</body>

</html>