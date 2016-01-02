<?php
include("vues/v_entete.php") ;
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
require_once ("include/upload.php");
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if((!isset($_REQUEST['uc']) || !$estConnecte)){
     $_REQUEST['uc'] = 'connexion';
}	
if (isset($_REQUEST ['action'])) {
	if ($_REQUEST ['action'] == 'newProfil' || $_REQUEST ['action'] == 'createProfil'){
		$_REQUEST['uc'] = 'profil';
	}
}
$uc = $_REQUEST['uc'];

switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");
		break;
	}
	case 'profil':{
		include("controleurs/c_profil.php");
		break;
	}
	case 'Annonces':{
		include("controleurs/c_annonce.php");
		break;
	}
	case 'Designers':{
		include("controleurs/c_designer.php");
		break;
	}
	case 'Utilisateurs':{
		include("controleurs/c_user.php");
		break;
	}	
}
include("vues/v_pied.php") ;
?>

