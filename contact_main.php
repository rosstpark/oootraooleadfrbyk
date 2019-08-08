<?php include('siteconfig.php'); ?>
<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Contact Form'; 
		$to = $contact_email;
		$subject = 'Message from '.$site_title.' contact form';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		$replyto ="Reply-To: $email";
		
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $replyto)) {
		$result='<div class="alert alert-success">Your message has been sent successfully.</div>';
	} else {
		$result='<div class="alert alert-danger">An error occurred. Please try again later.</div>';
	}
}
	}
?>
<!doctype html>
<html>
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width">
		<title>Contact - <?php echo $site_title; ?></title>
		<meta name="description" content="Contact">
		<meta name="keywords" content="<?php echo $site_keywords; ?>">
		<!-- CSS and Scripts -->
		<?php include 'includes/headscripts.php'; ?>
		<?php include 'ads/head_code.php'; ?>
    </head>
<body>
<?php include 'includes/header.php'; ?>

<div class="box-pagecontent">
<div class="container">
<div class="posttitle">
<h1>Contact Us</h1>
</div>

<div class="randombox">

<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				
				<form class="form-horizontal" role="form" method="post" action="<?php echo $site_url;?>/contact">
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-raised btn-warning">
						</div>
					</div>
					
				</form> 
			</div>
		</div>

</div>

</div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>