<?php
session_start();
require_once "../dbBrocker.php";
require_once "../php klase/korisnik.php";
require_once "prijaviKorisnika.php";
require_once "ubaciKorisnika.php";
if($korisnik1==null&&$korisnik2==null){
    alert("Desila se greska prilikom prijavljivanja ili registrovanja");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super prodavnica</title>
</head>
<body>
    <nav>
        <button>Pocetna</button>
        <button>Korpa</button>
        <button>Proizvodi</button>
        <button>O kompaniji</button>
        <button>kontakt</button>
    </nav>
    
    <h1><?php echo "$korisnik1->ime, $korisnik1->prezime,$korisnik1->email,$korisnik1->sifra"; ?></h1>
</body>
</html>