<?PHP
	include_once "./config.php";
	include_once "./include/mysql.class.php";
	include_once "./include/challenges.class.php";
	$db = new database_class(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$challenge = new challenge($db);
	$id = (int)$_GET["id"];
	if($challenge->checkID($id) == 0) echo '<SCRIPT language="JavaScript">window.location="./challenge.php";</SCRIPT>';
?>
<script>
	(function () {

		var formOne = function () {
			var formData = $("#formOne").serialize();
			var getid = <? echo $_GET["id"]; ?>;
			$.ajax({ url: './check_author.php?id=' + getid,
				data: formData,
				type: 'post',
				complete: function(output) {
							 $('#formOneResults').html(output.responseText);
						 }
			});	  	
		};
		
		$(document).ready(function () {
			$("#formOneBtn").on("click", function(e){
				e.preventDefault();
				formOne();
			});    	
			
			
		});

	} ()); 
</script>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
			<a href="#" class="close" data-dismiss="modal">×</a>
			<h4><b><? echo $challenge->gettitle($_GET["id"])." - ".$challenge->getpoint($_GET["id"]); ?></b></h4>
		</div>
		<div class="modal-header">
			<? echo $challenge->getcontent($_GET["id"]); ?>
		</div>
		<div class="modal-body">
			<div id="formOneResults"></div>
			<form name="formOne" id="formOne">
				<div class="col-sm-9">
					<input type="text" class="form-control" id="input01" name="f1Input" placeholder="Flag here ...">
				</div>  
			 
				<div class="form-actions">  
					<button name="formOneBtn" id="formOneBtn" class="btn btn-primary">Submit Flag</button>
				</div>  
			</form>
      </div>
    </div>
</div>






