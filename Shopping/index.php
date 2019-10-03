<?php
	//Starting session for Add to cart functionality
	session_start();


	require_once('php/CreateDb.php');
	require_once('./php/component.php');


	//Creating an instance of CreateDb class
	$database = new CreateDb($dbname="Productdb",$tablename="Producttb");

	if(isset($_POST['add'])){
		//print_r($_POST['product_id']);
		if (isset($_SESSION['cart'])){	
			
			$item_array_id=array_column($_SESSION['cart'],$column="product_id");
			print_r($item_array_id);

			if(in_array($_POST['product_id'], $item_array_id))
			{
				echo "<script>alert('Product is already added in the cart')</script>";
				echo "<script>window.location='index.php'</script>";
			}else{

			}

			print_r($_SESSION['cart']);
		}
		else
		{
			$item_array=array(
				'product_id'=>$_POST['product_id']);
			
		}
		//Creating new session variable
		
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<body style="background-color:grey;">
		
	</body>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width,user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Shopping Cart</title>
	<!--Font Awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" integrity="sha256-piqEf7Ap7CMps8krDQsSOTZgF+MU/0MPyPW2enj5I40=" crossorigin="anonymous" />
	<!--Bootstrap CDN-->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><!--Container design-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div class="row text-center py-5">
		<?php
			$result = $database->getData();
			while($row = mysqli_fetch_assoc($result))
			{
				component($row['product_name'],$row['base_price'],$row['product_price'],$row['product_image'],$row['id']);//Created the function in createdb file and called here for different details of the products...
			}

		?>
	</div>
</div>




<!--FONT AWESOME-->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!--JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>