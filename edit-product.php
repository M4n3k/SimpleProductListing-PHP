<?php

include ('assets/config.php');

	if(isset($_REQUEST['edit_id'])){
		$edtdata =$_REQUEST['edit_id']; // Request from clicked id

		$edtdatasql = "SELECT * FROM product WHERE ID = $edtdata"; // Selecting from database table

		$finaledtdatasql = mysqli_query($conn,$edtdatasql); // Strating query to fecth data

		if($finaledtdatasql){
			$data = mysqli_fetch_assoc($finaledtdatasql);{
				$name = $data['name'];
				$details = $data['details'];
				$stock = $data['stock'];
				$image = $data['image'];
				$price = $data['price'];
			}
		}
	}

	if (isset($_REQUEST['submit'])) {
		$edtdata = $_REQUEST['edit_id'];
		$name = $_REQUEST['name'];
		$details = $_REQUEST['details'];
		$stock = $_REQUEST['stock'];

        $image = $_FILES['image']['name'];
        $imagetmp = $_FILES['image']['tmp_name'];
        $imageload = 'product-img/'.$image;
        move_uploaded_file($imagetmp,$imageload);

		$price = $_REQUEST['price'];

        

		$upsql = "UPDATE product SET name='$name', details='$details', stock='$stock', image='$image', price='$price' WHERE ID = $edtdata ";

		$final = mysqli_query($conn,$upsql);

		if($final == TRUE){
			header('Location: dashboard.php');
		}else{
			echo "none";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit You Data</title>
	<!-- Bootstrap 5 CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS File Link -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container d-flex align-items-center justify-content-center w-100" style="height: 100vh;">
		<div class="col-lg-5 p-3">
			<h1 class="title  text-center mb-3">Edit Data</h1>
			<form action="" method="POST" class="bg-light shadow rounded-3 p-4" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label" for="name">Product Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)){echo $name;} ?>">
				</div>

				<div class="mb-3">
					<label class="form-label" for="details">Product Details</label>
					<input type="text" class="form-control" id="details" name="details" value="<?php if(isset($details)){echo $details;} ?>">
				</div>

				<div class="mb-3">
					<label class="form-label" for="stock">In STock</label>
					<input type="number" class="form-control" id="stock" name="stock" value="<?php if(isset($stock)){echo $stock;} ?>" > 
				</div>

				<div class="mb-3">
					<label class="form-label" for="image">Product Image</label>
					<input type="file" class="form-control" id="image" name="image">
				</div>

				<div class="mb-3">
					<label class="form-label" for="price">Product Price</label>
					<input type="number" class="form-control" id="price" name="price" value="<?php if(isset($price)){echo $price;} ?>" >
				</div>

				<div class="mb-3">
					<input type="submit" class="w-100 btn-success mb-3 btn hover fw-bold" value="Update" name="submit">
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>