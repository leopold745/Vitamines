<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="VueCommande.css?version=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    
    <form method="POST" action="../../controlleurs/connexion.php">
    <div class="container">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="../Profile/profile.php" class="test list-group-item list-group-item-action active mt-5">Gestion du Profile</a>
              <a href="#" class="test list-group-item list-group-item-action">Mes Commandes</a>
             
              
              
            </div> 
		</div>
		
		
		<div class="col-md-9 mt-5">
		    <div class="card">
		        <div class="card-body fond">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4 class="titre1">Vos dernières commandes</h4>
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
  	                $id_Client = $_SESSION['id_Client']; 
  	                echo"<div class='div-titre p-5'>";
                    echo "<h2 class='titre2'>Voici l'historique de vos 5 dernières commandes</h2>";
                    echo "</div>";
                    echo "<div class='p-5'>";
                    echo "<table class='table table-bordered table-striped table-sm  '>";
                    echo "<thead class='tete'>";
                    echo   "<tr>";
                    echo     "<th> ID Commande</th>";
                    echo    " <th>dateCommande</th>";
                    echo   " <th>hebdomadaire</th>";
                    echo   " <th>dateLivraison</th>";
                    echo   " <th>typeLivraison</th>";
                    echo   " <th>typePaiement</th>";
                    echo  "</tr>";
                    echo" </thead>";
	    $sql = "SELECT id_Commande,dateCommande,hebdomadaire,dateLivraison,typeLivraison,typePaiement FROM commande WHERE id_Client ='$id_Client' ORDER BY id_Commande DESC LIMIT 6";
        $result = mysqli_query($co, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $id_commande=$row['id_Commande'];
            $dateCommande=$row['dateCommande'];
            $hebdomadaire=$row['hebdomadaire'];
            $dateLivraison=$row['dateLivraison'];
            $typeLivraison=$row['typeLivraison'];
            $typePaiement=$row['typePaiement'];
                                  echo '<tr><td>'.$id_commande.'</td><td>'.$dateCommande.'</td><td>'.$hebdomadaire.'</td><td>'.$dateLivraison.'</td><td>'.$typeLivraison.'</td><td>'.$typePaiement.'</td></tr>';
                            }
                            ?>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
 
                           
</body>
</html>
