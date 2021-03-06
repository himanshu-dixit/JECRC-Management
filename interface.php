<?php
//if(isset($_SESSION['UserName']))
	session_start();
	if(!isset($_SESSION['UserName']))
	{
		header("Location:welcome.php?value=home");
	   exit;
	}
	include("database/connect.php");
	$id = $_GET['id'];
	$sql ="SELECT * FROM `tblbatch` WHERE BatchId='$id'";
	$sth = $conn->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	if($_SESSION['FId']!=$result[0]['teacher_id']){
		header("Location:welcome.php?value=home");
	  exit;
	}

	$start= $result[0]['start'];
	$end= $result[0]['end'];
	$teacher_id = $_SESSION['FId'];
	$sql ="SELECT * FROM `attendance_complete` WHERE batch_id='$id' and teacher_id=$teacher_id and DATE(date) = CURDATE()";
	$sth = $conn->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	if($result){
		echo 'already marked';
		?>
<meta http-equiv="refresh" content="0; url=./" />
		<?php
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
			<center><h2 style="margin-bottom:30px;">Add Attendance</h2>
				<h4><?php echo  date("Y/m/d");?>  For DBMS Lecture</h4>
				<br>
			</center>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
			<div class="row">
				<form action="controller/mark.php" method="post">
					<input value="<?php echo $id;?>" name="batch_id" style="display:none;">
					<input value="<?php echo $start;?>" name="start" style="display:none;">
					<input value="<?php echo $end;?>" name="end" style="display:none;">
					<input vale="<?php echo  date("Y/m/d");?>" name="date" style="display:none;">
					<table style="margin: 0 auto;">
				<?php
				$sql ="SELECT * FROM `tblstudent` WHERE student_id>='$start' AND student_id<='$end'  ";
				$sth = $conn->prepare($sql);
				$sth->execute();
				$result = $sth->fetchAll();
				$count = 0;
				foreach($result as $row){
					 ?>
					 <tr>
					 <td style="width:300px;"><h3><?php echo $row['name'];?></h3></td>
					 <td style="width:300px;">
						 	<center>	 <input onclick="toggleattendance(<?php echo $row['student_id'];?>)" id="<?php echo $row['student_id'];?>" type="checkbox" name="attendance[]" style="height:20px;width:20px;" value="<?php echo $row['student_id'];?>"></center>
						</td>
					</tr>
				<?php
				$count++;
		   	} ?>
			</table>
						</div>			</div>
						<div class="row">
							<center>
				<input type="submit" class="btn btn-primary" style="width:150px;height:45px;margin:50px auto ;" value="Submit Attendance">
			</center>
			</div>
		</form>





			<br>
			<div class="row">
				<center><h3>Student Present/Total Student</h3></center>
					<center><h2><span id="student_count">0</span>/<?php echo $count;?></h2></center>
			</div>

		</div>

					</div>


		<!-- Footer -->
		<?php include 'components/footer.php';?>
	</div>

<script>
var count=0;
function toggleattendance(id) {
	if(document.getElementById(id).checked) {
		count++;
		document.getElementById('student_count').innerHTML=count;
} else {
		count--;
		document.getElementById('student_count').innerHTML=count;
}
}
</script>

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
