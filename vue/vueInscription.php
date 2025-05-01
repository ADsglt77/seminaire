<?php 
include "./vue/entete.php";

if (estInscrit()) {
   echo "<div class='card success'>";
       echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><!-- Icon from Sargam Icons by Abhimanyu Rana - https://github.com/planetabhi/sargam-icons/blob/main/LICENSE.txt --><g fill='none'><path fill='white' fill-opacity='.16' d='M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2'/><path stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='1.5' d='M12 16h.008M12 8v5m10-1c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10'/></g></svg>";
       echo "<p>Vous êtes déjà connecté<p>";
   echo "</div>";
   exit;
}
?>
<form action="./?action=inscription" method="POST">
   <table>
      <tr>
         <td><h4>Nouvelle inscription</h4></td>
      </tr>
      <tr>
         <td> Nom : </td>
         <td><input type="text" name="nom" value="" size="30"required ></td>
      </tr>
      <tr >
         <td> Prenom : </td>
         <td><input type="text" name="prenom" value="" size="30" required></td>
      </tr>
      <tr >
         <td> Mail : </td>
         <td><input type="text" name="mail" value="" size="30" required></td>
      </tr>
      <tr>
         <td> Ville : </td>
         <td><input type="text" name="ville"  value="" size="30" required></td>
      </tr>
      <tr>
         <td> Profession : </td>
         <td>
            <select name= "profession" required>
            <?php
               foreach ($professions as $profession) {
                  echo "<option value=" . $profession . "'>" . $profession . "</option>";
               }
           ?>
             </select>
         </td>
      </tr> </table>
    <div class="btn">
      <input type="submit" value="Valider" name="btn">
      <input type="reset" value="Annuler" name="btn">
    </div>

      
   </table>
</form>
<?php 
include "./vue/pied.php";
?>
