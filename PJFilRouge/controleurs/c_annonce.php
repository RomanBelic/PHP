<?php
$idVisiteur = $_SESSION['idVisiteur'];
$action = $_REQUEST['action'];
$paramIdAnnonce = "";
if (ISSET($_REQUEST['id'])) {
	$paramIdAnnonce = $_REQUEST['id'];
}
switch($action){
	case 'VoirAnnonces': {
		Refresher :
		$filter = "";
		if (ISSET($_POST['filterBy']) and ISSET ($_POST['order']) ) {
			if ($_POST['filterBy'] == "Date") {
				$filter = " Order By a.Date " . $_POST['order'];
			}
		    if ($_POST['filterBy'] == "Libelle") {
			    $filter = " Order By a.Libelle " . $_POST['order'];
			}
		    if ($_POST['filterBy'] == "Nom") {
			    $filter = " Order By u.Nom " . $_POST['order'];
			}
		     if ($_POST['filterBy'] == "Prix") {
			    $filter = " Order By a.Prix " . $_POST['order'];
			}
		}
		$annonceDetails =  $pdo -> getAnnonce($filter);
		if (estConnecte()){
			$visiteurDetails = $pdo -> getDetailsVsiteur ($_SESSION['params']['Id']);
			include("vues/v_sommaire_connected.php");
		    include("vues/v_header.php");
		}
		else {
			include("vues/v_sommaire.php");	
		}
	    include("vues/v_annonces.php");
		break;
    }
	case 'CreerAnnonce': {
		
	 	if (estConnecte()){
			$visiteurDetails = $pdo -> getDetailsVsiteur ($_SESSION['params']['Id']);
			include("vues/v_sommaire_connected.php");
			include("vues/v_header.php");
			include("vues/v_newAnnonce.php");
		}
		else {
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_sommaire.php");
			include("vues/v_header.php");
		}
		break;
    }
	
	case 'newAnnonce': {
		$Fname = "";
		$win = 1;
		if (uploadFile ("logosAnnonce") == $win) {
			$Fname = $_FILES['fichier']['name'];
		}		
		$upd = $pdo->insertAnnonce($_POST['Libelle'],$_POST['Desc'], date("Y-m-d"),$_SESSION['params']['Id'], $_POST['Prix'], $Fname);
			
		$annonceDetails =  $pdo -> getAnnonce(NULL);
		$visiteurDetails = $pdo -> getDetailsVsiteur ($_SESSION['params']['Id']);
			
	    header ("Location:index.php?uc=Annonces&action=VoirAnnonces");
		break;
    }
    
	case 'modAnnonce': {
		if ($paramIdAnnonce != "") {
			$filter = " AND a.id = ".$paramIdAnnonce." ";
			$annonceDetails =  $pdo -> getAnnonce($filter);
			$visiteurDetails = $pdo -> getDetailsVsiteur ($_SESSION['params']['Id']);
			include("vues/v_sommaire_connected.php");
			include("vues/v_header.php");
		    include("vues/v_editAnnonce.php");
		}
		break;
	}
	
	case 'ValidAnnonce': {
		if ($paramIdAnnonce != "") {
			$Fname = $_POST['logoAdress'];
			$win = 1;
			if (ISSET ($_FILES['fichier']['name'])){
				if (uploadFile ("logosAnnonce") == $win) {
					$Fname = $_FILES['fichier']['name'];
				}	
			}
            else {
				$Fname = $_POST['logoAdress'];
			}	
			$upd = $pdo->updateAnnonce ($paramIdAnnonce, $_POST['Libelle'], $_POST['Desc'], $_POST['Prix'], $Fname);
			header ("Location:index.php?uc=Annonces&action=VoirAnnonces");
		}
		break;
	}
  }
	
	


?>