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
        div.style.display = div.style.display == "none" ? "flex" : "none";
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
  function pozvanaJeForma($IDproizvoda,$IDkorpe){
    event.preventDefault();
    var forma=document.getElementById("formaKolicina");
    forma.style.display='flex';
    document.getElementById("potvrdi").addEventListener("click",function(){
      $("formaKolicina").submit(function(){
       $kolicina=document.getElementById("kolicinaRobe").value;
        if(!isNaN($kolicina)){
          alert("Niste ukucali broj");
          return;
        }else{
          
        }
      });
    });
    console.log(forma);
  }
  function Nazad(){
    event.preventDefault();
    document.getElementById("formaKolicina").style.display='none';
  }
$("#dugmeKorpa").click(function(){
  event.preventDefault();
  document.getElementById("imeKorpeForma").style.display='flex';
  console.log("Pokrenuta funkcija");
});
function KlikniNazad(){
  event.preventDefault();
  var nazad=document.getElementById("imeKorpeForma");
  nazad.style.display='none';
}
$("#imeKorpeForma").submit(function(){
  event.preventDefault();
  var $formaKorpe=$(this);
  document.getElementById("korisnikovEmail").disabled=false;
    const serijalizacija = $formaKorpe.serialize();
    console.log(serijalizacija);

    req = $.ajax({
        url: 'proveraKorpe.php',
        type:'post',
        data: serijalizacija,
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="korpa je uspesno sacuvana"){
            alert("korpa je uspesno sacuvana");
            document.getElementById("korpa1").style.display='flex';
        }else alert("Korpa nije sacuvana: "+res);
        console.log(res=="korpa je uspesno sacuvana");
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
    document.getElementById("korisnikovEmail").disabled=true;
});