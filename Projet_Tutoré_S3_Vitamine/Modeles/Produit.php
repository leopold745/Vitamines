<?php
class Produit 
{
private $co;
private $id_Produit;
private $nom_Produit;
private $prix_unitaire;
private $id_ProduitSub;
private $id_Categorie;

	public function __construct( $co, $nom_Produit,$prix_unitaire,$nom_ProduitSub){
	$this->co = $co;
	$this->id_Produit = mysqli_insert_id($co);
	$this->nom_Produit= $nom_Produit;
	$this->prix_unitaire = $prix_unitaire;
	$result = mysqli_query($co, "SELECT id_Categorie FROM Produit WHERE nom_Produit= '$nom_Produit'") or die("erreur requete construct Produit");
 while($row =mysqli_fetch_assoc($result))
	{
 	$this->id_Categorie = $row["id_Categorie"];
	}
	$result2 = mysqli_query($co, "SELECT id_Produit FROM Produit WHERE nom_Produit= '$nom_Produit'") or die("erreur requete construct Produit");
 while($row =mysqli_fetch_assoc($result2))
	{
 	$this->id_ProduitSub = $row["id_Produit"];
	}
	}
	
	public function ajouter_Produit(){
	mysqli_query($co, "INSERT INTO Produit (nom_Produit,prix_unitaire,id_ProduitSub,id_Categorie) VALUES ('$this-> nom_Produit','$this->prix_unitaire','$this->id_ProduitSub','$this->id_Categorie')") or die("erreur insertion Produit");
	}

	public function get_id_Produit($nom_Produit){
	$result = mysqli_query($co, "SELECT id_Produit FROM Produit WHERE nom_Produit= '$nom_Produit'") or die("erreur requete get_id_Produit");
 while($row =mysqli_fetch_assoc($result))
	{
 	$this->id_Produit = $row["id_Produit"];
	}
 return $id_Produit;
	}
	
	public function get_nom_Produit($nom_Produit,){
	$result = mysqli_query($co, "SELECT id_Produit FROM Produit WHERE nom_Produit= '$nom_Produit'") or die("erreur requete get_nom_Produit");
 while($row =mysqli_fetch_assoc($result))
	{
 	$this->nom_Produit = $row["nom_Produit"];
	}
 return $nom_Produit;
	}
	
	public function get_prix_unitaire($nom_Produit){
	$result = mysqli_query($co, "SELECT prix_unitaire FROM Produit WHERE nom_Produit= '$nom_Produit'") or die("erreur requete get_prix_unitaire");
 while($row =mysqli_fetch_assoc($result))
	{
 	$this->prix_unitaire = $row["prix_unitaire"];
	}
 return $prix_unitaire;
	}
}
