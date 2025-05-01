<?php

include "./fonctions/fonctionsAccesDonnees.php";
include "./fonctions/fonctionsGestion.php";

$conferences = donnerToutesLesConferences();


if (empty($conferences)) {
    $message = "Aucune conférence n'a été programmée.";
} else {
    $message = "Liste des inscriptions par conférence";
}


include "./vue/vueListeInscrit.php";
?>