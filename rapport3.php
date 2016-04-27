<!DOCTYPE html>
<?php
session_start();
  include_once("market_bd.php");
 if (!isset($_SESSION['username'])) {
 	header("LOCATION:index.php");
 }
 ?>
 <html>

	<head>
		<link rel="stylesheet" href="css/save.css"/>
	</head>
		<title>Vente</title>
		

	<body>
		<?php
		include("menu2.php");
	   ?>

	<h1>Rapport de vente</h1>
	
	
		<table align="center" border="0" id="r">
			
		<form action="rapport3.php" method="POST">
		
	
		<tr>
			<td><input  type="submit" value="Rapport de vente total" name="Valider" class="long_bouton" /></td>
			
			
		</tr>
		<tr>
			<td><input  type="submit" value="Rapport par produit" name="Val" class="long_bouton" /></td>
			
			
		</tr>
		<tr>
			<td><input  type="submit" value="Rapport par Utilisateur" name="Vali" class="long_bouton" /></td>
			
			
		</tr>
		<tr>
			<td><input  type="submit" value="Rapport par Type" name="Valid" class="long_bouton" /></td>
			
			
		</tr>
		
		</form>
		</table>
	


		<?php
		
	 
		$market = new market();
		$market->connect();


		if(isset($_POST['Valider']))
		{
			
			$rapp=  'SELECT Code_produit, code_type, sum(Quantite), Prix_total, Date_de_vente, Nom_utilisateur FROM  vente  GROUP BY Code_produit, Nom_utilisateur';
			$rap=mysql_query($rapp);

			
		
			if(!$rap)
				echo ''.mysql_error();
			else
				echo "<table>";
				echo "<tr id='bleu'>";
					 echo "<td>"."Code Produit"."</td>";
					 echo "<td>"."Code Type"."</td>";
					 echo "<td>"."Quantite"."</td>";
					 echo"<td>"."Prix total"."</td>";
					 echo "<td>"."Date de vente"."</td>";
					 echo "<td>"."Nom utilisateur"."</td>";
					echo "</tr>";
					
				while ($rappo = mysql_fetch_array($rap))
				 {

				 	echo "<tr id='vert'>";
					 echo "<td>".$rappo["Code_produit"]."</td>";
					 echo "<td>".$rappo["code_type"]."</td>";
					 echo "<td>".$rappo["sum(Quantite)"]."</td>";
					 echo "<td>".$rappo["Prix_total"]." grdes"."</td>";
					 echo "<td>".$rappo["Date_de_vente"]."</td>";
					 echo "<td>".$rappo["Nom_utilisateur"]."</td>";
					 echo "</tr>";	
						
					
				}
			
		    echo "</table>";

		}



	?>


  <?php
	$market = new market();
		$market->connect();


		if(isset($_POST['Val']))
		{
			
			$rapp=  'SELECT Code_produit, code_type, sum(Quantite), sum(Prix_total) FROM  vente  GROUP BY Code_produit';
			$rap=mysql_query($rapp);

			
		
			if(!$rap)
				echo ''.mysql_error();
			else
				echo "<table>";
				echo "<tr id='bleu'>";
					 echo "<td>"."Code Produit"."</td>";
					 echo "<td>"."Quantite"."</td>";
					 
					 echo "<td>"."Prix_total"."</td>";
					echo "</tr>"; 
					
					
				while ($rappo = mysql_fetch_array($rap))
				 {

				 	echo "<tr id='vert'>";
					 echo "<td>".$rappo["Code_produit"]."</td>";
					 echo "<td>".$rappo["sum(Quantite)"]."</td>";
					 
					 echo "<td>".$rappo["sum(Prix_total)"]." grdes"."</td>";
					 echo "</tr>";	
					 
						
					
				}
			
		    echo "</table>";

		}

	?>
	
	<?php
	$market = new market();
		$market->connect();


		if(isset($_POST['Vali']))
		{
			
			$rapp=  'SELECT Nom_utilisateur, code_type, sum(Prix_total),sum(Quantite) FROM  vente  GROUP BY Nom_utilisateur';
			$rap=mysql_query($rapp);

			
		
			if(!$rap)
				echo ''.mysql_error();
			else
				echo "<table>";
				echo "<tr id='bleu'>";
					 echo "<td>"."Nom utilisateur"."</td>";
					 echo "<td>"."Prix total"."</td>";
					 echo "<td>"."Qte produit"."</td>";
					 
					 
					echo "</tr>"; 
					
					
				while ($rappo = mysql_fetch_array($rap))
				 {

				 	echo "<tr id='vert'>";
					 echo "<td>".$rappo["Nom_utilisateur"]."</td>";
					 
					 echo "<td>".$rappo["sum(Prix_total)"]." grdes"."</td>";

					 echo "<td>".$rappo["sum(Quantite)"]."</td>";
					 
					 echo "</tr>";	
					 
						
					
				}
			
		    echo "</table>";

		}

	?>

	<?php
	$market = new market();
		$market->connect();


		if(isset($_POST['Valid']))
		{
			
			$rapp=  'SELECT Nom_utilisateur, code_type, sum(Quantite), sum(Prix_total) FROM  vente  GROUP BY code_type';
			$rap=mysql_query($rapp);

			
		
			if(!$rap)
				echo ''.mysql_error();
			else
				echo "<table>";
				echo "<tr id='bleu'>";
					 echo "<td>"."Nom utilisateur"."</td>";
					 echo "<td>"."Quantite"."</td>";
					 echo "<td>"."Prix total"."</td>";
					 echo "<td>"."Code Type"."</td>";
					 
					 
					echo "</tr>"; 
					
					
				while ($rappo = mysql_fetch_array($rap))
				 {

				 	echo "<tr id='vert'>";
					 echo "<td>".$rappo["Nom_utilisateur"]."</td>";
					 
					 echo "<td>".$rappo["sum(Quantite)"]."</td>";
					 echo "<td>".$rappo["sum(Prix_total)"]." grdes"."</td>";
					 echo "<td>".$rappo["code_type"]."</td>";
					 echo "</tr>";	
					 
						
					
				}
			
		    echo "</table>";

		}

	?>




			


	</body>	
</html>