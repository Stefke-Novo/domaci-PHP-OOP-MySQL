<?php
require_once "../dbBrocker.php";
require_once "../php klase/korpa.php";
require_once "prijaviKorisnika.php";
require_once "ubaciKorisnika.php";
if(isset($_POST["emailKorisnika"])&&isset($_POST["imeKorpe1"])){
    $email=$_POST["emailKorisnika"];
    $imeKorpe=$_POST["imeKorpe1"];
    $korisnickiID=Korpa::nadjiIDKorisnika($conn,$email);
    if($korisnickiID==false)
    echo "Desila se neka greska";
    else{
        $odgovor=mysqli_fetch_row($korisnickiID);
        $_SESSION["id"]=$odgovor;
        $odgovor1=Korpa::unesiKorpu($conn,$odgovor[0],$imeKorpe,date('d.m.Y'));
        if($odgovor1==true)
        echo "korpa je uspesno sacuvana";
        else echo "transakcija nije uspesna";
    }
}else{
    echo "Desila se greska";
}
?>