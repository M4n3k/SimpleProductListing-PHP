<?php

include ('assets/config.php'); //cofig file

if(isset($_POST['submit'])){
  $name =  $_POST['name'];
  $details =  $_POST['details'];
  $stock =  $_POST['stock'];
 
  $image = $_FILES['image']['name'];
  $imagetmp = $_FILES['image']['tmp_name'];
  $imageload = 'product-img/'.$image;
  move_uploaded_file($imagetmp,$imageload);

  $price =  $_POST['price'];

 $infosql =  "INSERT INTO product (name,details,stock,image,price) VALUES('$name','$details','$stock','$image','$price')";

  $finalinfosql =   mysqli_query($conn,$infosql);

    if($finalinfosql == TRUE){
        header("Location: dashboard.php");
    }else{
        echo "not submit";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap 5 CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">

    
</head>
<body>

    <?php include('assets/header.php'); ?>


    <main  class="container d-flex justify-content-center align-items-center">
        <!-- REGISTRATION  FORM -->
        <div class="col-lg-5 p-3">
            <div class="title  text-center mb-3">
                <h3 class="text-dark">Add New Product</h3>
            </div>
            <form action="#" method="post" class="bg-light shadow rounded-3 p-4" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="name">Product Title</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Product Name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="details">Product Detail</label>
                    <input type="text" id="details" name="details" class="form-control" placeholder="Product Details" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="stock">Product In Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" placeholder="Stock Count" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Product Image</label>
                    <input type="file" id="image" name="image" class="form-control" required>
                </div><div class="mb-3">
                    <label class="form-label" for="price">Product Price</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" class="form-control btn btn-success">
                </div>
            </form>
        </div>
    </main>

    <?php include('assets/footer.php'); ?>

</body>
</html>