<?php
include('../Couche Service/Config.php');

//verifier la session

if ($user->is_loggedin()){
  //Après appel de la page on récupéré l'id de l'exercice en question
      if(isset($_GET["num"])){
              // Récupérer des informations de l'exercice en question qui seront par la suite afficher dans le formulaire en bas
                    $id = htmlspecialchars($_GET['num']);
                    $ss = new Reservation_Service();
                    $tc = $ss->findById($id);
                // Parcourir les lignes de résultat
              if (is_null($tc)) {
                $message="Le Reservation est introuvable";
                header("Loation: Gestion Reservation.php?message=$message");
              }else{
                  $num=$id;
                  $dated=$tc->getdated();
                  $datef=$tc->getdatef();
                  $numvoyage=$tc->getdepartement();
                  $cin=$tc->getcins();
              }
      } 
      // Après clic sur le bouton modifier on récupère les données envoyées par la méthode post
     if(count($_POST)>1) {
          //filtre et validation du formulaire
          $num = htmlspecialchars($_POST["num"]);
          $dated = htmlspecialchars($_POST["dated"]);
          $datef = htmlspecialchars($_POST["datef"]);
          $numvoyage = htmlspecialchars($_POST["numvoyage"]);
          $cin = htmlspecialchars($_POST["cin"]);
               if($datef>$dated)
              {

                      $ss = new Reservation_Service();
                      $Reservation = new Reservation($dated,$datef,$ss->findById($numvoyage),$ss->findById($cin));
                      $Reservation->setnums($num);
                      $vs = new Reservation_Service();
                    if($vs->update($Reservation)){
                      $message= "Le Reservation a été modifier  avec succès";
                    }
                    else{
                      $message= "Problème de Modification";
                    }
                    header("Location: Gestion Reservation.php?message=$message");
              }
              else{
                $datevf=1;
              }
              
    }

  $sess=1;
}else{
  header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
   <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    
</head>
<body  style="background-image:url('bg-01.jpg');">
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50" id="divv">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Modifier Form</h2>email
                </div>
                <div class="card-body">
                    <form method="post" action="updateins.php">
                         <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Noclient:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="id" value="<?=$id;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">No de voyage:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="novoyage" value="<?=$novoyage;?>">
                                </div>
                            </div>
                        </div>  
                          <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Date depart:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date_depart" value="<?=$date_depart;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Date fin:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date_fin" value="<?=$date_fin;?>">
                                </div>
                            </div>
                        </div>
                       
                       
                                            <div style="background-color:black;border-radius:7px;margin-bottom: -73px;width:128%; margin-left: -88px;" >
                            <button  id="btn" class="btn btn--radius-2 btn--red" type="submit" name="btn_modifier">Modifier</button>
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>

