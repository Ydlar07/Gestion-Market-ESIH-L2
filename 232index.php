<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	
	<body>
	
	<div id="border" >
	<form action="login.php" method='POST'>
	<table align="center" border="0">
	<tr>
		<td>Se connecter </td>
		<td><input type="text" name="login" size="30" placeholder="Nom utilisateur" maxlength="250" ></td>
	</tr>
	
	<tr>
		<td>Password </td>
		<td><input type="password" name="pass" size="30" placeholder="password" maxlength="10"></td>
	</tr>
	
	<td>
		<button><input type="submit" value="Login" class="long_bouton" name="connexion" /></button>		
	</td>
	
	</table>
	</form>
	</div>
	
	</body>


</html>