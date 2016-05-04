<?php
include("config.php");
?>
<?php
session_start();
if(!isset($_SESSION['lietotajvards']))
{ header("location:index.php"); }
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

					<h3 class="hh3" style='text-align:center;'>Datu labošana</h3>
				        	<form action = "3var.php" method = "get">
							<?php
							
						//informācijas atpoguļošana
							$result = mysql_query("SELECT * FROM prieksmeti")or die(mysql_error());
								//nodrošina nummerāciju
								$i = 0;
								echo "<table>";
								while($row = mysql_fetch_array($result)) {
								$i++;
									echo "<tr>";
									echo "<td width='300px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>{$i}.</b></td>";
									echo "<td width='300px' align = 'center'><div class = 'tabulas_teksts' align = 'left'><b>{$row['prieksmets']}</b></td>";
									echo "<td width='300px'><a href='3var.php?ID={$row['ID']}'>Labot</a></td>";
									echo "</tr>";
								}
								echo "</table><hr/>";
							
								
							//atrodam ierakstu kuru gribēsim labot. tā kā sākumā nav padots id, pēc kura varētu labot ierakstu ir jāpārbaudatā vērtība true vai false
						if(isset($_GET['ID']) == true){
							$test = $_GET['ID'];	
							$result = mysql_query("SELECT * FROM prieksmeti WHERE ID = $test")or die(mysql_error());
							while($row = mysql_fetch_array($result)) {
									$lab_prieksmets =  $row['prieksmets'];
							}		
							
							echo "<div style = 'color:#ffffff'><b>Ieraksts kurš tiks labots:</b> {$lab_prieksmets}</div>";
							//echo $test;
						
						
						?>
						<br/>
							<input type = "text" value = "<?php echo $lab_prieksmets ?>" name = "labpr"/>
							<input type = 'hidden' name = 'ids' value = '<?php echo $test ?>'/>
							<input type = "submit" value = "Salgabāt" name = "save"/>
						
						<?php
						}
							if(isset($_GET['save'])) {
							$id = $_GET['ids'];
								$pr = $_GET['labpr'];
								 $result = mysql_query("UPDATE prieksmeti SET 
								 prieksmets = '$pr'
								 WHERE ID = '$id'")or die(mysql_error()); 
							}
						?>
						<div style='text-align: right'>
										<a href = "3var.php"><b>Atjaunot</b></a><br/>
										<a href = "sakums.php"><b>Atpakaļ</b></a>
									</div>
							</div>  
				</div>
			</div>
		</section>
	</body>
</html>