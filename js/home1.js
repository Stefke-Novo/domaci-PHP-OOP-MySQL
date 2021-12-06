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
            location.reload();
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
      location.reload();
  }else alert("Nisu ucitani proizvodi: "+res);
  console.log(res);
  });
  req.fail(function(jqXHR, textStatus, errorThrown){
  console.error('Sledeca greska se desila> '+textStatus, errorThrown)});
};
function izmeniProizvodUListi(korisnickiID , imeKorpePromena,sifraProizvoda,kolicinaProizvoda){
  event.preventDefault();
  console.log("menjanje");
  document.getElementById("IDkorisnikaP").value=korisnickiID;
  document.getElementById("imeKorpeP").value=imeKorpePromena;
  document.getElementById("IDproizvodaP").value=sifraProizvoda;
  document.getElementById("kolicinaP").value=kolicinaProizvoda;
  document.getElementById("izmenaProizvoda123").style.display='flex';
}
function izadji12(){
  event.preventDefault();
  document.getElementById("izmenaProizvoda123").style.display='none';
}
$("#udji").click(function(){
  event.preventDefault();
  document.getElementById("IDkorisnikaP").disabled=false;
  document.getElementById("imeKorpeP").disabled=false;
  document.getElementById("IDproizvodaP").disabled=false;
  var $serijalizacija=$("#izmenaProizvoda123").serialize();
  console.log($serijalizacija);
  req=$.ajax({
    url:"promeniProizvod.php",
    type:"post",
    data:$serijalizacija
  });
  req.done(function(res, textStatus, jqXHR){
    if(res=="uspesno je promenjena kolicina proizvoda"){
      alert("uspesno je promenjena kolicina proizvoda");
      location.reload();
  }else alert("Nije promenjena kolicina: "+res);
  console.log(res);
  });
  req.fail(function(jqXHR, textStatus, errorThrown){
  console.error('Sledeca greska se desila> '+textStatus, errorThrown)});
  document.getElementById("IDkorisnikaP").disabled=true;
  document.getElementById("imeKorpeP").disabled=true;
  document.getElementById("IDproizvodaP").disabled=true;
});
function obrisiProizvod(korisnickiID , imeKorpePromena,sifraProizvoda){
  event.preventDefault();
  console.log("menjanje");
  document.getElementById("IDkorisnikaP1").value=korisnickiID;
  document.getElementById("imeKorpeP1").value=imeKorpePromena;
  document.getElementById("IDproizvodaP1").value=sifraProizvoda;
  document.getElementById("izmenaProizvoda1234").style.display='flex';
}
function izadji123(){
  event.preventDefault();
  document.getElementById("izmenaProizvoda1234").style.display='none';
}
$("#obrisi").click(function(){
  event.preventDefault();
  document.getElementById("IDkorisnikaP").disabled=false;
  document.getElementById("imeKorpeP").disabled=false;
  document.getElementById("IDproizvodaP").disabled=false;
  var $serijalizacija=$("#izmenaProizvoda123").serialize();
  console.log($serijalizacija);
  req=$.ajax({
    url:"obrisiProizvod.php",
    type:"post",
    data:$serijalizacija
  });
  req.done(function(res, textStatus, jqXHR){
    if(res=="uspesno je obrisan proizvod"){
      alert("uspesno je obrisan proizvod");
      location.reload();
  }else alert("Nije obrisan proizvod: "+res);
  console.log(res);
  });
  req.fail(function(jqXHR, textStatus, errorThrown){
  console.error('Sledeca greska se desila> '+textStatus, errorThrown)});
  document.getElementById("IDkorisnikaP").disabled=true;
  document.getElementById("imeKorpeP").disabled=true;
  document.getElementById("IDproizvodaP").disabled=true;
});
