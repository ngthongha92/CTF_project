<?PHP

	session_start();ob_start();
	if(!isset($_SESSION["user"])){
		header("Location: ./login.php");
	}
	include_once "./config.php";
	include_once "./include/mysql.class.php";
	include_once "./include/challenges.class.php";
	
?>
<!DOCTYPE html>
<html class=" js no-flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?PHP echo SITE_NAME;?> - Challenges</title>

		<link href="./css/metro-bootstrap.css" rel="stylesheet">
		<link href="./css/font-awesome.css" rel="stylesheet">
		<link href="./css/site.css" rel="stylesheet">
		
		<script src="./js/jquery-2.js"></script>
		<script src="./js/bootstrap.js"></script>
	</head>
	<body>
		<? include_once "./lib/header.php"?>
		<div class="container body-content">
			<div class="row">
				
				<div class="modal fade" id="modalLevel"></div>		
			
				<h2>Challenges</h2>
				<br>
				<br>
				<?PHP
				$db = new database_class(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				$challenge = new challenge($db);
				$a = $challenge->getcat();
					if (!empty($a)){
						foreach ($a as $k => $v) {
							echo '<div class="col-lg-4"><h4><strong>'.$v['catname'].'</strong></h4><div class="bs-example"><ul class="list-group">';
						
						
							$b = $challenge->getid($v["catid"]);
							if (!empty($b)){
							foreach ($b as $m => $n) {
								echo '<li class="list-group-item"><span class="badge">'.$n["point"].'</span><a data-ajax="true" data-ajax-method="GET" data-ajax-mode="replace" data-ajax-update="#modalLevel" data-target="#modalLevel" data-toggle="modal" href="./level.php?id='.$n["challid"].'">'.$n["challtitle"].'</a></li>';
								}
							}
							
							echo '</ul></div></div>';
						}
					}
				?>

			</div>
			<hr>
			<footer>
				<p><?PHP echo SITE_INTRO;?></p>
			</footer>
		</div>
	</body>
</html>