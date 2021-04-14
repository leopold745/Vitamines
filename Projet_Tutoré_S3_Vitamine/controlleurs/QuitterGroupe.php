<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //Récupérer info membre
  session_start();
  $idClient = $_SESSION['id_Client'];

  //Supprimer le membre du groupe
  mysqli_query($co, "DELETE FROM groupe WHERE id_Client = '$idClient'") or die("erreur suppression membre");
  header('Location: ../Vue/Groupe/Groupe.php');
?>
