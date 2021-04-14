<?php
require_once("../Modeles/bd.php");
require_once("../Modeles/Client.php");

if(isset($_POST['pseudo']) && isset($_POST['mdp'])){
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
$Bd = new Bd("projet_tutore");
$co = $Bd->connexion() or die("erreur connexion");
$result = mysqli_query($co, "SELECT * FROM client WHERE pseudo ='$pseudo' and mdp='$mdp'")
or die("erreur requete");
}


if(mysqli_num_rows($result) == 1){
$client = new Client($co,$pseudo,$mdp);
$client->connexion();
header('Location: ../Vue/Catalogue/Cataloguefl.php');
}
else {
alert("Pas bon");
header('Location: ../Vue/connexion/formulaire_connexion.php');
}
?>
