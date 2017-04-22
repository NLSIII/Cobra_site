<?php
include_once 'includes/cobra.dbcon.php';
include_once 'includes/cobra.php';

sec_session_start();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
    	Alpha
    </title>
<!-- StyleSheets -->
	<link href="css/bootstrapcobra.css" rel="stylesheet">
<!-- Bootstrap JQ & plugins--> 
	<script src="js/jquery-1.11.3.min.js"></script> 
	<script src="js/bootstrap.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$(window).resize(function(){
				$(".fullheight").height($(document).height());
			});
		});
		function statusWindow(window)
		{
			var inv = document.getElementById("inv");
			var stat= document.getElementById("stat");
			var menu= document.getElementById("menu");
			if (window == "inv")
				{
					inv.hidden = false;
					stat.hidden= true;
					menu.hidden= true;
				}
			if (window == "stat")
				{
					inv.hidden = true;
					stat.hidden= false;
					menu.hidden= true;
				}
			if (window == "menu")
				{
					inv.hidden = true;
					stat.hidden= true;
					menu.hidden= false;
				}
		}
	</script>
</head>

<body>
<?php if (login_check($mysqli) == true) : ?>
	<div class="container-fluid" >
		<div class="row" style="margin-left: 20%;">
			<h3>
				Welcome back: <?php echo($_SESSION['gamer_tag']); ?>
			</h3>
		</div>
		<div class="row">
			<!-- 3/4 Side -->
			<div class="col-xs-9" >
				<!-- Veiwing Window -->
				<div class="row thumbnail" style="height:500px;">
					<div class="col-xs-12">
						this is the viewing window
					</div>
				</div>
				<!-- Command Window -->
				<div class="row thumbnail" style="height:200px;">
					<div class="col-xs-12">
						Cmmd window
					</div>
				</div>
			</div>
			<!-- 1/4 Side -->
			<div class="col-xs-3">
				<!-- Map Window -->
				<div class="row thumbnail">
					<div class="col-xs-12" style="height:275px;">
						<img src="/tcinet/Images/F4R1.png" style="width: 100%;">
					</div>
				</div>
				<!-- Status Display -->
				<div class="row thumbnail">
					<div class="col-xs-12 " style="height:405px;">
						<!-- Button Block -->
						<div class="row">
							<div class="col-xs-12">
								<div class="btn-group btn-group-justified" role="group">
									<button type="button" class="btn btn-default" onClick="statusWindow('inv')">Inventory</button>
									<button type="button" class="btn btn-default" onClick="statusWindow('stat')">Stats</button>
									<button type="button" class="btn btn-default" onClick="statusWindow('menu')">Menu</button>
								</div>
							</div>
						</div>
						<!-- Status Window -->
						<div class="row">
							<!-- Player Inventory -->
							<div class="col-xs-12" id="inv">
								<h3>
									Player Inventory:
								</h3>
							</div>
							<!-- Player Stats -->
							<div class="col-xs-12" id="stat" hidden="true">
								<h3>
									Player Stats:
								</h3>
								<div class="row">
									<div class="col-xs-3">
										HP:
									</div>
									<div class="col-xs-7">
										<div class="progress">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (int)$hp/100; ?>%;">
												<span class="sr-only">100%</span>
												<?php echo $hp; ?>
											</div>
										</div>
									</div>
									<div class="col-xs-2">
										/100
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										Att:
									</div>
									<div class="col-xs-7">
										
									</div>
									<div class="col-xs-2">
										20
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										Def:
									</div>
									<div class="col-xs-7">
										
									</div>
									<div class="col-xs-2">
										10
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										Score:
									</div>
									<div class="col-xs-7">
										
									</div>
									<div class="col-xs-2">
										001
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										Money:
									</div>
									<div class="col-xs-7">
										
									</div>
									<div class="col-xs-2">
										000
									</div>
								</div>
								<hr width="90%">
								<div class="row">
									<div class="col-xs-3">
										Cure:
									</div>
									<div class="col-xs-7">
										<div class="progress">
											<div class="progress-bar progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">
												<span class="sr-only">1/7</span>
											</div>
										</div>
									</div>
									<div class="col-xs-2">
										1/7
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<button type="button" class="btn btn-primary btn-group-justified" data-toggle="modal" data-target="#curesitem1"><span class="glyphicon glyphicon-apple"></span></button>
										<!-- Modal Cure Item 1 -->
										<div class="modal fade" id="curesitem1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title" id="myModalLabel">
															Cure Item 1
														</h4>
													</div>
													<div class="modal-body">
													<div class="row">
														<div class="col-xs-8">
															This is a discription of the first item. Maybe an image there ->?
														</div>
														<div class="col-xs-4">
															<img src="/tcinet/Images/logo.png" style="width: 100%;">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<button type="button" class="btn btn-group-justified" data-toggle="modal" data-target="#curesitem2"><span class="glyphicon glyphicon-apple"></span></button>
										<!-- Modal Cure Item 2 -->
										<div class="modal fade" id="curesitem2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title" id="myModalLabel">
															Cure Item 2
														</h4>
													</div>
													<div class="modal-body">
													<div class="row">
														<div class="col-xs-8">
															This one is not unlocked yet!!!
														</div>
														<div class="col-xs-4">
															<img src="/tcinet/Images/Carousel_Placeholder.png" style="width: 100%;">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<button type="button" class="btn btn-group-justified" data-toggle="modal" data-target="#curesitem3"><span class="glyphicon glyphicon-apple"></span></button>
										<!-- Modal Cure Item 3 -->
										<div class="modal fade" id="curesitem3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title" id="myModalLabel">
															Cure Item 3
														</h4>
													</div>
													<div class="modal-body">
													<div class="row">
														<div class="col-xs-8">
															This one is not unlocked yet!!!
														</div>
														<div class="col-xs-4">
															<img src="/tcinet/Images/Carousel_Placeholder.png" style="width: 100%;">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<button type="button" class="btn btn-group-justified" data-toggle="modal" data-target="#curesitem4"><span class="glyphicon glyphicon-apple"></span></button>
										<!-- Modal Cure Item 4 -->
										<div class="modal fade" id="curesitem4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title" id="myModalLabel">
															Cure Item 4
														</h4>
													</div>
													<div class="modal-body">
													<div class="row">
														<div class="col-xs-8">
															This one is not unlocked yet!!!
														</div>
														<div class="col-xs-4">
															<img src="/tcinet/Images/Carousel_Placeholder.png" style="width: 100%;">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<button type="button" class="btn btn-group-justified" data-toggle="modal" data-target="#curesitem5"><span class="glyphicon glyphicon-apple"></span></button>
										<!-- Modal Cure Item 5 -->
										<div class="modal fade" id="curesitem5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title" id="myModalLabel">
															Cure Item 5
														</h4>
													</div>
													<div class="modal-body">
													<div class="row">
														<div class="col-xs-8">
															This one is not unlocked yet!!!
														</div>
														<div class="col-xs-4">
															<img src="/tcinet/Images/Carousel_Placeholder.png" style="width: 100%;">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<button type="button" class="btn btn-group-justified" data-toggle="modal" data-target="#curesitem6"><span class="glyphicon glyphicon-apple"></span></button>
										<!-- Modal Cure Item 6 -->
										<div class="modal fade" id="curesitem6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title" id="myModalLabel">
															Cure Item 6
														</h4>
													</div>
													<div class="modal-body">
													<div class="row">
														<div class="col-xs-8">
															This one is not unlocked yet!!!
														</div>
														<div class="col-xs-4">
															<img src="/tcinet/Images/Carousel_Placeholder.png" style="width: 100%;">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<button type="button" class="btn btn-group-justified" data-toggle="modal" data-target="#curesitem7"><span class="glyphicon glyphicon-apple"></span></button>
										<!-- Modal Cure Item 7 -->
										<div class="modal fade" id="curesitem7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title" id="myModalLabel">
															Cure Item 7
														</h4>
													</div>
													<div class="modal-body">
													<div class="row">
														<div class="col-xs-8">
															This one is not unlocked yet!!!
														</div>
														<div class="col-xs-4">
															<img src="/tcinet/Images/Carousel_Placeholder.png" style="width: 100%;">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Player Menu -->
							<div class="col-xs-12" id="menu" hidden="true">
								<h3>
									Player Menu:
								</h3>
								<div class="row">
									<div class="col-xs-10">
										Save Game:
									</div>
									<div class="col-xs-2">
										<a type="button" href="./tcinet/includes/cobra.die.php" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span></a>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										New Game:
									</div>
									<div class="col-xs-2">
										<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-floppy-remove"></span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
	else : 
	echo('<h1>Time is money and money is time! Server sessions are expensive so you can log back on because we terminated your game... selfish.</h1>');
	endif; 
?>
</body>
</html>