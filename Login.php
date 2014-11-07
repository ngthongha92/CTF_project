<?PHP
	session_start();ob_start();
?>
<!DOCTYPE html>
<?PHP
	if(isset($_SESSION["user"])) header("Location: ./challenge.php");
	include_once "./config.php";
	include_once "./include/mysql.class.php";
	include_once "./include/Team.class.php";
	if($_POST["submit"]){
		$db = new database_class(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$team = new team($db);
		$message = $team->checklogin($_POST["UserName"], $_POST["Password"]);
		$_SESSION["user"] = $team->getname($_POST["UserName"]);
	}
?>
<html class=" js no-flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?PHP echo SITE_NAME;?> - Login</title>

		<link href="./css/metro-bootstrap.css" rel="stylesheet">
		<link href="./css/font-awesome.css" rel="stylesheet">
		<link href="./css/site.css" rel="stylesheet">

		<script src="./js/jquery-2.js"></script>
		<script src="./js/bootstrap.js"></script>

	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<a class="navbar-brand" href="#"><img src="img/whitehatlogo.png"></a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="./index.php">Home</a></li>
						<li><a href="./challenge.php">Challenges</a></li>
						<li><a href="./rank.php">Rank</a></li>
					</ul>     
					<ul class="nav navbar-nav navbar-right">
						<li><a href="./Login.php">Login</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container body-content">
			<div class="row">
				<p class="lead">
					<h2>Login</h2>
					<?PHP
						if($message =="" || $message ==null);
						else if($message !="successful") echo '<div class="alert alert-dismissable alert-danger">'.$message.'</div>';
						else echo '<script type="text/javascript">window.location = "./challenge.php"</script>';
					?>
					<section id="loginForm">
						<form novalidate="novalidate" action="" class="form-horizontal" method="post" role="form">
							<hr>
							<div class="form-group">
								<label class="col-md-2 control-label" for="UserName">Username :</label>
								<div class="col-md-10">
									<input class="form-control" data-val="true" data-val-required="Chưa điền username" id="UserName" name="UserName" type="text">
									<span class="field-validation-valid" data-valmsg-for="UserName" data-valmsg-replace="true"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="Password">Password :</label>
								<div class="col-md-10">
									<input class="form-control" data-val="true" data-val-required="Chưa điền password" id="Password" name="Password" type="password">
									<span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-10">
									<input value="Login" class="btn btn-default" type="submit" name ="submit">
								</div>
							</div>
						</form>        
					</section>
				</p>
			</div>
			<hr>
			<footer>
				<p><?PHP echo SITE_INTRO;?></p>
			</footer>
		</div>
	</body>
</html>