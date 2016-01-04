<html>
<div id = "contenu"> 
<fieldset style = "margin-left:27%;margin-right:28%" >
	<table style = "font-size:12px">
    <legend>Modification d'annonce</legend>	
	<?php 
	if ($annonceDetails != Null) {
	foreach  ($annonceDetails as $key=>$unInfo)
				{
					$idAnnonce = $unInfo['idAnnonce'];
					$AnnonceLibelle = $unInfo['AnnonceLibelle'];
					$Description = $unInfo['Description'];
					$idUser = $unInfo['idUser'];
					$Prix = $unInfo['Prix'];
					$LogoAdress = $unInfo['LogoAdress'];
					$Nom = $unInfo['Nom'];
					$Prenom = $unInfo['Prenom'];
					$UserLibelle = $unInfo['UserLibelle'];
					$Date = $unInfo['Date'];
				
				    $Date = dateAnglaisVersFrancais ($Date);
					if ($LogoAdress == Null)
					    $LogoAdress = "unknown.jpg";
				}
		echo '	
		    <form action="index.php?uc=Annonces&action=ValidAnnonce&id='.$idAnnonce.'" method="post" ENCTYPE="multipart/form-data">
				<tr>
				 <td colspan="2" style="line-height:0;padding-top:10px" align="middle">
				  <p>Image actuelle </p>
				  <img src = "./logosAnnonce/'.$LogoAdress.'" style="width:256;height:164px;border:0;align:center" />
				  <input type="text" name="logoAdress" value = "'.$LogoAdress.'" readonly="readonly" hidden="true" />
				 </td>
				</tr>
				<tr>
				 <td width="38%">Chosissez une image : </td>
				 <td width = "61%">
				  <input type="file" name="fichier" size="30" />
				 </td>
				</tr>
				<tr>
				 <td>Nom d\'annonce : </td>
				 <td><input type="text" name="Libelle" maxlength="50" value = "'.$AnnonceLibelle.'" /></td>
				</tr>
				<tr>
				 <td>Description d\'annonce : </td>
				 <td><textarea id="textArea1" name="Desc" >'.$Description.'</textarea></td>
				</tr>
				 <tr>
				 <td>Prix estimee : </td>
				 <td><input type="text" name="Prix" maxlength="10"  value = "'.$Prix.'"/></td>
				</tr>
				<tr>
			 	<td align="center" colspan="2">
				  <input type="submit" name="upload" value="Valider"  style ="width:25%" >
				  <input type="reset" value="Annuler"  name="annuler" style ="width:25%"> 
			      <input type="button" value="Retour" name="annuler"  style ="width:25%" onclick="window.location.href=\'index.php?uc=Annonces&action=VoirAnnonces\'" />
				 </td>
				</tr>
				';
	}	
?>
    </table>
	</fieldset>
</form> 

</div>
</html>
