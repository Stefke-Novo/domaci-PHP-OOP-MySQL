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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/home1.css">
</head>
<body>
    <nav id="menu">
       <div id="opcije">
            <button id="pocetna" onclick="togglediv('stranicaPocetna')">Pocetna</button>
            <button id="korpa" onclick="togglediv('stranicaKorpa')">Korpa</button>
            <button id="proizvodi" onclick="togglediv('stranicaProizvodi')">Proizvodi</button>
            <button id="kompanija" onclick="togglediv('stranicaKompanija')">O kompaniji</button>
            <button id="kontakt" onclick="togglediv('stranicaKontakt')">kontakt</button>
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
    <div class="polja"id="stranicaPocetna">
        <h1 class="naslov">Super kupovina , sve za vas</h1>
        <div class="opis">
            <img class="slika1" data-aos="fade-right"  src="https://images.unsplash.com/photo-1585759071429-1646f76ab8c7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
            <div>
                <h1 id="pasus1" data-aos="zoom-in">Uvek tu za Vas</h1>
            </div>
        </div>
        <div class="opis">
            <div>
                <h1 id="pasus2" data-aos="zoom-in">Vaše zadovoljstvo je naš uspeh</h1>
            </div>
            <img data-aos="fade-left" class="slika1" src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="">
        </div>
        <div class="opis">
            <img class="slika1" data-aos="fade-right" src="https://images.unsplash.com/photo-1583903540958-625cd1b6f63a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
            <div>
                <h1 id="pasus3" data-aos="zoom-in" >Vaše zdravlje je naš prioritet</h1>
            </div>
        </div>
        <div class="opis">
            <div>
                <h1 id="pasus4" data-aos="zoom-in">Vaša želja je naš cilj</h1>
            </div>
            <img class="slika1" data-aos="fade-left" src="https://images.unsplash.com/photo-1530047139082-5435ca3c4614?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
    </div>
    <div class="polja"id="stranicaKorpa">
        <h1 class="naslov">Korpa</h1>
        <div id="korpa1" >
            <h2>Današnja kupovina :</h2>
            <ul>
                <li class="proizvod">
                    <h3>Naziv proizvoda</h3>
                    <div class="podaci">
                        <img src="https://images.unsplash.com/photo-1582515073490-39981397c445?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80" alt="">
                        <div class="teze">
                            <p>Vrsta proizvoda: 250 din</p>
                            <p>Cena proizvoda bez popusta: 250 din</p>
                            <p>Sniženje : 250 din</p>
                            <p>Cena proizvoda sa popustom: 250 din</p>
                        </div>
                        <div class="opisIDugme">
                            <p>Lorem ipsum dolor sit amet consectetur 
                            adipisicing elit. Voluptatibus vitae id 
                            recusandae officia repellendus rem, aliquid 
                            nulla perferendis quo iure similique deserunt 
                            eum iste obcaecati dolorem dolorum, iusto 
                            maxime magni.</p>
                            <button>Izbaci proizvod iz liste</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="polja"id="stranicaProizvodi">
        <h1 class="naslov">Proizvodi</h1>
    </div>
    <div class="polja"id="stranicaKompanija">
        <h1 class="naslov">Kompanija</h1>
    </div>
    <div class="polja"id="stranicaKontakt">
        <h1 class="naslov">Kontakt</h1>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="../js/home.js"></script>
</html>