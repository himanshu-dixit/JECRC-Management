<?php
//if(isset($_SESSION['UserName']))
include('database/connect.php');
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
	.form-group{
		margin-bottom: 20px !important;
		height: 36px;
		padding: 0 20%;
	}
	</style>

</head>
<body class="page-body skin-white">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

<?php include 'components/sidebar.php';?>

	<div class="main-content">

		<?php include 'components/top_bar.php';?>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script>
	  $( function() {
	    var availableTags = [
				<?php
				$sql ="SELECT * FROM `tblfaculty`,tbldept where tblfaculty.DeptId = tbldept.DeptId ";
				$sth = $conn->prepare($sql);
				$sth->execute();
				$result = $sth->fetchAll();
				ini_set("display_errors", "1");
				error_reporting(E_ALL);

				foreach($result as $row){
					?>
						      "<?php echo $row['DeptName'];?> - <?php echo $row['FName'];?>  |<?php echo $row['FId'];?>",
				<?php }	?>


	      ""
	    ];
	    $( "#auto" ).autocomplete({
	      source: availableTags
	    });
	  } );
	  </script>

		<style>
		.ui-menu-item{
			height: 40px;
			background-color : white;
			padding-left: 10px;
			padding-top: 5px;
		}
		</style>


		<div class="row">
			<center><h2 style="margin-bottom:30px;">Add Batch</h2></center>
			<div class="row">
				<form method="post" action="controller/add_batch.php">
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Subject Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="subject_name" placeholder="Name">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Teacher</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="teacher_id" id="auto" placeholder="Name">
						</div>
					</div>
					<div class="form-group">
								<label class="col-sm-3 control-label">Select Department</label>

								<div class="col-sm-9">
									<select class="form-control" name="department">
											<option>Select</option>
											<option value="1">Computer Science</option>
											<option value="2">Electronics</option>
											<option value="3">Electrical</option>
											<option value="4">Information Technology</option>
									</select>
								</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label">Select Year</label>

										<div class="col-sm-9">
											<select class="form-control" name="year">
												<option>Select</option>
												<option value="1">First</option>
												<option value="2">Secondd</option>
												<option value="3">Third</option>
												<option value="4">Fourth</option>
											</select>
										</div>
									</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Starting Roll No.</label>
								<div class="col-sm-9">
									<input type="text" class="form-control"  name="start" placeholder="Starting">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Last Roll No.</label>
								<div class="col-sm-9">
									<input type="submitz" class="form-control" name="end" placeholder="Last">
								</div>
							</div>


							</div>




							<div class="row" >
								<center><input type="submit" class="btn btn-primary" style="width:150px;height:45px;margin-top:20px;" value="Add Batch"></input></center>
							</div>


				</form>
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
