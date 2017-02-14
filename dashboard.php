<?php
//if(isset($_SESSION['UserName']))

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


		<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			// Sample Toastr Notification
			setTimeout(function()
			{
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};

			}, 3000);


			// Sparkline Charts
			$('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
			$('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
			$('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
			$('.bar').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
			$('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
			$('.linechart').sparkline();
			$('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
			$('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );


			$(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
				type: 'bar',
				barColor: '#485671',
				height: '80px',
				barWidth: 10,
				barSpacing: 2
			});





			// Line Charts
			var line_chart_demo = $("#line-chart-demo");

			var line_chart = Morris.Line({
				element: 'line-chart-demo',
				data: [
					{ y: '2006', a: 100, b: 90 },
					{ y: '2007', a: 75,  b: 65 },
					{ y: '2008', a: 50,  b: 40 },
					{ y: '2009', a: 75,  b: 65 },
					{ y: '2010', a: 50,  b: 40 },
					{ y: '2011', a: 75,  b: 65 },
					{ y: '2012', a: 100, b: 90 }
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['October 2013', 'November 2013'],
				redraw: true
			});

			line_chart_demo.parent().attr('style', '');


			// Donut Chart
			var donut_chart_demo = $("#donut-chart-demo");

			donut_chart_demo.parent().show();

			var donut_chart = Morris.Donut({
				element: 'donut-chart-demo',
				data: [
					{label: "Download Sales", value: getRandomInt(10,50)},
					{label: "In-Store Sales", value: getRandomInt(10,50)},
					{label: "Mail-Order Sales", value: getRandomInt(10,50)}
				],
				colors: ['#707f9b', '#455064', '#242d3c']
			});

			donut_chart_demo.parent().attr('style', '');


			// Area Chart
			var area_chart_demo = $("#area-chart-demo");

			area_chart_demo.parent().show();

			var area_chart = Morris.Area({
				element: 'area-chart-demo',
				data: [
					{ y: '2006', a: 100, b: 90 },
					{ y: '2007', a: 75,  b: 65 },
					{ y: '2008', a: 50,  b: 40 },
					{ y: '2009', a: 75,  b: 65 },
					{ y: '2010', a: 50,  b: 40 },
					{ y: '2011', a: 75,  b: 65 },
					{ y: '2012', a: 100, b: 90 }
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['Series A', 'Series B'],
				lineColors: ['#303641', '#576277']
			});

			area_chart_demo.parent().attr('style', '');




			// Rickshaw
			var seriesData = [ [], [] ];

			var random = new Rickshaw.Fixtures.RandomData(50);

			for (var i = 0; i < 50; i++)
			{
				random.addData(seriesData);
			}

			var graph = new Rickshaw.Graph( {
				element: document.getElementById("rickshaw-chart-demo"),
				height: 193,
				renderer: 'area',
				stroke: false,
				preserve: true,
				series: [{
						color: '#73c8ff',
						data: seriesData[0],
						name: 'Upload'
					}, {
						color: '#e0f2ff',
						data: seriesData[1],
						name: 'Download'
					}
				]
			} );

			graph.render();

			var hoverDetail = new Rickshaw.Graph.HoverDetail( {
				graph: graph,
				xFormatter: function(x) {
					return new Date(x * 1000).toString();
				}
			} );

			var legend = new Rickshaw.Graph.Legend( {
				graph: graph,
				element: document.getElementById('rickshaw-legend')
			} );

			var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
				graph: graph,
				legend: legend
			} );

			setInterval( function() {
				random.removeData(seriesData);
				random.addData(seriesData);
				graph.update();

			}, 500 );
		});


		function getRandomInt(min, max)
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>


		<div class="row">
			<div class="col-sm-3 col-xs-6">

				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>

					<h3>Add Attendance</h3>
				</div>

			</div>

			<div class="col-sm-3 col-xs-6">

				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">0</div>

					<h3>Total Students</h3>
					<p>In all your batches</p>
				</div>

			</div>

			<div class="col-sm-3 col-xs-6">

				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-mail"></i></div>
					<div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">135</div>

					<h3>Students Per Batch</h3>
					<p>this is average.</p>
				</div>

			</div>

			<div class="col-sm-3 col-xs-6">

				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-rss"></i></div>
					<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>

					<h3>Batches</h3>
				</div>

			</div>
		</div>

		<br />

		<div class="row">
			<div class="col-sm-8">

				<div class="panel panel-primary" id="charts_env">

					<div class="panel-heading">
						<div class="panel-title">Site Stats</div>

						<div class="panel-options">
							<ul class="nav nav-tabs">
								<li class=""><a href="#area-chart" data-toggle="tab">Area Chart</a></li>
								<li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
								<li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body">

						<div class="tab-content">

							<div class="tab-pane" id="area-chart">
								<div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
							</div>

							<div class="tab-pane active" id="line-chart">
								<div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
							</div>

							<div class="tab-pane" id="pie-chart">
								<div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
							</div>

						</div>

					</div>

					<table class="table table-bordered table-responsive">

						<thead>
							<tr>
								<th width="50%" class="col-padding-1">
									<div class="pull-left">
										<div class="h4 no-margin">Pageviews</div>
										<small>54,127</small>
									</div>
									<span class="pull-right pageviews">4,3,5,4,5,6,5</span>

								</th>
								<th width="50%" class="col-padding-1">
									<div class="pull-left">
										<div class="h4 no-margin">Unique Visitors</div>
										<small>25,127</small>
									</div>
									<span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
								</th>
							</tr>
						</thead>

					</table>

				</div>

			</div>


		</div>


		<br />

		<div class="row">

			<div class="col-sm-4">

				<div class="panel panel-primary">
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th class="padding-bottom-none text-center">
									<br />
									<br />
									<span class="monthly-sales"></span>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="panel-heading">
									<h4>Monthly Sales</h4>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>

			<div class="col-sm-8">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">Latest Updated Profiles</div>

						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>

					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Position</th>
								<th>Activity</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>1</td>
								<td>Art Ramadani</td>
								<td>CEO</td>
								<td class="text-center"><span class="inlinebar">4,3,5,4,5,6</span></td>
							</tr>

							<tr>
								<td>2</td>
								<td>Filan Fisteku</td>
								<td>Member</td>
								<td class="text-center"><span class="inlinebar-2">1,3,4,5,3,5</span></td>
							</tr>

							<tr>
								<td>3</td>
								<td>Arlind Nushi</td>
								<td>Co-founder</td>
								<td class="text-center"><span class="inlinebar-3">5,3,2,5,4,5</span></td>
							</tr>

						</tbody>
					</table>
				</div>

			</div>

		</div>

		<br />






		<!-- Footer -->
		<?php include 'components/footer.php';?>
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
