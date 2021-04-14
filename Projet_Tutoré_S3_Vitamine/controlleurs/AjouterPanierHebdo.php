<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //récupérer id panier
  session_start();
  $idPanier = $_SESSION['id_Panier'];

  //récupérer infos panier saion et nombre de personnes
  $idPanierSaison = $_SESSION['id_Panier_Saison'];
  $nbPersonne = $_POST['nbPersonne'];

  //récupérer le contenue du panier saison
  $result3 = mysqli_query($co, "SELECT id_Produit, quantite FROM inclu WHERE id_Panier = '$idPanierSaison'") or die("erreur requette contenue panier saison");
  while($row3= mysqli_fetch_assoc($result3))
  {
    $idProduit = $row3['id_Produit'];
    $quantite = $row3['quantite'] * $nbPersonne;

    //récupérer le stock du produit demandé
    $result = mysqli_query($co, "SELECT stock FROM produit WHERE id_Produit = '$idProduit'") or die("erreur requete sur la quantite restante");
    while($row = mysqli_fetch_assoc($result))
    {
      $stock = $row['stock'];
    }

    if($quantite < $stock)
    {
      //vérifier que le produit n'est pas déjà dans le panier
      $result4 = mysqli_query($co, "SELECT quantite FROM inclu WHERE id_Panier = '$idPanier' AND id_Produit = '$idProduit'") or die("erreur requete quantite initiale");
      if(mysqli_num_rows($result4) > 0)
      {
        while($row4 = mysqli_fetch_assoc($result4))
        {
          $quantiteInit = $row4['quantite'];
        }
        $quantiteFinale = $quantiteInit + $quantite;
        mysqli_query($co, "UPDATE inclu SET quantite = '$quantiteFinale' WHERE id_Panier = '$idPanier' AND id_Produit = '$idProduit'") or die ("erreur mise a jour de la quantite produit panier");
      }
      else
      {
        //ajouter un produit au panier
        mysqli_query($co, "INSERT INTO inclu(id_Produit, id_Panier, quantite) VALUES('$idProduit', '$idPanier', '$quantite')") or die("erreur ajout produit au panier");
      }
    }
    else
    {
      //récupérer l'id du produit de substitut
      $result2 = mysqli_query($co, "SELECT id_ProdSub FROM produit WHERE id_Produit = '$idProduit'") or die("erreur requete sur l'id du produit sub'");
      while($row2 = mysqli_fetch_assoc($result2))
      {
        $idProduitSub = $row2['id_ProdSub'];
      }

      //ajouter un produit substitut au panier
      mysqli_query($co, "INSERT INTO inclu(id_Produit, id_Panier, quantite) VALUES('$idProduitSub', '$idPanier', '$quantite')") or die("erreur ajout produit substitut au panier");
    }
  }
  header('Location: ../Vue/Catalogue/Cataloguefl.php');
?>
