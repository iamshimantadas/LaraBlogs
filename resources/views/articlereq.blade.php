<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Request</title>

	<meta name="description" content="article request page ~ LaraBlogs">
   <meta name="author" content="Shimanta Das">

    <x-users.cssfiles />

</head>
<body>

<?php
$userid = session()->get('userid');
?>

<x-users.header />

<section class="section-sm">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6">
				<div class="content mb-5">
					<h1 id="ask-us-anything-br-or-just-say-hi">Calling All Writers: Submit Your Article Request Now!</h1>
					<p>Ready to get your voice heard? Fill up our simple form, and we'll take it from there! Share your article request with us, and our team of editors will review it promptly. Once accepted, we'll notify you when your article goes live. Don't miss this opportunity to reach our engaged readership and make an impact with your words!
                    </p>
					<h4 class="mt-5">You can mail us!!</h4>
					<p><i class="ti-email mr-2 text-primary"></i><a href="mailto:shimanta@microcodes.in">shimanta@microcodes.in</a>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="{{url('/')}}/article_publish_req">
                    @csrf
                    <input type="hidden" name="userid" id="userid" value="{{$userid}}" required>
					<div class="form-group">
						<label for="name">Your Name (Required)</label>
						<input type="text" name="name" id="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="email">Your Email Address (Required)</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="message">Your Message Here</label>
						<textarea name="message" id="message" class="form-control" required></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Send Now</button>
				</form>
			</div>
		</div>
	</div>
</section>



</body>
<x-users.footer />

<x-users.jsfiles />
</html>