<?php

//============Config Database
    include('assets/config.php');
//============Config Database


//============Setting up Variables

	$email = isset($_POST['email']) ? $_POST['email'] : NULL;
	$password = isset($_POST['password']) ? $_POST['password'] : NULL;

//============Setting up Variables

//================= Session PHP created

session_start();

if(isset($_SESSION['active'])){
    header ('Location: index.php');
}

// =====Fetching Data into database
	    if(isset($_POST['submit'])){
		    $email = $_POST['email'];
		    $password = $_POST['password'];



		    $matchsql = "SELECT * FROM user WHERE email='$email' AND password='$password'";

            $finallogmatchsql = mysqli_query($conn, $matchsql);

		    if(mysqli_num_rows($finallogmatchsql) == 1){
                header('location: dashboard.php');
                $_SESSION['active']  = "";
            }else{
                $error = "Wrong user and password";
            }
        }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become A Seller</title>


    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

 <?php include('assets/header.php'); ?>

 <main  class="container d-flex justify-content-center align-items-center">
    <!-- REGISTRATION  FORM -->
    <div class="col-lg-5 p-3">
        <div class="title  text-center mb-3">
            <h3 class="text-dark">LOG IN</h3>
        </div>
        <form action="#" method="post" class="bg-light shadow rounded-3 p-4">
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="EMail" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="form-control btn btn-success">
            </div>
        </form>
        <div class="text-center mt-3">
            <p>Don't Have an Account? <a class="text-decoration-none text-primary fw-bold" href="becomeseller.php">Create One</a></p>
        </div>
    </div>
 </main>

 <?php include('assets/footer.php'); ?>

<!-- ======  Data clears when tab is refreshed ======= -->

    <script type="text/javascript">
	    if( window.history.replaceState ){
	        window.history.replaceState( null, null, window.location.href);
	    }
    </script>

<!-- ======  Data clears when tab is refreshed ======= -->


</body>
</html>