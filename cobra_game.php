<?php
include_once 'includes/cobra.dbcon.php';
include_once 'includes/cobra.php';

sec_session_start();

include 'includes/cobra.querys.php';
//get the game status
//$stmt = $mysqli->query("SELECT current_room, hp, money, weapon, head, chest, hands, legs, ci_array, pi_array, hi_array, rm_array, dracula, moves FROM game WHERE email = " . $ . " LIMIT 1");
if($stmt = $mysqli->prepare("SELECT current_room, hp, money, weapon, head, chest, hands, legs, ci_array, pi_array, hi_array, rm_array, dracula, moves FROM game WHERE email = ? LIMIT 1"))
{
	$stmt->bind_param('s', $_SESSION['email']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($current_room, $hp, $money, $weapon, $head, $chest, $hands, $legs, $ci_array, $pi_array, $hi_array, $rm_array, $dracula, $moves);
	$stmt->fetch();
	$stmt->close();
}

if($stmt2 = $mysqli->prepare("SELECT name, description, secondary, img, cmds, doors, monster, item FROM rooms WHERE room_id = ? LIMIT 1"))
{
	$stmt2->bind_param('s', $current_room);
	$stmt2->execute();
	$stmt2->store_result();
	$stmt2->bind_result($room_name,$description,$secondary,$img_room,$room_cmds,$doors,$monster,$item);
	$stmt2->fetch();
	$stmt2->close();
}
if ($item != '')
{
	$stmt3 = $mysqli->query("SELECT * FROM items WHERE $item");
	
}
$stmt4 = $mysqli->query("SELECT * FROM items WHERE item_id LIKE 'ci_%'");
$stmt5 = $mysqli->query("SELECT * FROM rooms WHERE $doors");
//populate game board with vars
//if for monster
//if for puzzle
//if for item
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
		function showItems()
		{
			var the_items = document.getElementById("item_div");
			var the_items_button = document.getElementById("items_button");
			//var the_items_pickup = document.getElementById("items_pickup");
			the_items.hidden = false;
			the_items_button.display = 'none';
		}
		function pickup(item_id)
		{
			if (item_id.substring(0, 2) == 'ci')
				{
					var ci = document.getElementById('ci_array');
					var modal = document.getElementById(item_id+'m');
					modal.hidden=true;
					var array_id = item_id.substring(3);
					var array = ci.split(",");
					array[array_id] = "1";
				}
			if (item_id.substring(0, 2) == 'pi')
				{
					var pi = document.getElementById('pi_array');
					var modal = document.getElementById(item_id+'m');
					modal.hidden=true;
					var array_id = item_id.substring(3);
					var array = pi.value.split(',');
					array[array_id-1] = "1";
					alert(array);
					pi.value = array.toString();
					alert(pi.value);
					
				}
			if (item_id.substring(0, 2) == 'hi')
				{
					var hi = document.getElementById('hi_array');
					var modal = document.getElementById(item_id+'m');
					modal.hidden=true;
					var array_id = Number(item_id.substring(3));
					var array = hi.split(",");
					array[array_id] = "1";
					
				}
		}
		function goto(room)
		{
			var current_room = document.getElementById('current_room');
			current_room.value = room;
			form.submit();
			
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
						<?php
							echo "<p>" . $description .  "</p>";
							if($item != '')
							{
								echo "<div id='item_div' hidden='true'>";
								if ($stmt3->num_rows !=0)
								{
									while($rows = $stmt3->fetch_assoc())
									{
										$item_id = $rows['item_id'];
										$item_name = $rows['name'];
										$item_description= $rows['description'];
										$item_cmd = $rows['cmd'];
										$item_id_click = "'".$item_id."'";

										echo'<button type="button" class="btn btn-primary" data-toggle="modal" id="'.$item_id.'m" data-target="#'.$item_id.'">'.$item_name.'</button>
											<!-- '.$item_name.' -->
											<div class="modal fade" id="'.$item_id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">
																'.$item_name.'
															</h4>
														</div>
														<div class="modal-body">
														<div class="row">
															<div class="col-xs-8">
																'.$item_description.'
																<input type="text" hidden="true" value="'.$item_id.'"
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-primary" onClick="pickup('.$item_id_click.')" data-dismiss="modal"> Pick up item</button>
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>
														</div>
													</div>
												</div>
											</div>
										</div>';
									}
								}
								echo "</div>";
							}
						?>
					</div>
				</div>
				<!-- Command Window -->
				<div class="row thumbnail" style="height:200px;">
					<div class="col-xs-12">
					<form role="form" action="includes/cobra.run.php" method="post" name="room_change">
	<input type="text" name="current_room" id="current_room" value="<?php echo $cr; ?>" hidden="true">
	<input type="text" name="hp" id="hp" value="<?php echo $hp; ?>" hidden="true">
	<input type="text" name="money" id="money" value="<?php echo $money; ?>" hidden="true">
	<input type="text" name="weapon" id="weapon" value="<?php echo $weapon; ?>" hidden="true">
	<input type="text" name="head" id="head" value="<?php echo $head; ?>" hidden="true">
	<input type="text" name="chest" id="chest" value="<?php echo $chest; ?>" hidden="true">
	<input type="text" name="hands" id="hands" value="<?php echo $hands; ?>" hidden="true">
	<input type="text" name="legs" id="legs" value="<?php echo $legs; ?>" hidden="true">
	<input type="text" name="ci_array" id="ci_array" value="<?php echo $ci_array; ?>" hidden="true">
	<input type="text" name="pi_array" id="pi_array" value="<?php echo $pi_array; ?>" hidden="true">
	<input type="text" name="hi_array" id="hi_array" value="<?php echo $hi_array; ?>" hidden="true">
	<input type="text" name="rm_array" id="rm_array" value="<?php echo $rm_array; ?>" hidden="true">
	<input type="text" name="dracula" id="dracula" value="<?php echo $dracula; ?>" hidden="true">
	<input type="text" name="moves" id="moves" value="<?php echo $moves; ?>" hidden="true">
	<input type="text" name="email" value="<?php echo($_SESSION['email']);?>" hidden="true">

<?php 
	//if($monster != '')
	if($item != '')
	{
		
		echo('<input type="button" class="btn btn-default" name="items_button" id="items_button" onClick="showItems()" hidden="true" value="Look for Items">');
	}
	if ($stmt5->num_rows !=0)
		{
			while($rows = $stmt5->fetch_assoc())
			{
				$room_id = $rows['room_id'];
				$room_name = $rows['name'];
				$room_id_string = "'".$room_id."'";
				echo '<button type="submit" class="btn btn-default" id="'.$room_id.'" onClick="goto('.$room_id_string.')" hidden="true" value="">go to '.$room_name.'</button>';
				

				
			}
		}					

	
?>
				</form>
					</div>
				</div>
			</div>
			<!-- 1/4 Side -->
			<div class="col-xs-3">
				<!-- Map Window -->
				<div class="row thumbnail">
					<div class="col-xs-12" style="height:275px;">
						<img src="/tcinet/Images/cobra/<?php echo $img_room;?>" style="width: 100%;">
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
											<div class="progress-bar progress-bar-<?php if($hp >=60) echo "success"; if($hp <60 && $hp >=30) echo "warning"; if($hp<30) echo"danger"; ?>" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hp; ?>%;">
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
										<input type="text" disabled="true" id="player_attack" value="Base:10">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										Def:
									</div>
									<div class="col-xs-7">
										
									</div>
									<div class="col-xs-2">
										<input type="text" disabled="true" id="player_attack" value="Base:10">
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
											<div class="progress-bar progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
												<span class="sr-only">1/7</span>
											</div>
										</div>
									</div>
									<div class="col-xs-2">
										0/7
									</div>
								</div>
								<div class="row">
									
										<?php
											if ($stmt4->num_rows !=0)
											{
												$i = 0;
												$ci_array2 = explode(",", $ci_array);
												while($rows = $stmt4->fetch_assoc())
												{
													$item_id = $rows['item_id'];
													$item_name = $rows['name'];
													$item_description= $rows['description'];
													$item_cmd = $rows['cmd'];
													
													if($ci_array2[$i] == '1')
													{
													echo'
													<div class="col-xs-4">
													<button type="button" class="btn btn-primary btn-group-justified" data-toggle="modal" data-target="#'.$item_id.'">'.$item_name.'</button>
														<!-- '.$item_name.' -->
														<div class="modal fade" id="'.$item_id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																		<h4 class="modal-title" id="myModalLabel">
																			'.$item_name.'
																		</h4>
																	</div>
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-xs-8">
																				'.$item_description.'
																				<input type="text" hidden="true" value="'.$item_id.'"
																			</div>
																			<div class="col-xs-4">
																				<img src="/tcinet/Images/logo.png" style="width: 100%;">
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	</div>
																	</div>
																</div>
															</div>
														</div>
													</div>';
													}
													if($ci_array2[$i] == '0')
													{
														echo '<div class="col-xs-4"><button type="button" class="btn btn-default btn-group-justified" disabled>Not Found</button></div>';
													}
													$i++;
												}
											}
										?>
										
									
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
	<!-- monster stats  -->
<input type="text" name="monster_hp" id="monster_hp" value="<?php echo $monster_hp; ?>" hidden="true">
<input type="text" name="monster_attack" id="monster_attack" value="<?php echo $monster_attack; ?>" hidden="true">
<input type="text" name="monster_item" id="monster_item" value="<?php echo $monster_item; ?>" hidden="true">
<!-- game form -->

<?php 
	
	else : 
	echo('<h1>Time is money and money is time! Server sessions are expensive so you can <a href="./cobra_login.php">log back on</a> because we terminated your game... selfish.</h1>');
	endif; 
?>
</body>
</html>