<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Foudil Benzaid, Galina Prima, Okba Benaissa, Jordan Williams
 * @version 1.0
 * @update 2019-03-15
 * 
 */

/*=============================================
=               Classe Bouteille              =
=============================================*/
class Bouteille extends Modele {
	const TABLE = 'vino_bouteille';
    
    /**
	 * Cette méthode récupère la liste des bouteilles
	 * 
	 * 
	 * @return $rangees 
	 */
	public function getListeBouteille()
	{
		
		$rangee = Array();
		$res = $this->_db->query('Select * from '. self::TABLE);
		if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;
	}
	
	/**
	 * Cette méthode récupère la liste des bouteilles par cellier
	 * 
	 * 
	 * @return $rangees 
	 */
	public function getListeBouteilleCellier()
	{
		
		$rangees = Array();
		$requete ='SELECT 
						vino_bouteille.id as id_bouteille_cellier,
						vino_bouteille.nom,
						vino_bouteille.image,
						vino_bouteille.code_saq,
						vino_bouteille.pays,
						vino_bouteille.description,
						vino_bouteille.prix_saq,
						vino_bouteille.url_saq,
						vino_bouteille.url_img,
						vino_bouteille.format,
						vino_bouteille.garde_jusqua,
						vino_bouteille.millesime,
						vino_contient.quantite,
						vino_contient.date_achat,
						vino_contient.notes,
						vino_type.type

						from vino_bouteille
						INNER JOIN vino_contient ON vino_contient.bouteille_id = vino_bouteille.id
						INNER JOIN vino_cellier ON vino_contient.cellier_id = vino_cellier.id
						INNER JOIN vino_type ON vino_bouteille.type_id = vino_type.id
						'; 
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($rangee = $res->fetch_assoc())
				{
					$rangee['nom'] = trim(utf8_encode($rangee['nom']));
					$rangees[] = $rangee;
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 //$this->_db->error;
		}
		
		
		
		return $rangees;
	}
	
	/**
	 * Cette méthode permet de retourner les résultats de recherche pour la fonction d'autocomplete de l'ajout des bouteilles dans le cellier
	 * 
	 * @param string $nom La chaine de caractère à rechercher
	 * @param integer $nb_resultat Le nombre de résultat maximal à retourner.
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */
       
	public function autocomplete($nom, $nb_resultat=10)
	{
		
		$rangees = Array();
		$nom = $this->_db->real_escape_string($nom);
		$nom = preg_replace("/\*/","%" , $nom);
		 
		//echo $nom;
		$requete ='SELECT id, nom FROM vino_bouteille where LOWER(nom) like LOWER("%'. $nom .'%") LIMIT 0,'. $nb_resultat; 
		//var_dump($requete);
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($rangee = $res->fetch_assoc())
				{
					$rangee['nom'] = trim(utf8_encode($rangee['nom']));
					$rangees[] = $rangee;
					
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de données", 1);
			 
		}
	
		return $rangees;
	}

	/**
	 * Cette méthode permet de récupérer la quantité 
	 * 
	 * @param int $id id de la bouteille
	 * 
	 * @return retourne l'occurence.
	 */
	public function recupererQuantite($id)
	{
			
		$requete = "SELECT quantite From vino_bouteille WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}
	
	
	/**
	 * Cette méthode ajoute une ou des bouteilles au cellier
	 * 
	 * @param Array $data Tableau des données représentants la bouteille.
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function ajouterBouteilleCellier($data)
	{
			
		$requete = "INSERT INTO vino_cellier(id_bouteille,date_achat,garde_jusqua,notes,prix,quantite,millesime) VALUES (".
		"'".$data->id_bouteille."',".
		"'".$data->date_achat."',".
		"'".$data->garde_jusqua."',".
		"'".$data->notes."',".
		"'".$data->prix."',".
		"'".$data->quantite."',".
		"'".$data->millesime."')";

        $res = $this->_db->query($requete);
        
		return $res;
	}
	
	
	/**
	 * Cette méthode change la quantité d'une bouteille en particulier dans le cellier
	 * 
	 * @param int $id id de la bouteille
	 * @param int $nombre Nombre de bouteille a ajouter ou retirer
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function modifierQuantiteBouteilleCellier($id, $nombre)
	{
		//TODO : Valider les données.
			
			
		$requete = "UPDATE vino_bouteille SET quantite = GREATEST(quantite + ". $nombre. ", 0) WHERE id = ". $id;
		//echo $requete;
        $res = $this->_db->query($requete);
        
		return $res;
	}
	/**
	 * Fonction RecupererCellierParId Pour récupérer les détails d'un cellier par son id 
	 * 
	 * @param $id id de la bouteille cellier
	 * @return $row détails d'un cellier
	 */
	public function RecupererCellierParId($id)
	{
				
		$requete = "SELECT 
						vino_bouteille.id as id_bouteille_cellier,
						vino_bouteille.nom,
						vino_bouteille.image,
						vino_bouteille.code_saq,
						vino_bouteille.pays,
						vino_bouteille.description,
						vino_bouteille.prix_saq,
						vino_bouteille.url_saq,
						vino_bouteille.url_img,
						vino_bouteille.format,
						vino_bouteille.garde_jusqua,
						vino_bouteille.millesime,
						vino_bouteille.quantite,
						vino_bouteille.date_achat,
						vino_bouteille.notes,
						vino_type.type

						from vino_bouteille
						INNER JOIN vino_cellier ON vino_bouteille.cellier_id=vino_cellier.id 
						INNER JOIN vino_type ON vino_bouteille.type_id = vino_type.id
						WHERE vino_bouteille.id = ". $id;
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc(); 	
		return $rangee;
	
	}
	/**
	* Fonction sauvegarderModife Pour souvgrader les modification dans le cellier
	* 
	* @param $id id de la bouteille cellier
	* @param $dateachat date d'achat de la bouteille cellier
	* @param $notes notes
	* @param $quantite quantités
	* @param $Garde à garder jusqu'à ? (date)
	* @param $prix prix
	* @param $pays
	* @param $mille millesime
	* @param $description description
	* @param $type_id l'id du type
	 */
	public function sauvegarderModife($id, $nom, $dateachat, $notes, $quantite, $Garde, $prix, $pays, $mille ,$description, $type_id, $format)
	{
		
	    $sql = "UPDATE vino_bouteille SET 
    		vino_bouteille.nom=?, 
    		vino_bouteille.description=?, 
    		vino_bouteille.garde_jusqua=?, 
    		vino_bouteille.prix_saq=?,
    		vino_bouteille.pays=?, 
    		vino_bouteille.millesime=?, 
    		vino_bouteille.type_id=?,
    		vino_bouteille.quantite=?,
    		vino_bouteille.date_achat=?,
    		vino_bouteille.notes=?,
    		vino_bouteille.format=?
			
    		WHERE vino_bouteille.id=?";
		$stmt = $this->_db->prepare($sql);
		$stmt->bind_param('sssdssiisssi', $nom, $description, $Garde, $prix, $pays, $mille, $type_id, $quantite, $dateachat, $notes, $format, $id);
		$stmt->execute();
      	
	}
	/**
	* Fonction recuperer les Types
	*
	* @return $row détails d'un cellier
	**/
	public function RecupererTypes()
	{
				
		$requete = "SELECT * FROM vino_type ORDER BY type DESC  ";
		$res = $this->_db->query($requete);
        if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;
	
	}

	/**
	 * Fonction RecupererCellierParId Pour récupérer les détails d'un cellier par son id 
	 * 
	 * @param $id id de la bouteille cellier
	 * @return $row détails d'un cellier
	 */
	public function CellierParUsager($id)
	{
				
		$requete = "SELECT 
					vino_cellier.id,
					vino_cellier.nom

					from vino_cellier
					JOIN vino_usagers ON vino_usagers.id = vino_cellier.usager_id
					
					WHERE vino_usagers.id = ". $id;
		$res = $this->_db->query($requete);
        if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;
	
	}

	/**
	 * Fonction RecupererBouteilleParCellier Pour récupérer les détails d'un cellier par son id 
	 * 
	 * @param $id id du cellier
	 * @return $row détails d'un cellier
	 */
	public function RecupererBouteilleParCellier($id)
	{
				
		$requete = "SELECT 
						vino_bouteille.id as id_bouteille_cellier,
						vino_bouteille.nom,
						vino_bouteille.image,
						vino_bouteille.code_saq,
						vino_bouteille.pays,
						vino_bouteille.description,
						vino_bouteille.prix_saq,
						vino_bouteille.url_saq,
						vino_bouteille.url_img,
						vino_bouteille.format,
						vino_bouteille.garde_jusqua,
						vino_bouteille.millesime,
						vino_bouteille.quantite,
						vino_bouteille.date_achat,
						vino_bouteille.notes,
						vino_type.type

						from vino_bouteille
						INNER JOIN vino_cellier ON vino_bouteille.cellier_id=vino_cellier.id 
						INNER JOIN vino_type ON vino_bouteille.type_id = vino_type.id
						WHERE vino_cellier.id = ". $id;

        $res = $this->_db->query($requete);
        $data = array();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
	}

	/**
	* Fonction d'enregistrement
	* 
	* @param $username le nom d'utilisateur de l'usager
	* @param $password le mot de passe de l'usager
	* @param $nom le nom de l'usager
	* @param $prenom le prénom de l'usager
	* @return $resultat résultat de la requête
	*/
	public function sauvegarderCellier($nomCellier, $usager_id)
	{
		
		$requete = "INSERT into vino_cellier(nom, usager_id) VALUE (?, ?)";
		
        $stmt = $this->_db->prepare($requete);
		$stmt->bind_param('si', $nomCellier, $usager_id);
		$stmt->execute();
	}

	/**
	* Fonction de sauvegarde d'une bouteille dans un cellier
	* 
	* @param $cellier_id l'id du cellier
	* @param $bouteille_id l'id de la bouteille
	* @param $quantite quantité 
	* @param $date_achat date d'achat de la bouteille
	* @param $notes notes 
	*/
	public function sauvegarderBouteilleCellier($cellier_id, $bouteille_id, $quantite, $date_achat, $notes)
	{
		
		$requete = "INSERT into vino_contient(cellier_id, bouteille_id, quantite, date_achat, notes) VALUE (?, ?, ?, ?, ?)";
		
        $stmt = $this->_db->prepare($requete);
		$stmt->bind_param('iiiss', $cellier_id, $bouteille_id, $quantite, $date_achat, $notes);
		$stmt->execute();
	}

	/**
	 * Cette méthode de chercher un cellier dans la table vino_cellier
	 * @param string $nomCellier nom du cellier
	 * 
	 * @return retourne l'occurence.
	 */
	public function chercherCellier($nomCellier)
	{
			
		$requete = "SELECT nom From vino_cellier WHERE nom = '$nomCellier'";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}

	/**
	 * Cette méthode de chercher un cellier dans la table vino_cellier
	 * @param integer $id id du cellier
	 * 
	 * @return retourne l'occurence.
	 */
	public function cellierParId($id)
	{
			
		$requete = "SELECT nom as nomCellier From vino_cellier WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}

	/**
	 * Cette méthode permet d'obtenir une bouteille par id
	 * @param integer $id id de la bouteille
	 * 
	 * @return retourne l'occurence.
	 */
	public function bouteilleParId($id)
	{
			
		$requete = "SELECT * From vino_bouteille WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}

	/**
	 * Cette méthode permet de retirer une bouteille d'un cellier
	 * 
	 * @param int $id id de la bouteille
	 * 
	 * @return retourne l'occurence.
	 */
	public function retirerBouteilleCellier($id)
	{
			
		$requete = "DELETE From vino_bouteille WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}


}





?>