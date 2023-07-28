
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Edit Post</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

   <x-cssfiles />

   <style>
    .image-preview-container {
    width: 50%;
    margin: 0 auto;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 3rem;
    border-radius: 20px;
}

.image-preview-container img {
    width: 100%;
    display: none;
    margin-bottom: 30px;
}
.image-preview-container input {
    display: none;
}

.image-preview-container label {
    display: block;
    width: 45%;
    height: 45px;
    margin-left: 25%;
    text-align: center;
    background: #8338ec;
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
   </style>
</head> 

<body class="app">   	
<x-header />

<div class="app-wrapper">



	    
<div class="app-content">
  
  <br>

   <div class="row">
	 <div class="col-1"></div>
	 <div class="col-10">
	  <p class="text-center fs-4">Edit Post</p>
    <br>

    @foreach($post as $post)
	 <!-- enter your form content -->
	 <form action="{{url('/')}}/admin_newpost_update" enctype="multipart/form-data" method="post">
    @csrf
<div class="mb-3">
    <label for="postname" class="form-label" style="color:black;">Post's Name (Title)</label><span style='color:red;font-size:20px;'>&#42;</span>
    <input type="text" class="form-control" name="postname" id="postname" value="{{$post->pname}}" aria-describedby="enter post's name... " required>
    @error('postname')
  <span style='color:red;'>{{$message}}</span>
  @enderror
  </div>
  <label for="postCategoryid" class="form-label" style="color:black;">Choose Category</label><span style='color:red;font-size:20px;'>&#42;</span>
  <select class="form-select" name="postCategoryid" id="postCategoryid" value="{{$post->category_id}}" aria-label="Choose post's category" required>
 @foreach($cat as $cat)
 <option value="{{$cat->id}}" <?php if($post->category_id == $cat->id){ echo "selected";} ?>  >{{$cat->name}}</option>
   @endforeach
</select>
@error('postCategoryid')
  <span style='color:red;'>{{$message}}</span>
  @enderror
<br>


<!-- thumbnail image area -->
<div class="mb-3">
  <label for="thumbcontent" style="color:black;" class="form-label">Enter Thumb Content</label><span style='color:red;font-size:20px;'>&#42;</span>
  <br>
  <!-- setting hidden input field for textarea -->
  <input type="hidden" id="thumbcontentjQueryVal" value="{{$post->thumbcontent}}">
  <!-- <textarea name="thumbcontent" id="thumbcontent" cols="30" rows="10" required></textarea>
  @error('thumbcontent')
  <span style='color:red;'>{{$message}}</span>
  @enderror -->
  <textarea style="width:100%;resize: vertical;padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;" name="thumbcontent"  rows="10" required></textarea>
  <!-- <input name="thumbcontent" class="form-control" type="text"> -->
  @error('thumbcontent')
  <span style='color:red;'>{{$message}}</span>
  @enderror

</div>

<div class="mb-3">
  <label for="file-upload1" style="color:black;" class="form-label">Choose Thumbnail Image</label><span style='color:red;font-size:20px;'>&#42;</span>
  <br>
  <img src="img/{{$post->thumbimg}}" id="file-upload1-show" alt="" height="100" width="200">
   
<br>
<br>

   <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image"/>
    </div>
    <label for="file-upload1">Update Image</label>
    <input type="file" name="file-upload1" id="file-upload1" accept="image/png, image/gif, image/jpeg" onchange="previewImage(event);" />
    @error('file-upload1')
  <span style='color:red;'>{{$message}}</span>
  @enderror
  </div> 

  <br>

<label for="thumbimgcap" class="form-label" style="color:black;">Thumbnail Image Caption</label><span style='color:red;font-size:20px;'>&#42;</span>
<input type="text" placeholder="Enter thumbnail image's caption..." name="thumbimgcap" id="thumbimgcap" value="{{$post->thumbimgcap}}" class="form-control" required>
@error('thumbimgcap')
  <span style='color:red;'>{{$message}}</span>
  @enderror

</div>
<!-- end of thumbnail image area -->

<br>
<br>

<!-- body content 1 image area -->
<div class="mb-3">
  <label for="bodycontent1" style="color:black;" class="form-label">First Paragraph</label><span style='color:red;font-size:20px;'>&#42;</span>
  <br>
  <!-- setting hidden input field for textarea -->
  <input type="hidden" id="bodycontent1jQueryVal" value="{{$post->bodycontent1}}">
  <textarea name="bodycontent1" id="bodycontent1" cols="30" rows="10" required></textarea>
  @error('bodycontent1')
  <span style='color:red;'>{{$message}}</span>
  @enderror
</div>

<div class="mb-3">
  <label for="file-upload2" style="color:black;" class="form-label">Choose Image</label><span style='color:red;font-size:20px;'>&#42;</span>
  <br>
  <img src="img/{{$post->bodycontent1_img}}" id="file-upload2-show" height="100" width="200">
  <br>
  <br>

  <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image2"/>
    </div>
    <label for="file-upload2">Upload Image</label>
    <input type="file" name="file-upload2" id="file-upload2" accept="image/png, image/gif, image/jpeg" onchange="previewImage2(event);" />
    @error('file-upload2')
  <span style='color:red;'>{{$message}}</span>
  @enderror
  </div>


<label for="bodycontent1imgcap" class="form-label" style="color:black;">Image Caption</label><span style='color:red;font-size:20px;'>&#42;</span>
<input type="text" placeholder="Enter first paragraph image's caption..." name="bodycontent1imgcap" id="bodycontent1imgcap" value="{{$post->bodycontent1_img_cap}}" class="form-control" required>
@error('bodycontent1imgcap')
  <span style='color:red;'>{{$message}}</span>
  @enderror
</div>
<!-- end of body content 1 image area -->

<br>
<br>

<!-- body content 2 image area -->
<div class="mb-3">
  <label for="bodycontent2" style="color:black;" class="form-label">Second Paragraph</label><span style='color:red;font-size:20px;'>&#42;</span>
  <br>
   <!-- setting hidden input field for textarea -->
   <input type="hidden" id="bodycontent2jQueryVal" value="{{$post->bodycontent2}}">
  <textarea name="bodycontent2" id="bodycontent2" cols="30" rows="10"></textarea>
  @error('bodycontent2')
  <span style='color:red;'>{{$message}}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="file-upload3" style="color:black;" class="form-label">Choose Image</label>
  <br>
  <?php if($post->bodycontent2_img){ echo "<img src='img/$post->bodycontent2_img' id='file-upload3-show' height='100' width='200'>"; } ?>
  
 <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image3"/>
    </div>
    <label for="file-upload3">Upload Image</label>
    <input type="file" name="file-upload3" id="file-upload3" accept="image/png, image/gif, image/jpeg" onchange="previewImage3(event);" />
</div> 

<br>
<label for="bodycontent2imgcap" class="form-label" style="color:black;">Image Caption</label>
<input type="text" placeholder="Enter second paragraph image's caption..." name="bodycontent2imgcap" id="bodycontent2imgcap" value="{{$post->bodycontent2_img_cap}}" class="form-control">
</div>
<!-- end of body content 2 image area -->

<br>
<br>

<!-- body content 3 image area -->
<div class="mb-3">
  <label for="bodycontent3" style="color:black;" class="form-label">Third Paragraph</label>
  <br>
  <!-- setting hidden input field for textarea -->
  <input type="hidden" id="bodycontent3jQueryVal" value="{{$post->bodycontent3}}">
  <textarea name="bodycontent3" id="bodycontent3"  cols="30" rows="10"></textarea>
</div>
<div class="mb-3">
  <label for="file-upload4" style="color:black;" class="form-label">Choose Image</label>
  <br>
  <?php if($post->bodycontent3_img){ echo "<img src='img/$post->bodycontent3_img' id='file-upload4-show' height='100' width='200'>"; } ?>
  

<div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image4"/>
    </div>
    <label for="file-upload4">Upload Image</label>
    <input type="file" name="file-upload4" id="file-upload4" accept="image/png, image/gif, image/jpeg" onchange="previewImage4(event);" />
</div> 

<br>
<label for="bodycontent3imgcap" class="form-label" style="color:black;">Image Caption</label>
<input type="text" placeholder="Enter third paragraph image's caption..." name="bodycontent3imgcap" id="bodycontent3imgcap" value="{{$post->bodycontent3_img_cap}}" class="form-control">
</div>
<!-- end of body content 3 image area -->


<br>
<br>


<!-- body content 4 image area -->
<div class="mb-3">
  <label for="bodycontent4" style="color:black;" class="form-label">Fourth Paragraph</label>
  <br>
   <!-- setting hidden input field for textarea -->
   <input type="hidden" id="bodycontent4jQueryVal" value="{{$post->bodycontent4}}">
  <textarea name="bodycontent4" id="bodycontent4" cols="30" rows="30"></textarea>
</div>
<div class="mb-3">
  <label for="file-upload5" style="color:black;" class="form-label">Choose Image</label>
  <br>
  <?php if($post->bodycontent4_img){ echo "<img src='img/$post->bodycontent4_img' id='file-upload5-show' height='100' width='200'>"; } ?>
  

 <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image5"/>
    </div>
    <label for="file-upload5">Upload Image</label>
    <input type="file" name="file-upload5" id="file-upload5" accept="image/png, image/gif, image/jpeg" onchange="previewImage5(event);" />
</div> 
<br>
<label for="bodycontent4imgcap" class="form-label" style="color:black;">Image Caption</label>
<input type="text" placeholder="Enter fourth paragraph image's caption..." name="bodycontent4imgcap" id="bodycontent4imgcap" value="{{$post->bodycontent4_img_cap}}" class="form-control">
</div>
<!-- end of body content 4 image area -->

<br>

<div class="mb-3">
<label for="youtubevid" class="form-label" style="color:black;">Youtube Video Link[If any]</label>
<input type="text" class="form-control" name="youtubevid" id="youtubevid" value="{{$post->youtubevideo}}"> 
</div>

<br>
<div class="mb-3">
<label for="postVisBility" class="form-label" style="color:black;">Post's Visibility</label><span style='color:red;font-size:20px;'>&#42;</span>
<select class="form-select" name="postVisBility"  id="postVisBility"  aria-label="select post's visibility to public/draft">
 <?php if($post->public_visibility==1){echo "<option value='1' selected>Public</option><option value='0'>Draft</option>";} ?> 
 <?php if($post->public_visibility==0){echo "<option value='1'>Public</option><option value='0' selected>Draft</option>";} ?> 
</select>
</div>


<br>
     <!-- hiden fields -->
   
     <input type="hidden" name="adminid" id="adminid" value="{{$post->post_admin_id}}" required>
     <input type="hidden" name="postid" id="postid" value="{{$post->postid}}" required>
     <!-- end of hidden fileds -->  
<br>
  <button type="submit" name="submit" id="submit" class="btn btn-warning">Update</button>
</form>
@endforeach

 
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

<!-- <script>
CKEDITOR.replace('thumbcontent');

var text1;
$(document).ready(function(){
    text1 = $('#thumbcontentjQueryVal').val();
    CKEDITOR.instances['thumbcontent'].setData(text1);
});
</script> -->
<script>
CKEDITOR.replace('bodycontent1');

var text1;
$(document).ready(function(){
    text1 = $('#bodycontent1jQueryVal').val();
    CKEDITOR.instances['bodycontent1'].setData(text1);
});
</script>
<script>
CKEDITOR.replace('bodycontent2');

var text1;
$(document).ready(function(){
    text1 = $('#bodycontent2jQueryVal').val();
    CKEDITOR.instances['bodycontent2'].setData(text1);
});
</script>
<script>
CKEDITOR.replace('bodycontent3');

var text1;
$(document).ready(function(){
    text1 = $('#bodycontent3jQueryVal').val();
    CKEDITOR.instances['bodycontent3'].setData(text1);
});
</script>
<script>
CKEDITOR.replace('bodycontent4');

var text1;
$(document).ready(function(){
    text1 = $('#bodycontent4jQueryVal').val();
    CKEDITOR.instances['bodycontent4'].setData(text1);
});
</script>


<script>
  /**
 * Create an arrow function that will be called when an image is selected.
 */
const previewImage = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";

        document.querySelector("#file-upload1-show").style.display="none";
    }
};
const previewImage2 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image2");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";

        document.querySelector("#file-upload2-show").style.display = "none";
        
    }
};
const previewImage3 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image3");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";

        document.querySelector("#file-upload3-show").style.display="none";
    }
};
const previewImage4 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image4");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
        
        document.querySelector("#file-upload4-show").style.display="none"; 
    }
};
const previewImage5 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image5");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";

        document.querySelector("#file-upload5-show").style.display="none"; 
    }
};
</script>

<x-jsfiles />


</html> 




