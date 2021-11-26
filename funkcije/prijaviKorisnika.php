<?php
require "..\dbBrocker.php";
require "..\php klase\korisnik.php";
$email=$_POST['email1'];
$sifra=$_POST['sifra1'];
 if(isset($_POST['email1'])&&isset($_POST['sifra1'])){
     echo "pokrenuta je funkcija";
            $korisnik = new Korisnik(null,null,$_POST['email1'],$_POST['sifra1']);
            $korisnik->email=$email;
            $korisnik->sifra=$sifra;
            $korisnik1=$korisnik->potraziKorisnika($conn);
           echo "korisnik se uspesno prijavio: $korisnik->ime,$korisnik->prezime,$korisnik->email,$korisnik->sifra";
 }else{
     echo "barem jedan od podataka nije upisan";
 }
?>