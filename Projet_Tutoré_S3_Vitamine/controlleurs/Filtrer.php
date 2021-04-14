<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //récupérer info filtre
  $filtre = $_POST['filtre'];

  if($filtre == "fl")
  {
    //rediriger vers la page filtre fruit et legume
    header('Location: ../Vue/Catalogue/Cataloguefl.php');
  }
  else if($filtre == "f")
  {
    //rediriger vers la page filtre fruit
    header('Location: ../Vue/Catalogue/Cataloguef.php');
  }
  else if($filtre == "l")
  {
    //rediriger vers la page filtre legume
    header('Location: ../Vue/Catalogue/Cataloguel.php');
  }
  else
  {
    header('Location: ../Vue/Catalogue/CataloguePS.php');
  }
?>
