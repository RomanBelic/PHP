<html>
<div id = "contenu">
<form action="index.php?uc=profil&action=createProfil" method="post" ENCTYPE="multipart/form-data">
   
<fieldset style = "margin-left:27%;margin-right:30%" >
	<table style = "font-size:12px">
    <legend>Creation du profil</legend>
	<tr>
	<td>Chosissez un avatar : </td>
    <td>
	<input type="file" name="fichier" size="30">
	</td>
	</tr>
	<tr>
	    <td>Login : </td><td><input type="text" name="login"> </td>
    </tr>
	<tr>
	    <td>Mot de passe : </td><td><input type="text" name="mdp"> </td>
	</tr>
	<tr>
	    <td>Nom : </td><td><input type="text" name="Nom"> </td>
	</tr>
	<tr>
	    <td>Prenom : </td><td><input type="text" name="Prenom"> </td>
	</tr>
	<tr>
	    <td>Site : </td><td><input type="text" name="Site"> </td>
	</tr>
	<tr>
	    <td>Contact : </td><td><input type="text" name="Contact"> </td>
	</tr>
	<tr>
	    <td>
		 Occupation :
	    </td>
		<td><select name="typeUser">
		<?php
		if ($types != Null) {
	    foreach ($types as $key=>$unInfo)
				{
				$idType = $unInfo['id'];
				$LibUser = $unInfo['Libelle'];
				echo '  <option value="'.$idType.'">'.$LibUser.'</option> ';
				}
		}
		
		?>
		</select></td>
	 </tr> 
    <tr>
	 <td>Informations : </td>
	 <td><textarea id="textArea1" name="Desc" ></textarea></td>
	</tr>
	<tr>
	<td align="center" colspan="2">
	<input type="submit" name="upload" value="Valider"  style ="width:50%" >
    <input type="reset" value="Annuler"  name="annuler"> 
	</td>
	</tr>
    </table>
	</fieldset>
</form> 

</div>
</html>
