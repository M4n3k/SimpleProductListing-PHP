<?php
//=============Session PHP
session_start();

if(isset($_SESSION['active'])){
	header('Location: index.php');
}

//============Config Database
    include('assets/config.php');
//============Config Database


//============Setting up Variables

	$username = isset($_POST['username']) ? $_POST['username'] : NULL;
	$email = isset($_POST['email']) ? $_POST['email'] : NULL;
	$password = isset($_POST['password']) ? $_POST['password'] : NULL;

//============Setting up Variables

// =====Inserting Data into database
	    if(isset($_POST['submit'])){
		    $username = $_POST['username'];
		    $email = $_POST['email'];
		    $password = $_POST['password'];



		    $sql = "INSERT INTO user (username,email,password)
		    VALUES ('$username','$email','$password')";

            global $success;
            
		    if(mysqli_query($conn, $sql)){
		        $success = "Registration Successful";
            }else{
		        $success = "Registration Failed";
		        }
		        mysqli_close($conn);
		   		//echo "<h1>".success()."</h1>";
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
            <h3 class="text-dark">Become A Seller By Registration</h3>
        </div>
        <form action="#" method="post" class="bg-light shadow rounded-3 p-4">
            <div class="mb-3">
                <label class="form-label" for="username">User Name</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="USERNAME" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
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
            <p class="fw-bold text-success"><?php if(isset($success)){echo $success;} ?></p>
            <p>Already Registered? <a class="text-decoration-none text-primary fw-bold" href="login.php">Log In</a></p>
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