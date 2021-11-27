<?php
require_once "..\dbBrocker.php";
require_once "..\php klase\korisnik.php";
session_start();
$korisnik1=new Korisnik();
$_SESSION['korisnik']=null;
 if(isset($_POST['email1'])&&isset($_POST['sifra1'])){
    if($_POST['email1']==""){
        echo "Polje e-mail je prazno";
        return;
    }
    if($_POST['sifra1']==""){
        echo "Polje sifra je prazno";
        return;
    }
    $korisnik=new Korisnik(null,null,$_POST['email1'],$_POST['sifra1']);
    $korisnik->email=$_POST['email1'];
    $korisnik->sifra=$_POST['sifra1'];
    $korisnik1=$korisnik->potraziKorisnika($conn)->fetch_object("Korisnik");
    if($korisnik1!=null){
        $_SESSION['korisnik']=$korisnik1;
        echo "korisnik se uspesno prijavio";
    }
    else{
        echo "korisnik ne postoji u bazi";
    }
 }
?>