function prikaziKorisnickePodatke(){
    $podaci=document.getElementById("korisnickiPodaci");
    if($podaci.style.display=='none'){
        $podaci.style.display='flex';
    }else $podaci.style.display='none';
}
AOS.init();