jQuery("#formaRegistracija").submit(function(){
    event.preventDefault();
    console.log("funkcija je pokrenuta");
    $formaRegistracije=$(this);
    const $input = $formaRegistracije.find('input, select, button, textarea');
    const serijalizacija = $formaRegistracije.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);
    req = $.ajax({
        url: 'funkcije/ubaciKorisnika.php',
        type:'post',
        data: serijalizacija,
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="korisnik se uspesno registrovao"){
            alert("korisnik se uspesno registrovao");
            window.location.assign('http://localhost/Projekti/Domaci%20zadatak%20PHP%20OOP%20MySQL/funkcije/home.php');
        }else alert("Korisnik nije registrovan: "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
    $input.prop('disabled',false);
});
jQuery("#formaPrijava").submit(function(){
    event.preventDefault();
    console.log("funkcija je pokrenuta");
    $formaPrijava=$(this);
    const $input = $formaPrijava.find('input, select, button, textarea');
    const serijalizacija = $formaPrijava.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);
    req = $.ajax({
        url: 'funkcije/prijaviKorisnika.php',
        type:'post',
        data: serijalizacija,
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="korisnik se uspesno prijavio"){
            alert("korisnik se uspesno prijavio");
            window.location.assign('http://localhost/Projekti/Domaci%20zadatak%20PHP%20OOP%20MySQL/funkcije/home.php');
        }else alert("Korisnik nije prijavljen: "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
    $input.prop('disabled',false);
});

function PrikaziPrijavu(){
    prijava =  document.getElementById("prijava");
    console.log(prijava);
    prijava.style.display='flex';
}
function PrikaziRegistraciju(){
    registracija=document.getElementById("registracija");
    console.log(registracija);
    registracija.style.display='flex';
}
function NazadPrijava(){
    $forma=document.getElementById("prijava");
    $forma.style.display='none';
}
function NazadRegistracija(){
    $forma=document.getElementById("registracija");
    $forma.style.display='none';
}