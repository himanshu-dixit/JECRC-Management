<?php
$value = isset($_GET['value']) ? $_GET['value'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>
	<!-- Inline Style Css-->
	<style>
	.btn-login:hover{
		background-color: #387EFD !important;
	}
	.logo_text{
		font-size: 35px;
		font-weight: 600;
		color: #fff !important;
	}
	.form-login-error{
    background: #f74141 !important;
	}
	.form-login-error h3{
		background: #db3232 !important;
	}
	</style>
</head>
<body class="page-body login-page">



<div class="login-container">

	<div class="login-form">

		<div class="login-content">

			<a href="index.html" class="logo_text">
				JECRC
			</a>
		<!--	<img src="http://www.jecrcudml.edu.in/images/jecrc-foundation.png" />-->

			<p class="description" style="margin-top:20px;">Administration System</p>


		</div>

		<div class="login-content">

			<?php if($value=="wrong" ){ ?>
				<div class="form-login-error" style="display:block;">
					<h3>Invalid login</h3>
					<p>Enter Correct Username And Password</p>
				</div>
			<?php } ?>
			<form method="post" role="form" id="form_login" action="proceed.php">

				<div class="form-group">

					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>

						<input type="text" class="form-control" name="txtUserName" id="username" placeholder="Username" autocomplete="off" />
					</div>

				</div>

				<div class="form-group">

					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>

						<input type="password" class="form-control" name="txtPassword" id="password" placeholder="Password" autocomplete="off" />
					</div>

				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Login In
					</button>
				</div>


			</form>


			<div class="login-bottom-links">

				<a href="extra-forgot-password.html" class="link">Forgot your password?</a>

				<br />

				<a href="#">About</a>

			</div>

		</div>

	</div>

</div>


	<!-- Bottom scripts (common) -->


</body>
</html>
