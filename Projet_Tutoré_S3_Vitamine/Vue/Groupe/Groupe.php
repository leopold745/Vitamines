<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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

    <div class="div-titre p-5">
    <h2 class="titre2">Vous pouvez rejoindre ou créer un groupe</h2>
    </div>
    <?php
    session_start();
    if(isset($_SESSION['testGroupe'])&& $_SESSION['testGroupe']==1){
    echo '<div class="div-titre p-5"> <h2 class="pop">Vous avez bien rejoint un groupe</h2></div>';
    $_SESSION['testGroupe']=0;
    }
    ?>
    <div class="p-5">
        <table class="table table-bordered table-striped table-sm  ">
        <caption>
    <h4 class="titre3">Les Groupes déjà créé</h4>
  </caption>

  <thead class="tete">
    <tr>
      <th>ID Groupe</th>
      <th>Adresse</th>
      <th>Code Postale</th>
      <th>Localisation</th>
    </tr>
  </thead>
<tbody>
<?php
require_once("../../Modeles/bd.php");
    $bd = new Bd("projet_tutore");
  	$co = $bd->connexion();
        $sql = "SELECT DISTINCT (id_Groupe),adresse,codePostale,localite FROM Groupe ORDER BY id_Groupe DESC LIMIT 20 ";
        $result = mysqli_query($co, $sql);
        while($row = mysqli_fetch_assoc($result)){
	        echo "<tr><td>". $row['id_Groupe'] ."</td><td>". $row['adresse'] ."</td><td>". $row['codePostale'] ."</td><td>". $row['localite'] ."</td></tr>";
       }
        ?>
</tbody>
        </table>
        </div>
        <form method="POST" action="../../controlleurs/RejoindreGroupe.php">
        <section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate titre2">Gestion groupes</h1>
                    <div class="px-2">
                            <div class="form-group">
                                <label class="sr-only">Choisir un id_Groupe </label>
                                <input type="number" class="form-control" name="id_Groupe" min="1" max="20">
                            </div>
                            <button type="submit" name="CreeGroupe" class="btn btn-primary btn-lg colorb mt-3" >Rejoindre un groupe</button>
                        </form>
                         <form action="../../controlleurs/CreerGroupe.php" method="POST" class="justify-content-center">
                            <div class="form-group">
                                <label class="sr-only">Adresse</label>
                                <input type="text"  name="adresse" class="form-control" placeholder="Entrez votre adresse">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Code postale :</label>
                                <input type="text" name="codePostale" class="form-control" placeholder="Entrez Code Postale">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Ville</label>
                                <input type="text" name="localite" class="form-control" placeholder="Entrez votre Ville">
                            </div>


                            <button type="submit" name="CreeGroupe" class="btn btn-primary btn-lg colorb mt-3">Créer un Groupe</button>
                        </form>
                        <a href="../../controlleurs/QuitterGroupe.php"class="btn btn-primary btn-lg colorb mt-3">Quitter le groupe</a>
                    </div>
                </div>
            </div>
        </div>

</section>

</div>
</body>
</html>
