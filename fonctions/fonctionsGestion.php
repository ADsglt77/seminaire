<?php
/**
 * Vérifie le login et le mot de passe afin d'autoriser ou pas le visiteur à visualiser les inscriptions
 * @param chaîne $login
 * @param chaîne $mdp
 */
function verifier($login, $mdp){
   $json_source = file_get_contents('data/admin.json');
   $document = json_decode($json_source, true);

   // Vérifier les informations de chaque utilisateur
   foreach ($document['users'] as $user) {
       if ($user['login'] === $login && $user['mdp'] === $mdp) {
            $_SESSION['login'] = $login;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['admin'] = 1;
           return true;
       }
   }

   // Si aucune correspondance, on retourne false
   return false;
}

/**
 * Retourne vrai si le visiteur est un administrateur connecté <br> et autorisé à visualiser les inscriptions
 * @return booléen
 */
function estAdmin(){
    return isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
}

/**
 * Vérifie les données saisies
 * @param chaîne $nom
 * @param chaîne $prenom
 * @param chaîne $mail
 * @param chaîne $ville
 */
function verifierDonneesInscription($nom, $prenom, $mail, $ville)
{
  
    if ($nom=="" || $prenom=="" || $mail=="" || $ville=="" )
   {
		ajouterErreur("Chaque champ suivi du caractère * est obligatoire");
     
   }
   if (!preg_match("/^[-a-z0-9\._]+@[-a-z0-9\.]+\.[a-z]{2,4}$/i", $mail))
		ajouterErreur("Le format de l'email n'est pas valide");

}

/*					 FONCTIONS DE GESTION DES ERREURS			*/


/**
 * @access private
 * @param type $msg
 */
function ajouterErreur($msg)
{
   if (! isset($_GET['erreurs']))
		$_GET['erreurs']=array();
	$_GET['erreurs'][]=$msg;
}
/**
 * Retourne le nombre de messages d'erreurs de saisie
 * @return entier
 */
function donnerNbErreurs()
{
   if (!isset($_GET['erreurs']))
   {
	   return 0;
	}
	else
	{
	   return count($_GET['erreurs']);
	}
}
/**
 * Affiche toutes les erreurs de saisie
 */
function afficherErreurs()
{
   echo "<div class='card error'>";
   echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><!-- Icon from Sargam Icons by Abhimanyu Rana - https://github.com/planetabhi/sargam-icons/blob/main/LICENSE.txt --><g fill='none'><path fill='white' fill-opacity='.16' d='M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2'/><path stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='1.5' d='M12 16h.008M12 8v5m10-1c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10'/></g></svg>";
   foreach($_GET['erreurs'] as $erreur)
	{
      echo "<p>$erreur</p>";
	}
   echo "</div>";
}

?>
