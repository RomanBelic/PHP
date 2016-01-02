<?php
$idVisiteur = $_SESSION['idVisiteur'];
$action = $_REQUEST['action'];

switch($action){
	case 'VoirUtilisateurs': {
		$filter = "";
		if (ISSET($_POST['filterBy']) and ISSET ($_POST['order']) ) {
			if ($_POST['filterBy'] == "Date") {
				$filter = " Order By u.DateInscription " . $_POST['order'];
			}
		    if ($_POST['filterBy'] == "Nom") {
			    $filter = " Order By u.Nom " . $_POST['order'];
			}
		}
		$userDetails =  $pdo -> getUser($filter, 2);
		if (estConnecte()){
			$visiteurDetails = $pdo -> getDetailsVsiteur ($_SESSION['params']['Id']);
			include("vues/v_sommaire_connected.php");
		}
		else {
			include("vues/v_sommaire.php");	
		}
		include("vues/v_header.php");
	    include("vues/v_users.php");
		break;
    }
}

?>