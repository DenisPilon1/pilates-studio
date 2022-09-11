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
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS File -->
    <link href="style.css" rel="stylesheet">
    <link href="mdb.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon.png">

    <!-- JavaScripts File -->
    <script src="main.js"></script>

    
</head>
<body>
    <?php 
        session_start();
        include "db_con.php";
        include 'navbar.php';

    //save membership to 

        $name=$_SESSION['name'];
        $surname=$_SESSION['surname'];
        $email= $_SESSION['email'];

    //user buying membership
        if(isset($_POST["plati"])){

            $training=$_POST["training"];
            $trainer=$_POST["trainer"];
            $timePerWeek=$_POST["timePerWeek"];
            $startDate=$_POST["date"];
            $expirationDate=date('Y-m-d', strtotime($startDate. ' + 30 days'));
            $price=$_POST["price"];

            $sql="INSERT INTO `clanarine`(`Name`, `Surname`, `Email`, `Training`, `Trainer`, `TimePerWeek`, `StartDate`, `ExpirationDate`, `Price`) 
                VALUES ('$name','$surname','$email','$training','$trainer','$timePerWeek','$startDate', '$expirationDate', '$price')";
            mysqli_query($conn, $sql);
        }
    
    //trainer adding training to schedule
        if(isset($_POST["unesiTrening"])){

            $training=$_POST["training"];
            $trainer=$_SESSION["name"];
            if(isset($_POST["client"])){
                $client=$_POST["client"];
            }else{
                //add all user that have membership for certain group training 
                $client="";
                $sql="SELECT * FROM `clanarine`";
                $memberships = mysqli_query($conn, $sql);
                while ($membership = mysqli_fetch_array($memberships, MYSQLI_ASSOC)){
                    if($membership["Training"] == 'grupni' && $membership["Trainer"] == $_SESSION["name"]){
                        if($client != ""){
                            $client .= ",";
                        }
                        $client .= $membership["Name"] ." ". $membership["Surname"];
                    }
                }
            }
            $date=$_POST["date"];
            $time=$_POST["time"];

            $sql="INSERT INTO `raspored`(`Training`, `Trainer`, `Client`, `Date`, `Hours`) 
                  VALUES ('$training','$trainer','$client','$date','$time')";
            mysqli_query($conn, $sql);
        }
    //confirm training arrival
        if (isset($_GET['confirm'])) {
            $query="UPDATE `raspored` SET `Confirmation`=1 WHERE id=";
            $query.=$_GET['confirm'];
            mysqli_query($conn, $query); 
        }
    //cancel trainig arrival
        if (isset($_GET['cancel'])) {
            $query="UPDATE `raspored` SET `Confirmation`=2 WHERE id=";
            $query.=$_GET['cancel'];
            mysqli_query($conn, $query); 
        }
    //renew the Membership
        if (isset($_POST['obnoviČlanarinu'])) {
            $newDate=date('Y-m-d');
            $expireDate=date('Y-m-d', strtotime($newDate. ' + 30 days'));
            $query="UPDATE `clanarine` SET `StartDate` =('$newDate'), `ExpirationDate` =('$expireDate'), `Warning`=0 WHERE id=" .$_GET['renew'];
            mysqli_query($conn, $query); 
            unset($_GET['renew']);
        }
    //set warning
        if (isset($_GET['warning'])) {
            $query="UPDATE `clanarine` SET `Warning` = 1 WHERE id=" .$_GET['warning'];
            mysqli_query($conn, $query); 
            unset($_GET['warning']);
        }
    
    //get memberships form database
         $membershipsOrdinalNum=0; //Ordinal number of the membership when shown on page
         if($_SESSION["role"] == 'trener'){
             $query = "SELECT * FROM `clanarine` WHERE Trainer='$name' order by StartDate desc";  
         }else{
             $query = "SELECT * FROM `clanarine` WHERE Email='$email' order by StartDate desc";    
         }
        $dbMemberships = mysqli_query($conn, $query); 

    
    //get schedule from database
        $scheduleOrdinalNum=0;
        if($_SESSION["role"] == 'trener'){
            $query = "SELECT * FROM `raspored` WHERE Trainer='$name' order by Date asc";
        }else{
            $query = "SELECT * FROM `raspored` order by Date asc";        
        }
        $dbSchedule = mysqli_query($conn, $query); 
    ?>

    <script>
        $(document).ready(function(){
        //Open welcome modal 
            if("<?php echo isset($_POST['plati']);?>"){
                $("#welcome").modal('show');
            }
            if("<?php echo isset($_GET['renew']);?>"){
                $("#renewMembership").modal('show');
            }
            if("<?php echo isset($_POST['obnoviČlanarinu']);?>"){
                $("#welcome").modal('show');
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
        //enable 'odaberite osobu' if 'individualni' selected under 'tip treninga' in modal 'addTrening'  
        function myFunction() {
            var value = document.getElementById("treningSelect").value;
            if(value === 'Individualni'){
                document.getElementById("pearsonSelect").disabled = false;
            }else{
                document.getElementById("pearsonSelect").disabled = true;
            }
        }
    </script>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong" style="height: 50vh;">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <div class="row">
                <?php
                    if($_SESSION["role"] == 'trener'){
                ?>
                    <h1 class="mb-3">Pregledajte sve <span>klijente</span> i uplaćene <span>članarine</span> na jednom mjestu:</h1>
                <?php
                    }else{
                ?>
                    <h1 class="mb-3">Pregledajte sve vaše <span>članarine</span> na jednom mjestu:</h1>
                <?php
                    }
                ?>
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

      <div class="row mb-5" >
        <div class="col-12 table-danger" style="border-radius: 25px;">
            <?php
                if($_SESSION["role"] == 'user'){
                    $newQuery = "SELECT * FROM `clanarine` WHERE Email='$email' order by StartDate desc";    
                    $myMemberships = mysqli_query($conn, $newQuery); 
                    while ($memb = mysqli_fetch_array($myMemberships, MYSQLI_ASSOC)){  
                        if($memb['Warning']==1){
            ?>
                    <p class="m-3">Imate opomenu zbog neplaćenih članarina:</p>
                    <p class="ms-5">Članarina na ime<?php echo " " .$memb['Name']. " " .$memb['Surname']?> istekla je datuma <?php echo " " .$memb['ExpirationDate']?>. 
                        Trener: <?php echo " " .$memb['Trainer']?>. Tip treninga: <?php echo " " .$memb['Training']." ".$memb['TimePerWeek']?>.
                        <a id="renewTheMembership" href='mojaČlanarina.php?renew=<?php echo $memb["id"]?>' class="btn btn-primary btn-sm mt-2 ms-3">Obnovi</a>
                    </p>
            <?php
                        }
                    }
                }
            ?>
        </div>
      </div>

    <!--Table schedule-->
        <div class="row  mb-3"><h4>Raspored treninga:</h4></div>
        <div class="row">
            <div class="table-responsive">
                <div class="col-md-12 gx-5 mb-4">
                    <table class="table table-info text-center p-3">
                        <thead>
                            <tr>
                            <th scope="col">Br.</th>
                            <th scope="col">Tip treninga</th>
                            <?php
                                    if($_SESSION["role"] == 'trener'){
                                ?>
                                    <th scope="col">Klijent</th>
                                <?php
                                    }
                                ?>
                            <th scope="col">Dolazak potvrđen</th>
                            <th scope="col">Trener</th>
                            <th scope="col">Datum treninga</th>
                            <th scope="col">Vrijeme treninga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while ($schedule = mysqli_fetch_array($dbSchedule, MYSQLI_ASSOC)){  
                                    
                                    $hours = strtotime($schedule['Hours']);
                                    $date = strtotime($schedule['Date']);

                                    if($_SESSION["role"]=="user"){
                                        $flag=false;
                                        $nameAndSurname = $_SESSION["name"] ." ". $_SESSION["surname"];
                                        $client_arr = explode(",", $schedule["Client"]);
                                        foreach($client_arr as $client){
                                            if ($client == $nameAndSurname){
                                                $flag=true;
                                            }
                                        }
                                    }
                                    if($_SESSION["role"]=="trener" || $flag==true){
                                        $scheduleOrdinalNum+=1;
                            ?> 
                                <tr>
                                <th scope="row"><?php echo $scheduleOrdinalNum?>.</th>
                                <td><?php echo $schedule['Training']?></td>
                                <?php
                                        if($_SESSION["role"] == 'trener'){
                                    ?>
                                        <td><?php echo $schedule['Client']?></td>
                                        <td>
                                            <?php
                                            if($schedule["Training"] == "Individualni"){ 
                                                if($schedule["Confirmation"] == 0){
                                                    echo 'nije potvrđeno';
                                                }elseif($schedule["Confirmation"] == 1){
                                                    echo 'potvrđeno';
                                                }else{
                                                    echo 'otkazano';
                                                }
                                            }else{
                                                echo '---';
                                            }
                                            ?>
                                        </td>

                                    <?php
                                        }else{
                                    ?>
                                        <td>
                                            <?php
                                            if($schedule["Training"] == "Individualni"){ 
                                                if($schedule["Confirmation"] == 0){
                                                    echo 'nije potvrđeno';
                                                }elseif($schedule["Confirmation"] == 1){
                                                    echo 'potvrđeno';
                                                }else{
                                                    echo 'otkazano';
                                                }
                                            ?>
                                            <br>
                                            <a id="confirm" href='mojaČlanarina.php?confirm=<?php echo $schedule["id"]?>'  
                                                class="btn btn-success btn-sm mt-2
                                                    <?php 
                                                    //disable or enable link 
                                                        if($schedule['Confirmation']==1) {
                                                            echo 'disabled';
                                                        }elseif($schedule['Confirmation']==2){
                                                            echo '<script>$this.removeClass(disabled)</script>';
                                                        }
                                                    ?>
                                            ">
                                            Potvrdi</a>
                                            <a id="cancel" href="mojaČlanarina.php?cancel=<?php echo $schedule['id']?>" 
                                               class="btn btn-danger btn-sm mt-2
                                                    <?php 
                                                    //disable or enable link 
                                                        if($schedule['Confirmation']==1) {
                                                            echo '<script>$this.removeClass(disabled)</script>';
                                                        }elseif($schedule['Confirmation']==2){
                                                            echo 'disabled';
                                                        }
                                                    ?>
                                               ">
                                            Otkaži</a>
                                            <?php }else{
                                                    echo '---';
                                                } ?>
                                        </td>
                                    <?php
                                        }
                                    ?>
                                <td><?php echo $schedule['Trainer']?></td>
                                <td><?php echo date('d-m-Y', $hours);?></td>
                                <td><?php echo date('H:i', $hours);?></td>
                                </tr>
                            <?php
                                    }
                                }   
                            ?>
                        </tbody>
                    </table>

                    <?php
                        if($dbSchedule->num_rows == 0){      
                    ?>
                            <div class="row table-info m-0">
                                <div class="col-md-12">
                                    Nema treninga.   
                                </div>
                            </div>
                    <?php
                        }     
                    ?>
                </div>
            </div>  
        </div>
        
        <?php if($_SESSION["role"] == 'trener'){ ?>
            <div class="row">
                <div class="col-md-12 gx-5 mb-4 text-center">
                <button class="prijava-btn btn btn-primary btn-lg gradient-custom-2" type="button"
                    onclick="$('#addTraining').modal('show');">Dodaj trening u raspored</button> 
                </div>
            </div>
        <?php } ?>

        <hr class="my-5" />

    <!--Table memberships-->
        <div class="row  mb-3"><h4>Članarine:</h4></div>
        <div class="row">
            <div class="table-responsive">
                <div class="col-md-12 gx-5 mb-4">
                    <table class="table table-success text-center p-3">
                        <thead>
                            <tr>
                            <th scope="col">Br.</th>
                            
                                <?php
                                    if($_SESSION["role"] == 'trener'){
                                ?>
                                    <th scope="col">Ime klijenta</th>
                                    <th scope="col">Prezime klijenta</th>
                                <?php
                                    }
                                ?>

                            <th scope="col">Tip treninga</th>
                            <th scope="col">Broj dana tjedno</th>
                            <th scope="col">Trener</th>
                            <th scope="col">Datum početka članarine</th>
                            <th scope="col">Datum isteka članarine</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while ($memberships = mysqli_fetch_array($dbMemberships, MYSQLI_ASSOC)){  
                                    $membershipsOrdinalNum+=1;
                                    $startDate = strtotime($memberships['StartDate']);
                                    $expirationDate = strtotime($memberships['ExpirationDate']);

                                    //memberships validation
                                    $current = new DateTime(date('Y-m-d'));
                                    $end = new DateTime($memberships['ExpirationDate']);
                                    if(var_export($current > $end, return:true) == 'true'){
                                        $validMembership = "Članarina istekla";
                                    }else{
                                        $validMembership = date('d-m-Y', $expirationDate);
                                    }

                            ?> 
                                <tr>
                                <th scope="row"><?php echo $membershipsOrdinalNum?>.</th>

                                    <?php
                                        if($_SESSION["role"] == 'trener'){
                                    ?>
                                        <td><?php echo $memberships['Name']?></td>
                                        <td><?php echo $memberships['Surname']?></td>
                                    <?php
                                        }
                                    ?>

                                <td><?php echo $memberships['Training']?></td>
                                <td><?php echo $memberships['TimePerWeek']?></td>
                                <td><?php echo $memberships['Trainer']?></td>
                                <td><?php echo date('d-m-Y', $startDate);?></td>
                                <td>
                                    <?php 
                                        echo $validMembership;
                                        if($validMembership == 'Članarina istekla' && $_SESSION["role"] == "user"){
                                    ?>   
                                    <div>  
                                        <a id="renewTheMembership" href='mojaČlanarina.php?renew=<?php echo $memberships["id"]?>'  
                                            class="btn btn-primary btn-sm mt-2 ms-3">Obnovi</a>
                                    </div> 
                                    <?php 
                                        }elseif($validMembership == 'Članarina istekla' && $_SESSION["role"] == "trener"){
                                            if($memberships["Warning"] == 0){
                                    ?> 
                                        <div><a id="membershipWarning" href='mojaČlanarina.php?warning=<?php echo $memberships["id"]?>'  
                                            class="btn btn-danger btn-sm mt-2 ms-3"  style="font-size : 10px;">Pošalji opomenu</a></div>
                                    <?php   
                                            }else{
                                    ?>
                                        <div><a href="" class="btn btn-danger btn-sm mt-2 ms-3 disabled" style="font-size : 10px;">Opomena poslana</a></div>
                                    <?php
                                            }
                                        }
                                    ?>
                                </td>
                                </tr>
                            <?php
                                }   
                            ?>
                        </tbody>
                    </table>

                    <?php
                        if($dbMemberships->num_rows == 0){      
                    ?>
                            <div class="row table-danger m-0">
                                <div class="col-md-12">
                                    Nema članarina.   
                                </div>
                            </div>
                    <?php
                        }     
                    ?>
                </div>
            </div>
        </div>

    

      </section>

    </div>
  </main>

    <!-- The Modal for successfully buying membership (Triggers a pop-up window when button is pressed) -->
    <div class="modal fade" id="welcome">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content text-dark">

                <!-- Modal Header -->
                <div class="modal-header bg-danger">
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h3>Plaćanje uspješno obavljeno.</h3>
                        </div> 
                         
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4>Postali ste član pilates studija <span>Afrodita.</span></h4> 
                        </div> 
                        
                    </div>

                </div> 

                <!-- Modal footer -->
                <div class="modal-footer">
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal to add training to schedule -->
    <div class="modal fade" id="addTraining">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">
                    <h3>Dodaj trening u raspored:</h3>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal"></button>
                </div>

                <form action="" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="row me-5 ms-5">
                            <div class="col-md-12">
                                <label class="form-label" for="form2Example22">Tip treninga:</label> <br>
                                <select id="treningSelect" name="training" class="form-control" onchange="myFunction()">
                                        <option value="" disabled selected>Molimo odaberite opciju...</option>
                                        <option value="Grupni">Grupni</option>
                                        <option value="Individualni">Individualni</option>
                                </select>
                            </div>    
                        </div>
                        
                        <div class="row me-5 ms-5 mt-3">
                            <div class="col-md-12">
                                <label class="form-label" for="form2Example22">Odaberite klijenta:</label><br>
                                <select id="pearsonSelect" name="client" class="form-control" disabled>
                                        <option value="" disabled selected>Molimo odaberite klijenta...</option>
                                        <?php 
                                            if($_SESSION["role"] == 'trener'){
                                                $query = "SELECT * FROM `clanarine` WHERE Trainer='$name' order by StartDate desc";  
                                            }else{
                                                $query = "SELECT * FROM `clanarine` WHERE Email='$email' order by StartDate desc";    
                                            }
                                            $dbMemberships = mysqli_query($conn, $query);

                                            while ($memberships = mysqli_fetch_array($dbMemberships, MYSQLI_ASSOC)){
                                                if($memberships['Training'] == 'individualni'){
                                                    $nameAndSurname = $memberships["Name"] ." ". $memberships["Surname"];
                                        ?>
                                                <option value="<?php echo $nameAndSurname?>"><?php echo $nameAndSurname?></option>
                                        <?php      
                                               }
                                            }
                                        ?>
                                </select>
                            </div> 
                        </div>  

                        <hr class="my-3" />
                        
                        <div class="row me-5 ms-5 mt-3">
                            <div class="col-md-12">
                                <label class="form-label" for="date">Odaberite datum treninga:</label> <br>
                                <input class="form-control" type="date" id="date" name="date" style="background-color: rgba(142, 134, 134); color-scheme: dark;" 
                                    value="<?php echo date('Y-m-d');?>"   max="2022-12-31" min="<?php echo date('Y-m-d');?>">
                            </div>
                        </div> 

                        <div class="row me-5 ms-5 mt-3">
                            <div class="col-md-12">
                                <div class="cs-form ">
                                <label class="form-label" for="date">Odaberite vrijeme treninga:</label> <br>
                                    <input type="time" name="time" class="form-control text-white" value="10:00" style="background-color: rgba(142, 134, 134); color-scheme: dark;" />
                                </div>
                            </div>
                        </div> 
                        
    
                    </div> 

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-success" id="unesi" name="unesiTrening">Unesi trening</button>   
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- The Modal for renewing  membership (Triggers a pop-up window when button is pressed) -->
    <div class="modal fade" id="renewMembership">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content text-dark">

                <!-- Modal Header -->
                <div class="modal-header bg-danger">
                    <h3>Obnovi članarinu:</h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

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
                    <form action="" method="post">
                        <button type="submit" class="btn btn-success px-4" id="plati"  title="plati"  name="obnoviČlanarinu" disabled>Plati i obnovi članarinu</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

  <?php include 'footer.php' ?>

</body>
</html>

