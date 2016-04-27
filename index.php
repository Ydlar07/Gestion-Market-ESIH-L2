<?php 
session_start(); 
if(isset($_GET["sess"] ) AND $_GET["sess"]==="deco" ){
 	$_SESSION['username']=null;
session_destroy();
 
 }
 ?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<title>**BIENVENUE Nadia MARKET**</title>
			<link rel="stylesheet" type="text/css" href=""/>
			<link rel="stylesheet" href="css/login.css"> 
		</head>

		<body>
		<div id="border" >
			<h1>Connectez vous</h1>
			<hr/>
			<table align="center" >
					<form method = "POST" action = "index.php">
					 <tr>	
					 	<td>Username</td>
					 	<td><input type="text" required ="required" size="30" placeholder="claudel" name ="username" /></td>
					 </tr>
					 	
					 <tr>	
					 	<td>MOT DE PASSE</td> 
					 	<td><input type="password" required ="required" size="30" name ="password"/></td>
		 			 </tr>
		 			 <tr>
		 			 	 <td><input type ="submit" value ="connexion" class="long_bouton" name ="connexion"/></td> 
		 			
		 			 </tr>
		 			  
		 			</form>
		 	</table>
		 </div>
		 <div>
		 <footer class ="pied">
					 <small><p class="foo"> Design by Valbrune, Morin, Docteur, Ariste, Saint-Preux.</p></small>
		 </footer>
		 </div> 
	</body>
</html>		 

<?php
         
	if (isset($_POST['connexion']))
	{
		 
	     $username = htmlentities($_POST['username']);
	     $password = htmlentities($_POST['password']);
	    // $password = sha1($password); 

	     $connect = mysql_connect('localhost','root','')or die('Erreur de connection');// connexion de la bd
		 mysql_select_db('login', $connect);
     //test sur authentification et role de l'utilisateur    	 
	     $verifie = mysql_query("SELECT username FROM users WHERE mdp='$password'");
	     $nbr=mysql_num_rows($verifie);
	   
	     $roleadm = mysql_query("SELECT * FROM users WHERE username='$username' and role='ADMIN'");
	     $adm= mysql_num_rows($roleadm);
	  
	     $rolesup = mysql_query("SELECT * FROM users WHERE username='$username' and role='SUPERVISEUR'");
	     $superviseur = mysql_num_rows($rolesup);
	   
	     $rolecaissier = mysql_query("SELECT * FROM users WHERE username='$username' and role='CAISSIER'");
	     $caissier = mysql_num_rows($rolecaissier);
	   
//---------------------------------------test sur role----------------------------------------------//       
	 echo($nbr." ".$adm." ".$superviseur." ".$caissier);
	 	
		if ($nbr!==0 && $adm == 1)# si username et password + role admin an bd a 
		 	 { 
		 	 	$_SESSION['username'] =$username;
		 	 header("LOCATION:liste.php"); 
		 	 echo "BIENVENUE adm".$roleadm;
		 	 } 
		
		elseif ($nbr!==0 && $superviseur == 1) 
		  	{
		  		$_SESSION['username'] =$username;
		  	 header("LOCATION:liste2.php"); 
		     echo "welcome superviseur";
		  	 echo $rolesup;
		  	} 

		
		elseif ($nbr!==0 && $caissier == 1)
			 {
			 	$_SESSION['username'] =$username;
		  		header("LOCATION:liste3.php");
		  	 echo "bravo caissier";
		  	 echo $rolecaissier;
		  	 }
		
		else
		  echo "Mot de passe invalide. Recommencez ou contacter ADM";
   }

?>		
			 
		 