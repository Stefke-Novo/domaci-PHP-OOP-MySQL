<?php
require_once "../dbBrocker.php";
class Proizvod {
    public $proizvodID,$ime,$cena,$popust,$opis,$merna_jeidnica,$slika;
    public static function pokupiProizvode($conn){
        $q="select * from proizvod";
        return $conn->query($q);
    }
}
?>