<?php
require_once "../dbBrocker.php";
require_once "../php klase/korpa.php";
require_once "../php klase/proizvod.php";
session_start();
if(isset($_POST["korisnikID"])&&isset($_POST["imeKorpe"])){
    $_SESSION["proizvodi"]=array();
    $korisnickiID=$_POST["korisnikID"];
    $imeKorpe=$_POST["imeKorpe"];
    $odgovor=Korpa::pronadjiIDProizvoda($conn,$korisnickiID,$imeKorpe);
    if(!$odgovor){
        echo "Niz ID proizvoda nije lepo vracen";
    }
    $nizIDProizvoda=array();
    while($IDodeljak=mysqli_fetch_row($odgovor)){
        array_push($nizIDProizvoda,$IDodeljak[0]);
    }
    $nizProizvoda=array();
    if(!$nizIDProizvoda){
        echo "Nije lepo vracen niz IDproizvoda";
        die();
    }
    for($i=0;$i<count($nizIDProizvoda);$i++){
        $broj=$nizIDProizvoda[$i];
        $Pro=Korpa::nadjiProizvod($conn,$broj);
        if($Pro==false){
            echo "Proizvod nije nadjen";
            die();
        }
        array_push($nizProizvoda,$Pro->fetch_object(Proizvod::class));
    }
    if(count($nizProizvoda)>0){
        $_SESSION["proizvodi"]=$nizProizvoda;
        echo "vracena je lista";
    }else{
        echo "Nije lepo vracen niz";
    }
}
?>