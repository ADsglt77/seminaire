<?php 
include "./vue/entete.php";

if (!estInscrit()) {
    echo "<div class='card error'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><!-- Icon from Sargam Icons by Abhimanyu Rana - https://github.com/planetabhi/sargam-icons/blob/main/LICENSE.txt --><g fill='none'><path fill='white' fill-opacity='.16' d='M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2'/><path stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='1.5' d='M12 16h.008M12 8v5m10-1c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10'/></g></svg>";
        echo "<p>Veuillez vous inscrire pour choisir vos conférences<p>";
    echo "</div>";
    exit;
}

?>
<form action="./?action=choixconferences" method="POST">
	<table>
		
		<?php
    foreach ($heures as $heure) {
        if (!empty($conferencesParHeure[$heure])) {
			echo "<th>  $heure </th>";
			echo "<th> </th>";
			echo "<th> </th>";
            foreach ($conferencesParHeure[$heure] as $conference) {
                echo "<tr>";
                echo "<td>" . $conference->description . "</td>";
                echo "<td>" . $conference->salle . "</td>";
				echo "<td><input type='radio' name='choix_{$heure}' value='$conference->id'></td>";
                echo "</tr>";
            }
        }
    }
    ?>
	</table>
	<div class="btn">
		<input type="submit" value="Valider" name="btn">
        <input type="reset" value="Annuler" name="btn">
    </div>
</form>
<?php

?>
<?php 
include "./vue/pied.php";
?>
