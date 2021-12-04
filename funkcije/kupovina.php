<?php
require_once "../dbBrocker.php";
require_once "../php klase/korpa.php";
if(isset($_POST["email21"])&&isset($_POST["IDproizvoda"])&&isset($_POST["imeKorpe31"])&&isset($_POST["kolicina"])){
    $email=$_POST["email21"];
    $kolicinaRobe=floatval($_POST["kolicina"]);
    $IDProizvoda=$_POST["IDproizvoda"];
    $imeKorpe=$_POST["imeKorpe31"];
    $korisnickiID=Korpa::nadjiIDKorisnika($conn,$email);
    if($korisnickiID==false){
    echo "KorsnickiID nije ucitan";
    die();
    }
    $odgovor=mysqli_fetch_row($korisnickiID);
    $odgovor2=Korpa::upisiProizvod($conn,$odgovor[0],$imeKorpe,$IDProizvoda,$kolicinaRobe);
    if($odgovor2){
        echo "uspesno ste kupili proizvod";
    }else{
        echo "Greska prilikom izvrsavanja kupovine";
    }
}else{
    echo "Desila se greska";
}
?>