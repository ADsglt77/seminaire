<?php
include "./fonctions/fonctionsAccesDonnees.php";
include "./fonctions/fonctionsGestion.php";


$professions = donnerLesProfessions();

$nom = '';
$prenom = '';
$mail = '';
$ville = '';
$profession = '';


$btn = "Inscription";
if (isset($_POST["btn"])){
	$btn = $_POST["btn"];
}

switch ($btn){
	case "Annuler" :
      $nom = '';
      $prenom = '';
      $mail = '';
      $ville = '';
      $profession = '';

		break;
		
	case "Valider" :
         $nom = $_POST["nom"];
         $prenom = $_POST["prenom"];
         $mail = $_POST["mail"];
         $ville = $_POST["ville"];
         $profession = $_POST["profession"];

		   verifierDonneesInscription($nom, $prenom, $mail, $ville);
	
         if (donnerNbErreurs() > 0){
            afficherErreurs();
         }
         else {
            sauverDonneesInscription($nom, $prenom,$mail,$ville, $profession);
            echo "<div class='card success'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><!-- Icon from Sargam Icons by Abhimanyu Rana - https://github.com/planetabhi/sargam-icons/blob/main/LICENSE.txt --><g fill='none'><path fill='white' fill-opacity='.16' d='M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2'/><path stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='1.5' d='M12 16h.008M12 8v5m10-1c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10'/></g></svg>";
            echo "<p>Inscription réussis<p>";
            echo "</div>";

            header("Location: ./?action=choixconferences");
         }


}

include "./vue/vueInscription.php";

?>


  
        
        
