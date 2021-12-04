<?php
require "../dbBrocker.php";
class Korpa{
    public $proiazvodi=array(Proiazvod::class);
    public static function pretraziKorpu($conn,$naziv){
        $q="SELECT * FROM korpaproizvoda where imeKorpe=$naziv";
        return $conn->query($q);
    }
    public static function unesiKorpu($conn, $korisnikID,$naziv,$datum){
        $q="INSERT INTO korpa(korisnikID,imeKorpe,datum) values('$korisnikID','$naziv','$datum');";
        return $conn->query($q);
    }
    public static function nadjiIDKorisnika($conn,$email){
        $query="SELECT * FROM korisnik WHERE email='$email';";
        return $conn->query($query);
    }
}
?>