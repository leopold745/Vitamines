<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitamine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <link href="Panier.css" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="logo">
        <a href="../Accueil/Accueil.html"><img class="imglogo" src="../img/logo-fruit.png" alt="not found"></a>
          <h4>Vitamine</h4>
        </div>
        <ul class="nav-links">
          <li><a href="../Catalogue/Cataloguefl.php">Catalogue</a></li>
          <li><a href="../Panier/Panier.php">Panier</a></li>
          <li><a href="../Profile/profile.php">Profile</a></li>
          <li><a href="../../controlleurs/deconnexion.php">Déconnexion</a></li>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    </nav>

    <section class="m-5 p-4 planA">

<!--Grid row-->
<div class="row">

  <!--Grid column-->
  <div class="col-lg-8">

    <!-- Card -->
    <div class="mb-3">
      <div class="pt-4 wish-list">
        <hr class="mb-4">
        <!--ici PHP-->
        <?php
        ini_set('display_errors', 'on'); 
        require_once("../../Modeles/bd.php");
        require_once("../../Modeles/Client.php");
        session_start();
        $id_Panier=$_SESSION['id_Panier'];
        $Bd = new Bd("projet_tutore");
        $co = $Bd->connexion() or die("erreur connexion");
        $result = mysqli_query($co, "SELECT p.id_Produit,p.nom,p.prixAuKilo,p.imageProduit,i.quantite,p.poids FROM Produit p,inclu i WHERE p.id_Produit=i.id_Produit AND i.id_Panier=$id_Panier") or die("erreur requete");
        $count=mysqli_num_rows($result);
        $somme=0;
        while($row = mysqli_fetch_assoc($result)){
          $id_Produit=$row['id_Produit'];
          $nom=$row['nom'];
          $prixAuKilo=$row['prixAuKilo'];
          $imageProduit=$row['imageProduit'];
          $quantite=$row['quantite'];
          $poids=$row['poids'];
        echo '<div class="row mb-4">';
        echo '<div class="col-md-5 col-lg-3 col-xl-3">';
        echo '<div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">';
        echo '<div class="mask">';
        echo '<img class="img-fluid w-100"';
        echo 'src="../../imageProduit/'.$imageProduit.'">';
        echo '<div class="mask rgba-black-slight"></div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-md-7 col-lg-9 col-xl-9">';
        echo '<div class="d-flex justify-content-between">';
        echo '<div>';
        echo '<h5>'.$nom.'</h5>';
        echo '<p class="mb-2 mt-3 text-muted text-uppercase small">Prix au kilo : '.$prixAuKilo.'</p>';
        echo '<p class="mb-2 text-muted text-uppercase small">Quantité :'.$quantite.'</p>';
        echo '</div>';
        $prix=$prixAuKilo*(($quantite*$poids)/1000);
        echo '<p class="mb-0"><span><strong>'.number_format($prix, 2).'€</strong></span></p class="mb-0">';
        echo '</div>';
        echo '<div class="d-flex justify-content-end">';
        echo '<form method="POST" action="../../controlleurs/RetirerPanier.php">';
        echo '<input type="hidden" name="id_Produit" value="'.$id_Produit.'">';
        echo '<input type="submit" value="Retirer article" class="btn btn-block couleur">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        $somme=$somme+$prix;
        }
        ?>
        <!--ici-->
      </div>
    </div>
    <!-- Card -->

  </div>
  <!--Grid column-->
  <!--Grid column-->
  <div class="col-lg-4">

    <!-- Card -->
    <div class="mb-3">
      <div class="pt-4">

        <h5 class="mb-3">Voici ce que vous avez à payer</h5>

        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div class="text-uppercase">
              <strong>total à payer</strong>
            </div>
            <span><strong>
            <?php
            echo number_format($somme, 2).'€';
            ?>
            </strong></span>
          </li>
        </ul>
        <?php
        if($somme<10){
        echo '<div class="text-danger">Il faut que votre panier est une valeur supèrieur à 10€</div>';
        }
        else{
        echo '<a href="../Paiement/Paiement.php"class="btn btn-block couleur">Commander</a>';
        }
        ?>
        <a href="../Groupe/Groupe.php"class="btn btn-block couleur">Intégrer ou Créer un groupe</a>

      </div>
    </div>
    <!-- Card -->

  </div>
  <!--Grid column-->

</div>
<!-- Grid row -->

</section>
<!--Section: Block Content-->
</body>
</html>