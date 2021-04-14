<?php
ini_set('display_errors', 'on'); 
require_once("../Modeles/bd.php");
require_once("../Modeles/Client.php");


if(isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['email'])&& isset($_POST['prenom'])&& isset($_POST['nom'])&& isset($_POST['adresse'])&& isset($_POST['codePostale'])&& isset($_POST['tel'])&& isset($_POST['localisation'])){
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];

$email = $_POST['email'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$codePostale = $_POST['codePostale'];
$tel = $_POST['tel'];
$localisation = $_POST['localisation'];
$Bd = new Bd("Projet_tutore");
$co = $Bd->connexion();
$m = new Client($co,$pseudo,$mdp,$email,$prenom ,$nom ,$adresse,$codePostale, $tel,$localisation);
header('Location: ../Vue/connexion/formulaire_connexion.php');
}
else{
header('Location: ../Vue/Inscription/formulaire_Inscription.php'); 
}
?>
