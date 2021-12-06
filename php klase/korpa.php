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
    public static function nadjiImeKorpe($conn,$korisnikID,$datum){
        $q="SELECT imeKorpe from korpa where korisnikID=$korisnikID and datum=$datum;";
        return $conn->query($q);
    }
    public static function upisiProizvod($conn,$korisnikID,$imeKorpe,$proizvodID,$kolicina){
        $q="INSERT INTO korpaproizvoda(korisnikID,imeKorpe,proizvodID,kolicina) values('$korisnikID','$imeKorpe','$proizvodID','$kolicina');";
        return $conn->query($q);
    }
    public static function nadjiProizvod($conn,$proizvodID){
        $q="SELECT * FROM proizvod where proizvodID='$proizvodID';";
        return $conn->query($q);
    }
    public static function pronadjiIDProizvoda($conn,$korisnikID,$imeKorpe){
        $q="SELECT proizvodID FROM korpaproizvoda where korisnikID='$korisnikID' and imeKorpe='$imeKorpe';";
        return $conn->query($q);
    }
    public static function potraziKolicine($conn,$korisnikID,$imeKorpe,$proizvodID){
        $q="SELECT kolicina FROM korpaproizvoda where korisnikID='$korisnikID'and imeKorpe='$imeKorpe'and proizvodID='$proizvodID';";
        return $conn->query($q);
    }
    public static function promeniKolicinu($conn,$korisnikID,$imeKorpe,$IDproizoda,$kolicinaProizvoda){
        $q="UPDATE korpaproizvoda set kolicina='$kolicinaProizvoda' where korisnikID='$korisnikID' and imeKorpe='$imeKorpe' and proizvodID='$IDproizoda';";
        return $conn->query($q);
    }
    public static function obrisiProizvod($conn,$korisnikID,$imeKorpe,$IDproizvoda){
        $q="DELETE FROM korpaproizvoda WHERE korisnikID='$korisnikID' and imeKorpe='$imeKorpe' and proizvodID='$IDproizvoda';";
        return $conn->query($q);
    }
}
?>