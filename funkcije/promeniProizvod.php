<?php
require_once "../dbBrocker.php";
require_once "../php klase/korpa.php";

if(isset($_POST["korisnikID1"])&&isset($_POST["imeKorpe1"])&&isset($_POST["proizvodID1"])&&isset($_POST["kolicina1"])){
    $korisnickiID=$_POST["korisnikID1"];
    $imeKorpe=$_POST["imeKorpe1"];
    $IDproizvoda=$_POST["proizvodID1"];
    $kolicinaProizvoda=$_POST["kolicina1"];
    $rezultat=Korpa::promeniKolicinu($conn,$korisnickiID,$imeKorpe,$IDproizvoda,$kolicinaProizvoda);
    if($rezultat==false){
        echo "Nije promenjena kolicina proizvoda";
    }else{
        echo "uspesno je promenjena kolicina proizvoda";
    }
}
?>