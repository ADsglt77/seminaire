   <?php 
   include "./vue/entete.php";
   ?>  
   <form method="POST" action="./?action=connexion">
      <table>
         <tr>
            <td><h4>Connexion Administrateur</h4></td>
         </tr>
         <tr>
            <td>Utilisateur: </td>
            <td><input type="text" name="login" value="" size="15"></td>
         </tr>
         <tr >
            <td>Mot de passe: </td>
            <td><input type="password" name="mdp" value="" size="15"></td>
         </tr>
      </table>
      <div class="btn">
         <input type="submit" value="Valider" name="validerConnexion">
         <input type="reset" value="Annuler">
      </div>
   </form>
   <?php 
   include "./vue/pied.php";
   ?>

