<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //récupérer id panier
  session_start();
  $idPanier = $_SESSION['id_Panier'];
  echo $idPanier;
  //récupérer infos produit a ajouter
  $idProduit = $_POST['id_Produit'];
  $quantite = $_POST['quantite'];

  //récupérer le stock du produit demandé
  $result = mysqli_query($co, "SELECT stock FROM produit WHERE id_Produit = '$idProduit'") or die("erreur requete sur la quantite restante");
  while($row = mysqli_fetch_assoc($result))
  {
    $stock = $row['stock'];
  }

  //vérifier que le produit n'est pas en rupture de stock
  if($quantite < $stock)
  {
    //ajouter un produit au panier
    mysqli_query($co, "INSERT INTO inclu(id_Produit, id_Panier, quantite) VALUES('$idProduit', '$idPanier', '$quantite')") or die("erreur ajout produit au panier");
    header('Location: ../Vue/Catalogue/Cataloguefl.php');
    $_SESSION['testPanier']=1;
  }
  else
  {
    //récupérer l'id du produit de substitut
    $result2 = mysqli_query($co, "SELECT id_ProdSub FROM produit WHERE id_Produit = '$idProduit'") or die("erreur requete sur l'id du produit sub'");
    while($row = mysqli_fetch_assoc($result2))
    {
      $idProduitSub = $row['id_ProdSub'];
    }
    $_SESSION['id_ProdSub'] = $idProduitSub;
    alert("Stock insuffisant");
  }
?>
