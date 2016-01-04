    <!-- Division pour le sommaire -->
<?php 
	 IF (ISSET ($_SESSION['params'])){
        $Id = $_SESSION['params']['Id'];
		$Nom = $_SESSION['params']['Nom'];
		$Prenom = $_SESSION['params']['Prenom'];
		$Libelle = $_SESSION['params']['Libelle'];
		$Contact = $_SESSION['params']['Contact'];
		$Site = $_SESSION['params']['Site'];
		$DateInscription =  $_SESSION['params']['DateInscription'];
		$Description =  $_SESSION['params']['Description'];	
		$UserType = $_SESSION['params']['UserType'];
		$Logo = $_SESSION['params']['Logo'];
	 }
?>
<div id="menuGauche">   
<form action="index.php?uc=profil&action=valider_profil" method="post" ENCTYPE="multipart/form-data">
   
	<fieldset>
	<table align="center" style="font-size:12px">
    <legend>Modification du profil</legend>
    <tr>
	<td colspan="2" align="center">
         <?php if($Logo!=Null) {echo '<INPUT Type=Image SRC="./logos/'.$Logo.'" disabled="disabled">';} 
		         else {echo '<INPUT Type=Image SRC="./logos/unknown.jpg" disabled="disabled">';} ?>
	</td>
	<td></td>
    </tr>
	<tr>
    <td colspan="2">
	<input type="file" name="fichier" size="30">
	</td>
	</tr>

	<tr>
	<td><label>Site : </label></td>
	<td><input type="text" name="Site" maxlength="50" value = <?php echo $Site; ?>> </td>
    </tr>
	<tr>
	<td><label>Contact : </label></td>
	<td><input type="text" name="Contact" maxlength="50" value = <?php echo $Contact; ?>></td>
    </tr>
	<tr>
	<td colspan="2" align="center"><p>Information Supplementaire:</p>
	                               <p style="margin-top:-15px"><textarea id="textArea1" name="Desc" ><?php echo $Description ?></textarea ></p></td>
	</tr>
	<tr>
	<td align="center">
	<input type="submit" name="upload" value="Valider">
	</td>
	<td  align="center">
	<input type="button" value="Retour" name="annuler" onclick="window.location.href='index.php?uc=profil&action=refresh_profil'" />
	</td>
	</tr>
    </table>
	</fieldset>
</form>    
</div>
    