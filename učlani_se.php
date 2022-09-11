<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilats Studio</title>

    

    <!-- Boostrap 5.2.0. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    
</head>
<body>

    <!--  Membership form validation -->
    <?php

        session_start();
        include "db_con.php";
        include 'navbar.php';

    //membership confirmation
        $samostalni="samostalni";
        $bezTrenera="bez trenera";
        $grupni="grupni";

        $training=$trainer=$timePerWeek="";
        $trainingErr=$trainerErr=$timePerWeekErr=""; 
    
        if(isset($_POST['potvrdi'])){

            if(empty($_POST["training"])){
                $trainingErr = "Nije odabran tip treninga. <br>";
            }elseif($_POST["training"] == $samostalni && strcmp($_POST["trainer"], $bezTrenera) != 0){
                echo "<script>console.log('was is das' );</script>";
                $trainerErr = "Ne možete odabrati tip treninga 'Samostalni' i uzeti trenera.<br>";
            }elseif($_POST["trainer"] == $bezTrenera && strcmp($_POST["training"], $samostalni) != 0){
                echo "<script>console.log('was is das' );</script>";
                $trainerErr = "Morate odabrati trenera.<br>";
            }else{
                $training=$_POST["training"];
            }

            if(empty($_POST["timePerWeek"])){
                $timePerWeekErr = "Broj dana nije odabran. <br>";
            }else{
                $timePerWeek=$_POST["timePerWeek"];
            }

            if(empty($_POST["trainer"])){
                $trainerErr="Morate odabrati neku od opcija. <br>";
            }else{
                $trainer=$_POST["trainer"];
            }
        } 

    //Price calculation
        $price=0;
        $do3putaTjedno="do 3 puta tjedno";
        $do5putaTjedno="do 5 puta tjedno";
        $neograničeno="Neograničeno";
        if($training == $samostalni ){
            if($timePerWeek == $do3putaTjedno ){
                $price=240;
            }
            if($timePerWeek == $do5putaTjedno ){
                $price=270;
            }
            if($timePerWeek == $neograničeno ){
                $price=310;
            }
        }elseif($training == $grupni){
            if($timePerWeek == $do3putaTjedno ){
                $price=260;
            }
            if($timePerWeek == $do5putaTjedno ){
                $price=290;
            }
            if($timePerWeek == $neograničeno ){
                $price=330;
            }
        }else{
            if($timePerWeek == $do3putaTjedno ){
                $price=300;
            }
            if($timePerWeek == $do5putaTjedno ){
                $price=340;
            }
            if($timePerWeek == $neograničeno ){
                $price=400;
            }
        }
        
    
    //Purchase of membership
        $brojKartice=$datumIsteka=$CSC_kod="";
        $brojKarticeErr=$datumIstekaErr=$CSC_kodErr=""; 

        if(isset($_POST['plati'])){

            if(empty($_POST["broj_kartice"])){
                $brojKarticeErr = "Molimo unesite broj kartice. <br>";
            }else{
                $brojKartice=$_POST["broj_kartice"];
            }

            if(empty($_POST["datumIsteka"])){
                $datumIstekaErr = "Molimo unestite datum isteka kartice. <br>";
            }else{
                $datumIsteka=$_POST["datumIsteka"];
            }

            if(empty($_POST["CSC_kod"])){
                $CSC_kodErr="Molimo unestie CSC kod. <br>";
            }else{
                $CSC_kod=$_POST["CSC_kod"];
            } 
        }
    ?>

    <!-- jquery  -->
    <script>
        $(document).ready(function(){
            //Open ConfirmInformationModal 
            if("<?php echo isset($_POST['potvrdi']);?>" && "<?php echo !empty($trainer);?>" && "<?php echo !empty($training);?>" && "<?php echo !empty($timePerWeek);?>"){
                $("#confirmInformationModal").modal('show');
            }

        //Payment check
            $kartica=$datum=$cscKod=$editList=$checkbox=false;

            //.on() --> On input change disable/anable button 'plati'
            $('#broj_kartice').on('input', function() { 
                var value = $(this).val();
                if(value.length == 16 ){
                    $kartica =  true;
                    $("#brojKarticeErr").text('');
                }else{
                    $kartica=false;
                    document.getElementById("plati").disabled = true;
                    $("#brojKarticeErr").text('Invalid!');
                }
                if($kartica && $datum && $cscKod && $editList && $checkbox){
                    document.getElementById("plati").disabled = false;
                }
            });

            $('#datum_isteka').on('input',function(){           
                var value = $(this).val();        
                if( value.length == 5){
                    $datum = true;
                    $("#datumIstekaErr").text('');
                }else{
                    $datum=false;
                    document.getElementById("plati").disabled = true;
                    $("#datumIstekaErr").text('Invalid!');
                }
                if($kartica && $datum && $cscKod && $editList && $checkbox){
                    document.getElementById("plati").disabled = false;
                }
            });

            $('#CSC_kod').on('input',function(){    
                var value = $(this).val();               
                if(value.length == 3){
                    $cscKod=true;
                    $("#CSCkodErr").text('');
                }else{
                    $cscKod=false;
                    document.getElementById("plati").disabled = true;
                    $("#CSCkodErr").text('Invalid!');
                }
                if($kartica && $datum && $cscKod && $editList && $checkbox){
                    document.getElementById("plati").disabled = false;
                }
            });

            $('input[name="editList"]').on('input',function(){    
                if (!$("input[name='editList']:checked").val()) {
                    $editList=false;
                    document.getElementById("plati").disabled = true;
                }
                else {
                    $editList = true;
                }
                if($kartica && $datum && $cscKod && $editList && $checkbox){
                    document.getElementById("plati").disabled = false;
                }
            });

            $('input[name="checkbox"]').on('input', function(){    
                if (!$("input[name='checkbox']:checked").val()) {
                    $checkbox=false;
                    document.getElementById("plati").disabled = true;
                }
                else {
                    $checkbox = true;
                }
                if($kartica && $datum && $cscKod && $editList && $checkbox){
                    document.getElementById("plati").disabled = false;
                }
            });

        });
    </script>


    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong" style="height:1000px" >
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="row g-0 text-white">
            <div class="col-md-5 offset-md-1  gradient-custom-1" style="background-color: rgba(0, 0, 0, 0.3);">
              
                <div class="text-center">
                  <h3 class="mt-1 mt-3 pb-1">Postani član Pilates studia <span>Afrodita</span></h3>
                </div>

                <form action="" method="post">
                  <p>Odaberi svoj trening i učlani se</p>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="form2Example22">Odaberite tip treninga:</label> <br>  
                    <select id="trening-select" name="training" class="form-control text-white" style="background-color: rgba(0, 0, 0);">
                                <option value="" disabled selected>Molimo odaberite opciju...</option>
                                <option value="grupni">Grupni</option>
                                <option value="individualni">Individualni sa trenerom</option>
                                <option value="samostalni">Samostalni</option>
                    </select>
                    <span class="error"><?php echo $trainingErr;?></span>
                  </div>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="form2Example22">Odaberite broj dana:</label> <br>  
                    <select id="trening-select" name="timePerWeek" class="text-white form-control" style="background-color: rgba(0, 0, 0);">
                                <option value="" disabled selected>Molimo odaberite opciju...</option>
                                <option value="do 3 puta tjedno">do 3 puta tjedno</option>
                                <option value="do 5 puta tjedno">do 5 puta tjedno</option>
                                <option value="Neograničeno">Neograničeno</option>
                    </select>
                    <span class="error"><?php echo $timePerWeekErr;?></span>
                  </div>

                 <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="form2Example22">Odaberite svog trenera:</label> <br>  
                    <select id="trening-select" name="trainer" class="text-white form-control" style="background-color: rgba(0, 0, 0);">
                        <option value="" disabled selected>Molimo odaberite opciju...</option>
                        <option value="Petar">Petar</option>
                        <option value="Lea">Lea</option>
                        <option value="Boris">Boris</option>
                        <option value="bez trenera">Bez trenera</option>
                    </select>
                    <span class="error"><?php echo $trainerErr;?></span>
                 </div>

                  <div class="ms-5 me-5 mb-3 text-start">
                    <label class="form-label text-white" for="date">Odaberite datum početka:</label> <br>
                     <input class="form-control text-white" type="date" id="date" name="date" 
                        value="<?php echo date('Y-m-d');?>"   max="2022-12-31" min="<?php echo date('Y-m-d');?>"
                        style="background-color: rgba(0, 0, 0); color-scheme: dark; ">
                  </div>

                    <?php if(isset($_SESSION['loggedin'])){  ?>
                        <button class="prijava-btn btn btn-primary btn-lg gradient-custom-2" id="potvrdi" type="submit" name="potvrdi">Potvrdi podatke</button>
                    <?php }else{ ?>
                        <button class="prijava-btn btn btn-primary btn-lg gradient-custom-2" type="submit" name="submit" disabled>Potrebna prijava</button>
                    <?php } ?>

                  <div class="d-flex align-items-center justify-content-center pb-4 mt-5 mb-3">
                    <p class="mb-0 me-2">Već ste učlanjeni?</p>
                    <?php if(isset($_SESSION['loggedin'])){  ?>
                        <a class="prijava-btn btn btn-primary btn-sm gradient-custom-2 ms-3" href="mojaČlanarina.php" role="button" rel="nofollow">Moje članarine</a>
                    <?php }else{ ?>
                        <a class="prijava-btn btn btn-primary btn-sm gradient-custom-2 ms-3 disabled" href="mojaČlanarina.php" role="button" rel="nofollow">Potrebna prijava</a>
                    <?php } ?>
                  </div>

                </form>

            </div>
            <div class="col-lg-5 d-flex align-items-center gradient-custom-2">
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

     <!-- The Modal for information confirm (Triggers a pop-up window when button is pressed) -->
    <div class="modal fade" id="confirmInformationModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content text-dark">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title fs-3">Potvrdi svoje podakte za učlanjenje:</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-auto col-md-auto offset-md-2">
                            <p class="fw-bold fs-6">Ime:</p>
                        </div> 
                        <div class="col-sm-auto col-md-auto">
                            <p> <?php echo $_SESSION["name"];?></p>
                        </div> 
                        <div class="col-sm-auto col-md-auto offset-md-2">
                            <p class="fw-bold fs-6">Prezime:</p>
                        </div> 
                        <div class="col-sm-auto col-md-auto">
                            <p> <?php echo $_SESSION["surname"];?></p>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-sm-auto col-md-auto offset-md-2">
                            <p class="fw-bold fs-6">E-mail:</p> 
                        </div> 
                        <div class="col-sm-auto col-md-auto offset-md-2 m-0">
                            <p><?php echo $_SESSION["email"];?></p> 
                        </div> 
                    </div>

                    <hr class="my-3" />

                    <div class="row">
                        <div class="col-sm-auto col-md-auto offset-md-2">
                            <p class="fw-bold fs-6">Trener:</p>
                        </div> 
                        <div class="col-sm-auto col-md-auto">
                            <p> <?php echo $trainer;?></p>
                        </div> 
                        <div class="col-sm-auto col-md-auto offset-md-2">
                            <p class="fw-bold fs-6">Broj dana:</p>
                        </div> 
                        <div class="col-sm-auto col-md-auto">
                            <p> <?php echo $timePerWeek;?></p>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-sm-auto col-md-auto offset-md-2">
                            <p class="fw-bold fs-6">Tip treninga:</p> 
                        </div> 
                        <div class="col-sm-auto col-md-auto offset-md-2 m-0 me-5">
                            <p><?php echo $training;?></p> 
                        </div> 
                        <div class="col-sm-auto col-md-auto offset-md-2 m-0">
                            <p class="fw-bold fs-6">Datum početka:</p>
                        </div> 
                        <div class="col-sm-auto col-md-auto offset-md-2 m-0">
                            <p> <?php echo $_POST["date"];?></p>
                        </div> 
                    </div>

                    <hr class="my-3" />

                    <div class="row">
                        <div class="col-sm-auto col-md-auto offset-md-2">
                            <p class="fw-bold fs-6">Cijena treninga:</p> 
                        </div> 
                        <div class="col-sm-auto col-md-auto offset-md-2 m-0">
                            <p><?php echo $price;?> kn</p> 
                        </div> 
                    </div>

                    <hr class="my-3" />

                    <p>Unesite podatke za plaćanje:</p>
                    <div class="row">
                    <div class="col-md-auto col-sm-6">
                        <input type="radio" class="ms-3 me-1" id="editList" name="editList" value="paypal">PayPal
                        <input type="radio" class="ms-3 me-1" id="editList" name="editList" value="visa">Visa 
                    </div>
                    <div class="col-md-auto col-sm-6">
                        <input type="radio" class="ms-3 me-1" id="editList" name="editList" value="maestro">Maestro
                        <input type="radio" class="ms-3 me-1" id="editList" name="editList" value="mastercard">Master Card
                    </div>
                    </div>

                    <div class="row"> 
                        <div class="col-sm-6 mb-3 mt-3">
                            <input type="text" id="broj_kartice" name="broj_kartice" class="form-control" placeholder="Broj kartice"
                                minlength="16" maxlength="16"/>
                            <span class="error" id="brojKarticeErr"></span>
                        </div> 
                    </div>

                    <div class="row"> 
                        <div class="col-sm-3 mb-3">
                            <input type="text" id="datum_isteka" name="datum_isteka" class="form-control" placeholder="Datum isteka"
                            minlength="5" maxlength="5"/>
                            <span class="error" id="datumIstekaErr"></span>
                        </div> 
                        <div class="col-sm-3 mb-3">
                            <input type="text" id="CSC_kod" name="CSC_kod" class="form-control" placeholder="CSC kod"
                                minlength="3" maxlength="3"/>
                            <span class="error" id="CSCkodErr"></span>
                        </div> 
                    </div>

                    <div class="row"> 
                        <div class="col-auto mb-3">
                            <input type="checkbox" class="ms-1 me-2" name="checkbox" value="checkbox">Slažem se s uvjetima pružanja usluge i prihvaćam politiku privatnosti.
                        </div>  
                    </div>

                </div> 

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="mojaČlanarina.php" method="post">

                        <input type="hidden" name="trainer" value="<?php echo $trainer;?>"> 
                        <input type="hidden" name="training" value="<?php echo $training?>"> 
                        <input type="hidden" name="timePerWeek" value="<?php echo $timePerWeek;?>"> 
                        <input type="hidden" name="date" value="<?php echo $_POST["date"];?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <button type="sumbit" class="btn btn-success px-4" id="plati"  title="plati"  name="plati" disabled>Plati i učlani se</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScripts File -->
    <script src="main.js"></script>

</body>
</html>

