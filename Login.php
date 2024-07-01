<?php
require 'main_function.php';

// cek login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // cek dengan database
    $cek_database = mysqli_query($conn, "SELECT * FROM login where email = '$email' and password = '$password'");
    // hitung jumlah data
    $hitung = mysqli_num_rows($cek_database);

    if ($hitung > 0) {
        $_SESSION['log'] = 'True';
        header('location:index.php');
    }else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}

if (!isset($_SESSION['log'])) {
    # code...
}else {
    header('location:index.php');
}
?>  



<!doctype html>
<html lang="en">
  <head>
  	<title>Login 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login Admin</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
					<form method="post" class="login-form">
						<div class="form-group">
							<input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
						</div>
						<div class="form-group d-flex">
						<input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
						</div>
						<div class="form-group">
							<button name="login" type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
						</div>
				</form>
	        </div>
				</div>
			</div>
		</div>
	</section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

	</body>
</html>

