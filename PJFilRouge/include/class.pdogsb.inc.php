<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=dbdesigners';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function __destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
/**
 * Retourne les informations d'un visiteur
 
 * @param $login 
 * @param $mdp
 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
*/
	public function getInfosVisiteur($login, $mdp){
		$req = "Select u.login as login, u.mdp as mdp, u.idUser as id From userdata u 
		        where u.login='$login' and u.mdp='$mdp' ";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	
	public function getDetailsVsiteur($idUser){
		$req = "Select u.id as id, u.Nom as Nom, u.Prenom as Prenom, u.userType as UType, u.contact as Contact, u.Description as Description,
		       u.Site as Site, u.DateInscription as DateInscription, u.LogoAdress as LogAdr, t.Libelle as UserLibelle
			   FROM users u
			   INNER JOIN usertype t ON u.userType = t.id
		       WHERE u.id = ".$idUser;
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	
	public function majProfil($idVisiteur, $Contact, $Description,$Site,$Logo){
		$req = "Update users Set Contact = '".$Contact."', Description = '".$Description."', Site = '".$Site."', LogoAdress = '".$Logo."'
		        Where id = $idVisiteur ";
		PdoGsb::$monPdo->exec($req);	
	}
	
	public function getAnnonce ($filter) {
		$req = "Select a.id as idAnnonce, a.Libelle as AnnonceLibelle, a.Description, a.Date, a.idUser,
                a.Prix, a.LogoAdress,
		        u.Nom, u.Prenom, 
				t.Libelle as UserLibelle
                FROM annonce a
		        LEFT JOIN users u ON a.idUser = u.id  
				INNER JOIN usertype t ON u.userType = t.id
				WHERE 1=1 ".$filter." ";
		$rs = PdoGsb::$monPdo->query($req);	
		while ($ligne = $rs->fetch()){
			   $resultat[]=$ligne;
		}
	    return $resultat;
	}
	
	public function getUser ($filter, $type) {
		$add = "";
		if ($type > 0) {
			$add = " AND u.userType = ".$type;
		}
		$req = "Select u.id as idUser, u.Nom, u.Prenom, u.userType, u.Contact,
                u.Description, u.Site, u.DateInscription, u.LogoAdress,
				t.Libelle as UserLibelle
                FROM users u
				INNER JOIN usertype t ON u.userType = t.id
				WHERE 1=1 ".$add." ".$filter." ";
		$rs = PdoGsb::$monPdo->query($req);	
		while ($ligne = $rs->fetch()){
			   $resultat[]=$ligne;
		}
	return $resultat;	
	}
	
	public function insertAnnonce ($Libelle, $Desc, $Date, $idUser, $Prix, $Logo) {
		$req = "Insert Into annonce (Libelle, Description, Date, idUser, Prix, LogoAdress ) Values 
		       ('".$Libelle."','".$Desc."','".$Date."',$idUser,'".$Prix."','".$Logo."') ";
		PdoGsb::$monPdo->exec($req);
	}
	
	public function insertUser ($Nom, $Prenom, $Type, $Contact, $Desc, $Site, $Date, $Logo, $login, $mdp) {
			$req = " 
			Start Transaction;
			INSERT INTO users (Nom, Prenom, userType, Contact, Description, Site, DateInscription, LogoAdress) VALUES
							  ('".$Nom."','".$Prenom."','".$Type."','".$Contact."','".$Desc."','".$Site."','".$Date."','".$Logo."');
			SET @id =  LAST_INSERT_ID();
			INSERT INTO userdata (login,mdp,idUser) VALUES ('".$login."','".$login."', @id);
			COMMIT;
			";
			PdoGsb::$monPdo->exec($req);
	}
    
	public function getUserTypes () {
        
		$req = "Select t.id, t.Libelle From usertype t Where 1=1 Order By t.id";
		$rs = PdoGsb::$monPdo->query($req);	
		while ($ligne = $rs->fetch()){
			   $resultat[]=$ligne;
		}
	    return $resultat;
	}
	
	public function updateAnnonce ($idAnnonce, $Libelle, $Description, $Prix, $Logo) {
		$req = "Update annonce SET Libelle = '".$Libelle."', Description = '".$Description."', Prix = '".$Prix."', LogoAdress = '".$Logo."' 
		        WHERE id = ".$idAnnonce." ";
		PdoGsb::$monPdo->exec($req);
	}
	
	public function getLogin ($Login) {
		$req = " Select login from userdata Where login = '".$Login."'";
		$rs = PdoGsb::$monPdo->query($req);	
		$resultat = null;
		while ($ligne = $rs->fetch()){
			   $resultat[]=$ligne;
		}
	    return $resultat;
	}
	
    
 }
	

?>