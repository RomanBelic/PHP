<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_sommaire.php");
		include("vues/v_header.php");	
		break;
	}
	case 'valideConnexion':{
		$login = htmlspecialchars($_REQUEST['login']);
		$mdp = htmlspecialchars($_REQUEST['mdp']);
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);

		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_sommaire.php");
			include("vues/v_header.php");	
		}
		
		else{
			$id = $visiteur['id'];
			connecter($id);
			$visiteurDetails = $pdo -> getDetailsVsiteur ($id);
			include("vues/v_sommaire_connected.php");
			include("vues/v_header.php");	
		}
		break;
	}
	case 'deconnexion':{
		include("vues/v_sommaire.php");
		include("vues/v_header.php");	
		deconnecter ();
		break;
	}
	
	default :{
		ajouterErreur("Connectez-vous d'abords");
		include("vues/v_erreurs.php");
		include("vues/v_sommaire.php");
	    include("vues/v_header.php");	
		break;
	}
}
?>