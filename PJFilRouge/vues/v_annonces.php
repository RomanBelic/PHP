<?php
echo 
'
<form method="post">
<table style="font-size:12px;margin-left:42.5%">
    <tr>
	    <td>Filtrer par : </td> <td>
		                            <select name="filterBy">
									  <option value="Date">Date</option> 
									  <option value="Libelle">Nom d\'annonce</option>
									  <option value="Nom">Nom du posteur</option>
									  <option value="Prix">Prix</option>
									</select> 
								    <select name="order">
									  <option value="ASC">ASC</option> 
									  <option value="DESC">DESC</option>
									</select> 
                          </td>
        <td><input type="submit" name="filterButton" value="Refraichir" onclick = "window.location.href=\'index.php?uc=Annonces&action=VoirAnnonces\'"  /> </td>
    </tr>
</table>
</form>
';
echo '
<div id="contenu">
<table style="margin-left:27%;">' ;
if ($annonceDetails != Null) {
	$i = 0;
	$editArea  = "";
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
						
					if (ISSET($_SESSION['params'])){
						if ($_SESSION['params']['Id'] == $idUser)
						{
						    $editArea = '<td colspan ="2" style="font-size:12px;border-right:none">
					        <a href = "index.php?uc=Annonces&action=modAnnonce&id='.$idAnnonce.'">Modifier l\'annonce</a></td>';
						}
						else {
							$editArea = '<td style="padding:8px;border-left:none;border-right:none;"></td>';
						}
					}
					$i++;
					
					echo '
					<tr style="font-size:12px;">
					    <th>#'.$i.'</th><td style="text-align:center">'.$AnnonceLibelle.'</td><td style="text-align:center">Poste du '.$Date.' </td>
						                <td style="text-align:center">Par '.$Nom.' '.$Prenom.' </td>
					</tr>
					<tr style="font-size:12px;" >
					    <td><img src="./logosAnnonce/'.$LogoAdress.'"  style="width:96px;height:64px;border:0;"></td>
						<td colspan="3" width="300px">
						    <p style="line-height:0;">Offre de : '.$UserLibelle.'</p>
       						<p style="line-height:0;padding-top:5px;">Description : '.$Description.'</p>
						    <p style="line-height:0;padding-top:5px;">Prix estimee : '.$Prix.' $</p>          
						</td>
					</tr>
				    <tr>'.$editArea.'
					</tr>
				';	
				}

echo '</table>
</div>';

}
?>
