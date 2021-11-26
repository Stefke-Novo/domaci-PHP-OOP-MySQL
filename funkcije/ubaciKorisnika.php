<?php
require "..\dbBrocker.php";
require "..\php klase\korisnik.php";
$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$email=$_POST['email2'];
$sifra=$_POST['sifra'];
$sifra1=$_POST['sifra1'];
 if(isset($_POST['ime'])&&isset($_POST['prezime'])&&isset($_POST['email2'])&&isset($_POST['sifra'])&&isset($_POST['sifra1'])){
     echo "pokrenuta je funkcija";
    if($_POST['sifra']==$_POST['sifra1']){
        
        if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_POST['email2'])){
            $korisnik = new Korisnik($_POST['ime'],$_POST['prezime'],$_POST['email2'],$_POST['sifra']);
            $korisnik->ime=$ime;
            $korisnik->prezime=$prezime;
            $korisnik->email=$email;
            $korisnik->sifra=$sifra;
           $korisnik->unesiKorisnika($conn);
           echo "korisnik se uspesno prijavio";
        }else{
            echo "Nije dobro upisan e-mail";
        }
    }else{
        echo "sifre nisu identicne";
    }
 }else{
     echo "barem jedan od podataka nije upisan";
 }
?>