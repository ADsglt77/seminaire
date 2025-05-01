<?php
include "./controleur/controleurPrincipal.php";
session_start();

if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    $action = "programme";
}

$fichier = controleurPrincipal($action);
include "./controleur/$fichier";

?>
     
