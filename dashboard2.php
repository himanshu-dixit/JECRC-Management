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
			<center><h2 style="margin-bottom:30px;">Select Batch</h2></center>
			<div class="row">

	 	<?php
			include("database/connect.php");
			error_reporting(E_ALL);
			$f_id = $_SESSION['FId'];
			$sql ="SELECT * FROM `tblbatch` WHERE teacher_id='$f_id'";
			$sth = $conn->prepare($sql);
			$sth->execute();


			$result = $sth->fetchAll();
			foreach($result as $row){

				$check_id = $row['BatchId'];

				$sql1 ="SELECT * FROM `attendance_complete` WHERE batch_id='$check_id' and teacher_id=$f_id and DATE(date) = CURDATE()";
				$sth1 = $conn->prepare($sql1);
				$sth1->execute();
				$result1 = $sth1->fetchAll();
				$a = "green";
				if($result1){
					$a = "red";

				}



		?>

				<a href="interface.php?id=<?php echo $row['BatchId'];?>">
				<div class="col-sm-3 col-xs-12">

					<div class="tile-stats tile-<?php echo $a;?>">
						<div class="icon"><i class="entypo-chart-bar"></i></div>

						<h3><?php switch ($row['BrId']){
							case '1':
								echo 'Information Technology';
								break;
							case '2':
									echo 'Computer Science';
						} ?></h3>
						<p><?php echo $row['BatchName'];?></p>
						<p><?php echo $row['end']-$row['start'];?>- Students</p>
						<p><?php echo $row['start'];?>-<?php echo $row['end'];?></p>
					</div>
				</div>
					</a>

				<?php } ?>

				</div>


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
