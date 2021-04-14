<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitamine</title>
    <link href="VueMdp.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Psoppins%26display=swap" rel="stylesheet">
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
    <div class="warpper fl">
        <div class="main">
            <div class="head">
                <p>Nouveau Mot de Passe</p>
            </div>
            <div class="form fl">
                <form method="POST" action="../../Controlleurs/ModifierMdp.php">
                    <p class="name">Votre Mot de Passe :</p>
                    <p>
                        <input type="password" name="mdp" placeholder="Entrez votre mot de passe" class="name-inp">
                    </p>
                    <p class="name">Nouveau Mot de Passe :</p>
                    <p>
                        <input type="password" name="nouvMdp" placeholder="Entrez votre nouveau mot de passe" class="name-inp">
                    </p>
                    <p class="boutonsub ">
                        <input type="submit" name="enregistrer" value="ENREGISTRER" class="sub">
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
