<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //récupérer info membre
  session_start();
  $idClient = $_SESSION['id_Client'];

  //récupérer les nouvelles informations profil
  $nouvPseudo = $_POST['pseudo'];
  $nouvMail = $_POST['email'];
  $nouvAdresse = $_POST['adresse'];

  //update la table membre WHERE idClient = $_SESSION['idClient']
  mysqli_query($co, "UPDATE client SET pseudo = '$nouvPseudo', adresse = '$nouvAdresse', email = '$nouvMail' WHERE id_Client = '$idClient'") or die("erreur de modification d'adresse");
  header('Location: ../Vue/Profile/Profile.php');
?>
