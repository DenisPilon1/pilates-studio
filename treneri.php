<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilats Studio</title>

    <!-- Boostrap 5.2.0. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS File -->
    <link href="style.css" rel="stylesheet">
    <link href="mdb.min.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    
</head>
<body>
    <?php 
      session_start(); 
      include 'navbar.php';
    ?>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong" >
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <div class="row">
                <h1 class="mb-3">Treniranje sa privatnim <span>TRENEROM?</span> Da ili ne?</h1>
                <h3 class="mb-3 mt-5">
                    Privatni trening savršen je način da se vratite vježbanju, 
                    radite na određenom cilju ili provedete neko vrijeme pripremajući se za početak pohađanja naših grupnih programa treninga. 
                </h3>
                <h3 class="mb-3 mt-5"> 
                    Na temelju vaših individualnih ciljeva, možemo upariti vaš trening s našim drugim resursima, uključujući fizikalnu terapiju, 
                    nutricionistički trening i program suplementacije te testiranje sastava kako bismo stvorili najučinkovitiji program za vas.
                </h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Main layout-->
  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section >
        <div class="row">

          <div class="col-md-12 gx-5 mb-4">
            <h4 style="text-align: center;"><strong>UPOZNAJETE NAŠE <span>STRUČNE</span> i <span>ISKUSNE</span> TRENERE:</strong></h4>
         
            
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section >
        <div class="row">

          <div class="col-md-6 gx-5 mb-4">
            <h4 style="text-align: center;"><strong>Petar</strong></h4>
            <p class="text-muted text">
                Završio je preddiplomski studij kondicijske pripreme sportaša na Kineziološkom fakultetu u Zagrebu.
            </p>
            <p class="text-muted text">
                Za vrijeme studiranja započeo je svoju profesinonalnu karijeru kao trener u fitness centru, 
                gdje je planirao i provodio programe treninga u radu s brojnim rekreativcima i sportašima. 
                Petar je završio srednju školu za fizioterapeuta, koja mu uvelike pomažu u kineziterapiji te specifičnim programima 
                prevencije ozljeda I korekcije biomehanike.Od 2014 godine surađuje s ljetnom školom nogometa GNK Dinamo 
                kao fizioterapeutski tehničar gdje primjenjuje razne postupke 
                fizikalne terapije te prevencije ozljeda u radu sa djecom školskog uzrasta u dobi od 6 do 15 godina.
                2018 godine sudjeluje u kondicijskoj pripremi sportaša kao vanjski suradnik za Hrvatski skijaški savez (CRO Ski).
            </p>
            <p class="text-muted text">
                Također iste godine započinje individualni rad sa natjecateljicom u Powerliftingu gdje provodi specifičan plan i program 
                za razvoj jakosti potrebne za navedeni sport.Petrova fizioterapijska podloga I specifična znanja iz kondicijske pripreme,
                dobro razumijevanje posturalnih utjecaja na kretanje te visoka razina angažmana, veliki su doprinos ukupnom radu pilates studija.
            </p>
          </div>

          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/petar.png" class="img-fluid" style="height: 100%; width: 100%;"/>
            </div>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section >
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/lea.jpg" class="img-fluid" style="height: 100%; width: 100%;"/>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4 style="text-align: center;"><strong>Lea</strong></h4>
            <p class="text-muted text">
                Od predskolske dobi aktivno trenira Ritmičku gimnastiku i plivanje u Plivackom Klubu. 
                2012.g. iz ljubavi prema sportu upisuje Stručni studij za izobrazbu trenera, usmjerenja Fitness na Kineziološkom fakultetu u Osijeku.
            </p>
            <p class="text-muted text">
                Od početka studija radi kao trener u fitness studiju za žene, 
                gdje stiće svoje prvo trenersko iskustvo i gdje 6 godina kontinuirano programira indivudualne treninge 
                te vodi grupne programe Tabate i Korerktivna gimnastike.Od priključenja Body & Mind timu prolazi velik broj stručnih edukacija iz područja kineziterapije i rekreacije. 
                Tako završava seminare STOTT PILATES-a na podlogama i mašinama, PROGRESSIVE® programe za rekreacije, 
                ISP seminar za postrehabilitaciju ozljeda i posebne populacijske skupine, DNS edukaciju za trenere te niz internih edukacija 
                iz područja posturalne analize, planiranja i programiranja treninga. Ujedno završava seminar Mentalni trening za trenere.
            </p>
            <p class="text-muted text">
                U Studiju Lea provodi kondicijske programe za rekreaciju, 
                Pilates na podlogama i mašinama, pre i post natal programe te različite kineziterapijske programe.
                Leina posebnost očituje se u velikoj želji za učenjem, hrabrom prihvaćanju izazova te toplom i veselom pristupu klijentima.    
            </p>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section >
        <div class="row">

          <div class="col-md-6 gx-5 mb-4">
            <h4 style="text-align: center;"><strong>Boris</strong></h4>
            <p class="text-muted text">
                2013. godine upisuje preddiplomski i diplomski studij kineziologije na Kineziološkom fakultetu u Zagrebu. 
                U ljeto 2019. godine obranio je diplomski rad pod nazivom “Nacionalni identitet i sport: 
                analiza medijskog diskursa Svjetskog nogometnog prvenstva u Rusiji 2018.godine”.
                Tijekom studija, volontirao je na brojnim sportskim događanjima te prošao velik broj sati opservacija kod mnogih trenera.
            </p>
            <p class="text-muted text">
                Prve ozbiljne trenerske korake započinje u NK Ruđešu. Radio je kao kondicijski trener mlađim dobnim kategorijama
                te pomoćnik glavnim kondicijskim trenerom u radu sa seniorima. Nakon toga prelazim u NK HD gdje je radio kao 
                kondicijski trener kadeta. U ljeto 2019. godine, kao član Body & Mind tima, počinjem raditi 
                s Kineskom rukometnom reprezentacijom koja nastupa pod imenom “Beijing sport University” I koja se natjeće 
                u devetoj po redu SEHA ligi. Završio je lvl.1 certifikacijski seminar za rad s girijama.
            </p>
            <p class="text-muted text">
                Sportom se bavi cijeli život. Trenirao je nogomet 12 godina. Započeo je trenirati u lokalnom klubu da bih kasnije prešao
                u NK Istru 1961. Kao sportaš ima iskustvo igranja 1.juniorske HNL. Završetkom srednje škole, prestaje s ozbiljnim 
                nogometnim aktivnostima te upisuje fakultet i posvećuje se trenerskom zvanju. Borisova posvećenost poslu, 
                konstantno učenje I educiranje te visoka razina profesionalizma čine ga vrijednim članom našega tima.
            </p>
          </div>

          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/boris.jpg" class="img-fluid" style="height: 100%; width: 100%;"/>
            </div>
          </div>

        </div>
      </section>

    </div>
  </main>

  <?php include 'footer.php' ?>

    <!-- JavaScripts File -->
    <script src="main.js"></script>

</body>
</html>

