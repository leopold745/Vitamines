<?php
require_once("../Modeles/bd.php");
require_once("../Modeles/Client.php");
session_start();


$Bd = new Bd("projet_tutore");
$co = $Bd->connexion() or die("erreur connexion");
$id_Client = $_SESSION['id_Client'];


$result = mysqli_query($co, "SELECT mdp,pseudo FROM client WHERE id_Client ='$id_Client'");



while($row =mysqli_fetch_assoc($result)) {
$mdp = $row["mdp"];
$pseudo=$row["pseudo"];
$client = new Client($co,$pseudo,$mdp);
$client->deconnexion();
}

header('Location:../Vue/Accueil/Accueil.html');
?>
