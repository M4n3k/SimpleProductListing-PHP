<?php


include('assets/config.php'); //including config file which has database connection

$viewsql = "SELECT * FROM product"; //selecting all data from the table name student


$finalviewsql = mysqli_query($conn,$viewsql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To my Site</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    
    <?php include('assets/header.php'); ?>

    <!-- main area -->
    <main>
        <div class="container p-4 product-list">
            <div class="title mb-3">
                <h3 class="fw-bold text-warning ">Product Page</h3>
            </div>

            <!-- Product Area -->
            <div class="products">

            <!-- PHP LOOP FOR PRODUCT -->
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
            
                <div class="product-card shadow rounded-3 overflow-hidden text-left bg-danger">
                    <div class="card-img">
                        <img class="img-fluid" src="product-img/<?php echo $image;?>" alt="Product Image">
                    </div>
                    <div class="text p-3">
                    <div class="card-title">
                        <h4 class="m-0 text-warning"><?php echo $title; ?></h4>
                    </div>
                    <div class="card-details">
                        <p><?php echo $details; ?></p>
                    </div>
                    <div class="fw-bold mb-0 d-flex align-items-center justify-content-between">
                        <span class="fs-2">$<?php echo $price; ?></span>
                        <p  class="stock m-0 text-mute fw-bold text-light">In Stock <span class="text-warning"><?php echo $stock; ?></span></p>
                    </div>
                    </div>
                </div>
            <?php
                        }
                    }

            ?>

            </div>
        </div>
    </main>

    <!-- Footer -->
  <?php include('assets/footer.php'); ?>

</body>
</html>