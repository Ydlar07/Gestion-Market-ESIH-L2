
 <?php 
  
   
	if (isset($_POST['submit'])) 
	 {
	 	 
	 	 $prenom = htmlentities(trim($_POST['prenom']));
	 	   if (preg_match("#[0-9]\!\*\@\%\^\&\(\)\.\?\,\_\=\+\/\>\<\`\;\'\:#", $prenom)) 
	 	 	 { 
	 	 	  echo "Le prenom doit avoir uniquement des alphabets.";
	 	 	 }
	 	 else { echo "" ;
	 	  }   
 
	 	 $nom = htmlentities(trim($_POST['nom']));
 	 	    if (preg_match("#[0-9]\!\*\@\%\^\&\(\)\.\?\,\_\=\+\/\>\<\`\;\'\:#", $nom)) 
	 	 	 {
	 	 	 
	 	 		 echo "Le nom doit avoir uniquement des alphabets. ";
	 	 	 }
	 	 else { echo "" ;
	 	  }    	 

	 	 $sexe = htmlentities(trim($_POST['sexe'])); 
	 	 
	 	 $mail = htmlentities(trim($_POST['mail']));
	 	  if (preg_match("#\@#", $mail)) 
	 	 	 {
	 	 	  
	 	 		 echo " ";
	 	 	 }
	 	 else { echo "Le mail doit avoir uniquement des chiffres"."<br>" ; 	 } 
	 	  
	 	 $telephone = htmlentities(trim($_POST['telephone']));
	 	 if (preg_match("#[0-9]#", $telephone)) 
	 	 	 {
	 	 	 
	 	 		 echo " ";
	 	 	 }
	 	 else { echo "Le numero doit avoir uniquement des chiffres"."<br>" ;
	 	  }    	 

	 	 $naissance = htmlentities(trim($_POST['datenai']));
	 	 
	 	 $adresse = htmlentities(trim($_POST['adresse']));
	 	 
	 	 $role = htmlentities(trim($_POST['role']));
		 
		 $username = htmlentities(trim($_POST['username']));
		 
		 $password = htmlentities(trim($_POST['password']));
		 
		 $newpassword = htmlentities(trim($_POST['newpassword']));
		 
		 $compteurpass = strlen($password);
		
    
//----------------------------------------------------------------------------------------------------------------
		 if ($compteurpass<4 || $compteurpass>12 || $username>4 ) 
		{
		 	echo "Username doit etre plus grand que 4 et le mot de passe doit etre superieur a 4 et inferieur a 12";  
		} 
		elseif ($password!==$newpassword) {echo "LES DEUX MOTS DE PASSE DOIVENT CORRESPONDRE";}
		 
		 else 
		{ 
		$connect = mysql_connect('localhost','root','')or die('Erreur de connection');
		mysql_select_db('login', $connect);
        $query= mysql_query("SELECT * FROM users WHERE username ='$username' or (nom='$nom' and prenom='$prenom')");
       //$test = mysql_query("SELECT COUNT(*) FROM users WHERE username ='$username'");


         $existence= mysql_num_rows($query);
         //$password = sha1($password);
      //$pseudo_free=($test==0)?1:0;
      

 //echo $existence;
         // TEST SUR EXISTENCE D'UN UTILISATEUR 
      	 if($existence==0)
      {
      	  
      	 $query = mysql_query("INSERT INTO users VALUES('','$username','$password','$sexe','$mail','$role','$adresse','$naissance','$telephone','$nom','$prenom')");
			die( header("LOCATION:index.php" ));  
			   
      }
      	 else
      	    echo "Ce utilisateur existe deja.";
	  	 
	 
	 }	  
	 }

?>

<DOCTYPE html>
 
	<html>
		<head>
			<title>**Nadia MARKET**</title>`
			
			<link rel="stylesheet" type="text/css" href="css/enregistrer.css"/> 
		</head>

		<body> 
			<div id="border">
			<h1>Creer un compte</h1>
			<hr/>
			<table align="center"  >
					<form method = "POST" action = "register.php">
					 <tr>	
					 	<td>NOM</td>
					 	<td><input type="text" required ="required" name ="nom" placeholder ="John"/></td>
					 </tr>
					 
					 <tr>	
					 	<td>PRENOM</td>
					 	<td><input type="text" required ="required" name ="prenom" placeholder ="Legend"/></td>
					 </tr>


					 <tr> 
					 	<td>SEXE</td>
					 	<td>
					 		<select  name="sexe" id="sexe">
					 			<option value="">SEXE</option>
					 			<option value="homme">Masculin</option>
					 			<option value="feminin">Feminin</option>
					 		 </select> 
					 </tr>

					 <tr>	
					 	<td>EMAIL</td>
					 	<td><input type="text" required ="required" name ="mail" placeholder ="exemple@nadia.net "/></td>
					 </tr> 


					 <tr>	
					 	<td>ROLE</td>
					 	<td><!--<input type="text" required ="required" name ="role"/>-->
					 		<select name="role" id="role">
					 			<option value="CAISSIER">CAISSIER</option>
					 			<option value="ADMIN">ADMIN</option>
					 			<option value="SUPERVISEUR">SUPERVISEUR</option>
					 			
					 		</select>
					 	</td>
					 </tr>
					 <tr>	
					 	<td>ADRESSE</td>
					 	<td><input type="text" required ="required" name ="adresse" placeholder =" nazon"/></td>
					 </tr>
					 <tr>	
					 	<td>NAISSANCE</td>
					 	<td><input type="date" required ="required" name ="datenai" placeholder ="6/12/1993"/></td>
					 </tr> 

					 <tr>	
					 	<td>TELEPHONE</td>
					 	<td><input type="text" required ="required" name ="telephone" placeholder ="3333-9999"/></td>
					 </tr>

					 <tr>	
	 		 	        <td>NOM UTILISATEUR</td>
					 	<td><input type="text" required ="required" name ="username" placeholder ="Shabba"/></td>
					 </tr> 
					 	
					 <tr>	
					 	<td> MOT DE PASSE </td>
					 	<td><input type="password" required ="required" name ="password"/></td>
		 			 </tr>
		 			  <tr>	
					 	<td>CONFIRMER</td>
					 	<td><input type="password" required ="required" name ="newpassword"/></td>
		 			 </tr> 

		 			 <tr>
		 			 	<td id="liss"><input type="submit"  value="ENREGISTRER" name ="submit" class="long_bouton"/></td> 
		 			 	<td><a href="liste.php" id="liss" class="long_bouton">CANCEL</a></td>
		 			 </tr>

		 			
		 			  
		 			</form>
		 	</table>
		 	</div>
		 		<footer class ="pied">
					 <small><p> Design by Valbrune, Morin, Docteur, Ariste, Saint-Preux.</p></small>
				</footer> 

		 	
		 	 	
		</body> 
	</html>
