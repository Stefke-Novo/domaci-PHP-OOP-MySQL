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
    <link rel="stylesheet" type="text/css" href="../css/home1.css">
</head>
<body>
    <nav id="menu">
       <div id="opcije">
            <button id="pocetna">Pocetna</button>
            <button id="korpa">Korpa</button>
            <button id="proizvodi">Proizvodi</button>
            <button id="kompanija">O kompaniji</button>
            <button id="kontakt">kontakt</button>
       </div>
       <div id="okvirSlika" >
           <img id="slika"src="https://cdn.onlinewebfonts.com/svg/img_155117.png" onclick="prikaziKorisnickePodatke()"/>
           <div id="korisnickiPodaci">
               <h3>Podaci o korisniku</h3>
               <ul>
                   <li>Ime : <?php echo $_SESSION['korisnik']->ime;?></li>
                   <li>Prezime : <?php echo $_SESSION['korisnik']->prezime;?></li>
                   <li>e-mail : <?php echo $_SESSION['korisnik']->email;?></li>
               </ul>
           </div>
       </div>
    </nav>
    <div id="Opis">
        <h1>Super kupovina , sve za vas</h1>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="../js/home.js"></script>
</html>