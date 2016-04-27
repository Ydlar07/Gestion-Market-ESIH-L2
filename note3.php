<!DOCTYPE html>
<?php

	include_once("market_bd.php");
  ?>
<html>

	<head>
		<?php
			 session_start();
			 if (!isset($_SESSION['username'])) {
			 	header("LOCATION:index.php");
			 }
		?>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/modifier.css"/>
		
		<title>Modifier</title>
	</head>
<body>	
	<?php
		include("menu3.php");
	?>
	

		<h1>la liste des produits</h1>



			
	<?php
		
		$market = new market();
		//$market->connect();
		
		$market->listenote();
		


	?>
</div>
			
	
		
	
</body>
	
</html>	
		