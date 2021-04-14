<?php
  require_once("../Modeles/bd.php");
  date_default_timezone_set('UTC');
  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //Récupéper id panier
  session_start();
  $idPanier = $_SESSION['id_Panier'];
  $idClient = $_SESSION['id_Client'];

  //récupérer infos sur la commande
  $dateCommande = date("Y-m-d");  
  $hebdomadaire = $_POST['hebdomadaire'];
  $dateLivraison = date('Y-m-d', strtotime($date. ' + 5 days'));
  $typeLivraison = $_POST['typeLivraison'];
  $typePaiement = $_POST['typePaiement'];

  //Vérifier que le panier n'est pas vide
  $result = mysqli_query($co, "SELECT * FROM inclu WHERE id_Panier = '$idPanier'") or die("erreur calcul de ligne inclu");
  if(mysqli_num_rows($result) > 0)
  {
    //Ajouter une commande a la BD
    mysqli_query($co, "INSERT INTO commande(dateCommande, hebdomadaire, dateLivraison, typeLivraison, typePaiement, id_Client, id_Panier) VALUES('$dateCommande', '$hebdomadaire', '$dateLivraison', '$typeLivraison', '$typePaiement', '$idClient', '$idPanier')") or die("erreur ajout de la commande");
  }
  header('Location: ../Vue/RecapCommande/VueCommande.php');
  //Envoyer un mail au producteur pour l'informer de la commande
?>
