<?php
include('../Couche Service/Config.php');
//Après clic sur le bouton "Envoyer" envoie de données par post
if ($user->is_loggedin()) {
  if (count($_POST)>1) {
  //récupération et protection des données envoyées
  $cin = htmlspecialchars($_POST["cin"]);
  $nom = htmlspecialchars($_POST["nom"]);
  $telephone = htmlspecialchars($_POST["telephone"]);
  $adresse = htmlspecialchars($_POST["adresse"]);
  $email = htmlspecialchars($_POST["email"]);

  //filtre et validation du formulaire
  $pcin="#[A-z]{2}[0-9]{6}#";
  $telV="#0(5|6)[0-9]{8}#";
    if (preg_match($pcin, $cin)) {
        if(preg_match($telV, $telephone))
        {
            try {
              $client = new Client($cin,$nom,$telephone,$adresse,$email);
              $ss = new Client_Service();
              $ss->add($client);
              $message= "Le Client a été ajouté  avec succès";
            } catch (PDOException $e) {
              $message = "Error:<br>" . $e->getMessage();
            }
        }
        else{
          $telvf=1;
        }
    }
    else{
      $cinvf=1;
    }
  }
  $sess=1;
}
else{
  header('Location: Login.php');
}

//les autres pages peuvent envoyer un message dans L’URL. On le  récupère ici pour l'afficher dans l’élément "div.message"
if(isset($_GET["message"])){
	$message=$_GET["message"];
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
  <form action="" method="post">
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50" id="divv">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Ajouter Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                         <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Nom:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="t2" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Prénom:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="t3" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Adresse:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="t4" required>
                                </div>
                            </div>
                        </div>
                             <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Numéro de tel:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="t5" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name" style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; " >Email:</div>
                            <div class="value">
                      <div class="input-group">
                                    <input class="input--style-5" type="text" name="t6" required>
                                </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                                   
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                        <div style="background-color:black;border-radius:7px; ">
                            <button  id="btn" class="btn btn--radius-2 btn--red" type="submit" name="btn_Ajouter">Ajouter</button>
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
    </form>
</body>
</html>

