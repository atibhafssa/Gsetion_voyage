<?php
/**
* 
*/
class Connexion
{
	private $db;
	function __construct()
	{
		$username = "root";
		$password = "";
		$dsname = "mysql:host=localhost;dbname=g_voyage";

		// Création de la  connexion
		try{
		  $this->db = new PDO($dsname,$username,$password);
		  $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
		  die("Erreur ! :".$e->getMessage());
		}

		
	}
	function getdb()
	{
		return $this->db;
	}
}


?>