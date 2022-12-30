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
	
	<!-- Start blog details -->
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
			<div class="row">
				<?php
				include "./include/config.inc.php";
				include "./include/set_date_time.php";
				if(!isset($_GET['post_id'])){
					header('location:index.php');
				}
				?>
				<div class="col-xl-8 col-lg-8 col-12">
					<?php
						$post_id = $_GET['post_id'];
						$get_post = "SELECT * FROM blog_posts , users WHERE blog_posts.id = '$post_id'";
						$result = $connection -> query($get_post);
						foreach($result as $post):
					?>
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
								<img class="img-fluid" src="images/uploads/<?=$post['image']?>" alt="">							
								<div class="date-blog-up">
									<?=set_date($post['date'])?>
								</div>
							</div>
							<div class="inner-blog-detail details-page">
								<h3><?= $post['title']?></h3>
								<ul>
									<li><i class="zmdi zmdi-account"></i>Posted By : <span><?php
									if($post["author"] == $post["user_id"]){
									echo $post["user_name"];
									}
									?></span></li>
									<li>|</li>
									<li><i class="zmdi zmdi-time"></i>Time : <span><?=set_time($post['time'])?></span></li>
								</ul>
								<p><?=$post['description']?></p>
							</div>
						</div>
						<?php
						endforeach;
						?>
						<div class="blog-comment-box">
							<h3>Comments</h3>
							<?php
							$get_comments = "SELECT * FROM blog_comments WHERE post = '$post_id'";
							$result = $connection -> query($get_comments);
							foreach($result as $comments):
							?>
							<div class="comment-item">
								<div class="comment-item-left">
									<img src="images/avt-img.jpg" alt="">
								</div>
								<div class="comment-item-right">
									<div class="pull-left">
										<a href="#"><?php
										echo $comments['author'];
										?></a>
									</div>
									<div class="des-l">
										<p><?=$comments['text']?></p>
									</div>
								</div>
							</div>
							<?php
							endforeach;
							?>
					</div>

						<div class="comment-respond-box">
							<h3>Leave your comment </h3>
							<div class="comment-respond-form">
								<form id="commentrespondform" class="comment-form-respond row" method="post">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input id="name_com" class="form-control" name="name" placeholder="Name" type="text">
										</div>
										<div class="form-group">
											<input id="email_com" class="form-control" name="email" placeholder="Your Email" type="email">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<textarea class="form-control" name="comment_text" id="textarea_com" placeholder="Your Message" rows="2"></textarea>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<button class="btn btn-submit" name="submit-comment-btn">Submit comment</button>
									</div>
								</form>
							</div>
							<?php
							if(isset($_POST['submit-comment-btn'])){
								$name = $_POST['name'];
								$comment_text = $_POST['comment_text'];
								$stmt = $connection -> prepare("INSERT INTO blog_comments (author , text , post) VALUES (:name , :text , :post)");
								$stmt -> execute([
										'name' => $name ,
										'text' => $comment_text,
										'post' => $_GET['post_id']
									]
								);
							}
							?>
						</div>
					</div>
				</div>
				<?php
				include "./include/parts/blog_sidebar.php";
				?>
				</div>
			
			</div>
		</div>
	</div>
	<!-- End details -->
	
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