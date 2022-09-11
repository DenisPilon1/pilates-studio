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
      include 'navbar.php'
    ?>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <h1 class="mb-3">Želiš promjeniti svoj način <span>ŽIVOTA?</span></h1>
            <h2 class="mb-3">Postati najbolja verzija <span>SEBE?</span></h2>
            <h3 class="mb-4 pb-0">Onda si na pravom <span>MJESTU.</span><br></h3>
            <p class="mb-4 pb-0">Učlani se u pilates studio <span style="color:#f82249">Afrodita</span> i započni svoju promjenu već danas.</p>

            <a class="učlani-se btn-lg m-2" href="učlani_se.php" role="button">Učlani se</a>

          </div>
        </div>
      </div>
    </div>

    <!--Main layout-->
  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section id="onama">
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/pilates.jpg" class="img-fluid" style="height: 100%; width: 100%;"/>
              <a href="onama.php">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.20);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong>Pilates studio <span>Afrodita</span></strong></h4>
            <p class="text-muted text">
                Studio se nalazi u zelenom Osječkom naselju Sjenjak u robnoj kući Sjenjak. 
                U prekrasnom i toplom prostoru, obasjanim svjetlom, uživati ćete u svakom trenutku. 
                S pažljivo osmišljenim detaljima, te sa osmjehom na licu, pobrinuli smo se da to bude mjesto u kojem ćete se uvijek osjećati dobrodošli.
            </p>
            <p><strong>Što možete očekivati:</strong></p>
            <p class="text-muted text">
                Naš profesionalni i posebno veseo i opušteni tim voditelja pomoći će vam da u jako kratkom roku 
                zavolite vježbanje kao nikad do sad te se veselite svakom novom terminu dolaska.
            </p>
            <p class="text-muted text">
              Na Vama je da dođete i uvjerite se u kvalitetan rad našeg osoblja u ugodnom ambijentu!
            </p>
            <div class="d-flex justify-content-center mt-5">
                <a href="onama.php">Saznaj više <i class="bi bi-arrow-right-square"></i></a>
            </div>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <!--Treninzi-->
      <section class="text-center" id="treninzi">
        <h4 class="mb-5"><strong>Odaberi svoj <span>Trening: </span></strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/grupni.png" class="img-fluid" />
                <a href="treninzi.php">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Grupni</h5>
                <p class="card-text">
                  Treninzi u mali skupinama, u grupi od 10 ljudi pod vodstvom trenera.
                </p>
                <a href="treninzi.php">Dodatne informacije...</i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/samostalni.jpg" class="img-fluid" style="height: 100%;" />
                <a href="treninzi.php">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Samostalni</h5>
                <p class="card-text">
                  Treniranje samostalno uz korištenje fitness sprava na vlastitu odgovornost.
                </p>
                <a href="treninzi.php">Dodatne informacije...</i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/individualni.jpg" class="img-fluid" />
                <a href="treninzi.php">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Individualni sa trenerom</h5>
                <p class="card-text">
                  Treniranje sa sturčnom sobom, jedan na jedan, koja osobu vodi kroz cjelokupan trening.
                </p>
                <a href="treninzi.php">Dodatne informacije...</i></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <!--Dvorane-->
      <section class="gallery text-center" id="dvorane">
            <h4 class="mb-5"><strong>Dvorane za <span>Vježbanje: </span></strong></h4>
            <div class="row mb-5">
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                        <div class="card p-0">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="img/dvorane/dvorana7.jpg" class="img-fluid" data-original="img/dvorane/dvorana7.jpg"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card p-0">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="img/dvorane/dvorana8.jpg" class="img-fluid" data-original="img/dvorane/dvorana8.jpg"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                        <div class="card p-0">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="img/dvorane/dvorana6.jpg" class="img-fluid" data-original="img/dvorane/dvorana6.jpg"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                            <div class="card p-0">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="img/dvorane/dvorana9.jpg" class="img-fluid" data-original="img/dvorane/dvorana9.jpg" />
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="card p-0 ">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="img/dvorane/dvorana10.jpg" class="img-fluid" data-original="img/dvorane/dvorana10.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--modal for full screen image-->
        <div class="full-img-modal">
            <img src="" alt="" class="full-img">
        </div>

        <hr class="my-5" />

      <!--Treneri-->
      <section class="text-center" id="treneri">
        <h4 class="mb-5"><strong>Upoznajte naše <span>Trenere: </span></strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/petar.png" class="img-fluid" />
                <a href="treneri.php">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Petar</h5>
                <p class="card-text">
                  Magistar kineziologije u edukaciji i fitnesu. <br>
                  Privatni i grupni trener.
                </p>
                <a href="treneri.php">Detalji <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/lea.jpg" class="img-fluid" />
                <a href="treneri.php">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Lea</h5>
                <p class="card-text">
                    Magistar kineziologije u edukaciji i fintesu. <br>
                    Privatna i grupna trenerica.
                </p>
                <a href="treneri.php">Detalji <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/boris.jpg" class="img-fluid" />
                <a href="treneri.php">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Boris</h5>
                <p class="card-text">
                    Stručni prvostupnik trenerske struke u fitnesu. <br>
                    Grupni trener.
                </p>
                <a href="treneri.php">Detalji <i class="bi bi-arrow-right"></i></a>
              </div>
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

