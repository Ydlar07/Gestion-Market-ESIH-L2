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
	private $nom;
	private $prenom;
	private $sexe;
	private $mail;
	private $telephone;
	private $adresse;
	private $role;
	private $username;
	private $password;
	private $find;


	//contructeurs
	public function __construct()
	{
		 
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

	public function set_nom($nom)
	{
		$this->nom=$nom;
	}

	public function set_prenom($prenom)
	{
		$this->prenom=$prenom;
	}

	public function set_sexe($sexe)
	{
		$this->sexe=$sexe;
	}

	public function set_mail($mail)
	{
		$this->mail=$mail;
	}

	public function set_telephone($telephone)
	{
		$this->telephone=$telephone;
	}

	public function set_adresse($adresse)
	{
		$this->adresse=$adresse;
	}

	public function set_role($role)
	{
		$this->role=$role;
	}

	public function set_username($username)
	{
		$this->username=$username;
	}

	public function set_password($password)
	{
		$this->password=$password;
	}

	public function set_find($find)
	{
		$this->find=$find;
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

	public function get_nom()
	{
		return $this->nom;
	}

	public function get_prenom()
	{
		return $this->prenom;
	}

	public function get_sexe()
	{
		return $this->sexe;
	}

	public function get_mail()
	{
		return $this->mail;
	}

	public function get_telephone()
	{
		return $this->telephone;
	}

	public function get_adresse()
	{
		return $this->adresse;
	}

	public function get_role()
	{
		return $this->role;
	}

	public function get_username()
	{
		return $this->username;
	}

	public function get_password()
	{
		return $this->password;
	}

	public function get_find()
	{
		return $this->find;
	}



	//----------------------- Base de donnees -----------------------------


		public function connect()
		{
			if(!mysql_connect('localhost','root'))
			{
				Echo'Connection Impossible';
				exit();
			} 
			else
			{
				mysql_select_db('market');
			    Echo'';
			    Echo'';
			}
		}
 

		 public function ajoute_produit()
		{	
			$libeltyp= $this->get_libelle_type();
			echo $libeltyp;
			$codtyp ='SELECT code_type FROM type_produit WHERE libelle_type= "'.$libeltyp.'" ';
			$codo=mysql_query($codtyp); 
			if(!$codo)
				{
					echo ''.mysql_error();
				}
			else
			{
				while ($is = mysql_fetch_array($codo))
				{
					echo $is['code_type'];
					$mike= $is['code_type'];
				}
			}

			$add ='Insert Into produit(libelle_produit,code_type,prix_unite,qte_en_stock) values("'.$this->get_libelle_produit().'","'.$mike.'","'.$this->get_prix_unite().'","'.$this->get_qte_en_stock().'")';
			
			$isadd=mysql_query($add);
			
				
			mysql_close();
		}


		 public function recherche()
		{
			 $rech='SELECT * FROM  produit WHERE libelle_produit= "'.$this->get_find().'" OR code_type= "'.$this->get_find().'"  OR code_produit= "'.$this->get_find().'"  OR prix_unite= "'.$this->get_find().'"  OR qte_en_stock= "'.$this->get_find().'"'  ;
			$isok=mysql_query($rech); 
			
			if(!$isok)
				{echo ''.mysql_error();}
			else
			{
				while ($is = mysql_fetch_array($isok))
				 {
					echo $is["code_produit"]." ".$is["libelle_produit"]." ".$is["code_type"]." ".$is["prix_unite"]." ".$is["qte_en_stock"]."<br>";
				}
				
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

		 

}

?>