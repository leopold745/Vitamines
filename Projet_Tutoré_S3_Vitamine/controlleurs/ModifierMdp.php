<?php
  require_once("../Modeles/bd.php");

  //Créer une BD
  $bd = new Bd("projet_tutore");
  $co = $bd->connexion();

  //récupérer info membre
  session_start();
  $idClient = $_SESSION['id_Client'];

  //vérifier ancien mot de passe
  $mdp = $_POST['mdp'];
  $result = mysqli_query($co, "SELECT * FROM client WHERE id_Client='$idClient' AND mdp='$mdp'") or die("erreur select mdp");
  if(mysqli_num_rows($result) == 1)
  {
    //récupérer le nouveau mot de passe
    $nouvMdp = $_POST['nouvMdp'];

    //mettre a jour le nouveau mot de passe
    mysqli_query($co, "UPDATE client SET mdp = '$nouvMdp' WHERE id_Client = '$idClient'") or die("erreur lors de la mise a jour du mot de passe");
  }
  else
  {
    alert("Mot de passe incorrect");
  }
  header('Location: ../Vue/Profile/Profile.php');
?>
