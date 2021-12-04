<?php
require_once "..\dbBrocker.php";
require_once "..\php klase\korisnik.php";
if(session_id() == ''){
    session_start();
 }
$_SESSION['korisnik']=null;
$korisnik2 = new Korisnik();
 if(isset($_POST['ime'])&&isset($_POST['prezime'])&&isset($_POST['email2'])&&isset($_POST['sifra'])&&isset($_POST['sifra1'])){
     
    //Provera da li su polja lepo upisana
     if($_POST['ime']==""){
         echo "Polje ime je prazno";
         return;
     }
     if($_POST['prezime']==""){
        echo "Polje prezime je prazno";
        return;
    }
    if($_POST['email2']==""){
        echo "Polje e-mail je prazno";
        return;
    }
    if($_POST['sifra']==""){
        echo "Polje sifra je prazno";
        return;
    }
    if($_POST['sifra1']==""){
         echo "Polje potvrdi sifru je prazno";
         return;
    }
    //Provera da li su sifre iste
    if($_POST['sifra1']==$_POST['sifra1']){

        //Da li je e-mail upisan u dobrom formatu
        if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_POST['email2'])){
            $korisnik2=new Korisnik();
            $korisnik2->ime=$_POST['ime'];
            $korisnik2->prezime=$_POST['prezime'];
            $korisnik2->email=$_POST['email2'];
            $korisnik2->sifra=$_POST['sifra'];
            $_SESSION['korisnik']=$korisnik2;
           $korisnik2->unesiKorisnika($conn);
           echo "korisnik se uspesno registrovao";
        }else{
            echo "Nije dobro upisan e-mail";
        }
    }else{
        echo "sifre nisu identicne";
    }
 }
?>