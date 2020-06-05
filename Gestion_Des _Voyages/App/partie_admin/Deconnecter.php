<?php
include '../Couche Service/Config.php';

if ($user->logout()) {
	header("Location: Login.php");
}


?>