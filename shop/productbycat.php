<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	 
	 if(isset($_GET['catid']) || $_GET['catid']==NULL){
		 echo "<script>window.location ='404.php'</script>";
		 
	 }
	 else {
		 $id = $_GET['catid'];
	 }
	//  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	// 	 $catName = $_POST['catName'];
		 
	// 	 $updateCat = $cat->update_category($catName, $id); 
	//  }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Category: </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="images/feature-pic1.png" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$505.22</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>

			</div>

	
	
    </div>
 </div>
 <?php
 include 'inc/footer.php';
?>