<?php
require ("config.php");
session_start();
session_destroy();
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
	<meta charset="utf-8">
	<title>Siman | Login</title>

	<!-- Google Fonts -->

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>




</head>

<body>

   <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#">Smuki!</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Login</a>
                    </li>
				 <li>
                        <a class="page-scroll" href="register.php">Register</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Help</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"></span></h1>
		</div>
		<div class="login-box">
                <div id = "vidus">
			<div class="box-header">
				<h2>Aizmirsu paroli</h2>
			</div>


    <div id = "vidus">
    <form method = "post" action = "pwd.php">

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
$mail->addAddress("matthew13rm@gmail.com", "kkek keke");
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Subject = "Pusdienas";
$mail->Body = "<i>Test</i>";




if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

 ?>

		</div>
	</div>
</div>
</body>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>


</html>