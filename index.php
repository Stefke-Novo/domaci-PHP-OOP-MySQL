<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Old+Standard+TT:ital@1&display=swap" rel="stylesheet">
    <title>Super kupovina</title>

</head>
    <body>
        <div id="margina"></div>
        <img id="slika" src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"/>
        <h1 id="Naslov">Dobrodošli u super kupovinu !!!<br>
                Super prodavnica , sve za vas
        </h1>
        <div id="dugmici">
        <button id="dugmePrijava"  onclick="PrikaziPrijavu()">
            Prijavite se
        </button>
        <button id="dugmeRegistracija" onclick="PrikaziRegistraciju()">
            Registrujte se
        </button>
        </div>
        <div id="prijava" class="forma">
            <h2>Prijava</h2>
            <form>
               <div>
               <label for="ime">Ime</label>
                <input type="text" name="ime"/>
                <label for="prezime">Prezime</label>
                <input type="text" name="prezime"/>
                <label for="e-mail">e-mail</label>
                <input type="e-mail" name="e-mail"/>
                <label for="sifra">Šifra</label>
                <input type="password" name="sifra"/>
                <label for="sifra">Potvrditi šifru</label>
                <input type="password" name="sifra"/>
               </div>
               <div class="dugmici">
                <button id="prijaviSe"type="submit">Prijavite se</button>
                <button>Nazad</button>
                </div>
               
            </form>
        </div>
        <div id="registracija" class="forma">
            <h2>Prijava</h2>
            <form>
               <div>
                <label for="e-mail">e-mail</label>
                <input type="e-mail" name="e-mail"/>
                <label for="sifra">Šifra</label>
                <input type="password" name="sifra"/>
               </div>
               <div class="dugmici">
                <button id="registrujSe"type="submit">Registrujte se</button>
                <button>Nazad</button>
                </div>
            </form>
        </div>
    </body>
    <script src="js/index.js"></script>
</html>
<?php
?>