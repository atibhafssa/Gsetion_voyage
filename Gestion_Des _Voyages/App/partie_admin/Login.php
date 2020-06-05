<?php
include('../Couche Service/Config.php');


if (isset($_POST['submit'])) {
	  $email= htmlspecialchars($_POST["email"]);
	  $pass = htmlspecialchars($_POST["password"]);
	  //filtre et validation du formulaire
          $user1 = new User();
          $user1 = $user1->getuser3($email,$pass);
          if($user->login($user1)){
          	$message= "Bienvenue";
          	header("Location: Gestion Stagiaire.php?message=$message");
          }
          else{
            header('Location: Login.php?message=Error');
          }
}


?>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="../BootStrap/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../BootStrap/bootstrap.min.css">
	<script type="text/javascript" src="../BootStrap/bootstrap.min.js"></script>
	<style type="text/css">
		.cont{
			width: 500px;
			margin: auto;
		}
	</style>
</head>
<body>
	<form action="Login.php" method="POST">
		<nav class="navbar navbar-default">
		    <div class="container-fluid">
		        <div class="navbar-header">
		     		 <a class="navbar-brand" href="#">Projet Gestion De Stage</a>
		    	</div>
			    <ul class="nav navbar-nav text-right">
				     <li><a href="Gestion Stagiaire.php">Gestion Stagiaire</a></li> 
				     <li><a href="Gestion Stage.php" class="active">Gestion Stage</a></li> 
			    </ul>
		    	<ul class="nav navbar-nav navbar-right">
				       <?php if ($sess==1) {
				          echo "<li><a href='Deconnecter.php'><span class='glyphicon glyphicon-user'></span>Se Deconnecter</a></li>";

				        }
				        else{
				          echo "<li><a href='Login.php'><span class='glyphicon glyphicon-user'></span>Se Connecter</a></li>";
				        }
				       ?>  
		   	    </ul>
		    </div>
  		</nav>
        
 <div class="cont">
 <div class="form-group">
    
 	<label>Login : </label><input type="text" name="email" class="form-control"></div>
 	<div class="form-group">
 	<label>Password : </label><input type="password" name="password" class="form-control"></div>
 	<input type="submit" name="submit" value="Se connecter" class="btn btn-primary"> <a href="Register.php" class="btn btn-default">S'inscrire</a>
 </div>
</div>
 </form>
</body>
</html>