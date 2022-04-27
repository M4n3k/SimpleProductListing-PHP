<?php

session_start();

if(!isset($_SESSION['active'])){
	header('Location: becomeseller.php');
}


include('assets/config.php'); //including config file which has database connection

$viewsql = "SELECT * FROM product"; //selecting all data from the table name student

$finalviewsql = mysqli_query($conn,$viewsql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Records</title>

	<!-- Bootstrap 5 CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS File -->
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<!-- header -->
	<?php include('assets/header.php');?>

	<main class="container d-flex justify-content-center align-items-center py-3 mb-5">
		<div class="col-lg-8">
			<h1 class="text-center text-danger mb-4">Product Data</h1>

			<!-- Record Table -->
			<table class="table table-striped table-dark text-white table-bordered text-center">

				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Details</th>
					<th>Stock</th>
					<th>Image</th>
					<th>price</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>


				<?php
					if($finalviewsql == TRUE){
						while($data = mysqli_fetch_assoc($finalviewsql)){
							$id = $data['ID'];
							$title = $data['name'];
							$details = $data['details'];
							$stock = $data['stock'];
							$image = $data['image'];
							$price = $data['price'];

							?>

							<tr>
								<td><?php echo $id; ?></td>
								<td><?php echo $title; ?></td>
								<td><?php echo $details; ?></td>
								<td><?php echo $stock; ?></td>
								<td><img class="img-fluid" src="product-img/<?php echo $image; ?>" alt="product image"></td>
								<td><?php echo $price; ?></td>
								<td>
									<button class="btn btn-primary"><a class="text-white text-decoration-none fw-bold" href="edit-product.php?edit_id=<?php echo $id; ?>">Edit</a></button>
								</td>
								<td>
									<button class="btn btn-danger"><a class="text-white text-decoration-none fw-bold" href="delete-product.php?id=<?php echo $id; ?>">Delete</a></button>
								</td>
							</tr>
							<?php
						}
					}
				?>
			</table>
			<!-- Record Table -->

			
			<div class="text-center">
				<button class="btn btn-success mt-3">
					<a class="text-white fw-bold text-decoration-none" href="newproduct.php">Add New Product</a>
				</button>
			</div>
		</div>
	</main>

	<!-- Footer -->
	<?php include('assets/footer.php');?>


	
</body>
</html>