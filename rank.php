<?PHP
	session_start();ob_start();
	include_once "./config.php";
	include_once "./include/mysql.class.php";
	include_once "./include/Team.class.php";
	$db = new database_class(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$team = new team($db);
	$rank = $team->getalluser();
	
?>
<!DOCTYPE html>
<html class=" js no-flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>RANKING</title>

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
			  <div class="col-lg-12">
				<h2>Scoreboard</h2>
				  <table class="table table-bordered table-hover table-striped tablesorter" >
					<thead>
					  <tr>
						<th>#</th>
						<th width="20%">Team Name</th>
						<th width="70%">Result</th>
						<th width="10%">Point</th>
					  </tr>
					</thead>
					<tbody>
					<?PHP
						if(!empty($rank)){
							$count = 1;
							foreach ($rank as $key => $v) {
								echo '<tr>
										<td>'.$count.'</td>
										<td>'.$v["fullname"].'</td>
										<td>'.$v["result"].'</td>
										<td>'.$v["math"].'</td>
									  </tr>';
								$count++;
							}
						}
					?>
					  
					</tbody>
				  </table>
			  </div>
			</div>
			<hr>
			<footer>
				<p><?PHP echo SITE_INTRO;?></p>
			</footer>
		</div>
	</body>
</html>