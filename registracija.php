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

    <!-- Registration logic and validation -->
    <?php

        session_start();
        include "db_con.php";

        $name=$surname=$email=$password=$repeatPassword="";
        $nameErr=$surnameErr=$emailErr=$passwordErr=$repeatPasswordErr=""; 
        if(isset($_POST["submit"])){

            if(empty($_POST["name"])){
                $nameErr = "Ime je obavezno. <br>";
            }elseif(strlen($_POST["name"])>30){
                $nameErr = "Ime predugačko (max. 30 zankova). <br>";
            }elseif(!preg_match("/^[a-z A-Z ČĆŠĐŽ čćšđž]*$/", $_POST["name"])){
                $nameErr = "Dozvoljena su samo slova u imenu. <br>";
            }else{
                $check_name=$_POST["name"];
                $check_surname=$_POST["surname"];
                $check_user= "SELECT * FROM korisnici WHERE name='$check_name' LIMIT 1";
                $result= mysqli_query($conn,$check_user);
                $user = mysqli_fetch_assoc($result);
                if($user){
                    if($user['surname'] ==$check_surname){
                        $nameErr = "Ime s tim prezimenom već postoji. <br>";
                    }
                }else{
                    $name=$_POST["name"];
                    $_SESSION['name'] = $name;
                }
            }

            if(empty($_POST["surname"])){
                $surnameErr = "Prezime je obavezno. <br>";
            }elseif(strlen($_POST["surname"])>30){
                $surnameErr = "Prezime predugačko (max. 30 znakova). <br>";
            }elseif(!preg_match("/^[a-z A-Z ČĆŠĐŽ čćšđž]*$/", $_POST["surname"])){
                $surnameErr = "Dozvoljena su samo slova u prezimenu. <br>";
            }else{
                $surname=$_POST["surname"];
            }
            
            if(empty($_POST["email"])){
                $emailErr = "Email je obavezan. <br>";
            }
            elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                $emailErr = "Netočan format E-maila. <br>";
            }else{
                    $email=$_POST["email"];
            }
            
            if(empty($_POST["password"])){
                $passwordErr = "Lozinka je obavezna. <br>";
            }elseif(strlen($_POST["password"])>30){
                $passwordErr = "Lozinka predugačka (max. 30 znakova). <br>";
            }elseif(strlen($_POST["password"])<8){
                $passwordErr = "Lozinka prekratka (min. 8 znakova). <br>"; 
            }else{
                $password=$_POST["password"];
            }

            if(empty($_POST["password_repeat"])){
                $repeatPasswordErr = "Ponovljena lozinka je obavezna. <br>";
            }elseif(strlen($_POST["password_repeat"])>30){
                $repeatPasswordErr = "Lozinka predugačka (max. 30 znakova). <br>";
            }elseif(strlen($_POST["password_repeat"])<8){
                $repeatPasswordErr = "Lozinka prekratka (min. 8 znakova). <br>";
            }elseif(($_POST["password_repeat"])!=($_POST["password"])){
                $repeatPasswordErr = "Lozinke nisu iste. <br>"; 
                $passwordErr = "Lozinke nisu iste. <br>";
            }else{
                $repeatPassword=$_POST["password_repeat"];
            }
        }
        if(isset($_POST["submit"]) && !empty($name) && !empty($surname) && !empty($email) && !empty($password) && !empty($repeatPassword)){
            $sql="INSERT INTO korisnici (name, surname, email, password, role)
                    VALUES('$name', '$surname', '$email', '$password', 'user')";
            mysqli_query($conn, $sql);
            $_SESSION['loggedin'] = true;
            $_SESSION['timeout']= time();
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = "user";
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } 
    ?> 

    <?php include 'navbar.php' ?>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong" style="height:1100px;" >
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="row g-0 text-white">
            <div class="col-md-6  gradient-custom-1" style="background-color: rgba(0, 0, 0, 0.3);">
              

                <div class="text-center">
                  <h3 class="mt-1 mt-3 pb-1">Pilates studio <span>Afrodita</span></h3>
                </div>

                <form action="" method="post">
                  <p>Kreiraj svoj korisnički račun</p>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="form2Example22">Ime:</label>
                    <input type="text" id="name" name="name" class="form-control text-white" placeholder="Ime" style="background-color: rgba(0, 0, 0);"
                        value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" />
                    <span class="error"><?php echo $nameErr;?></span>
                  </div>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="form2Example22">Prezime:</label>
                    <input type="text" id="surname" name="surname" class="form-control text-white" placeholder="Prezime" style="background-color: rgba(0, 0, 0);"
                        value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : '' ?>" />
                    <span class="error"><?php echo $surnameErr;?></span>
                  </div>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="email">E-mail:</label>
                    <input type="email" name="email" class="form-control text-white" placeholder="Email" style="background-color: rgba(0, 0, 0);"
                        value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
                    <span class="error"><?php echo $emailErr;?></span> 
                  </div>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="password">Lozinka:</label>
                    <input type="password" id="password" name="password" class="form-control text-white" placeholder="Lozinka" style="background-color: rgba(0, 0, 0);" 
                        value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
                    <span class="error"><?php echo $passwordErr;?></span>
                  </div>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="password_repeat">Ponovi Lozinku:</label>
                    <input type="password" id="password_repeat" name="password_repeat" class="form-control text-white" placeholder="Ponovi Lozinku" style="background-color: rgba(0, 0, 0);"
                        value="<?php echo isset($_POST['password_repeat']) ? $_POST['password_repeat'] : '' ?>" />
                    <span class="error"><?php echo $repeatPasswordErr;?></span>
                  </div>

                  

                  <div class="text-center pt-1 m-3 pb-1">
                    <button class="prijava-btn btn btn-primary btn-lg gradient-custom-2" type="submit" name="submit">Registriraj se</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4 mt-5 mb-3">
                    <p class="mb-0 me-2">Već imate račun?</p>
                    <a class="prijava-btn btn btn-primary btn-sm gradient-custom-2 ms-3" href="prijava.php" role="button" rel="nofollow">Prijavi se</a>
                  </div>

                </form>

              
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Mi smo više od običnog pilates studija.</h4>
                <p class="small">Uvjeri se i sam, prijavi se sa svojim korisnički račun i postani članom najboljeg pilates studija u gradu.</p>
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

