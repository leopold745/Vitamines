<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //Récupérer info membre
  session_start();
  $idClient = $_SESSION['id_Client'];

  //Récupérer infos groupe
  $idGroupe = $_POST['id_Groupe'];
  $result = mysqli_query($co, "SELECT adresse, codePostale, localite FROM groupe WHERE id_Groupe = '$idGroupe'") or die("erreur requette groupe");
  while($row = mysqli_fetch_assoc($result))
	{
 		$adresse = $row["adresse"];
 		$codePostale = $row["codePostale"];
 		$localisation = $row["localite"];
	}

  //Créer un groupe avec un nouveau membre
  mysqli_query($co, "INSERT INTO Groupe(id_Groupe, id_Client, adresse, codePostale, localite) VALUES('$idGroupe', '$idClient', '$adresse', '$codePostale', '$localisation')") or die("erreur ajout membre au groupe");
  $_SESSION['testGroupe']=1;
  header('Location: ../Vue/Groupe/Groupe.php');
?>
