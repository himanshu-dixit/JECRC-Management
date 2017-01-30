<?php
//if(isset($_SESSION['UserName']))
	session_start();
	if(!isset($_SESSION['UserName']))
	{
		header("Location:welcome.php?value=home");
	   exit;
	}
	//	echo $_SESSION['UserName'];die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>JECRC | Dashboard</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/skins/white.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	.tile-stats{
    height: 138px;
	}
	.tile-red {
    background: #ff4f4f !important;

	}
	.tile-red:hover{
		cursor: pointer;
	}
	</style>

</head>
<body class="page-body skin-white">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

<?php include 'components/sidebar.php';?>

	<div class="main-content">

		<?php include 'components/top_bar.php';?>




		<div class="row">
			<center><h2 style="margin-bottom:30px;">Assignments</h2></center>
			<div class="row">

				<a href="interface.php">
				<div class="col-sm-3 col-xs-12">

					<div class="tile-stats tile-green">
						<div class="icon"><i class="entypo-chart-bar"></i></div>


						<h3>3rd Sem IT A1</h3>
						<p>30 Students</p>
						<p>701-795</p>
		  			<p>4 Lectures Per Week</p>
					</div>
				</div>
					</a>
	<div class="col-sm-3 col-xs-12">
					<div class="tile-stats tile-red">
						<div class="icon"><i class="entypo-chart-bar"></i></div>

								<h3>3rd Sem IT A1</h3>
								<p>30 Students</p>
								<p>701-795</p>
					  		<p>4 Lectures Per Week</p>
	      	</div></div>
	<div class="col-sm-3 col-xs-12">

					<div class="tile-stats tile-aqua">
							<div class="icon"><i class="entypo-chart-bar"></i></div>

							<h3>3rd Sem IT A1</h3>
							<p>30 Students</p>
							<p>701-795</p>
			  			<p>4 Lectures Per Week</p>
					</div></div>
	<div class="col-sm-3 col-xs-12">
					<div class="tile-stats tile-blue">
							<div class="icon"><i class="entypo-chart-bar"></i></div>

							<h3>3rd Sem IT A1</h3>
							<p>30 Students</p>
							<p>701-795</p>
			  			<p>4 Lectures Per Week</p>
					</div>
				</div>				</div>


			</div>


		</div>

					</div>


		<!-- Footer -->
		<?php include 'components/footer.php';?>
	</div>





</div>

	</div>




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>
	<script src="assets/js/toastr.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>
