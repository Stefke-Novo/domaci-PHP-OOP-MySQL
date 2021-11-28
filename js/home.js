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
    document.querySelectorAll(".polja").forEach(function(div) {
      if (div.id == id) {
        div.style.display = div.style.display == "none" ? "block" : "none";
      } else {
        div.style.display = "none";
      }
    });
  }