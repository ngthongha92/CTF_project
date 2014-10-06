<?PHP
	session_start();ob_start();
	include_once "./config.php";
?>
<!DOCTYPE html>
<html class=" js no-flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Home</title>

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
			
				<p class="lead">
				
					<h2>CTF HUSC</h2>
					
					<h4><strong>Thong tin cuộc thi:</strong></h4>
					<h4><p>
					Hình thức thi đấu là <a href="http://en.wikipedia.org/wiki/Capture_the_flag#Computer_security" target="_blank">Jeopardy</a>, nghĩa là bạn phải giải quyết từng challenge được đưa ra ở trang <a href="./challenge.php" target="_blank">Thử thách</a> và submit Flag. Các challenge sẽ được chúng tôi post dần. Trong quá trình thi, có thể có vài gợi ý, tùy vào khả năng làm bài của các bạn.
					</p></h4>
					<br>
					
					<h4><strong>Khuôn dạng Flag :</strong></h4>
					<h4><p>
					Flag sẽ có dạng như thế này <strong>Flag{flag_is_here}</strong>, khi submit phải đúng khuôn dạng như vậy. :)
					</p></h4>
					<br>
					
					<h4><strong>Luật thi đấu</strong></h4>
					<h4><p>
					Dựa trên số điểm mà mỗi người chơi ghi được, xếp từ cao xuống thấp, nếu 2 người có cùng số điểm, thứ hạng được ưu tiên cho người submit sớm hơn.
					</p></h4>
				</p>
			</div>
			<hr>
			<footer>
				<p><?PHP echo SITE_INTRO;?></p>
			</footer>
		</div>
	</body>
</html>