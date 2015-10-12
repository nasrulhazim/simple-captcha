<?php 
	include_once('utils/Session.php'); 
	Session::init();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Captcha Demo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="container">
		<div class="page-header">
	        <h1>Captcha Demo</h1>
	    </div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
				<center>
					<h4>
					CAPTCHA
					<div data-toggle="tooltip" data-placement="top" title="" class="btn btn-xs btn-primary" onclick="reload_captcha();" data-original-title="Change CAPTCHA code">
						<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
					</div>
					</h4>
					<img src="captcha.php" id="image-captcha" class="img img-responsive img-polaroid" alt="">
				</center>
				
				<form action="validate-captcha.php" method="POST">
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input name="input-captcha" class="form-control" placeholder="Please enter the two words." type="text" id="input-captcha">
					</div>	

					<button type="submit" class="btn btn-success btn-block">Submit</button>
				</form>
			</div>
		</div>
	</div>

	<?php include_once('footer.php'); ?>

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function reload_captcha() {
			document.getElementById('image-captcha').src = "captcha.php?rnd=" + Math.random();
		}
	</script>
</body>
</html>