<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Yamifood Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<?php 
	include "./include/parts/header.php";
	?>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Blog</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start blog -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Blog</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<?php
			include "./include/config.inc.php";
			include "./include/set_date_time.php";
			?>
			<div class="row">
				<?php
				$get_blog_posts = "SELECT * FROM blog_posts , users";
				$result = $connection -> query($get_blog_posts);
				foreach($result as $posts):
				?>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/uploads/<?=$posts['image']?>" alt="">
						</div>
						<div class="blog-detail">
							<h4><?=$posts['title']?></h4>
							<ul>
								<li><span>Post by <?php
								if($posts["author"] == $posts["user_id"]){
									echo $posts["user_name"];
								}
								?></span></li>
								<li>|</li>
								<li><span><?php
								echo set_date($posts["date"]);
								?></span></li>
							</ul>
							<p><?=$posts['description']?></p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="single.php?post_id=<?=$posts['id']?>">Read More</a>
						</div>
					</div>
				</div>

				<?php
				endforeach;
				?>






			</div>
		</div>
	</div>
	<!-- End blog -->
	
	<!-- Start Contact info -->
	<?php
	include "./include/parts/contact_info.php";
	?>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<?php
	include "./include/parts/footer.php"
	?>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>