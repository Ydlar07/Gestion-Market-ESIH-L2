<?php

  include_once("market_bd.php");
 if (!isset($_SESSION['username'])) {
 	header("LOCATION:index.php");
 }

  ?>
		 <link rel="stylesheet" href="css/menu.css"/>
		<header>
			
			<div id="user_dec">
			<div id="note">
					<a href="note3.php" style="font-size:15px">Notification</a><span style="color:yellow; background-color:gray; border-radius:50%; padding-right:4px; padding-bottom:3px;"><?php $rup = new market(); echo "   ".mysql_result($rup->notif(), 0); ?></span>
					<!--input type="submit"  value="Notifications"/-->
			</div>
			 <div id="deconnection">
					<a href="index.php?sess=deco"><input type="submit" value="Deconnection" name="deconnection" /></a>
			</div>
			</div>
			
			
			<div id="recherche">
					<form method="POST">
					<input  type="text" placeholder="recherche" size="25"  name="inputS"/>
					<input  type="submit" value="Recherche" size="25"  name="search"/>
				
					</form>	
			</div>
								          	 
			 			
			<nav>
					<ul> 
                    	 <li><?php echo "Bienvenue  ".$_SESSION['username']; ?> </li>
                    </ul>
                    <ul>  
                        <li><a href="liste3.php">Listes</a></li>
                        
						<li><a href="vente3.php">Vente</a></li>
						
						
                    </ul>
            </nav>
		
		</header>	
		
<?php
		$market = new market();
		$market->connect();
	 
		if(isset($_POST['search']))
		
		{ 
			$find=$_POST["inputS"];
			$market->set_find($find);
			$market->recherche();
			 
		}

 
?>

	

	