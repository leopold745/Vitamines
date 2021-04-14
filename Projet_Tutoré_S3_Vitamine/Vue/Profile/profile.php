<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Profile.css?version=1">
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
    
    <form method="POST" action="../../controlleurs/ModifierProfil.php">
    <div class="container">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" class="test list-group-item list-group-item-action active mt-5">Gestion du Profile</a>
              <a href="../RecapCommande/VueCommande.php" class="test list-group-item list-group-item-action">Mes Commandes</a>
            </div> 
		</div>
		<div class="col-md-9 mt-5">
		    <div class="card">
		        <div class="card-body fond">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4 class="titre1">Votre Profile</h4>
		                    <hr>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-md-12">
		                <div class="pt-4">
		<?php
		require_once("../../Modeles/bd.php");
    $bd = new Bd("projet_tutore");
  	$co = $bd->connexion();
  	session_start();
  	$Client = $_SESSION['id_Client']; 
		              $sql = "SELECT prenom,nom,adresse,codePostale,localite,telephone,email FROM Client WHERE id_Client = $Client";
        $result = mysqli_query($co, $sql);
        while($row = mysqli_fetch_assoc($result)){ 
            echo"<ul class='list-group list-group-flush'>";
            echo"<label for='prenom' class='col-4 col-form-label ligne'>Prénom:</label>"; 
            echo"<li id='prenom' class='list-group-item '>". $row['prenom'] ."</li>";
            echo"<label for='nom' class='col-4 col-form-label ligne'>Nom :</label> ";
            echo"<li iid='nom' class='list-group-item '>". $row['nom'] ."</li>";
            echo" <label for='codePostale' class='col-4 col-form-label ligne'>Code Postale :</label> ";
            echo" <li id='codePostale' class='list-group-item '>". $row['codePostale'] ."</li>";
            echo"<label for='ville' class='col-4 col-form-label ligne'>Ville :</label> ";
            echo"<li id='ville' class='list-group-item '>". $row['localite'] ."</li>";
            echo"<label for='tel' class='col-4 col-form-label ligne'>Téléphone :</label> ";
            echo"<li id='tel' class='list-group-item  '>". $row['telephone'] ."</li>";
            echo"<label for='adresse' class='col-4 col-form-label ligne'>Adresse :</label> ";
            echo"<li id='adresse' class='list-group-item  '>". $row['adresse'] ."</li>";
            echo"</ul>";
            echo"</div>";
            echo"<div class='form-group row mt-3'>";
            echo'<form method="POST" action="../../controlleurs/ModifierProfil.php">';
            echo"  <label for='login' class='col-4 col-form-label ligne'>Pseudo</label>"; 
            echo"  <div class='col-8 mt-3'>";
            echo" <input id='login' name='pseudo' placeholder='Si vous voulez changer votre email votre pseudo ou un nouveau doit être insérer' required='required' class='form-control here ' type='text'>";
            echo"    </div>";
            echo"  </div>";
            echo"  <div class='form-group row mt-3'>";
            echo"    <label for='email' class='col-4 col-form-label ligne'>Email</label> ";
            echo"    <div class='col-8 mt-3'>";
            echo"    <input id='email' name='email'  value='". $row['email'] ."' class='form-control '></input>";
            echo"    </div>";
            echo"  </div>";
            echo"  <div class='form-group row mt-3 '>";
            echo"    <label for='adresse' class='col-4 col-form-label ligne'>Adresse</label> ";
            echo"    <div class='col-8 mt-3'>";
            echo"    <input id='adresse' name='adresse'  value='". $row['adresse'] ."' class='form-control '></input>";
            echo"    </div>";
            echo"  </div>";
          }
    ?>
    <div class="form-group row">
      <div class="offset-4 col-8 mt-3">
        <input type="submit" name="MODIF" value="Modifier son profil" class="btn">
          </form>
          <a class="test btn"  href="../ChangerMdp/VueMdp.php">Modifier son Mot de passe</a>
          </div>
          </div>
          </form>
		      </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
 
                           
</body>
</html>
