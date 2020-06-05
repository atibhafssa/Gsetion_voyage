<?php
include('../Couche Service/Config.php');

if($user->is_loggedin()){
    if(!empty($_GET["num"])){
     
            //Supprimer l'exercice dont l'id est envoyé avec l'URL
            $num = htmlspecialchars($_GET["num"]);
            $ss = new Reservation_Service();
            if ($ss->supprimer($ss->findById($num))) {
              $message= "le Reservation a été supprimé avec succés";
            }else{
              $mesasge="Erreur pendant la suppression du Reservation ";
            }
             
            //Redirection vers la page exercice.php avec un message résultat de la suppression 
             header("Location: Gestion index.php?message=$message");
    }else{
      header("Location: Login.php");
    }


}else{
  header("Location: Login.php");
}