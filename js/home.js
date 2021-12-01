AOS.init({
    offset: 300,
});
function prikaziKorisnickePodatke(){
    $podaci=document.getElementById("korisnickiPodaci");
    if($podaci.style.display=='none'){
        $podaci.style.display='flex';
    }else $podaci.style.display='none';
}
  function togglediv(id) {
    console.log("Funkcija je pokrenuta 1");
    document.querySelectorAll(".polja").forEach(function(div) {
      if (div.id == id) {
        div.style.display = div.style.display == "none" ? "block" : "none";
      } else {
        div.style.display = "none";
      }
    });
    console.log("provera je pokrenuta");
    var dugmici=document.getElementsByClassName("polja");
    console.log(dugmici);
    let iskljuceno=true;
    for (let i = 0; i < dugmici.length; i++) {
        if(dugmici[i].style.display!='none'){
            iskljuceno=false;
            return;
        }
    }
    if(iskljuceno){
        dugmici[0].style.display="flex";
    }
  }