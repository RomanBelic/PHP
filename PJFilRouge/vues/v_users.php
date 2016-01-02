<?php
echo 
'
<form method="post">
<table style="font-size:12px;margin-left:42.5%">
    <tr>
	    <td>Filtrer par : </td> <td>
		                            <select name="filterBy">
									  <option value="Date">Date d\'inscription</option> 
									  <option value="Nom">Nom</option>
									</select> 
								    <select name="order">
									  <option value="ASC">ASC</option> 
									  <option value="DESC">DESC</option>
									</select> 
                          </td>
        <td><input type="submit" name="filterButton" value="Refraichir" onclick = "window.location.href=\'index.php?uc=Users&action=VoirUtilisateurs\'"  /> </td>
    </tr>
</table>
</form>


';
echo '
<div id="contenu">
<table style="margin-left:27%;">' ;
if ($userDetails != Null) {
	$i = 0;
	foreach  ($userDetails as $key=>$unInfo)
				{

					$idUser = $unInfo['idUser'];
					$Description = $unInfo['Description'];
					$LogoAdress = $unInfo['LogoAdress'];
					$Nom = $unInfo['Nom'];
					$Prenom = $unInfo['Prenom'];
					$UserLibelle = $unInfo['UserLibelle'];
					$Date = $unInfo['DateInscription'];
					$Site = $unInfo['Site'];
					$Contact = $unInfo['Contact'];
				
				    $Date = dateAnglaisVersFrancais ($Date);
					if ($LogoAdress == NUll){
						$LogoAdress = "unknown.jpg";
					}
					$i++;
					
					echo '

					<tr style="font-size:12px;">
					    <th>#'.$i.'</th>  
                        <th></th> 						
					</tr>
					<tr style="font-size:12px;" >
					<td rowspan="0"><img src="./logos/'.$LogoAdress.'"  style="width:96px;height:64px;align:middle;"></td>
						<td rowspan = "1" width="300px">
						<p style="line-height:0.0;padding-top:6px;">Nom : '.$Nom.' </p>
						<p style="line-height:0.0;padding-top:2px;">Prenom : '.$Prenom.' </p>
						<p style="line-height:0.0;padding-top:2px;">Date d\'Inscription : '.$DateInscription.' </p>
						<p style="line-height:0.0;padding-top:2px;">Occupation : '.$UserLibelle.'</p>
						<p style="line-height:0.0;padding-top:2px;">Site : <label><a href = "'.$Site.'">'.$Site.'</a><label></p>
						<p style="line-height:0.0;padding-bottom:5px">Contact : <label><a href="mailto:"'.$Contact.'">'.$Contact.'</a></label></p>
					</td>
					</tr>
					<tr  style="font-size:12px;">
					<td align="center">
					Informations : 
					</td>
					<td> <p>'.$Description.'</p></td>
					</tr>
                    <tr><td style="border:0;padding:10px"></td><td  style="border:0;"></td></tr>
				';	
				}

echo '</table>
</div>';

}
?>
