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
	</head>
		<title>Vente</title>
		

	<body>
		<?php
		include("menu2.php");
	?>
	<h1>Fiche de Vente</h1>
	<div id="border">
	
		<table align="center" border="0" id="ta">
			
		<form action="vente2.php" method="POST">
		<tr>
			
			<td>Code produit </td>
			<td><input  placeholder="1000" type="numeric" size="30" name="code_produit"/></td>
		
		</tr>
		<tr>
			
			<td>Quantite </td>
			<td><input  type="numeric" size="30" name="qte"/></td>
		
		</tr>
		
		
		<tr>
			
			<td>Date de vente </td>
			<td><input  type="date" size="30" name="date" value = "<?php echo date('Y-m-d'); ?>"/></td>
		
		</tr>
		 
	
		<tr>
			<td><input  type="submit" value="Achat" name="achat" class="long_bouton" /></td>
			<td><input  type="submit" value="Liste" name="Read" class="long_bouton" id="l"/></td>
			
		</tr>
		<tr>
		<input  type="submit" value="Valider" name="Save" class="long_bouton" style="width:424px; position:relative; top:136px; left:86px;"/>
		<tr>
		
		</form>
		</table>
		</div>


		<?php
		
	 
		$market = new market();
		$market->connect();

		if(!isset($_SESSION['vente']))
		  $_SESSION['vente'] = array('code' => array(), 'qte' => array());

		

		if(isset($_POST['achat']))
		{
			$Code_produit=$_POST["code_produit"];  
			$Quantite=$_POST["qte"];
			

			$_SESSION['vente']['code'][] = $Code_produit;
			$_SESSION['vente']['qte'][] = $Quantite;

			

		}

		if(isset($_POST['Read']))
		{
			$jimmy=0;
			for($i=0; $i<count($_SESSION['vente']['code']); $i++)
			{	$irmen=$market->prixUnit($_SESSION['vente']['code'][$i])*$_SESSION['vente']['qte'][$i];
				echo "<table>";
					echo "<tr id='bleu'>";
						 echo "<td>"."Code Produit"."</td>";
						 echo "<td>"."Qte en Stock"."</td>";
						 echo "<td>"."Prix Total"."</td>";
					echo "</tr>";
			
					echo "<tr id='vert'>";
						 echo "<td>".$_SESSION['vente']['code'][$i]."</td>";
						 echo "<td>".$_SESSION['vente']['qte'][$i]."</td>";
						 echo "<td>".$irmen."</td>";
					echo "</tr>";		
				

				echo "</table>";

				$jimmy +=$irmen;

					
			}
			echo "<table>";
					echo "<tr id='bleu'>";
					 	echo "<td>"."Prix Total"."</td>";
						echo "</tr>";
						echo "<tr id='vert'>";
						echo "<td>".$jimmy."</td>";
					echo "</tr>";	
			echo "</table>";

			

		}

		if(isset($_POST['Save']))
		{
			$total = 0;

			for($i=0; $i<count($_SESSION['vente']['code']); $i++)
			{
				$Date_de_vente=$_POST["date"];
	           $username=$_SESSION['username'];
				$market->set_code_produit($_SESSION['vente']['code'][$i]);
			   $market->set_qte($_SESSION['vente']['qte'][$i]);
				$market->set_date_vente($Date_de_vente);
				$market->set_Nom_utilisateur($username);

				$total += $market->getPrix();
				$market->stock();
			}
		
			
						

			unset($_SESSION['vente']);	
		}
		

	?>
			


	</body>	
</html>