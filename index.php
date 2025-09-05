<?php 
session_start();
include('inc/header.php');
$loginError = '';

if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']." ".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location: home.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maa Sarada - Diagnostic Lab</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

	<style>
		body {
			font-family: 'Inter', sans-serif;
			background: linear-gradient(135deg, #ebebebff 0%, #00c6ff 100%);
			min-height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}

		.login-wrapper {
			background: #fff;
			border-radius: 20px;
			box-shadow: 0 8px 30px rgba(0,0,0,0.15);
			overflow: hidden;
			max-width: 900px;
			width: 100%;
			display: flex;
		}

		/* Left side with image */
		.login-image {
			flex: 1;
			background: url('login.jpg') no-repeat center center/cover;
			position: relative;
		}
		.login-image::before {
			content: "";
			position: absolute;
			top: 0; left: 0;
			width: 100%; height: 100%;
			background: rgba(0, 123, 255, 0.6);
		}
		.login-image .overlay-text {
			position: absolute;
			bottom: 20px;
			left: 20px;
			color: #fff;
			z-index: 2;
		}
		.login-image .overlay-text h2 {
			font-weight: 700;
			font-size: 1.8rem;
		}

		/* Right side with form */
		.login-form {
			flex: 1;
			padding: 40px;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}
		.login-form h3 {
			font-weight: 700;
			color: #007bff;
		}
		.login-form p {
			color: #666;
		}
		.login-form .form-control {
			border-radius: 12px;
			padding: 0.75rem;
			font-size: 1rem;
		}
		.btn-login {
			background: linear-gradient(135deg, #007bff, #00c6ff);
			color: #fff;
			font-weight: 600;
			border-radius: 30px;
			padding: 0.8rem;
			transition: all 0.3s;
		}
		.btn-login:hover {
			opacity: 0.9;
			transform: translateY(-2px);
		}
		.footer {
			text-align: center;
			color: #aaa;
			margin-top: 2rem;
			font-size: 0.9rem;
		}
	</style>
</head>
<body>

	<div class="login-wrapper">
		<!-- Left Banner -->
		<div class="login-image">
			<div class="overlay-text">
				<h2>Maa Sarada Diagnostic Lab</h2>
				<p>Reliable X-Ray & Pathology Services</p>
			</div>
		</div>

		<!-- Right Login Form -->
		<div class="login-form">
			<h3><i class="fas fa-user-md me-2"></i> Login</h3>
			<p class="mb-4">Sign in to access your dashboard</p>

			<?php if ($loginError): ?>
				<div class="alert alert-danger text-center"><?php echo $loginError; ?></div>
			<?php endif; ?>

			<form method="post" action="">
				<div class="mb-3">
					<input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
				</div>
				<div class="mb-3">
					<input type="password" name="pwd" class="form-control" placeholder="Password" required>
				</div>
				<div class="d-grid">
					<button type="submit" name="login" class="btn btn-login">Login</button>
				</div>
			</form>

			<div class="mt-4 text-center text-muted small">
				<!-- <b>Test Login:</b><br> -->
				Email: <code>admin@gmail.com</code><br>
				Password: <code>12345</code>
			</div>

			<div class="footer">
				&copy; <?php echo date('Y'); ?> Maa Sarada Diagnostic Lab
			</div>
		</div>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
