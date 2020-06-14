<!DOCTYPE html>
<html>
<head>

<title>Image Gallery</title>
 
<meta charset="utf-8">
  
<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <!----add jquery link----> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
<style>
*{
	
	margin:0;
	padding:0;
	box-sizing:border-box;
}
.container{
	
	width:100%;
	height:100%;
}
.heading-container{
	
	width:100%;
	height:100px;
}
h2{
	
	text-align:center;
	font-size:30px;
	color:blue;
	line-height:100px;
}
.image-container{
	
	width:100%;
	max-width:1000px;
	margin:auto;
	height:100%;
	display:flex;
	justify-content:space-between;
	flex-wrap:wrap;
}
.image-grid{
	
	width:32.5%;
	height:250px;
	margin-bottom:10px;
	cursor:pointer;
}
.image-grid img{
	
	width:100%;
	height:100%;
}
.modal-container{
	
	display:none;
	width:100%;
	height:100%;
	position:fixed;
	top:0;
	right:0;
	left:0;
	bottom:0;
	background-color:rgba(0,0,0,0.6);
}
.modal-container-inside{
	
	width:100%;
	max-width:1000px;
	margin:auto;
	height:500px;
	background-color:rgba(0,0,0,0.6);
	margin-top:100px;
	position:relative;
}
.modal-image{
	
	width:100%;
	max-width:800px;
	margin:auto;
	height:500px;
	background-color:white;
}
.modal-container-inside img{
	
	width:100%;
	height:100%;
}
span{
	
	position:absolute;
	top:20px;
	font-size:40px;
	right:30px;
	color:white;
	cursor:pointer;
}
.modal-image-prev{
	
	width:50px;
	height:50px;
	background-color:#ccc;
	position:absolute;
	top:50%;
	border-radius:50%;
	left:50px;
	text-align:center;
	cursor:pointer;
}
.modal-image-next{
	
	width:50px;
	height:50px;
	background-color:#ccc;
	position:absolute;
	top:50%;
	border-radius:50%;
	right:50px;
	text-align:center;
	cursor:pointer;
}
.modal-image-prev, .modal-image-next a{
   
    font-size:20px;
	line-height:50px;
	color:white;
}
</style>
</head>

<body>
  
  <div class="container">
  
    <div class="heading-container">
	
	 <h2>Image Grid Gallery with Slider using Php Mysqli</h2>
  
    </div>
	
	 <div class="image-container">
	
	   
		
     </div>
	 
	 <div class="modal-container">
	 
	    
		
     </div>
  
  </div>
  
<script>

 $(document).ready( function (){
	 
	    fetch_images();
		
	   function fetch_images()
	   {
		  
        var action = 'fetch_images';

        $.ajax({
		 
          url:"action_gallery.php",
          
          method:"post",
          
          data:{action_fetch_images:action},
		  
		  success: function(data){
			  
			  $('.image-container').html(data);
			  
		  }	
		  
		});		
		   
	   }
	   
	   //grid images click
	   
	 $(document).on('click','.image-grid', function (){
		 
		 var image_id = $(this).data('image_id');
		 
		 $('.modal-container').css({'display':'block'});
		 
		 fetch_grid_images(image_id);
		 
	 });

       //modal close
	   
	 $(document).on('click','.modal-close', function (){
		  
		 $('.modal-container').css({'display':'none'});
		  
	 });	 
		 

     //modal next images click
	   
	 $(document).on('click','.modal-image-next', function (){
		 
		 var image_id = $(this).data('image_id');
		  
		 fetch_grid_images(image_id);
		 
	 });
	 
	 //modal prev images click
	   
	 $(document).on('click','.modal-image-prev', function (){
		 
		 var image_id = $(this).data('image_id');
		  
		 fetch_grid_images(image_id);
		 
	 });
		 
	   //fetch grid modal images
	     
		
	   function fetch_grid_images(image_id)
	   {
		  
        var action = 'fetch_grid_images';

        $.ajax({
		 
          url:"action_gallery.php",
          
          method:"post",
          
          data:{action_fetch_grid_images:action, image_id:image_id},
		  
		  success: function(data){
			  
			  $('.modal-container').html(data);
			  
		  }	
		  
		});		
		   
	   }  
	   
	   
	 
 });

     
</script>


</body>
</html>