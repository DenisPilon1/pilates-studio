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
                <h1 class="mb-3">Dobrodošli u pilates studio <span>AFRODITA.</span></h1>
                <h3 class="mb-3">Kod nas možete ugodno vježbati uz:</h3>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <img src="img/icons/oprema.png" alt="">
                    <h5 class="mt-3">Najsuvremeniju fitnes opremu</h5>
                </div>
                <div class="col-md-4">
                    <img src="img/icons/osoba.png" alt="">
                    <h5 class="mt-3">Individualni pristup</h5>
                </div>
                <div class="col-md-4">
                    <img src="img/icons/list.png" alt="">
                    <h5 class="mt-3">Profesionalne trenere</h5>
                </div>
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
          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/pilates.jpg" class="img-fluid" style="height: 100%; width: 100%;"/>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong>O nama:</strong></h4>
            <p class="text-muted text">
            Pilates studio <span>Afrodita</span> otvoren je u sprnju 2012. pod stručnim vodstvom kineziologa i vrhunskih plesača koji, 
            zahvaljujući dugogodišnjem iskustvu s plesnih podija, unaprjeđuju pilates standarde svježim stilom i pristupom, 
            prenoseći svojim članovima uz tehnike vježbi i spoznaju o važnosti svijesti o vlastitom tijelu.
            Bitno je izgraditi samopouzdanje, objediniti energiju, osvijestiti prirodu svojeg djelovanja i njegove posljedice, 
            odnosno usvojiti određena moralna načela vladanja i imati jasnu viziju svojeg daljnjeg duhovnog razvoja. 
            To također znači otpuštanje mnogih nepotrebnih napetosti i strepnji i početak jednog slobodnijeg, skladnijeg, 
            smislenijeg i sretnijeg života. Takvo postignuće nije dalek i nedostižan cilj u našem studiju.
            </p>
            <p class="text-muted text">
                U našem centru raspolažemo i ostalom najsuvremenijom opremom i rekvizitima
                uz koje klasični pilates dobiva potpuno novu dimenziju. Također, nudimo i pojedinačne pilates programe na spravama, 
                između kojih posebice ističemo reformer koji pridonosi boljoj tehničkoj izvedbi i optimalnoj.
            </p>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section>
        <div class="row">
          
            <div class="col-md-6 gx-5 mb-4">
                <h4><strong>Što nas razlikuje od ostalih:</strong></h4>
                <p class="text-muted text">
                    Ono što pilates studio Afroditu razlikuje od ostalih studija uporaba je inovativne podloge od kamenčića
                    kao jedinstvenoga rekvizita koji omogućuje izvođenje vježbi uz istodobnu prirodnu masažu stopala 
                    s pozitivnim učinkom na cijeli organizam.
                </p>
                <div>
                    <ul class="text-muted text">
                        <li>vježbe i tijelesni sistemi utječu na propriocepcijsku svijest</li>
                        <li>pokret u svrhu pokreta u raznolikim pokretnim obrascima i dometima pokreta s promjenom tenzije/težine (ples, tai chi, yoga)</li>
                        <li>tradicionalne vježbe jačanja srca, snage i fleksibilnosti</li>
                        <li>vježbe za ravnotežu otvorenih i zatvorenih očiju</li>
                        <li>kružni pokreti (ne samo linearni i postranični)</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
                    <img src="img/pilates2.png" class="img-fluid" style="height: 100%; width: 100%;"/>
                </div>
            </div>
        </div>
      </section>

      <hr class="my-5" />

      <section>
        <div class="row">
          
            <div class="col-md-6 gx-5 mb-5">
                <h4><strong>Kako do nas:</strong></h4>
                <p class="text-muted text">
                    Studio se nalazi u zelenom Osječkom naselju Sjenjak u robnoj kući Sjenjak. 
                    U prekrasnom i toplom prostoru, obasjanim svjetlom, uživati ćete u svakom trenutku. 
                    S pažljivo osmišljenim detaljima, te sa osmjehom na licu, pobrinuli smo se da to bude mjesto u kojem ćete se uvijek osjećati dobrodošli.
                </p>

                <div class="mt-5">
                    <p><strong>Kontaktiraj nas sa sve dodatne informacije:</strong></p>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4 ">
                        <div class="row">
                            <i class="bi fa-2x bi-geo-alt" style="text-align: center;"></i>
                        </div>
                        <div class="row">
                            <p class="text-muted mb-0" style="text-align: center;">Adresa:</p>
                        </div>
                        <div class="row ">
                            <p class="text-muted" style="text-align: center;">Sjenjak 111, 31000 Osijek</p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                        <i class="bi fa-2x bi-telephone" style="text-align: center;"></i>
                        </div>
                        <div class="row">
                            <p class="text-muted mb-0" style="text-align: center;">Telefon:</p>
                        </div>
                        <div class="row ">
                            <p class="text-muted" style="text-align: center;">+385 99 597 1254</p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                        <i class="bi fa-2x bi-envelope" style="text-align: center;"></i>
                        </div>
                        <div class="row">
                            <p class="text-muted mb-0" style="text-align: center;">E-mail:</p>
                        </div>
                        <div class="row ">
                            <p class="text-muted" style="text-align: center;">info@studioafrodita.hr</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
                    <div class="map-responsive">
                        <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=sjenjak%20111+(My%20Business%20Name)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" class="p-3" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <hr class="my-5" />

      <section >
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/radnovrijeme.jpg" class="img-fluid" style="height: 100%; width: 100%;"/>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4 style="text-align: center;"><strong>Radno vrijeme pilate studija <span>Afrodita:</span></strong></h4>
            <p class="mt-5" style="text-align: center;"><i class="bi fa-2x bi-calendar-range" ></i></p>
            <p class="text-muted text mt-1"  style="text-align: center;">
            Ponedjeljak: 08:00 – 13:00 i 16:00 – 22:30 <br>
            Utorak: 08:00 – 13:00 i 16:00 – 22:30 <br>
            Srijeda: 08:00 – 13:00 i 16:00 – 22:30 <br>
            Četvrtak: 08:00 – 13:00 i 16:00 – 22:30 <br>
            Petak: 08:00 – 13:00 i 16:00 – 22:30 <br>
            Subota: 08:00 – 13:00 i 16:00 – 20:30 <br>
            Nedjelja: zatvoreno
            </p>

            <p class="text-muted text mt-5" style="text-align: center;">
                    Radno vrijeme studija može se razlikovati na dane praznika i godišnjeg.
            </p>
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

