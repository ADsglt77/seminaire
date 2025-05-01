<?php 
include "./vue/entete.php";

if (!estAdmin()) {
    echo "<div class='card error'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><!-- Icon from Sargam Icons by Abhimanyu Rana - https://github.com/planetabhi/sargam-icons/blob/main/LICENSE.txt --><g fill='none'><path fill='white' fill-opacity='.16' d='M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2'/><path stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='1.5' d='M12 16h.008M12 8v5m10-1c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10'/></g></svg>";
        echo "<p>Veuillez vous connecter en admin<p>";
    echo "</div>";
    exit;
}

foreach ($conferences as $conference) {
    echo '<table>';
   
    echo $conference->id . ' - ' . $conference->creneau . ' - ' . $conference->description;
    
    $participants = $conference->participants;

    if (!empty($participants)) {
        echo '<tr>';
        echo '<th>Nom</th>';
        echo '<th>Prénom</th>';
        echo '<th>Ville</th>';
        echo '<th>Profession</th>';
        echo '<th>Email</th>';
        echo '</tr>';

        foreach ($participants as $participant) {
            echo '<tr>';
            echo '<td>' . $participant->nom . '</td>';
            echo '<td>' . $participant->prenom . '</td>';
            echo '<td>' . $participant->ville . '</td>';
            echo '<td>' . $participant->profession . '</td>';
            echo '<td>' . $participant->mail . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td>Aucun participant inscrit pour cette conférence.</td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>

<?php 
include "./vue/pied.php";
?>
