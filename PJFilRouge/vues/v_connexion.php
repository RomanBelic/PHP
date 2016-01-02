<div id="contenu">

      <h2>Identification utilisateur</h2>


<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
   
     <div style="text-align: left">
	 <table>
	 <tr>
       
      <th style ="background-color:white;"><label for="nom">Login*</label></th>
      <th style ="background-color:white;"><input id="login" type="text" name="login"  size="30" maxlength="45"></th>
      
	  </tr>
	  

	  <tr>
			  <th style ="background-color:white;"><label for="mdp">Mot de passe*</label></th>
			  <th style ="background-color:white;"><input id="mdp"  type="password"  name="mdp" size="30" maxlength="45"></th>
      </tr>
	  </table>
	 </div>
	  <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
     
</form>

</div>