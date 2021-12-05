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
  function pozvanaJeForma($IDProizvoda,$imeKorpe){
    event.preventDefault();
    console.log("ID proizvoda : "+$IDProizvoda);
    console.log("Ime korpe : "+$imeKorpe);
    var forma=document.getElementById("formaKolicina");
    forma.style.display='flex';
    document.getElementById("IDProizvoda1").value=$IDProizvoda;
    document.getElementById("ImeKorpe32").value=$imeKorpe;
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
            document.getElementById("korpaNijePoneta").style.display='none';
              var komponente =document.getElementsByClassName("korpaPoneta");
              for(var i=0;i<komponente.length;i++){
                komponente[i].style.display='flex';
                if(komponente[i]=document.getElementById("potvrdi")){
                  komponente[i].style.textAlign='center';
                }
              }
        }else alert("Korpa nije sacuvana: "+res);
        console.log(res=="korpa je uspesno sacuvana");
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
    document.getElementById("korisnikovEmail").disabled=true;
});
function Potvrdi(){
  event.preventDefault();
}
$("#potvrdi").click(function(){
  event.preventDefault();
  document.getElementById("email22").disabled=false;
  document.getElementById("IDProizvoda1").disabled=false;
  document.getElementById("ImeKorpe32").disabled=false;
  var serijalizacija=$("#formaKolicina").serialize();
  console.log(serijalizacija);
  req=$.ajax({
    url:"kupovina.php",
    type:"post",
    data:serijalizacija
  });
  req.done(function(res, textStatus, jqXHR){
    if(res=="uspesno ste kupili proizvod"){
      alert("uspesno ste kupili proizvod");
  }else alert("Niste kupili proizvod: "+res);
  console.log(res);
  });
  req.fail(function(jqXHR, textStatus, errorThrown){
  console.error('Sledeca greska se desila> '+textStatus, errorThrown)});
  document.getElementById("email22").disabled=true;
  document.getElementById("IDProizvoda1").disabled=true;
  document.getElementById("ImeKorpe32").disabled=true;
});
function ucitajProizvode(korisnickiID,imeKorpe){
  console.log("Funkcija ucitavanja je pokrenuta");
  console.log("korisnikID="+korisnickiID+"&imeKorpe="+imeKorpe);
  req=$.ajax({
    url:"uzmiListu.php",
    type:"post",
    data:"korisnikID="+korisnickiID.trim()+"&imeKorpe="+imeKorpe.trim()
  });
  req.done(function(res, textStatus, jqXHR){
    if(res=="vracena je lista"){
      alert("uspesno su ucitani proizvodi");
  }else alert("Nisu ucitani proizvodi: "+res);
  console.log(res);
  });
  req.fail(function(jqXHR, textStatus, errorThrown){
  console.error('Sledeca greska se desila> '+textStatus, errorThrown)});
};