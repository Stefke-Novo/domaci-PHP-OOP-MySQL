<?php
require_once "../dbBrocker.php";
require_once "../php klase/korisnik.php";
$korisnik=new Korisnik();
session_start();
if($_SESSION['korisnik']==null){
    echo "Korisnik nije lepo prijavljen";
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
    
    <h1><?php echo $_SESSION['korisnik']->ime;
              echo "\n";
              echo $_SESSION['korisnik']->prezime;
              echo "\n";
              echo $_SESSION['korisnik']->email;
              echo "\n";
              echo $_SESSION['korisnik']->sifra;?></h1>
</body>
</html>