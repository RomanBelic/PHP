<html>
<div id = "contenu">
<form action="index.php?uc=Annonces&action=newAnnonce" method="post" ENCTYPE="multipart/form-data">
   
<fieldset style = "margin-left:27%;margin-right:28%" >
	<table style = "font-size:12px">
    <legend>Creation d'annonce</legend>
	<tr>
	<td>Chosissez une image : </td>
    <td>
	<input type="file" name="fichier" size="30">
	</td>
	</tr>
	 <tr>
	 <td>Nom d'annonce : </td>
	 <td><input type="text" name="Libelle" maxlength="50" /></td>
	</tr>
    <tr>
	 <td>Description d'annonce : </td>
	 <td><textarea id="textArea1" name="Desc" ></textarea></td>
	</tr>
	 <tr>
	 <td>Prix estimee : </td>
	 <td><input type="text" name="Prix" maxlength="10" /></td>
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
