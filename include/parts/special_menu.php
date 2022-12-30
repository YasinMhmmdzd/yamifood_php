<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".drinks">Drinks</button>
							<button data-filter=".lunch">Lunch</button>
							<button data-filter=".dinner">Dinner</button>
						</div>
					</div>
				</div>
			</div>
				<?php
				include "./include/config.inc.php";
				?>
			<div class="row special-list">
				<?php
				$get_special_mneu_items_drink_query = "SELECT * FROM special_menu WHERE type = 'drink' ";
				$result = $connection -> query($get_special_mneu_items_drink_query);
				foreach($result as $drinks):
				?>
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="images/uploads/<?=$drinks['image']?>" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4><?=$drinks['name']?></h4>
							<p><?=$drinks['description']?></p>
							<h5>$<?=$drinks['price']?></h5>
						</div>
					</div>
				</div>
				<?php
				endforeach;
				?>
				

				
				<?php
				$get_special_mneu_items_lunch_query = "SELECT * FROM special_menu WHERE type='lunch'";
				$result = $connection -> query($get_special_mneu_items_lunch_query);
				foreach($result as $lunchs):
				?>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="images/uploads/<?=$lunchs['image']?>" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4><?=$lunchs['name']?></h4>
							<p><?=$lunchs['description']?></p>
							<h5>$ <?=$lunchs['price']?></h5>
						</div>
					</div>
				</div>
				<?php
				endforeach;
				?>

				
				<?php
				$get_special_mneu_items_dinner_query = "SELECT * FROM special_menu WHERE type='dinner'";
				$result = $connection -> query($get_special_mneu_items_dinner_query);
				foreach($result as $dinners):
				?>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="images/uploads/<?=$dinners['image']?>" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4><?=$dinners['name']?></h4>
							<p><?=$dinners['description']?></p>
							<h5>$ <?=$dinners['price']?></h5>
						</div>
					</div>
				</div>
				<?php
				endforeach;
				?>
			</div>
		</div>
	</div>