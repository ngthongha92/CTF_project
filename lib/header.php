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
			<?PHP 
					if(isset($_SESSION["user"])) 
					echo '<ul class="nav navbar-nav navbar-right">
							<li>
								<a class="btn dropdown-toggle" data-toggle="dropdown">Hello '.$_SESSION["user"].' <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="./lib/logout.php">Logout</a></li>
								</ul>
							</li>
						</ul>';
					else echo '<ul class="nav navbar-nav navbar-right">
						<li><a href="./Login.php">Login</a></li>
					</ul>';
				?>
		</div>
	</div>
</div>