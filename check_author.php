<?PHP
	session_start(); ob_start();
	include_once "./config.php";
	include_once "./include/mysql.class.php";
	include_once "./include/challenges.class.php";
?>
<div class="row">
	<?PHP
		$db = new database_class(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$challenge = new challenge($db);
		$flag = $_POST["f1Input"];
		
		$id = $_GET["id"];
		
		$math = $challenge->getpoint($id);
		$check = $challenge->checkflag($flag, $id);
		if($check == 1){
			
			echo '
				<div class="col-lg-12">
				<div class="alert alert-dismissable alert-success">
					congratulation !!!
				</div>
				</div>';
		}
		else echo '
				<div class="col-lg-12">
				<div class="alert aler t-dismissable alert-danger">
					Wrong !!!
				</div>
				</div>';
	?>
</div>