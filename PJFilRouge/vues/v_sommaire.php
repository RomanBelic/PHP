    <!-- Division pour le sommaire -->
<div id="menuGauche">   
<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
   
	<fieldset>
	<table align="center">
    <legend>Connectez-vous:</legend>
	<tr>
        <td><label>Login*</label></td>
	</tr>
	<tr>
        <td><input id="login" type="text" name="login" maxlength="50"></td>
    </tr> 
	  
	<tr>
		<td><label>Mot de passe*</label></td>
		
	</tr>	
	<tr>
		<td><input id="mdp" type="password" name="mdp" maxlength="50"></td>
    </tr>
	<tr>
	    <td>
		<input type="submit" value="Valider" name="valider">
		</form>    
	    <input type="button" value="S'inscrire" name="inscription" onclick="window.location.href='index.php?uc=profil&action=newProfil'" > 
		</td>
	</tr>
    </table>
	</fieldset>

</div>
    