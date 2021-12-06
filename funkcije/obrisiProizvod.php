<?php
require_once "../dbBrocker.php";
require_once "../php klase/korpa.php";

if(isset($_POST["korisnikID1"])&&isset($_POST["imeKorpe1"])&&isset($_POST["proizvodID1"])){
    $korisnickiID=$_POST["korisnikID1"];
    $imeKorpe=$_POST["imeKorpe1"];
    $IDproizvoda=$_POST["proizvodID1"];
    $rezultat=Korpa::obrisiProizvod($conn,$korisnickiID,$imeKorpe,$IDproizvoda);
    if($rezultat==false){
        echo "nije obrisan proizvod";
    }else{
        echo "uspesno je obrisan proizvod";
    }
}
?>