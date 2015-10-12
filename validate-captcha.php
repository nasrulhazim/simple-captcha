<?php 
	include_once('utils/Session.php'); 
	$status = false;
	$message = '';
	if(isset($_POST) && !empty($_POST) && isset($_POST['input-captcha'])) {
		$captcha = Session::read('captcha');

		if($captcha == $_POST['input-captcha']) {
			$status = true;
			$message = 'Congratulations! You have enter correct CAPTCHA input.';
		} else {
			$message = 'Opsss! Invalid input! Please try again.';
		}

		Session::delete('captcha');
	} else {
		$message = 'Nothing to validate.';
	}
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
				<?php if($status == true): ?>
					<div class="alert alert-success" role="alert"><?= $message; ?></div>
				<?php else: ?>
					<div class="alert alert-danger" role="alert"><?= $message; ?></div>
				<?php endif; ?>
				<center>
					<a href="index.php">Click here to test again CAPTCHA demo.</a>
				</center>
			</div>
		</div>
	</div>

	<?php include_once('footer.php'); ?>

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>