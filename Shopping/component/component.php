<?php
	function component()
	{
		$element="
		<div class="col-md-3 col-sm-6 my-3 my-md-0">
			<form action="index.php" method="post">
				<div class="card shadow">
					<div>
						<img src="./upload/chocolate.jpg" alt="Image2" class="img-fluid card-img-top">
					</div>
					<div class="card-body">
						<h5 class="card-title">Chocolate Cake</h5>
						<h6>
							<i class="fas fa-star"></i><!--star icon-->
							<i class="fas fa-star"></i><!--star icon-->
							<i class="fas fa-star"></i><!--star icon-->
							<i class="fas fa-star"></i><!--star icon-->
							<i class="fas fa-star"></i>
						</h6>
						<p class="card-text">
							Some Quick exapmle text to build on the card
						</p>
						<h5>
							<small><s class="text-secondary"><!--changing color of small text-->&#x20B9 800</s></small><!--Actual price tag that cut out style-->
							<span class="price">&#x20B9 749</span><!--&#x20B9 for rupee icon-->
						</h5>
						<button type="submit" class="btn btn-warning my-3" name="add">Add to Cart<i class="fas fa-shopping-cart"><!--Shoping troly--></i></button>
					</div>
				</div>
			</form>
		</div>";
		echo $element;
	}
?>