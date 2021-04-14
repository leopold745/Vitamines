<?php
Class Client{
private $co;
private $id_Panier;
private $id_Client;
private $pseudo;
private $mdp;
private $email;
private $prenom;
private $nom;
private $adresse;
private $codePostale;
private $tel;
private $localisation;

public function __construct(){

$ctp = func_num_args();
$args =func_get_args();



	switch ($ctp){
	case 3 :
	    $co = $args[0];
		$pseudo = $args[1];
		$mdp = $args[2];
		

		$result = mysqli_query($co, "SELECT id_Client, email FROM Client WHERE pseudo = '$pseudo' AND mdp ='$mdp'") or die("erreur requete");

	while($row =mysqli_fetch_assoc($result))
	{
 		$this->co = $co;
 		$this->pseudo = $pseudo;
 		$this->mdp = $mdp;
 		$this->id_Client = $row["id_Client"];
 		$this->email = $row["email"];
 		$this->prenom = $row["prenom"];
 		$this->nom = $row["nom"];
 		$this->adresse = $row["adresse"];
 		$this->codePostale = $row["codePostale"];
 		$this->tel = $row["telephone"];
 		$this->localisation = $row["localite"];
	}
		break;

	case 10 :

		$co = $args[0];
		$pseudo = $args[1];
		$mdp = $args[2];
		$email =$args[3];
		$prenom = $args[4];
		$nom = $args[5];
		$adresse = $args[6];
		$codePostale = $args[7];
		$tel = $args[8];
		$localisation = $args[9];

		mysqli_query($co, "INSERT INTO Client(pseudo,mdp,email,prenom,nom,adresse,codePostale,telephone,localite) VALUES ('$pseudo','$mdp','$email','$prenom','$nom','$adresse','$codePostale','$tel','$localisation')") or die("erreur insertion");
 	 	$this->id_Client = mysqli_insert_id($co);
 		 $this->pseudo = $pseudo;
  		$this->mdp = $mdp;
  		$this->email = $email;
 		 $this->co = $co;
 		 $this->prenom = $prenom;
 		$this->nom = $nom;
 		$this->adresse = $adresse;
 		$this->codePostale = $codePostale;
 		$this->tel = $tel;
 		$this->localisation = $localisation;
  		break;
	}
}





public function connexion(){
session_start();
$id_Client=$this->id_Client;
$_SESSION['id_Client'] = $id_Client;
mysqli_query($this->co, "INSERT INTO panier(description) VALUES('personnel')") or die("erreur creation nouveau panier");
		$_SESSION['id_Panier'] = mysqli_insert_id($this->co);
		$_SESSION['id_Panier_Saison']=1;
    }

public function deconnexion(){
session_destroy();
mysqli_close($this->co);
}
}
?>
