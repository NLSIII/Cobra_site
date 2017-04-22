<?php
include_once './includes/cobra.dbcon.php';
include_once './includes/cobra.php';

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
	</script>
</head>

<body>
	<div class="container-fluid" >
		<!--  Title -->
		<div class="row" style="margin-left: 20%;">
			<h1>
				this is our game Yo
			</h1>
			<p>
				this can be a little discription about it
			</p>
		</div>
		<!--  Log on -->
		<div class="">
			<form class="form-horizontal" role="form" action="includes/cobra.pro.log.php" method="post" name="login_form">
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Password:</label>
					<div class="col-sm-8"> 
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-4">
						<!--<p>You are currently logged ?php echo $logged ?>. ?php if ($logged == 'in') { echo ( 'If you are done, please <a href="includes/logout.php">log out</a>.');}?></p>-->
					</div>
					<div class="col-sm-6">
						<!--<button type="submit" class="btn btn-primary pull-right" value="Login" onclick="formhash(this.form, this.form.password);">Log-in</button>-->
						<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
						<a class="btn btn-default pull-right" href="./cobra_reg.php">Register</a>           
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>