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
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/produit.css"/>
		
		<title>Modifier</title>
	</head>
<body>	
	<?php
		include("menu2.php");
	?>
	

		<h1>Modifier un produit</h1>

		<div id="border">
	
			<table id="ta">
				<form action="modifier2.php" method="POST">
					<tr>
						
						<td>Libelle du produit a modifier </td>
						<td><input type="text" size="30" name="libelle_produit"/></td>
					
					</tr>
					<tr>
						
						<td>modifier prix</td>
						<td><input type="text" size="30" name="prix_unite"/></td>
					
					</tr>
					<tr>
						
						<td>modifier quantite</td>
						<td><input type="text" size="30" name="qte_en_stock"/></td>
					
					</tr>
					
					<tr>
						<td><input type="submit" value="Enregistrer les modifications" name="Save" id="m" class="long_bouton" /></td>
							
					</tr>
		
				</form>
			</table>

			<div id="liss">
				<a href="liste.php"><input type="submit"  value="Nouvelle liste" class="long_bouton"/></a>
			</div>

		</div>

		<?php
	 
		$market = new market();
		$market->connect();
		


		
		

		if(isset($_POST['Save']))
		{
			
			
			$libelle_produit=$_POST["libelle_produit"];
			$prix_unite=$_POST["prix_unite"];
            $qte_en_stock=$_POST["qte_en_stock"];
			$market->set_libelle_produit($libelle_produit);
			$market->set_prix_unite($prix_unite);
			$market->set_qte_en_stock($qte_en_stock);
			
			$market->modifier();
			
		}

		

	?>
	
<body>
	
</html>	
		