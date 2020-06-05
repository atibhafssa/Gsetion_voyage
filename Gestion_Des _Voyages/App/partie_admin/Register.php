<?php
include('../Couche Service/Config.php');
//Après clic sur le bouton "Envoyer" envoie de données par post
if (count($_POST)>1) {
  //récupération et protection des données envoyées
  $nom = htmlspecialchars($_POST["nom"]);
  $email= htmlspecialchars($_POST["email"]);
  $pass = htmlspecialchars($_POST["pass"]);
  //filtre et validation du formulaire
      if(filter_var($email,FILTER_VALIDATE_EMAIL))
      { 
      	  $user = new User();
          $user = $user->getuser1($nom,$email,$pass);
          $cs = new User_Service();
          
          if($cs->register($user)){
          	$message= "Inscription à réussi";
          	header("Location: Login.php?message=Inscription à réussi");
          }
          else{
          	header('Location: Register.php?message=Error');
          }
      }
      
    
  }
//les autres pages peuvent envoyer un message dans L’URL. On le  récupère ici pour l'afficher dans l’élément "div.message"
if(isset($_GET["message"])){
	$message=$_GET["message"];
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>S'inscrire</title>
	<link rel="stylesheet" type="text/css" href="../BootStrap/bootstrap.min.css">
  <script type="text/javascript" src="../BootStrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../BootStrap/jquery.js"></script>
  <style type="text/css">
    .cont{
      width: 500px;
      margin: auto;
    }
  </style>
</head>
<body>
	<?php if(isset($message)) { echo "<div class='bg-warning text-white'>$message</div>"; } ?>
<form action="Register.php" method="POST">
	<div class="cont">
		 <fieldset class="form-group">
    <legend>S'inscrire</legend>
        <div class="form-group"><label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required></div>
        <div class="form-group"><label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required ></div>
        <div class="form-group"><label for="pass">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" required ></div>
        <input Type='submit' class='btn btn-success' value="S'inscrire">
  </fieldset> 



	</div>
</form>
</body>
</html>