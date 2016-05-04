<?php
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
include("./include/db_class.php");
require_once "./libs/phpmail/PHPMailerAutoload.php";
include("./include/password_class.php");
require_once './libs/ReCaptcha/autoload.php';
$siteKey = '6LdlxR4TAAAAAJttMKrcxZcKQSQIzoTTSSP99WC6';
$secret = '6LdlxR4TAAAAAAn0zhMtEcx_DhMglUVr-OEF6w7Z';
$lang = 'lv';
?>
<!DOCTYPE html>
<html lang="lv">
	<head>
		<meta charset="UTF-8">
		<title>RM&M</title>
		<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="./lib/bootstrap-3.3.5-dist/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="./lib/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="./lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" href="./css/css.css">
	</head>
	<body>
		<section class = "container-fluid">
			<header class = "row">
				<center>
					<a href="http://www.facebook.com/" target="_blank">
	  					<img src="manafoto.jpg"  style="width:200px;height:200px; margin-bottom: 15px">
					</a>	
				</center>
				<form action = "sakums.php" method = "post">
						<button type="submit" name="iziet" class="btn btn-danger" style="font-family:Arial;">Iziet</button>
						<?php
							if(isset($_POST["iziet"])){
								session_destroy();
								header("Location:index.php");
							}
						?>
				</form>
			</header>
			<div class = "row">
				<div class = "col-md-12">
					<nav class="navbar navbar-inverse">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#izvelne">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>                        
					      </button>
						  
					      <a class="navbar-brand" href="index.php">Sākums</a>
					    </div>
					    <div class="collapse navbar-collapse" id="izvelne">
					      <ul class="nav navbar-nav">
					       
							<li><a href="pwd.php">Parole</a></li>
					      </ul>
					    </div>
					</nav>

					<div class="profile-usertitle-name">
					<h3 class="hh3" style='text-align:center;'>Parole</h3>
					<fieldset>
					<form action = "pwd.php" method = "post">
					<div class = "form-group">
						 
		    <form method = "post" action = "pwd.php">
			<div style='text-align:center;'>

			<label class = "t_tabula">E-Pasts</label>
			<br/>
			<input type="text" name="lietotajvards">
			<br/>
			<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
            		<script type="text/javascript"
                    	src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
            		</script>	
			<tr><td colspan = "2" class = "t_tabula"><input type = "submit" class="btn btn-danger " name = "sutit" value = "Atgūt Paroli"/></td></tr>
			<br/>
							<?php 
				//error_reporting(E_ALL);
				//ini_set('display_errors', 1);

				require_once "./libs/phpmail/PHPMailerAutoload.php";

				$mail = new PHPMailer;

				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
				$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
				                                           // 1 = errors and messages
				                                           // 2 = messages only
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
				$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
				$mail->Username   = "matthew13rm@gmail.com";  // GMAIL username
				$mail->Password   = "cojowxvhqcebwocy";                                  
				$mail->FromName   = "Matthew M";                                  
				$mail->addAddress("matthwe13rm@gmail.com", "kkek keke");
				$mail->isHTML(true);
				$mail->CharSet = 'UTF-8';
				$mail->Subject = "Problemas";
				$mail->Body = "<i>nav</i>";




				 ?>
				 </div>

		</div>
	</div>
</div>
	</body>
</html>