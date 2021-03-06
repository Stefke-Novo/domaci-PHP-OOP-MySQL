<?php
require_once "../dbBrocker.php";
require_once "../php klase/korisnik.php";
require_once "../php klase/proizvod.php";
$korisnik=new Korisnik();
session_start();
if($_SESSION['korisnik']==null){
    echo "Korisnik nije lepo prijavljen";
    $_SESSION["proizvodi"]=null;
    die();
}
$proizvodi = Proizvod::pokupiProizvode($conn);
if($proizvodi->num_rows==0){
    echo "Nema proizvoda";
    die();
}else{
    $stvari=null;
    if(!isset($_SESSION["imeKorpe"])){
        $_SESSION["imeKorpe"]=null;
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
           <img id="slika"src="https://cdn-icons-png.flaticon.com/512/149/149071.png" onclick="prikaziKorisnickePodatke()"/>
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
                <h1 id="pasus2" data-aos="zoom-in">Va??e zadovoljstvo je na?? uspeh</h1>
            </div>
            <img data-aos="fade-left" class="slika1" src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="">
        </div>
        <div class="opis">
            <img class="slika1" data-aos="fade-right" src="https://images.unsplash.com/photo-1583903540958-625cd1b6f63a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
            <div>
                <h1 id="pasus3" data-aos="zoom-in" >Va??e zdravlje je na?? prioritet</h1>
            </div>
        </div>
        <div class="opis">
            <div>
                <h1 id="pasus4" data-aos="zoom-in">Va??a ??elja je na?? cilj</h1>
            </div>
            <img class="slika1" data-aos="fade-left" src="https://images.unsplash.com/photo-1530047139082-5435ca3c4614?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
    </div>
    <div class="polja"id="stranicaKorpa">
        <h1 class="naslov">Korpa</h1>
        <div id="korpaDiv"><button id="dugmeKorpa">Ponesite korpu</button></div>
        <form id="imeKorpeForma">
            <h1>Korisnicki e-mail:</h1>
            <input id="korisnikovEmail"type="text" name="emailKorisnika" value="<?php echo $_SESSION['korisnik']->email; ?>" disabled/>
            <h1 for="imeKorpe1">Unesite ime korpe:</h1>
            <input type="text" id="imeKorpe"name="imeKorpe1">
            <div>
                <button id="dugmeImeKorpe" onclick="promeniKolicinu()">Unesi</button>
                <button id="NazadKorpa" onclick="KlikniNazad()">Nazad</button>
            </div>
        </form>
        <form id="izmenaProizvoda123">
            <label for="">ID korisnika: </label>
            <input type="text" id="IDkorisnikaP" name="korisnikID1" disabled/>
            <label for="">Ime korpe :</label>
            <input type="text" id="imeKorpeP" name="imeKorpe1" disabled/>
            <label for="">ID proizvoda :</label>
            <input type="text" id="IDproizvodaP" name="proizvodID1" disabled/>
            <label for="">Kolicina :</label>
            <input type="number" id="kolicinaP" name="kolicina1"/>
            <button id="udji">Izmeni</button>
            <button id="izadji" onclick="izadji12()">Iza??i</button>
        </form>
        <form id="izmenaProizvoda1234">
            <h1>Da li zelite da obrisete proizvod ?</h1>
            <label for="">ID korisnika: </label>
            <input type="text" id="IDkorisnikaP1" name="korisnikID1" disabled/>
            <label for="">Ime korpe :</label>
            <input type="text" id="imeKorpeP1" name="imeKorpe1" disabled/>
            <label for="">ID proizvoda :</label>
            <input type="text" id="IDproizvodaP1" name="proizvodID1" disabled/>
            <button id="obrisi">Obri??i</button>
            <button id="izadji" onclick="izadji123()">Iza??i</button>
        </form>
        <div id="korpa1" >
            <div>
                <h2>Dana??nja kupovina :</h2>
                <?php $korisnickiID=$_SESSION["korisnik"]->korisnikID; $imeKorpe1=$_SESSION["imeKorpe"];?>
                <button id="ucitavanje" onclick="ucitajProizvode('<?php echo $korisnickiID ;?> ','<?php echo $imeKorpe1; ?>')">Prika??i sadr??aj korpe</button>
            </div>
            <?php if(!empty($_SESSION["proizvodi"])&&!empty($_SESSION["kolicine"])){ $ukupnaCena=0;?>
            <ul>
                <?php for($i=0;$i<count($_SESSION["proizvodi"]);$i++):  ?>
                <li class="proizvod" data-aos="fade-in">
                    <h3></h3>
                    <div class="podaci">
                        <img src="<?php echo $_SESSION["proizvodi"][$i]->slika; ?>" alt="">
                        <div class="teze">
                            <p>Ime proizvoda:<br><?php echo $_SESSION["proizvodi"][$i]->ime; ?></p>
                            <p>Koli??ina:<br> <?php echo $_SESSION["kolicine"][$i];?> <?php echo $_SESSION["proizvodi"][$i]->merna_jeidnica;?></p>
                            <p>Cena proizvoda sa popustom:<br><?php echo $_SESSION["proizvodi"][$i]->popust ?> din / <?php echo $_SESSION["proizvodi"][$i]->merna_jeidnica;?></p>
                        </div>
                        <div class="opisIDugme">
                            <p><?php echo $_SESSION["proizvodi"][$i]->opis ?></p>
                            <div>
                                <?php $sifraproizvoda=$_SESSION["proizvodi"][$i]->proizvodID;$kolicinaProizvoda=$_SESSION["kolicine"][$i];$imeKorpePromena=$_SESSION["imeKorpe"];$korisnickiIDPromena=$_SESSION["korisnik"]->korisnikID; ?>
                                <button onclick="obrisiProizvod('<?php echo $korisnickiID;?>','<?php echo $imeKorpePromena;?>','<?php echo $sifraproizvoda;?>')">Izbaci proizvod iz liste</button>
                                <button onclick="izmeniProizvodUListi('<?php echo $korisnickiID;?>','<?php echo $imeKorpePromena;?>','<?php echo $sifraproizvoda;?>','<?php echo $kolicinaProizvoda;?>')">Izmeni koli??inu</button>
                            </div>
                        </div>
                    </div>
                </li>
                <?php $ukupnaCena+=($_SESSION["proizvodi"][$i]->popust)*($_SESSION["kolicine"][$i]);?>
                <?php endfor;?>
            </ul>
            <h1>Ukupna cena: <?php echo $ukupnaCena?> din</h1>
            <?php }else{?>
                <img id="nemaNista" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_FUr7KRRq9Eu8_QwritHxuCMcWQGU3KjCvQ&usqp=CAU" alt="">
                <h1 id="naslovNista">Trenutno ni jedan proizvod nije kupljen</h1>
                <?php }?>
        </div>
    </div>
    <div class="polja"id="stranicaProizvodi">
        <h1 class="naslov">Proizvodi</h1>
        <form id="formaKolicina">
            <?php if(!empty($_SESSION["imeKorpe"])){ ?>
            <h1 id="korisnickiEmail2">Korisnicki e-mail:</h1>
            <input type="text" name="email21" id="email22" value="<?php echo $_SESSION['korisnik']->email; ?>" style="text-align:center;" disabled />
            <h1 >ID proizvoda :</h1>
            <input type="text" name="IDproizvoda" id="IDProizvoda1" disabled/>
            <h1 >Ime korpe :</h1>
            <input  type="text" name="imeKorpe31" id="ImeKorpe32" disabled/>
            <h1  for="kolicina">Koliko kg zelite da kupite ?</h1>
            <input type="number"  id="kolicinaRobe" type="text" name="kolicina"/>
            <button  id="potvrdi" >Potvrdi</button>
            <?php }else{?>
                <h1  id="korpaNijePoneta">Niste poneli korpu</h1>
                <?php } ?>
            <button id="nazad" onclick="Nazad()">nazad</button>
        </form>
        <?php 
        $i=0;
        while($proizvod = $proizvodi->fetch_array()):?>
        <?php if($i%3==0){?>
        <div class="red">
            <?php } ?>
            <div class="proizvod1">
                <img  src="<?php echo $proizvod["slika"]?>" alt=""></img>
                <div class="podaci1">
                    <h1><?php echo $proizvod["ime"]?></h1>
                    <p><?php echo $proizvod["opis"]?></p>
                    <h3><?php echo $proizvod["cena"]?> din / <?php echo $proizvod["merna_jeidnica"];?></h3>
                    <?php $sifraproiazvoda=$proizvod["proizvodID"];$imeKorpe=$_SESSION["imeKorpe"];?>
                    <button onclick="pozvanaJeForma('<?php echo $sifraproiazvoda;?>','<?php echo $imeKorpe; ?>')" >Kupi</button>
                </div>
            </div>
        <?php if($i%3==2){?>
        </div>
        <?php } ?>
        <?php $i++;?>
        <?php endwhile;?>
        <?php if(!($i%3==0)){?>
        </div>
        <?php } ?>
    </div>
    <div class="polja"id="stranicaKompanija">
        <h1 class="naslov">Kompanija</h1>
        <div>
            <div id="opisKompanije">
                <h1>Uvek smo tu za vas</h1>
                <div>
                    <img id="slika11"src="https://images.unsplash.com/photo-1603226301024-e8461eb82e35?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=627&q=80" alt="">
                    <p id="nekiPasus"><b>Misija :</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
                        <b>Kvalitet :</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
                        <b>Sre??a :</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
                        <b>Poverenje:</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="polja"id="stranicaKontakt">
        <h1 class="naslov">Kontakt</h1>
        <div id="kompanijaInfo">
            <div id="telefon">
                <img src="https://images.unsplash.com/photo-1516055619834-586f8c75d1de?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt=""/>
                <div>
                    <h1>Fiksni: (+381)11 111 2233</h1>
                    <h1>Viber: 065 123 4567</h1>
                    <h1>WhatsApp: 065 123 4567</h1>
                    <h1>Faks: 011 304 4567</h1>
                    <h1>e-mail: superkupovina@gmail.com</h1>
                </div>
            </div>
            <div id="lokacija">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxASEBAQEBAQEBAPEA8QEBAQDw8QDw8QFREWFhURFRUYHSggGBolGxUVITEhJSkrLi4uFx80OTQtOCgtLisBCgoKDg0OGhAQGi0dHR8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0rLS0tLS0tLS0tLv/AABEIALoBDwMBIgACEQEDEQH/xAAbAAACAgMBAAAAAAAAAAAAAAACAwEEAAUGB//EAD8QAAIBAgQCCAQEBQIFBQAAAAECAAMRBBIhMUFRBRMiMmFxgZEGUqHBI0Kx0RRicoKSM7KiwuHw8QdTY3PS/8QAGgEAAwEBAQEAAAAAAAAAAAAAAAECAwQGBf/EAC0RAAICAQIDBwQDAQEAAAAAAAABAhEDEiExQVEEYXGRobHwBRMigTLR4ULx/9oADAMBAAIRAxEAPwD3GZMmQAyZMkQAmReZeLcyW6AF3ii8xjFmYOW5pRJqQDVkmLIkagJNWQa0AxZjtjoYa8g14oyDC2Aw15HXRREiUmxPYb1sFq0VmgO0vgjFSk2MOIgnERBgmZ6mbUWP4iT18qQonJgONeR18rNvIMtS2EWjXgnESo0EmLUx0XDiIJxEokyDHrCi4cRBOIlImBeLWwSL5xEgV5Q1hCPUx0XjXgivKLtIWJ5KFR6JMvBvMvOgigryLwbybwHRhMS5hMYozKbsaQJgGGYBmJQJMEmEYitVC2udzYDix5AQ0hQZMAiOTCuwvot+c5X4n6Pxi3cOcg4ppbzvtG4NKzbFiWSWnUkzoGgkzzCn8TVqDW64vbdT2wfOdF0X8cUHsKwam3zZSyH21EjXHqdOX6b2iG6jqXd/R1ZMEmKoYhKih6bK6nZlIYfSHaUcBhEAiE0G8ap8ABMAxhEEiOhAGYJJExZMgFkSGMmo0WTGuAwTIkwYACRItGDWY0KAURBMJjFwANVMxgeUtYcCOqUxacsu1aZVRDnuaoLGhRMqiLDGdWJp7yDIm1sd/eZeBeZedIBXgkzLyIpOgBJgGGYBmJQLGLJhtAJgBT6U6QShSerUNlUbDdidlHiTOa6M6buxxFUZqjaU0/JST7n/AMnkNB8b9LnEYwYZD+DhT+JbZqv5j6d30bnKYxeuUbDeYyyU6R97sP09Sxfcnz4fPnQ9Lq/FlFKRqPuBoBxP2nlXxZ8X4jFuVVitIHYaDztKvSnSRqdgaC/qbSgKN9BInnlPbkfS7P8ATMXZ/wAkvyfp4A4Vqa9+7HkNvebnD4pAOzSS3uZpU6IrOboFtzOx8paTBVaOri6ncjUCJxpXEePtN5NGRev+m8wmMytnosab8QD2W8CNj6ztegOmBiFIYBaid8cCPmXw/SebLUG4Mt9G9JGlWp1gdAbOOanRh7foJnCbsf1L6fHNjtfyXB8/DvXty6HqLmBIFQGxGx1HiJBM6lseNJvCMFYWkpSCgHgARjrBMUnaDnQlli2W0sWECot4oyjp7xXLV3FcyDCZZgQx2WyEECoZZAgGnLokrSMscy2kC0huhkJcTKlUwXqRRaRoT3Y6GprCVYtKkNams2RJ2t5l4F5k3JCBkmYomGZSe4wCYBMNoBk2CIJlLpPFdVRq1bXNOm7gc2A0HqbS2ZovjCpbCOPmamP+MH7RGmOOqaXVnlGEplOtZ2zOzEu3zHcn3MrVa5AOu+pl7GocpI4gmaau97CcTu2z3SaUYror89xtE8ZsejqOc690HtfzH5fLn7c5rAdNOGg8Tw+s6To6hlRRyHv4zSELPn9t7Y8UduLNhQE2FOhmBBFxsdJUw6zb4aoMuWdcUjzGTLKT3OC+IMCaFU5e6wuPv9JTwdTUg8Z0nxuB+FzOb7Tl8NvOOa0zaPW9nyvJ2fHkfFrf9Nr1o9b+G3z4WgTv1Sj/AB7P2mxq05rPhlSMJQ55L+7E/ebHrLzsTWmmjxmaDWZtPa37gvpAQ6wnBMhBaSMYJDC8HMJmeXe1EaFq1EWk85AMhVmORKi0JJ1mNVAjervFPhja8T0xSTFYPWx2cWilpaRrUriV9uwEO4MU5kVKdjIyyVjKsErIyQ9IBeVpfUVg9XCVLGQKkxqkaT6ib5Ha3hoIoR6iwm8mIkwDJMAmZjJMU0KQZLVgAZofjNb4RvB6Z/4rfeb92ms6fpZ8NXXjkLDzXtD9IqZeJ1OLfVe6PJqx7Ppb6zTOut5u8QLFlPMkeovNSaes5ZNI9nijKVPuRCL3f6l/WdZhl0HlOfFG40m46KxQZbcRoR4zTDJUfK+sYZRcXy4eRtqSy/QEoUmiOkemFpqQhDVCLc8vif2m8pqKtnx8PZ8meax41bfy30Rzvxz0hnrrTXakoX+/dv8AlmtwotryBMZicJpnOpuSSdyTqSZa6Aw3W16NO189Smp/pvdvoDOPVqtnq54l2XGocor587z1zo7DdXh6KH8lGmp8wovGKsPEGJp31nVj/ijxl3uzKpldlMYXJ0txhORcCONu7EV8hgkGW0G8Qt7ytIWIuZZJsIDL2oNZrkCZyX5JAMOIttIq1zllWoLRrnsD0l7PiAs1TJSqTEExuGOsLCiWpnnEVARLuYW9ZVxe8bGiuZBhKJlVbRU6sNSuuYExpkmCFLid1RXjGmZaQZbJBMAwyYsmSURMZ4JaLYxgSwgEDjMJgsIJN8BOSWzfE8r+IsCadQgbKzIfTY+osZz2uYgz0r4twIPbt3wL/wBSj7r/ALZwPSGHykMNtjOLJs6PX9gm8mOOReD8V/ZlFtIx8AXIejU6t+J0sfAiIpmEG5G0yjLSz6uXGskafqRXwmOGjVbr/LoLeYi6dIiwP0lhqjHck+sGmNY5zUicGD7W0aXgKx7WUL8xnQf+nOCzYpqp7tCkSP637I+mec3jBmb+nQfeekfAeB6vBGpbtV2Lf2AZV/Qn+6H/ADS57HyvrOVxg112+epv640GsWgspN5ldiLADhMqEhRpvPopI8luDTXx2gmoL3kUV1J4QMgvvpDgLdlkWsTziAQAGjM65D4aSuXUgDkYNlIelIFifCVSVzesuvUy7DfSVqigN3eRmUd5N/oYnFd70kP3BG4p1zbcJPUl6YyjjKk1G22K9ikZNFrHWW16Oc76Rq9GczOWXbMMf+iXOK5la62OvGLxCA2seEtYzAqqXG81q3m2HPHNHVHgNSTVgsLSd5arqCV8RBagPmE6oYZS3XuZZO0Rg6exVJ5SWB4iQ2hmLWPnM76m2lHfkwCYRMEmUSAZBMImAW8IigDAMIsOUEtBiQJEFiPOYxkWFrn0hY65lTpGj1lNksAd1PJht/34zz3pbC6OtraXtpceFp6WoUm2s5z4l6LvasoOUkq/gSN/X9fOZZIKS3PpfTu1vBJxXB+/+8DzbaGDCxtEoxU8zbyG4i6J+k4pKnTPYYciyQUojAY0GwJgLIxDbKPMyDo4bg4PDtVdaa953CDwudT6C5nr4pLTpU6aghVVVAHBQLD9JxHwH0eHqGuRpSvTW5teo25HiF0/unf1tzt2U58TOiEPygutvyVe5436z2j7mbQuEfd/5RVw7gtx2J1imqjmYVCkRnOndPEcYjqW5D3E7HZ8cfiK1goHEXlc1uYEsVVUvlN7gADle0QS17BNuFo9woYKn4Z0HeiDVtwEfURjTHZA7R2sOEXSw7XGYEAaknlJnJRVsEmTjK50HgCfOVWqseMnEMSxNjqdNOEWZGNNRXUZBMv4fF5KY0vdjKiUSRmJyjmePlLCqhVUu1xcg2sCeUc8amnGS2Ymk1TGjpUcVljFVD1eZb85qC6rsuo+bh6SHxTn8x8uE432DGpKUdq/dkfaXIx61Qixv7QBSc8PtI69uZk0lZ812sFFze87VFLZbGlLoOqU+woLAEX9ounSQkDMdTbSQcNpmzra9uO8lcPlytnWxNxryMoAKmRSRYmxtB61flEnHrao48ftK8QI9AMAwoBMqyUtiCYsmSxgEwoa3IJkZvGYTFsYWFBFzJqk3sCNNNxvxiwx3G41glz8o9oWkCYzt+Gv9OsGxIKNYpY5hptBNU3Byi4tbQzE7rHKtyQupI03O58otmFHA/EfRG+9ybo1wADwv95yjIVYg6a2IO4PKewYnBrVUo6gA/mDXK+O88a6e6SQ4h+qGiEqST37aBvCc2aFnovpX1DS9E/n93z8/C8CALngCTKaOSdBdmIsOJJNlWIFd3FmXIONuM6H4Qwamr1rglKOwFheoRpuOAN/MiYY43LSfc7d2j7OH7r4cu99D0D4dwC0qNGnYZlvmIOjPbM7e5t5WlqpWVnZLXzMFJzcjaDhawFmFwFpZtSCbszN+iiU8Ni31du6FY3IABaxsAeJvadKt5nXJJee/RnhJNv8nz3HGugzKFNid82tgfKLolCyizasBuOflErirjUrfkaan7RnR+KGftKugZgQoGUqM19PAGatzW7Sfg7ITTtdO5r34/oOriHZ2ykntGwGvGC4b8728Cbt7CRWxJtfKpTmjOF8iAdD5xGKABWwtdEYi99SL/tJTlNWmq7t/eq8iqotLi1UABcxW5Bba58JNHFu2ck6CmxsNBfYfrNdeWsIQFqk3IyqNCAdXH7QWKOrU9337gxf8Q/zGZ/FPz+gkZqfJ/8AJf2k9WhRmUt2cuhtY3NuEPtx6IVjqOIYpUue6oI20OYD7yv/ABL/ADGHhBcVQNSaYsOJ/EXb0k0KJS9R1ICWsGBGdz3R9z4CH2o9F5BYePqsKjAqCL6Zl8OcrGqvFB6EiR/EvcnO2up139Jn8RfvKjea2PutoPHDlt6e1D3JtTPEofHtD3Gsbh6Vs4vmDIVunasbg6jeJz0zurL/AEtcexH3kPSsM6MSL2OmVlPC+vHn4GGmS4Pz3/31Ab2MhQvrnDdxuViINTqyir1mqltcrbG0V/Et+azj+YX+u8y9M8GTyIYexsfrDW1xj5b/AO+gUZjagZ7qbiyi9rahQDK8f1IPddD5kofrp9YJwr8FJ/psw+kTyw5uvHb3CjuTFmHeCW8BNeJIBYcveAX/AOxYQy3gPr+8AsOQ92/eGleIqBLnmfcwC55n3MMsPl+pg3XxH1ENMei8g3FmoeZ9zBLnmdPEwnp8eHMaj3/eLN/GGhLkDaYBqHmfcyK1c2UBjoNTc6km/wCw9JjbeUQ5i0rohlbHY8rTqXqMrMoCntMBrc/pb1M8m6a6NBqbgO1iMqtY5tRpbQ6jbnPR+lAW7I3Og8zOW6ZpZcQzBdEey3BsQnZX6KIaVy28CkzlafXJZMq1CSAneG5tvbUeU6Lonph6I6oAZVJ1ZKbFjfVjccTrJ6PABPYsEVn7xIBUXBF9jew9YWHwSOwKk5RYsjb+AvxF5zuaxNya/fzh7d59fVl7XijjnNuuC+ca8zq6fTh6oFiM7hQOyoGUAWFgLaLb/KL/AI3MbsxJ5k3nL1KzPUAXmFQbXud/UzY9H1cuY56ebKQnbHeJAJ18M0rC9rfF7v53HJmwJP8AHdI6DCZWaxvYLUc2IvZULW9SAPWW8HVTtkUxYUql8zMTqMttLD83Ka3AYqrlqlnVxkC5WrrlJZ13s2mgaWMPWIDAUqXbXKbVr6Zg3z81E3TOVwot4d0yu4Dplyr2WDKxa+hUjUWB3PCTiGpOQVYo1lWzLZNFAGxOXaJeuFXI1HKGOcdttSARvrzPvFirT+RvSoP/AMyZQT3WzFQVekyGx4i4I1UjwPGWazImellc9pczZ1Gq32GXmT7ScRUIq5F7pFFMjWZe4o9/EWg4rI1R7NlbO/e1Vu0dbjb195LbjxX7X9cfdd4hV6f/AMg9Vb9pJqIEZVLEsyHtKAAFDaaE37w9oqrRZdxodjup8iNDAUEmwFydgNSY1JNWuAUWqVhTZsqsc6KM1zYFXJ/QQxWHUt+Gn+qmnbt3H/mkGmFp5HdVYuGtq1gFIsbbHXaQAnVlOtW5dW7tS1grD5fGXwEQCnVs/VrcOi6NUtZlcn838oiwqsr2XKygMLMSGW9mGvHUHyBjkojqX/ET/Vpa9sDu1NNV8YrREftKzPlQZSTZL5mPuFHvEBVJjKFbKdrgizKdmXl/14ECKmRDLD0VBFyerYXVgNT4HkRx/wCsGuiAAqb9ra4mYeqNUfuNx3KNwcfccR6RVamVYqdx7EcCOYmimlFrSvHmjKWKTmpKbSXLan6X6gEzJkGZmp3pMEwi3hAZzLJBZTyiiY0PbfUHcQKi28QdjABZgmSYJiGCGI2NpBq81U+lv0tIMBoDoI1F5MPJr/QiLZFa4B1sTZlA2F9wZPVsdQCZFNSGNxbsP/tMFNN1ZGmJoMeRy9jNHi6r/wDuVP8ANv3m9xYmmxNOGotRKKVzZlcs6uALF2FrG+m/KWsOirSd8pW99C1yeAsbeJ9pX6i5AG5Npc6TsqrTHAAnyGg+85M7U3HH1e/gjv7PJwTl0XqylgVp58wVxkVn76kaDT8vO0rqKXKp/kh+0uYcWp1WsNQqD1Nz+kqW8JvpXUTyOuBaoYmkEZPxO0yknsHu30+stUq1LlUPqi/YzWFPaEhj3WzM201Z0KY2mVVDTayFiD1gv2rX/L4RqVaPy1B/eh/5ZpKYbkfYyzTc8jHZk4nR4etSqYhW/EBaoGtZSBY3tf0lEtck8yTB6If8VfJ/9pg0TcgXtK3lRk6jbfIsUqzL3Ta+43U+Y2Ms0KyXJt1blWUEXyAkWvbcaX94ivRAFwfQxAMWbA8c99n1Xzf9ozw5oZo6ocPAbVosu432I1B8jFmPw1exCtqhIzA7eY5GHjcJkJK9pOB4jzmKyVLTLi+HR/0+418CE/0X/wDsp/7XlSW6f+jU/rT9DKk1EiJkyYYARLxrt1KEEHIzIQVVhY9pdx/VKEtYTVKqfyhx5qf2JjQMLDsjh81NbqhYZSyE2IvtptfhIo0qTZjap2FBtmU3uwGht48oPRp/EA4MGU+qkQ+iDatY8Qyn01+0a5COtJgEzDAJjESZiPwOx+kAwTEBLoRFkGF1hgmqecY6BIPKKaW6hNhb1isQ2gHHjChJiRXYCwMWK/aJY7qRfleY0r1JChFO0txpIr18Jfusp+k1mJ6PqfL9RNkEuwHjF4tGZ2NyFGl78oSairY1dmuwWCIYswtlGk1eMbM7Hx08p0NVwKLWvyBPGc+6TmxpvJKb8EdOqoqJNRbUFHzuT6AWlTLNj0kthTX5VlZ6ulgJ1xjF3bqvUxnkkq0q79CuBwh0KV2Uc2H6wbRuFYB1J2Bk3fErdcCxisS4qNZiBfQQqeNqfN9BAq0VZiQ+5Jk08Ex7rAyhOza9F41zUANrWbgOUqBjf1hdG0GVyTwB4xAe28dJ8SG2i6HJ5wgZWWsY1ahiaj1F+XRDry/gcST2Droct/0muWoY/DVO2vmJllxxnBoabT4Fyk6MGpkZCx4bXEQ9BASM9iOYgYoWc2PG8c6iot/zrv4iEcbcU035p+5Lkl8Ys4a+zKfWJfDsOHtrBKwlqsNiYOORc78f8GpJijLHR9XLUU8NQfUTP4kHvKDI6tG7pseRiWRriq9R0WmeqrXCobHQ2EGlXIfMaQvrqAeIlVqbrsT6GCMS4/MfWaqafBk0diZBmGQN5QgTBJjKsUYgBMEyTBMBkFjzgMZhgGAENEvGGQm8TdKxoHDUbHMdhNfjKua4Ggv7zcVe4ZpTv6zNLVUn/wCBYWMoHqlUDxM11LBsWFxoNTN3ivy+UTR/N5R4VavrZUmanF4kFiCtwNJValTbY2MmtufMxDSmykE+CPAgyu9MjcWlmgxvuZGNgBUtLfRrAPqbaSsJAgDNvgKTBmN7ix4+MpMdTLnRZ0eUjuZT/iRzHIY5TKyx6SRscDGUm1HmIiMTceYiAuY49q/MSMC9nHjcTMd+Xyi8N3185GH+EQlxYeJFnbziw8dju/6CVprbT2IpPiHYSCsGEsapidpWSlZhx9DG9ajd4WMS8CZzxK+8qMrP/9k=" alt="">
                    <div>
                        <h1 id="naslovLokacija">Lokacije</h1>
                        <h1 >Beograd: lokacija 1</h1>
                        <h1 >Nis: lokacija 2</h1>
                        <h1 >Novi Sad: lokacija 3</h1>
                    </div>
                </div>
        </div>
    </div>
<?php } //zatvoren else na 15. liniji koda?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="../js/home1.js"></script>
</html>