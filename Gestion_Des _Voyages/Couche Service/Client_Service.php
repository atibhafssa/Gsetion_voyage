	<?php
 /**
 * 
 */
 class Client_Service implements dao
 {
 	private $db;
 
 	function __construct()
 	{
 		$c = new Connexion();
 		$this->db = $c->getdb();
 	}
 	function add($client)
 	{

 	 $st =	$this->db->prepare('insert into client value(?,?,?,?,?,?,?)');
 	 if ($st->execute(array($client->getcin(),$client->getnom(),$client->gettelephone(),$client->getadresse(),$client->getemail()))) {
 	 	return true;
 	 }
 	 else{
 	 	return false;
 	 }
 	}
 	function findAll()
 	{

	 	 $st =	$this->db->prepare('select * from client');
	 	 if ($st->execute()) {
	 	 	return $st->fetchAll();
	 	 }
	 	 else{
	 	 	return null;
	 	 }
 	} 
 	function findById($cin)
 	{
	 	 $st =	$this->db->prepare('SELECT * FROM client WHERE cin=?');
	 	 if ($st->execute(array($cin))) {
	 	 	$row = $st->fetch(PDO::FETCH_OBJ);
	 	 	return new client($row->cin,$row->nom,$row->telephone,$row->adresse,$row->email);
	 	 }
	 	 else{
	 	 	echo "Problème ";
	 	 	return null;
	 	 }
 	} 
 	function update($client)
 	{

 	 try {
 	 	$st =$this->db->prepare('update client set nom=?  , telephone=? , adresse=? , email=? ,  where cin=?');
 	 if ($st->execute(array($client->getcin(),$client->getnom(),$client->gettelephone(),$client->getadresse(),$client->getemail()))) {
 	 	return true;
 	 }
 	 else{
 	 	return false;
 	 }
 	 } catch (PDOException $e) {
 	 	echo $e->getMessage();
 	 }
 	}
 	function supprimer($client)
 	{

 	 $st =	$this->db->prepare('delete from client where cin=?');
 	 if ($st->execute(array($client->getcin()))) {
 	 	return true;
 	 }
 	 else{
 	 	return false;
 	 }
 	}

 }

?>