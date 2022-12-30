<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
					<div class="right-side-blog">
						<h3>Categories</h3>
						<div class="blog-categories">
							<ul>
                                <?php
                                $query = "SELECT * FROM blog_categories";
                                $result = $connection -> query($query);
                                foreach($result as $categories):
                                ?>
								<li><a href="#"><span><?=$categories['name']?></span></a></li>
                                <?php
                                endforeach;
                                ?>
							</ul>
						</div>
						<h3>Recent Post</h3>
						<div class="post-box-blog">
					
						<?php
                        $get_recent_posts = "SELECT *  FROM blog_posts , users ORDER BY id DESC LIMIT 5";
                        $result = $connection -> query($get_recent_posts);
                        foreach($result as $recent_post):
                        ?>
					
								<div class="recent-box-blog">
									<div class="recent-img">
										<img class="img-fluid" src="images/uploads/<?=$recent_post['image']?>" alt="">
									</div>
									<div class="recent-info">
										<ul>
											<li><i class="zmdi zmdi-account"></i>Posted By : <span><?php
                                            if($recent_post['author'] == $recent_post["user_id"]){
                                                echo $recent_post['user_name'];
                                            }
                                            ?></span></li>
											<li>|</li>
											<li><i class="zmdi zmdi-time"></i>Time : <span><?=set_time($recent_post['time'])?></span></li>
										</ul>
										<h4><?=$recent_post['description']?></h4>
									</div>
								</div>

                                <?php
                                endforeach;
                                ?>
							</div>
						</div>
					</div>