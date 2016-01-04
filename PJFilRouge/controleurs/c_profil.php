<?php 
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'modifier_profil':{
		include("vues/v_sommaire_edit.php");
		include("vues/v_header.php");	
		break;
	}
	case 'valider_profil':{
		$Fname = "";
		$win = 1;
	    if (uploadFile ("logos") == $win) {
			$Fname = $_FILES['fichier']['name'];
		}
		else if (uploadFile ("logos") != $win){
			$Fname = $_SESSION['params']['Logo'];
		}

        $upd = $pdo->majProfil($_SESSION['params']['Id'],htmlspecialchars($_POST['Contact']),htmlspecialchars($_POST['Desc']),$_POST['Site'],$Fname);
		$visiteurDetails = $pdo -> getDetailsVsiteur ($_SESSION['params']['Id']);
		include("vues/v_sommaire_connected.php");
		include("vues/v_header.php");	
		break;
	}
	case 'refresh_profil':{
		$visiteurDetails = $pdo -> getDetailsVsiteur ($_SESSION['params']['Id']);	
		include("vues/v_sommaire_connected.php");
		include("vues/v_header.php");
		break;
	}
	case 'newProfil':{
		$types = $pdo -> getUserTypes ();	
		include("vues/v_sommaire.php");
		include("vues/v_newUser.php");
		break;
	}
	case 'createProfil':{
		$Fname = "";
		$Errmsg = "";
		$win = 1;
		$err = 0;
		if (ISSET($_POST['login']) && ISSET($_POST['mdp'])){
			if ($_POST['login'] != "" && $_POST['mdp'] != "" ) {
				if (uploadFile ("logos") == $win) {
					$Fname = $_FILES['fichier']['name'];
				}
				$insert = $pdo-> insertUser ($_POST['Nom'],$_POST['Prenom'], $_POST['typeUser'], $_POST['Contact'] , $_POST['Desc'], $_POST['Site'],
											 date("Y-m-d"), $Fname, $_POST['login'], $_POST['mdp']
											 );
			}
			else {
				$err = 1;
				$Errmsg = "Entrez un login et mot de passe";
			}
			if (loginExists($_POST['login'])) {
				$err = 1;
				$Errmsg = "Ce login existe deja";
			}
		}
		else {
			$err = 1;
			$Errmsg = "Entrez un login et mot de passe";
		}
		
		if ($err == 1) {
			$types = $pdo -> getUserTypes ();	
			ajouterErreur($Errmsg);
			include("vues/v_sommaire.php");
		    include("vues/v_erreurs.php");
			include("vues/v_newUser.php");
		}
		
		if ($err == 0) {
		header ("Location:index.php?uc=connexion&action=demandeConnexion");	
		}
		break;
	}
	
	
	
}
 ?>