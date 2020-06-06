
<?php
include('../Couche Service/Config.php');

//verifier la session

if ($user->is_loggedin()){
  //Après appel de la page on récupéré l'id de l'exercice en question
      if(isset($_GET["numvoyage"])){
              // Récupérer des informations de l'exercice en question qui seront par la suite afficher dans le formulaire en bas
                    $id = htmlspecialchars($_GET['numvoyage']);
                    $ss = new Voyage_Service();
                    $tc = $ss->findById($id);
                // Parcourir les lignes de résultat
              if (is_null($tc)) {
                $message="Le Voyage est introuvable";
                header("Loation:GestioN Voyage.php?message=$message");
              }else{
                  $datevoyage=$tc->gedatevoyage();
                  $prix=$tc->getprix();
                  $destination=$tc->getdestination();
                  $categories=$tc->getcategories();
                  $Tailledegroupe=$tc->getTailledegroupe();
                  $detaille=$tc->getdetaille();
                  $image=$tc->getimage();
              }
      } 
      // Après clic sur le bouton modifier on récupère les données envoyées par la méthode post
     if(count($_POST)>1) {
      //filtre et validation du formulaire
      $datevoyage = htmlspecialchars($_POST["datevoyage"]);
      $prix = htmlspecialchars($_POST["prix"]);
      $prenom = htmlspecialchars($_POST["prenom"]);
      $categories = htmlspecialchars($_POST["categories"]);
      $Tailledegroupe = htmlspecialchars($_POST["Tailledegroupe"]);
      $detaille = htmlspecialchars($_POST["detaille"]);
      $image= htmlspecialchars($_POST["image"]);
        
          
                    $voyage= new Voyage($datevoyage,$prix,$prenom,$categories,$Tailledegroupe,$detaille ,$image);
                    $ss = new Voyage_Service();
                    if($ss->update($voyage)){
                      $message= "Le Voyage a été Modifier avec succès";
                    
                    
                    
                  
                  header("Location: Gestion 
                  	Voyage.php?message=$message");
                
           
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
                    <form method="post" action="updatev.php" >
                         <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Date de voiyage:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="datev" value="<?=$datev;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Prix:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="prix" value="<?=$prix;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Destination:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Destination" value="<?=$Destination;?>">
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">Taille de groupe:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Tailledegroupe" value="<?=$Tailledegroupe;?>">
                                </div>
                            </div>
                        </div>

                            <div class="form-row">
                            <div class="name"  style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; ">categories:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="categories" value="<?=$categories;?>">
                                </div>
                            </div>
                        </div>

 
                        <div class="form-row m-b-55">
                            <div class="name" style="color:rebeccapurple;text-shadow: 1px 1px 0 black ; " >detaille:</div>
                            <div class="value">
                      <div class="input-group">                                     
                        <textarea class="input--style-5" name="detaille" rows="4" cols="50" >
                          <?=$detaille;?>
</textarea>
                                </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-row p-t-20" id="vraimment">
                            <label class="label label--block" style="color:rebeccapurple;text-shadow: 1px 1px 0 skyblue ; ">Vous ete vraimment modifier ?</label>
                            <div class="p-t-15">
                            	<div id="ddd">
                                <label class="radio-container m-r-55" style="color:rebeccapurple;text-shadow: 1px 1px 0 skyblue ; " >Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container" style="color:rebeccapurple;text-shadow: 1px 1px 0 skyblue ;"  >No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label></div>
                            </div>
                        </div>
                        <div style="background-color:black;border-radius:7px; ">
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

