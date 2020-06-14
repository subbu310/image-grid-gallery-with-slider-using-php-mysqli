<?php

  error_reporting(0);
  
  include('connection.php');
  
   
   if(isset($_POST['action_fetch_images'])){
	   
	   
	   $sql = "SELECT * FROM `images` ORDER BY `id` DESC";
	   
	   $result = mysqli_query($conn, $sql);
	   
	   while($row = mysqli_fetch_assoc($result)){
		   
		    $id = $row['id'];
			
			$imageUrl = $row['image_url'];
			
			if($imageUrl == null){
				
				$image_url = '<a><img src="icon/post_image.png" /></a>';
				
			}else{
				
				$image_url = '<a><img src="'.$imageUrl.'" /></a>';
				
			}
			
			echo '<div class="image-grid" data-image_id="'.$id.'">
	
	               '.$image_url.'
				   
                 </div>';
			
		   
	   }
	   
   }
   
   
   // fetch grid modal images
   
   
    if(isset($_POST['action_fetch_grid_images'])){
	   
	    $imageId = $_POST['image_id'];
		
		//first id
		
	   $sql = "SELECT * FROM `images` ORDER BY `id` ASC LIMIT 1";
	   
	   $result = mysqli_query($conn, $sql);
	   
	   while($row = mysqli_fetch_assoc($result)){
		   
		   $firstId = $row['id'];
		
	   }
	   
	  // last id
	  
	   $sql = "SELECT * FROM `images` ORDER BY `id` DESC LIMIT 1";
	   
	   $result = mysqli_query($conn, $sql);
	   
	   while($row = mysqli_fetch_assoc($result)){
		   
		   $lastId = $row['id'];
		
	   }
	   
	   // prev id and next id 
	   
	    $sql = "SELECT * FROM `images` WHERE `id` > '$imageId' ORDER BY `id` LIMIT 1";
	   
	   $result = mysqli_query($conn, $sql);
	   
	   while($row = mysqli_fetch_assoc($result)){
		   
		   $prevId = $row['id'];
		
	   }
	   
	    $sql = "SELECT * FROM `images` WHERE `id` < '$imageId' ORDER BY `id` DESC LIMIT 1";
	   
	   $result = mysqli_query($conn, $sql);
	   
	   while($row = mysqli_fetch_assoc($result)){
		   
		   $nextId = $row['id'];
		
	   }
		
	   $sql = "SELECT * FROM `images` WHERE `id`='$imageId' ";
	   
	   $result = mysqli_query($conn, $sql);
	   
	   while($row = mysqli_fetch_assoc($result)){
		   
		    $id = $row['id'];
			
			$imageUrl = $row['image_url'];
			
			if($imageUrl == null){
				
				$image_url = '<a><img src="icon/post_image.png" /></a>';
				
			}else{
				
				$image_url = '<a><img src="'.$imageUrl.'" /></a>';
				
			}
			
			if($id == $lastId ){
				
			 $prev  = '<div class="modal-image-prev" style="display:none;" data-image_id="'.$prevId.'">
	
	                     <a>&#10094;</a>
		
                       </div>';
				
			}else{
				
				$prev  = '<div class="modal-image-prev" data-image_id="'.$prevId.'">
	
	                       <a>&#10094;</a>
		
                         </div>';
			  
			}
			
			if($id == $firstId ){
				
				$next = '<div class="modal-image-next" style="display:none;" data-image_id="'.$nextId.'">
	
	                       <a>&#10095;</a>
		
                         </div>';
				
			}else{
				
				$next = '<div class="modal-image-next" data-image_id="'.$nextId.'">
	
	                       <a>&#10095;</a>
		
                         </div>';
				
			}
			
			
			echo '<span class="modal-close">&times;</span>
	
	     <div class="modal-container-inside">
	
	         <div class="modal-image">
	
	            '.$image_url.'
		
             </div>
			 
			   '.$prev.'
			    
			   '.$next.'
		
         </div>';
		
	   }
	   
	}
   
   
   
   
   
   
   
   
   
   

?>