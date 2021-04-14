<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitamine</title>
    <link href="connexion.css" rel="stylesheet">
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
                <p>Connexion</p>
            </div>
            <div class="form fl">
                <form method="POST" action="../../controlleurs/connexion.php">
                    <p class="name">Login :</p>
                    <p>
                        <input type="text" name="pseudo" placeholder="Entrez votre pseudo" class="name-inp">
                    </p>
                    <p class="name">Mot de passe :</p>
                    <p>
                        <input type="password" name="mdp" placeholder="Entrez votre mot de passe" class="name-inp">
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
