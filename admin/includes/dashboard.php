<?php require('config.php'); ?>
<div class="col-md-12">
   <div class="panel panel-primary">
      <div class="panel-heading">
         <h3 class="panel-title">
         <i class="fa fa-eye"></i> Quick Overview</h3>
     </div>
	  <div class="panel-body">
	      <div class="row">
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-primary btn-lg" role="button">
	      				<i class="fa fa-user fa-2x"></i><br/>
					    <?php 
					        $select = "SELECT count(id) AS total FROM tbl_user";
									$result = mysqli_query($dbconnect, $select);
									$value = mysqli_fetch_assoc($result);
									$num_rows = $value['total'];
									echo $num_rows;
				        ?>
	      			Users</a>
	      		</div>
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-success btn-lg" role="button"><i class="fa fa-sliders fa-2x"></i><br/>
							<?php 
						        $select = "SELECT count(slide_id) AS total FROM sliders";
										$result = mysqli_query($dbconnect, $select);
										$value = mysqli_fetch_assoc($result);
										$num_rows = $value['total'];
										echo $num_rows;
					    ?>
	      			Slides</a>
	      		</div>
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-info btn-lg" role="button"><i class="fa fa-image fa-2x"></i> <br/>
								<?php 
						        $select = "SELECT count(banner_id) AS total FROM banners";
										$result = mysqli_query($dbconnect, $select);
										$value = mysqli_fetch_assoc($result);
										$num_rows = $value['total'];
										echo $num_rows;
					    ?>
	      			Baners</a>
	      		</div>
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-warning btn-lg" role="button"><i class="fa fa-file-text-o fa-2x"></i> <br/>
								<?php 
						        $select = "SELECT count(post_id) AS total FROM posts";
										$result = mysqli_query($dbconnect, $select);
										$value = mysqli_fetch_assoc($result);
										$num_rows = $value['total'];
										echo $num_rows;
					    	?>
	      			Page Posts</a>
	      		</div>
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-danger btn-lg" role="button"><i class="fa fa-newspaper-o fa-2x"></i><br/>
									<?php 
							        $select = "SELECT count(news_id) AS total FROM news WHERE news_cat_id='1' ";
											$result = mysqli_query($dbconnect, $select);
											$value = mysqli_fetch_assoc($result);
											$num_rows = $value['total'];
											echo $num_rows;
						    	?>
	      			Latest News</a>
	      		</div>
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-primary btn-lg" role="button"><i class="fa fa-bullhorn fa-2x"></i><br/>
									<?php 
							        $select = "SELECT count(news_id) AS total FROM news WHERE news_cat_id='2' ";
											$result = mysqli_query($dbconnect, $select);
											$value = mysqli_fetch_assoc($result);
											$num_rows = $value['total'];
											echo $num_rows;
						    	?>
	      			Announcements</a>
	      		</div>
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-success btn-lg" role="button"><i class="fa fa-calendar fa-2x"></i><br/>
									<?php 
							        $select = "SELECT count(news_id) AS total FROM news WHERE news_cat_id='3' ";
											$result = mysqli_query($dbconnect, $select);
											$value = mysqli_fetch_assoc($result);
											$num_rows = $value['total'];
											echo $num_rows;
						    	?>
	      			Events</a>
	      		</div>
	      		<div class="col-md-2">
	      		 	<a href="#" class="quick-btn btn btn-info btn-lg" role="button"><i class="fa fa-camera fa-2x"></i><br/>
							<?php 
							        $select = "SELECT count(pslide_id) AS total FROM gallery";
											$result = mysqli_query($dbconnect, $select);
											$value = mysqli_fetch_assoc($result);
											$num_rows = $value['total'];
											echo $num_rows;
						    	?>
	      		 	Gallery</a>
	      		</div>
	      		<div class="col-md-2">
	      			<a href="#" class="quick-btn btn btn-warning btn-lg" role="button"><i class="fa fa-comments fa-2x"></i></span> <br/>
	      				<?php 
					        $select = "SELECT count(comment_id) AS total FROM comments";
									$result = mysqli_query($dbconnect, $select);
									$value = mysqli_fetch_assoc($result);
									$num_rows = $value['total'];
									echo $num_rows;
				        ?>
	      			Comments</a>
	      		</div>
	      		<div class="col-md-2">
		      		<a href="#" class="quick-btn btn btn-danger btn-lg" role="button"><i class="fa fa-address-card-o fa-2x"></i><br/>
									<?php 
						        $select = "SELECT count(finfo_id) AS total FROM footer_info";
										$result = mysqli_query($dbconnect, $select);
										$value = mysqli_fetch_assoc($result);
										$num_rows = $value['total'];
										echo $num_rows;
					        ?>
		      		Campus info</a>
	      		</div>
	      		<div class="col-md-2">
		      		<a href="#" class="quick-btn btn btn-success btn-lg" role="button"><i class="fa fa-external-link fa-2x"></i><br/>
								<?php 
						        $select = "SELECT count(social_id) AS total FROM social";
										$result = mysqli_query($dbconnect, $select);
										$value = mysqli_fetch_assoc($result);
										$num_rows = $value['total'];
										echo $num_rows;
					        ?>
		      		Social Link</a>
	      		</div>
	      		<div class="col-md-2">
	      		<a href="#" class="quick-btn btn btn-primary btn-lg" role="button"><i class="fa fa- fa-2x"></i><br/>Item</a>
	      		</div>
	      </div>
	  </div>
  </div>
 </div><!--col-md-12 end