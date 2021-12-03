<?php
require_once "../dbBrocker.php";
class Proizvod {
    public $sifra,$ime,$cena,$popust,$opis,$merna_jedinica,$slika;
    public static function pokupiProizvode($conn){
        $q="select * from proizvod";
        return $conn->query($q);
    }
}
?>