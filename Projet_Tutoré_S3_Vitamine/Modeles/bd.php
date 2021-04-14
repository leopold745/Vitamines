<?php
class Bd {

  private $co;
  private $host;
  private $user;
  private $bdd;
  private $passwd;

public function __construct($bdd) {
       $this->bdd = $bdd;
       $this->host= "localhost:8889"; // ou 127.0.0.1
       $this->user = "root";
       $this->passwd = "root";

//

}

public function connexion() {

$this->co = mysqli_connect($this->host , $this->user , $this->passwd, $this->bdd) or
die("erreur de connexion");
return $this->co;

   }

public function deconnexion() {

         mysqli_close($this->co);

   }

    }
?>
