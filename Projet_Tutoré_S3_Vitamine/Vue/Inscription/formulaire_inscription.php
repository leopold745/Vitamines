<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="inscription.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Psoppins%26display=swap" rel="stylesheet">
</head>
<body>
    <nav>
      <div class="logo">
      <a href="../Accueil/Accueil.html"><img class="imglogo" src="../img/logo-fruit.png" alt="not found"></a>
        <h4>Vitamine</h4>
      </div>
    </nav>
    <div class="warpper fl">
        <div class="main">
            <div class="head">
                <p>Inscription</p>
            </div>
            <div class="form fl">
                <form method="POST" action="../../controlleurs/Inscription.php">
                    <p class="name">Login :</p>
                    <p>
                        <input type="text" name="pseudo" placeholder="Entrez votre pseudo" class="name-inp">
                    </p>
                    <p class="name">Mot de passe :</p>
                    <p>
                        <input type="password" name="mdp" placeholder="Entrez votre mot de passe" class="name-inp">
                    </p>
                    <p class="name">Prenom et Nom :</p>
                    <p>
                        <input type="text" name="prenom" placeholder="Entrez votre prenom" class="pass">
                        <input type="text" name="nom" placeholder="Entrez votre nom" class="pass">
                    </p>
                    <p class="name">Email :</p>
                    <p>
                        <input type="text" name="email" placeholder="Entrez votre email" class="name-inp">
                    </p>
                    <p class="name">Télephone :</p>
                    <p>
                        <input type="text" name="tel" placeholder="Entrez votre numéro de télephone" class="name-inp">
                    </p>
                    <p class="name">Adresse :</p>
                    <p>
                        <input type="text" name="adresse" placeholder="Entrez votre adresse" class="name-inp">
                    </p>
                    <p class="name">Ville :</p>
                    <p>
                        <input type="text" name="localisation" placeholder="Entrez votre Ville" class="name-inp">
                    </p>
                    <p class="name">Code postale :</p>
                    <p>
                        <input type="text" name="codePostale" placeholder="Entrez votre code postale" class="name-inp">
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
