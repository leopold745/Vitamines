<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Paiment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Vitamine</title>
    
    
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
    

  <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Paiement</h2>
          <p>Toute Opération de paiment est sécuriser grâce à paySafe, vos informations resterons confidentiels</p>
        </div>
        <form class="formu">
          <div class="products">
            <h3 class="title">Panier</h3>
        <?php
        ini_set('display_errors', 'on'); 
        require_once("../../Modeles/bd.php");
        require_once("../../Modeles/Client.php");
        session_start();
        $id_Panier=$_SESSION['id_Panier'];
        $Bd = new Bd("projet_tutore");
        $co = $Bd->connexion() or die("erreur connexion");
        $result = mysqli_query($co, "SELECT p.nom,p.prixAuKilo,i.quantite,p.poids FROM produit p,inclu i WHERE p.id_Produit=i.id_Produit AND i.id_Panier=$id_Panier") or die("erreur requete");
        $somme=0;
        while($row = mysqli_fetch_assoc($result)){
        $nom=$row['nom'];
        $prixAuKilo=$row['prixAuKilo'];
        $quantite=$row['quantite'];
        $poids=$row['poids'];
        $prix=$prixAuKilo*(($quantite*$poids)/1000);
        $somme=$somme+$prix;
        echo'<div class="item">';
        echo'<span class="price">'.number_format($prix, 2).'</span>';
        echo'<p class="item-name">'.$nom.'</p>';
        echo'<p class="item-description">Quantité :'.$quantite.'</p>';
        echo'</div>';
        }
        ?>
            <div class="total">Totale<span class="price">
            <?php
            echo number_format($somme, 2).'€';
            ?>
            </span></div>
          </div>
          <div class="card-details">
            <h3 class="title">Détails de la Carte de Crédit</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Nom et Prenom du propiétaire</label>
                <input id="card-holder" type="text" class="form-control" placeholder="titulaire de la carte" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Date d'expiration</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Numéro de Carte</label>
                <input id="card-number" type="text" class="form-control" placeholder="Numéro de Carte" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
                <br>
              </div>
              <hr>
              </form>
              <form method="POST" action="../../controlleurs/Commander.php" class="formulaire">
              <div class="filtre">
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="hebdomadaire" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">COMMANDE HEBDOMADAIRE</label>
              </div>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="hebdomadaire" id="inlineRadio1" value="0">
              <label class="form-check-label" for="inlineRadio1">COMMANDE UNIQUE</label>
              </div>
              </div>
              <div class="selecteur">
              <div class="form-check form-check-inline">
              <select name="typeLivraison" class="form-control" required>
                <option value="">Type de livraison</option>
                <option value="Vélo">Vélo</option>
                <option value="Scooter">Scooter</option>
                <option value="Poste">La Poste</option>
                <option value="Camion">Camion</option>
              </select>
              </div>
              <div class="form-check form-check-inline">
              <select name="typePaiement" class="form-control" required>
                <option value="">Type de Paiement</option>
                <option value="Carte">Carte</option>
                <option value="Paypal">Paypal</option>
                <option value="PaySafeCard">PaySafeCard</option>
              </select>
              </div>
              </div>
              <div class="form-check form-check-block">
              <input type="submit" value="PAYER" class="btn btn-block px-5 py-3 bordure">
              </form>
            </div>
          </div>
      </div>
    </section>
</body>
</html>

