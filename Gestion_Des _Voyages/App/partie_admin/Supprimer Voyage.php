<?php
include('../Couche Service/Config.php');

if($user->is_loggedin()){
    if(!empty($_GET["numvoyage"])){
     
            //Supprimer l'exercice dont l'id est envoyé avec l'URL
            $numvoyage = htmlspecialchars($_GET["numvoyage"]);
            $ss = new Voyage_Service();
            if ($ss->supprimer($ss->findById($numvoyage))) {
              $message= "le voyage a été supprimé avec succés";
            }else{
              $mesasge="Erreur pendant la suppression du voyage";
            }
             
            //Redirection vers la page exercice.php avec un message résultat de la suppression 
             header("Location: Gestion index.php?message=$message");
    }else{
      header("Location: Login.php");
    }


}else{
  header("Location: Login.php");
}
