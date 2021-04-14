<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //Récupérer info membre
  session_start();
  $idClient = $_SESSION['id_Client'];
  echo $idClient;
  //Récupérer infos groupe
  $adresse = $_POST['adresse'];
  $codePostale = $_POST['codePostale'];
  $localisation = $_POST['localite'];

  //Ajouter un nouveau groupe
  mysqli_query($co, "INSERT INTO groupe(id_Client, adresse, codePostale, localite) VALUES('$idClient', '$adresse', '$codePostale', '$localisation')") or die("erreur creation d'un nouveau groupe");
  header('Location: ../Vue/Groupe/Groupe.php');
?>
