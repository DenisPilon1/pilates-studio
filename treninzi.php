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
    <div id="intro" class="bg-image shadow-2-strong" style="height: 50vh;">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">

            <h1 class="mb-5">Odaberi svoj trening i promjeni svoj <span>Život!!!</span></h1>
            <a class="učlani-se btn-lg m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank" role="button">Učlani se</a>

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
              <img src="img/grupni.png" class="img-fluid" style="height: 100%; width: 100%;"/>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong><span>Grupni</span> treninzi:</strong></h4>
            <p class="text-muted text">
                    Grupni trening sastoji se od malih grupa od tri do 15 ljudi koji prolaze specijaliziranu i usmjerenu obuku.
                    Njegova najveća privlačnost - osim lokalizirane pozornosti - je specijalizirani osobni trening, iako u grupnom okruženju. 
                    Činjenica je da je grupni trening jeftiniji od osobnog trenera.</p>
                <p class="text-muted text">
                    Grupni osobni treninzi motiviraju klijente i potiču rezultate. Grupno okruženje često izaziva natjecanje, 
                    što potiče motivaciju.
                </p>
                <p class="text-muted text">
                    Grupno osobno treniranje nudi vrijedan trening uz djelić cijene individualnog trenera. Ovo se sviđa članovima koji si rutinski
                    ne mogu priuštiti trenera u okruženju jedan na jedan. 
                    Specijalizirani trening u grupnom okruženju stvara društvenu motivaciju za promjenu načina života.
                </p>
                <div class="row mt-4">
              <div class="col-md-6">
                  <div class="row">
                      <p  style="text-align: center;">Basic program:</p>
                  </div>
                  <div class="row">
                      <p class="text-muted mb-0" style="text-align: center;">3x tjedno 300 kn</p>
                  </div>
                  <div class="row ">
                      <p class="text-muted" style="text-align: center;">5x tjedno 340 kn</p>
                  </div>
              </div>
              <div class="col-md-6 ">
                  <div class="row">
                      <p  style="text-align: center;">Gold program:</p>
                  </div>
                  <div class="row">
                      <p class="text-muted mb-0" style="text-align: center;">NO LIMIT 400kn</p>
                  </div>
              </div>      
            </div>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section>
        <div class="row">
          
            <div class="col-md-6 gx-5 mb-4">
                <h4><strong><span>Individualni</span> treninzi sa trenerom:</strong></h4>
                <p class="text-muted text">
                    Ne volite vježbanje u grupi? 
                    To nije problem – možete rezervirati individualni sat kod bilo kog od naših trenera!
                </p>
                <p class="text-muted text">
                    Ako tek počinjete trenirati, dovoljno je da imate udobnu odjeću za vježbanje 
                    (šorc, trenirka, tajice, majica). Treniramo bosi ili u čarapama.
                </p>
                <p class="text-muted text">
                    Individualni treninzi zakazuju se u dogovoru s trenerom, najčešće u jutarnjim i ranim poslijepodnevnim satima, 
                    jer su kasniji sati rezervirani za grupne treninge. Svaki trening traje 60 minuta i uključuje zagrijavanje, 
                    glavni dio (kickboxing i Muay Thai) i istezanje/opuštanje na kraju. Naravno, ako imate posebne zahtjeve, 
                    npr. ako želite više vježbati boksačku tehniku ​​ili želite više treninga snage, slobodno se javite odabranom treneru 
                    koji će prilagoditi trening Vašim željama.
                </p>
                <div class="row mt-4">
              <div class="col-md-6">
                  <div class="row">
                      <p  style="text-align: center;">Basic program:</p>
                  </div>
                  <div class="row">
                      <p class="text-muted mb-0" style="text-align: center;">3x tjedno 260 kn</p>
                  </div>
                  <div class="row ">
                      <p class="text-muted" style="text-align: center;">5x tjedno 290 kn</p>
                  </div>
              </div>
              <div class="col-md-6 ">
                  <div class="row">
                      <p  style="text-align: center;">Gold program:</p>
                  </div>
                  <div class="row">
                      <p class="text-muted mb-0" style="text-align: center;">NO LIMIT 330kn</p>
                  </div>
              </div>      
            </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
                    <img src="img/individualni.jpg" class="img-fluid" style="height: 100%; width: 100%;"/>
                </div>
            </div>
        </div>
      </section>
      
      <hr class="my-5" />

      <section >
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="img/samostalni.jpg" class="img-fluid" style="height: 100%; width: 100%;"/>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong><span>Samostalni</span> treninzi:</strong></h4>
            <p class="text-muted text">
                Samostalno korištenje sprava i utega za vježbanje na vlastitu odgovornost.
            </p>
            <p class="text-muted text ">
                Moguće opcije:
            </p>
            <div class="row mt-4">
              <div class="col-md-6">
                  <div class="row">
                      <p  style="text-align: center;">Basic program:</p>
                  </div>
                  <div class="row">
                      <p class="text-muted mb-0" style="text-align: center;">3x tjedno 240 kn</p>
                  </div>
                  <div class="row ">
                      <p class="text-muted" style="text-align: center;">5x tjedno 270 kn</p>
                  </div>
              </div>
              <div class="col-md-6 ">
                  <div class="row">
                      <p  style="text-align: center;">Gold program:</p>
                  </div>
                  <div class="row">
                      <p class="text-muted mb-0" style="text-align: center;">NO LIMIT 310kn</p>
                  </div>
                  <div class="row ">
                      <p class="text-muted" style="text-align: center;">Izrada osobnog programa treninga</p>
                  </div>
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

