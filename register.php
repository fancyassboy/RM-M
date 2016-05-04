<?php
include("config.php");
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
					        <li><a href="1var.php">Izvade</a></li>
					        <li><a href="2var.php">Ievade</a></li>
							<li><a href="3var.php">Labošana</a></li>
							<li><a href="4var.php">Dzēšana</a></li>
							<li><a href="pwd.php">Parole</a></li>
					      </ul>
					    </div>
					</nav>

					<h3 class="hh3" style='text-align:center;'>Reģistrācija</h3>
		  		
					<form class="form-horizontal" role="form" method="post" action="register.php" style='align:center' enctype="multipart/form-data";>
					  <div class="form-group">
					    <label class="control-label col-sm-5" for="vards">Vārds:</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" name="vards" placeholder="Ievadiet vārdu">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-5" for="uzvards">Uzvārds:</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" name="uzvards" placeholder="Ievadiet uzvārdu">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-5" for="lietotajvards">Lietotājvārds:</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" name="lietotajvards" placeholder="Ievadiet lietotājvārdu">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-5" for="password">Parole:</label>
					    <div class="col-sm-5">
					      <input type="password" class="form-control" name="parole1" placeholder="Ievadiet paroli">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-5" for="password">Atkārtoti parole:</label>
					    <div class="col-sm-5">
					      <input type="password" class="form-control" name="parole2" placeholder="Atkārtoti ievadiet paroli">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-5" for="epasts">E-pasta adrese:</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" name="epasts" placeholder="Ievadiet e-pastu">
					    </div>
					  </div>
						<?php
							if(isset($_POST["saglabat"])){
								//pārbaude, vai paroles sakrīt
								if($_POST['parole1'] == $_POST['parole2']){
									$vards =  mysql_real_escape_string($_POST["vards"]); 
									$uzvards =  mysql_real_escape_string($_POST["uzvards"]); 
									$lietotajvards = mysql_real_escape_string($_POST["lietotajvards"]); 
									$epasts = mysql_real_escape_string($_POST["epasts"]); 
									$parole = md5(mysql_real_escape_string($_POST["parole1"])); 
									//infromācijas saglabāšana datu bāzē
									mysql_query("INSERT INTO lietotaji (vards, uzvards, lietotajvards, parole, epasts)
									VALUES ('$vards', '$uzvards', '$lietotajvards', '$parole', '$epasts')");
									
								}// paroļu if beigas
							else {echo "<p style='color:red; text-align:center; font-family:Arial; font-size: 14px;'>"."Paroles nesakrīt, lūdzu ievadiet nepieciešamo informāciju vēlreiz!";}
							}//if beigas
						?>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <button type="submit" class="btn btn-danger center-block" name="saglabat" value="Reģistrēties">Reģistrēties</button>
					    </div>
					  </div>
					</form>
				</div>
			</div>
		</section>
	</body>
</html>