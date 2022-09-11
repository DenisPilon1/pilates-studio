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
    <!-- Login logic and validation-->
    <?php
        session_start();
        include 'db_con.php';

        $emailErr=$passwordErr="";
        $email=$password=""; 
        if(isset($_POST["submit"])) {
            if (empty($_POST["email"])) {
                $emailErr="Email je obvezan. <br>";
            }else{
                $email=$_POST['email'];
            }
            if (empty($_POST['password'])) {
                $passwordErr="Lozinka je obvezna. <br>";
            }else{
                $password=$_POST['password'];
            }
        } 
        if(isset($_POST['submit']) && !empty($email) && !empty($password)){
            $sql = "SELECT * FROM korisnici WHERE email='$email'";
            $results= mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($results, MYSQLI_ASSOC);
            
            if(mysqli_num_rows($results) == 1 && $user["password"]==$password ){
                $_SESSION["loggedin"] = true;
                $_SESSION["timeout"]= time();
                $_SESSION["name"] = $user["name"];
                $_SESSION["surname"] = $user["surname"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["role"] = $user["role"];
                $_SESSION["success"] = "You are now logged in";
                header("Location: index.php");
            }elseif(mysqli_num_rows($results) == 1){
                if($user["email"]==$email){
                    $passwordErr="Wrong password <br>";
                }   
            }else{
                $emailErr="Pogrešan e-mail. <br>";
                $passwordErr="Pogrešna lozinka. <br>";
            }
        }
    ?>

    <?php include 'navbar.php' ?>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong" >
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="row g-0 text-white">
            <div class="col-md-6  gradient-custom-1" style="background-color: rgba(0, 0, 0, 0.3);">
              

                <div class="text-center">
                  <h3 class="mt-1 mt-3 pb-1">Pilates studio <span>Afrodita</span></h3>
                </div>

                <form action="" method="post">
                  <p>Prijavi se u svoj račun</p>

                  <div class="m-5 mt-3 mb-3 text-start">
                    <label class="form-label text-white" for="form2Example11">E-mail:</label>
                    <input type="email" id="typeEmailX" name="email" class="form-control text-white" placeholder="Email" style="background-color: rgba(0, 0, 0);"
                        value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
                    <span class="error"><?php echo $emailErr;?></span>
                  </div>

                  <div class="m-5 mt-1 text-start">
                    <label class="form-label text-white" for="password">Lozinka:</label>
                    <input type="password" id="password" name="password" class="form-control text-white" placeholder="Lozinka" style="background-color: rgba(0, 0, 0);"
                        value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
                    <!-- <i class="bi bi-eye" id="togglePassword" onclick="toggleVisiability('password')"></i> -->
                    <span class="error"><?php echo $passwordErr;?></span>  
                </div>

                  <div class="text-center pt-1 m-3 pb-1">
                    <button class="prijava-btn btn btn-primary btn-lg gradient-custom-2" type="submit" name="submit">Prijavi se</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4 mt-5 mb-3">
                    <p class="mb-0 me-2">Nemate račun?</p>
                    <a class="prijava-btn btn btn-primary btn-sm gradient-custom-2 ms-3" href="registracija.php" role="button" rel="nofollow">Registriraj se</a>
                  </div>

                </form>

              
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Mi smo više od običnog pilates studija.</h4>
                <p class="small">Uvjeri se i sam, prijavi se sa svojim korisničkm računom i postani članom najboljeg pilates studija u gradu.</p>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>

    <?php include 'footer.php' ?>

    <!-- JavaScripts File -->
    <script src="main.js"></script>

</body>
</html>

