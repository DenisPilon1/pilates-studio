<header>
  <?php
      if (isset($_GET['logout'])) {
          session_unset();
      }
  ?>
  
  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm" style="z-index: 2000; ">
    <div class="container-fluid">
      <!-- Navbar brand -->
      <a class="navbar-brand nav-link" href="index.php">
        <strong>STUDIO<span>AFRODITA</span></strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" style="border: 2px solid white;">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="index.php">Početna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#treninzi">Treninzi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#treneri" rel="nofollow">Treneri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#dvorane">Dvorane</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#onama">O nama</a>
          </li>
        </ul>

        <ul class="navbar-nav d-flex flex-row align-items-center">

          <li class="nav-item me-3 me-lg-0 ">
            <a class="učlani-se me-3" href="učlani_se.php" role="button"
              rel="nofollow">Učlani se</a>
          </li>

          <?php if(isset($_SESSION['loggedin'])){ ?>
            <li class="nav-item me-3 me-lg-0 ">
              <div class="nav-link"style="color:white">Bok <?php echo $_SESSION['name']?>!</div>
            </li>
          <?php } ?>

          <?php
              if(isset($_SESSION['loggedin'])){
          ?>
          <li class="nav-item">
            <div class="dropdown">
                <i class="fa-lg bi bi-gear p-0 ms-2" data-bs-toggle="dropdown" type="button" style="color:white; size:40px"></i>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end mt-3">
                    <?php if(($_SESSION['role']) =='admin'){ ?>
                        <li><a class="dropdown-item" href="http://localhost/phpmyadmin/index.php" >Baza podataka <i class="bi bi-clipboard-data"></i></a></li>
                    <?php } ?>
                    <?php if($_SESSION["loggedin"]){ ?>
                        <li><a class="dropdown-item" href="mojaČlanarina.php" >Članarine i raspored <i class="bi bi-card-list"></i></a></li>
                    <?php } ?>
                    <li><a class="dropdown-item" href="index.php?logout=1" >Odjava <i class="bi bi-box-arrow-right"></i></a></li>
                </ul>
            </div> 
          </li> 
          <?php 
              }else{
          ?>       
                <li class="nav-item me-3 me-lg-0 ">
                  <a class="nav-link" href="prijava.php" rel="nofollow">Prijava <i class="bi bi-box-arrow-in-right"></i></a>
                </li> 
          <?php   
              }
          ?>
        </ul>

      </div>
    </div>
  </nav>
</header>
