<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //Récupérer id panier
  session_start();
  $idPanier = $_SESSION['id_Panier'];

  //récupérer infos produit a retirer
  $idProduit = $_POST['id_Produit'];

  mysqli_query($co, "DELETE FROM inclu WHERE id_Produit = '$idProduit' AND id_Panier='$idPanier'") or die("erreur supression produit du panier");
  header('Location: ../Vue/Panier/Panier.php');
?>
