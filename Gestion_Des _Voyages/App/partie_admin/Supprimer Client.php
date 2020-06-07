<?php
include('../Couche Service/Config.php');

if($user->is_loggedin()){
    if(!empty($_GET["cin"])){
     
            //Supprimer l'exercice dont l'id est envoyé avec l'URL
            $cin = htmlspecialchars($_GET["cin"]);
            $ss = new Client_Service();
            if ($ss->supprimer($ss->findById($cin))) {
              $message= "le client a été supprimé avec succés";
            }else{
              $mesasge="Erreur pendant la suppression du client ";
            }
             
            //Redirection vers la page exercice.php avec un message résultat de la suppression 
             header("Location: Gestion index.php?message=$message");
    }else{
      header("Location: Login.php");
    }


}else{
  header("Location: Login.php");
}
