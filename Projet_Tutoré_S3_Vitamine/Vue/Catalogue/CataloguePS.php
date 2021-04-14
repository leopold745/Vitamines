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
    <link href="Catalogue.css" rel="stylesheet">
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
    <div class="container py-5">
        <h1 class="text-center">
          <h1 class="display-4 font-weight-bold">Catalogue de nos produits</h1>
        </h1>
        <form method="POST" action="../../controlleurs/Filtrer.php">
        <div class="filtre">
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filtre" id="inlineRadio1" value="fl">
        <label class="form-check-label" for="inlineRadio1">Fruit&Légume</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filtre" id="inlineRadio1" value="f">
        <label class="form-check-label" for="inlineRadio1">Fruit</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filtre" id="inlineRadio2" value="l">
        <label class="form-check-label" for="inlineRadio2">Légume</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filtre" id="inlineRadio2" value="ps">
        <label class="form-check-label" for="inlineRadio2">Panier Saison</label>
        </div>
          <input type="submit" value="Filtrer" class="btn btn-light boutonPanier"> 
      </div>
      </form>
        <div class="row pt-5">
        <div class="col-lg-6 mb-3 mb-lg-0">
        <div class="hover hover-3 text-white rounded"><img src="../../ImageProduit/Panier_Saison.jpg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-3-content">
        <h3 class="hover-3-title text-uppercase font-weight-bold mb-1">Panier Saison d'Hiver</h3>
        <p class="hover-3-description small text-uppercase mb-0">Comporte un assortiment de fruit et légume d'hiver</p>
        <form method="POST" action="../../controlleurs/AjouterPanierHebdo.php" >
        <div class="hover-3-description">
        <input type="number" name="nbPersonne" placeholder="Entrez la quantité" class="numberPanier" required>
        <br>
        <input type="submit" value="Ajouter au panier" class="btn btn-light boutonPanier">
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
    </div>
</body>
</html>
