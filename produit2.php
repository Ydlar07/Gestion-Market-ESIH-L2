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
		<link rel="stylesheet" href="css/produit.css"/>
	
		<title>Produit</title>
	</head>
		
		

	<body>
		<?php
		include("menu2.php");
		?>
		<h1>Produits</h1>
	<div id="border">
	
		<table align="center" border="0" id="ta">
			
		<form action="produit2.php" method="POST">
		<tr>
			
			<td>Nom Produit </td>
			<td><input type="text" size="30" name="libelle_produit"/></td>
		
		</tr>
		<tr>
			
			<td>Type produit</td>
			
			<td><select required="required" name="libelle_type">
				<option>autre</option>
				<option>fruits et legumes</option>
				<option>boissons</option>
				<option>produits laitiers</option>
				<option>nourriture d'annimaux</option>
				<option>nourriture bebe</option>
				<option>decoration</option>
				<option>nettoyage</option>
				<option>boulangerie</option>
				<option>vaisselles</option>
				<option>viande</option>	
			</select></td>
		</tr>
		
		<tr>
			
			<td>Prix unit</td>
			<td><input  type="numeric" size="30" name="prix_unite"/></td>
		
		</tr>
		<tr> 	
			
			<td>Quantite </td>
			<td><input  type="numeric" size="30"  name="qte_en_stock"/></td>
		
		</tr>
	
		<tr>
			<td><input  type="submit" value="Ajoute produits" name="Save" class="long_bouton" /></td>
					
		</tr>
		
		</form>
		
		</table>
		
		<div id="liss">
		<a href="liste2.php"><input type="submit"  value="Nouvelle liste" class="long_bouton"/></a>
		</div>

	<?php
		
		 
		$market = new market();
		$market->connect();


		if(isset($_POST['Save']))
		{
			
			
			$libelle_produit=$_POST["libelle_produit"];  
			$libelle_type=$_POST["libelle_type"];
            $prix_unite=$_POST["prix_unite"];
           	$qte_en_stock=$_POST["qte_en_stock"];
			$market->set_libelle_produit($libelle_produit);
			$market->set_libelle_type($libelle_type);
			$market->set_prix_unite($prix_unite);
			$market->set_qte_en_stock($qte_en_stock);

			
			$market->ajoute_produit();
			
		}
		

	?>
			

		</div>
	
	</body>	
</html>