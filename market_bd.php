<?php 

class market
{
 
 	//attributs
	private $code_type;
	private $code_produit;
	private $libelle_type;
	private $libelle_produit;
	private $qte_en_stock;
	private $prix_unite;
	private $date_vente;
	private $id_vente;
	private $total;
	private $Nom_utilisateur;
	 
	private $find;

	//contructeurs"
	public function __construct()
	{
		//echo "1";
		
	}

 
	


	


	//fonctions
	public function set_code_type($code_type)
	{
		$this->code_type=$code_type;
 	}

	public function set_code_produit($code_produit)
	{
		$this->code_produit=$code_produit;
	}

	public function set_libelle_type($libelle_type)
	{
		$this->libelle_type=$libelle_type;
	}

	public function set_libelle_produit($libelle_produit)
	{
		$this->libelle_produit=$libelle_produit;
	}

	public function set_qte_en_stock($qte_en_stock)
	{
		$this->qte_en_stock=$qte_en_stock;
	}

	public function set_prix_unite($prix_unite)
	{
		$this->prix_unite=$prix_unite;
	}


	public function set_date_vente($date_vente)
	{
		$this->date_vente=$date_vente;
	}


	public function set_total($total)
	{
		$this->total=$total;
	}

	 

	public function set_find($find)
	{
		$this->find=$find;
	}

	public function set_qte($qte)
	{
		$this->qte=$qte;
	}

	public function set_Nom_utilisateur($nom_utilisateur)
	{

	$this->Nom_utilisateur=$nom_utilisateur;
	}





	//autres fonctions
	public function get_code_type()
	{
		return $this->code_type;
	}

	public function get_code_produit()
	{
		return $this->code_produit;
	}

	public function get_libelle_type()
	{
		return $this->libelle_type;
	}

	public function get_libelle_produit()
	{
		return $this->libelle_produit;
	}

	public function get_qte_en_stock()
	{
		return $this->qte_en_stock;
	}

	public function get_prix_unite()
	{
		return $this->prix_unite;
	}


	public function get_date_vente()
	{
		return $this->date_vente;
	}


	public function get_total()
	{
		return $this->total;
	}

	 

	public function get_find()
	{
		return $this->find;
	}

	public function get_qte()
	{
		return $this->qte;
	}

	public function get_Nom_utilisateur()
	{
		return $this->Nom_utilisateur;
	}




	    //----------------------- Base de donnees -----------------------------
		public function connect()
		{
			if(!mysql_connect('localhost','root'))
			{
				 echo'Connection Impossible';
				exit();
			} 
			else
			{
				mysql_select_db('login');
			     echo'';
			     echo'';
			}
		}


		 public function ajoute_produit()
		{	
			$libeltyp= $this->get_libelle_type();
			$codtyp ='SELECT code_type FROM type_produit WHERE libelle_type= "'.$libeltyp.'"';
			$codo=mysql_query($codtyp); 
			if(!$codo)
			{
				echo ''.mysql_error();
			}
			else
			{
				while ($is = mysql_fetch_array($codo))
				{
					
					$mike= $is['code_type'];
				}
			}

			// code poun mete code produit a deyo
			$libelprod= $this->get_libelle_produit();
			$codprod ='SELECT code_produit FROM produit WHERE libelle_produit= "'.$libelprod.'"';
			$prod=mysql_query($codprod); 
			if(!$prod)
			{
				echo ''.mysql_error();
			}
			else
			{
				while ($isprod = mysql_fetch_array($prod))
				{
					
					$raldy= $isprod['code_produit'];
				}
			}

			// code poun mete qte produit a deyo
			
			$qteprod ='SELECT qte_en_stock FROM produit WHERE libelle_produit= "'.$libelprod.'"';
			$kantite=mysql_query($qteprod); 
			if(!$kantite)
			{
				echo ''.mysql_error();
			}
			else
			{
				while ($iskantite = mysql_fetch_array($kantite))
				{
					
					$claudel= $iskantite['qte_en_stock'];
				}
			}


			//requet pour ajoute produit
        $test = mysql_query('SELECT libelle_produit, prix_unite FROM produit WHERE libelle_produit="'.$this->get_libelle_produit().'" and prix_unite="'.$this->get_prix_unite().'"');
	     $tes= mysql_num_rows($test);

	     if(!$tes){
	   

			$add ='Insert Into produit(libelle_produit,code_type,prix_unite,qte_en_stock) VALUES("'.$this->get_libelle_produit().'","'.$mike.'","'.$this->get_prix_unite().'","'.$this->get_qte_en_stock().'")';
			
			$isadd=mysql_query($add);
		          }
		          else
		          {
		          	$item=$this->get_qte_en_stock();
		          	$som= $item + $claudel ;
		          

           $up ='UPDATE produit SET libelle_produit= "'.$this->get_libelle_produit().'" ,code_type = "'.$mike.'", prix_unite= "'.$this->get_prix_unite().'", qte_en_stock="'.$som.'" WHERE code_produit="'.$raldy.'"';
			
			$upd=mysql_query($up);
			echo "Vous avez ajoute un produit avec succes";

		          }

			
				
			mysql_close();
		}


		  public function recherche()
		{
			$trouve=$this->get_find();
			 $rech="SELECT * FROM  produit WHERE libelle_produit LIKE  '%$trouve%'  OR code_type LIKE '%$trouve%'  OR code_produit LIKE '%$trouve%' " ;
			$isok=mysql_query($rech); 
			
			if(!$isok)
				{
					echo ''.mysql_error();
				}
			else
			{
				
					echo "<table>";
				echo "<tr id='bleu'>";
					 echo "<td>"."Code Produit"."</td>";
					 echo "<td>"."Nom Produit"."</td>";
					 echo "<td>"."Code Type"."</td>";
					 echo "<td>"."Prix Unite"."</td>";
					 echo "<td>"."Qte en Stock"."</td>";
					echo "</tr>";
				while ($is = mysql_fetch_array($isok))
				 {
					echo "<tr id='vert'>";
					 echo "<td>".$is["code_produit"]."</td>";
					 echo "<td>".$is["libelle_produit"]."</td>";
					 echo "<td>".$is["code_type"]."</td>";
					 echo "<td>".$is["prix_unite"]." gds"."</td>";
					 echo "<td>".$is["qte_en_stock"]."</td>";
					echo "</tr>";		
				}
				echo $is["code_produit"]." ".$is["libelle_produit"]." ".$is["code_type"]." ".$is["prix_unite"]." ".$is["qte_en_stock"]."<br>";
				echo "</table>";	
				
			}
			
				
			mysql_close();
		}

		public function modifier()
		{
			
			if(!$this->get_prix_unite())
			{
			$req ='UPDATE produit SET qte_en_stock= "'.$this->get_qte_en_stock().'" WHERE libelle_produit= "'.$this->get_libelle_produit().'"';
			}
			else if (!$this->get_qte_en_stock()) 
			{
				$req ='UPDATE produit SET prix_unite= "'.$this->get_prix_unite().'"  WHERE libelle_produit= "'.$this->get_libelle_produit().'" ';
			}  
			else
			{
				$req ='UPDATE produit SET prix_unite= "'.$this->get_prix_unite().'" , qte_en_stock= "'.$this->get_qte_en_stock().'" WHERE libelle_produit= "'.$this->get_libelle_produit().'"';
			} 
			$isok=mysql_query($req);
			if(!$isok)
				{echo ''.mysql_error();}
			
				
			mysql_close();
		}


		public function liste()
		{
			 $rech='SELECT * FROM  produit';
			 $isok=mysql_query($rech); 
	
			if(!$isok)
				{
					echo ''.mysql_error();
				}
			else
			{
				echo "<table>";
				echo "<tr id='bleu'>";
					 echo "<td>"."Code Produit"."</td>";
					 echo "<td>"."Nom Produit"."</td>";
					 echo "<td>"."Code Type"."</td>";
					 echo "<td>"."Prix Unite"."</td>";
					 echo "<td>"."Qte en Stock"."</td>";
					echo "</tr>";
				while ($is = mysql_fetch_array($isok))
				 {
					echo "<tr id='vert'>";
					 echo "<td>".$is["code_produit"]."</td>";
					 echo "<td>".$is["libelle_produit"]."</td>";
					 echo "<td>".$is["code_type"]."</td>";
					 echo "<td>".$is["prix_unite"]." gds"."</td>";
					 echo "<td>".$is["qte_en_stock"]."</td>";
					echo "</tr>";		
				}

				echo "</table>";

			}
			mysql_close();
		}

		public function getPrix(){
			
			$this->connect();
			$sor = $this->get_qte();
			$prixtot = "";
			$djo=  'SELECT prix_unite FROM  produit where code_produit=  "'.$this->get_code_produit().'"';
			$isdjo=mysql_query($djo);
				if(!$isdjo)
				{
					echo ''.mysql_error();
				}

				else
				{	
					while ($toto = mysql_fetch_array($isdjo))	
					{	
						$prixunit= $toto["prix_unite"];
						$prixtot= $prixunit* $sor;
					}
				}

				return $prixtot;
		}
		
		public function prixUnit($code){

			$this->connect();
			$prixunit = "";

			$djo=  'SELECT prix_unite FROM  produit where code_produit=  "'.$code.'"';
			$isdjo=mysql_query($djo);

			while ($toto = mysql_fetch_array($isdjo))	
			{	
				$prixunit= $toto["prix_unite"];
			}

			return $prixunit;
		}

		public function stock()
		{
			

			$sor = $this->get_qte();

			$djo=  'SELECT prix_unite FROM  produit where code_produit=  "'.$this->get_code_produit().'"';
			$isdjo=mysql_query($djo);
				if(!$isdjo)
				{
					echo ''.mysql_error();
				}

				else
				{	
					while ($toto = mysql_fetch_array($isdjo))	
					{	
						$prixunit= $toto["prix_unite"];
						$prixtot= $prixunit* $sor;
					}
				}
			$sak = 'SELECT qte_en_stock FROM  produit where code_produit=  "'.$this->get_code_produit().'"';
			$isok=mysql_query($sak);
			if(!$isok)
			{
				echo ''.mysql_error();
			}			
	 		
			else
			{	
				while ($is = mysql_fetch_array($isok))					
				{	
					
					$toy= $is["qte_en_stock"] - $sor ;
				
					if ($toy>=0)
					{
						$t='SELECT code_type from produit WHERE code_produit="'.$this->get_code_produit().'"';
						$r=mysql_query($t);
						if(!$r)
						{
							echo ''.mysql_error();
						}
						else
						{
							while ($isr = mysql_fetch_array($r))
							{
								
								$claudel= $isr['code_type'];

							}
						}

						$bwat ='UPDATE produit SET qte_en_stock= "'.$toy.'" WHERE code_produit= "'.$this->get_code_produit().'" ';
						$ral=mysql_query($bwat);

						$code = $this->get_code_produit();
						$qtite = $this->get_qte();
						$nom = $this->get_Nom_utilisateur();
						$date = date("Y-m-d");

						$add ="INSERT INTO vente(Code_produit, Quantite, Date_de_vente, Nom_utilisateur, Prix_total,code_type) VALUES ('$code', '$qtite', '$date', '$nom', '$prixtot','$claudel')";
						$isadd=mysql_query($add);

						echo "Votre achat a ete une reussite, Merci";

						

					}
					else
					{
						echo "Nous n'avons pas cette quantite de produits dans notre Market, Merci ";
						//$pri ='UPDATE vente SET Prix_total= "'.$prixtot.'" WHERE code_produit= "'.$code.'" ';
						//$ral=mysql_query($pri);
					}
				}			
			
			}			
				
			mysql_close();

			//return $prixtot;
		}

		public function notif()
		{
			$query = "SELECT COUNT(*) FROM produit WHERE qte_en_stock <= 5";
			$this->connect();
			$result = mysql_query($query);

			//echo "Qte: ".$result;


			return $result;
		}

		public function listenote()
		{
			 $rech='SELECT * FROM  produit WHERE qte_en_stock <= 5';
			 $isok=mysql_query($rech); 
	
			if(!$isok)
				{
					echo ''.mysql_error();
				}
			else
			{
				echo "<table>";
				echo "<tr id='bleu'>";
					 echo "<td>"."Code Produit"."</td>";
					 echo "<td>"."Nom Produit"."</td>";
					 echo "<td>"."Code Type"."</td>";
					 echo "<td>"."Prix Unite"."</td>";
					 echo "<td>"."Qte en Stock"."</td>";
					echo "</tr>";
				while ($is = mysql_fetch_array($isok))
				 {
					echo "<tr id='vert'>";
					 echo "<td>".$is["code_produit"]."</td>";
					 echo "<td>".$is["libelle_produit"]."</td>";
					 echo "<td>".$is["code_type"]."</td>";
					 echo "<td>".$is["prix_unite"]." gds"."</td>";
					 echo "<td>".$is["qte_en_stock"]."</td>";
					echo "</tr>";		
				}

				echo "</table>";

			}
			mysql_close();
		}


}
 
?>