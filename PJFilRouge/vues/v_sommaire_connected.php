 <!-- Division pour le sommaire -->
 <?php 
        $Id = $visiteurDetails['id'];
		$Nom = $visiteurDetails['Nom'];
		$Prenom = $visiteurDetails['Prenom'];
		$Libelle = $visiteurDetails['UserLibelle'];
		$Contact = $visiteurDetails['Contact'];
		$Site = $visiteurDetails['Site'];
		$DateInscription =  $visiteurDetails['DateInscription'];
		$Description =  $visiteurDetails['Description'];	
		$UserType = $visiteurDetails['UType'];
		$Logo = $visiteurDetails['LogAdr'];
		if (Isset($DateInscription)){
	    	$DateInscription = dateAnglaisVersFrancais ($DateInscription);
		}
		$params = array (
		"Nom" => $Nom,"Prenom" => $Prenom,"Libelle" => $Libelle,"Contact" => $Contact,"Site" => $Site,
		"DateInscription" => $DateInscription,"Description" => $Description,"UserType" => $UserType,
		"Id" => $Id,"Logo" => $Logo
		);
		$_SESSION['params']=$params;
?>
<html>
<div id="menuGauche">   
<form>
   
	<fieldset>
	<table>
    <legend>Bienvenue, <?php if($UserType==1) {echo $Nom;} else {echo $Nom." ".$Prenom;}  ?> </legend>
	<tr>
	<td align="center">
         <?php if($Logo!=Null) {echo '<INPUT Type=Image SRC="./logos/'.$Logo.'" disabled="disabled">';} 
		         else {echo '<INPUT Type=Image SRC="./logos/unknown.jpg" disabled="disabled">';} ?>
	</td>
    
	<tr>
	<td><label>Nom : </label>
	 <?php echo '<label>'.$Nom.'<label>'; ?>
	</td>
	</tr>
	<?php if ($UserType!=1) {
		echo '
		<tr>
		<td><label>Prénom : </label>
		<label>'.$Prenom.'<label>
		</td>
		</tr>
		';
	}?>
	<tr>
	<td><label>Statut : </label>
     <?php echo '<label>'.$Libelle.'<label>'; ?>
	</td>
	</tr>
	<tr>
	<td><label>Date d'Inscription : </label>
    <?php echo '<label>'.$DateInscription.'<label>'; ?>
	</td>
	</tr>
	<tr>
	<td><label><u>Site</u> : </label>
	 <?php echo '<label><a href = "'.$Site.'">'.$Site.'</a><label>'; ?>
	</td>
	</tr>
	<tr>
	<td><label><u>Contact</u> : </label>
	 <?php echo '<label><a href="mailto:"'.$Contact.'">'.$Contact.'</a></label>'; ?>
	</td>
	</tr>
	<tr>
	<td align="center"><p>Information Supplementaire:</p>
	                   <p style="margin-top:-15px"><textarea id="textArea1" readonly="readonly"><?php echo $Description ?></textarea ></p></td>
	<td>
	</td>
	</tr>

	<tr>
	    <td align="center">
		 <a href="index.php?uc=profil&action=modifier_profil" title="Profil">Modifier Profil</a>
		</td>
	</tr>
	<tr>
		<td align="center">
         <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
		</td>
	</tr>
    </table>
	</fieldset>
</form>    
</div>
</html>
    