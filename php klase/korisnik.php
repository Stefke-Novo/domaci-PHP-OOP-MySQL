<?php
require_once "..\dbBrocker.php";
class Korisnik{
    public $ime;
    public $prezime;
    public $email;
    public $sifra;
    public function __costruct($imeu=null,$prezimeu=null,$emailu=null,$sifrau=null){
        $this->ime=$imeu;
        $this->prezime=$prezimeu;
        $this->email=$emailu;
        $this->sifra=$sifrau;
    }
    public function unesiKorisnika($conn){
        $q="INSERT INTO korisnik(ime,prezime,email,sifra) values('$this->ime','$this->prezime','$this->email','$this->sifra')";
        return $conn->query($q);
    }
    public function potraziKorisnika($conn){
        $q="SELECT * FROM korisnik where email='$this->email' and sifra='$this->sifra'";
        return $conn->query($q);
    }
}
?>