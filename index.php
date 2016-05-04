<?php
require ("config.php");
session_start();
session_destroy();
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

					<h3 class="hh3" style='text-align:center;'>Pieslēgšanās</h3>
		  		
					<form class="form-horizontal" role="form" method="post" action="index.php" style='align:center';>
						<div class="form-group">
					    	<label class="control-label col-md-4" for="lietotajvards">Lietotājvārds:</label>
					    	<div class="col-md-4">
					      		<input type="text" class="form-control" name="lietotajvards" placeholder="Ievadiet lietotājvārdu">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="password">Parole:</label>
					    	<div class="col-md-4">
					      		<input type="password" class="form-control" name="parole" placeholder="Ievadiet paroli">
					    	</div>
					  	</div>
					  	<div>
							<?php
								if(isset($_POST["pieslegties"])){
									$lietotajvards = @mysql_real_escape_string($_POST["lietotajvards"]);
									$parole = md5(@mysql_real_escape_string($_POST["parole"]));
									$i = 0;
									$result = @mysql_query("SELECT lietotajvards, parole FROM lietotaji WHERE lietotajvards = '$lietotajvards' AND parole = '$parole'");
									while(@mysql_fetch_array($result)){
										$i++;
									}
									if($i == 0) {echo "<p style='color:red; text-align:center; font-family:Arial; font-size: 14px;'>"."Kļūda, rakstot lietotājvārdu vai paroli!";}
									if($i == 1) { 
										header("location:sakums.php");
										session_start();
										$_SESSION['lietotajvards'] = $lietotajvards;
									}
								}
							?>
						</div>
					  	<div class="form-group">
					    	<div class="col-sm-12">
					      		<button type="submit" class="btn btn-success center-block" name="pieslegties" value="Pieslegties">Pieslēgties</button>
					    	</div>
					  	</div>
					  	<div class="col-sm-12 control center-block">
	                		<a href="register.php">Reģistrēties</a><br/>
	                		
		                </div>
					</form>
				</div>
			</div>
		</section>
	</body>
</html>