<?php
 /**
 * 
 */
 class Reservation_Service implements dao
 {
 	private $db;
 
 	function __construct()
 	{
 		$c = new Connexion();
 		$this->db = $c->getdb();
 	}
 	function add($reservation)
 	{

 	 $st =	$this->db->prepare('insert into reservation value(NULL,?,?,?,?)');
 	 if ($st->execute(array($reservation->getdated(),$reservation->getdatef(),$reservation->getnumvoyage(),$reservation->getcins()))) {
 	 	return true;
 	 }
 	 else{
 	 	return false;
 	 }
 	}
 	function findAll()
 	{

	 	 $st =	$this->db->prepare('select * from reservation');
	 	 if ($st->execute()) {
	 	 	return $st->fetchAll();
	 	 }
	 	 else{
	 	 	return null;
	 	 }
 	} 
 	function findById($id)
 	{
	 	 $st =	$this->db->prepare('SELECT * FROM reservation WHERE num=?');
	 	 if ($st->execute(array($id))) {
	 	 	$row = $st->fetch(PDO::FETCH_OBJ);
	 	 	$ss = new Client_Service();
	 	 	$ss = new Voyage_Service();
	 	 	return new Reservation($row->date_debut,$row->date_fin,$ss->findById($row->numvoyage),$ss->findById($row->cin));
	 	 }
	 	 else{
	 	 	echo "Problème ";
	 	 	return null;
	 	 }
 	} 
 	function update($reservation)
 	{
 	 	 $st =$this->db->prepare('update reservation set date_debut=? , date_fin=? , numvoyage=? , cin=? where num=?');
	 	 if ($st->execute(array($reservation->getdated(),$reservation->getdatef(),$reservation->$getnumvoyage(),$reservation->getcins(),$reservation->getnums()))) {
	 	 	return true;
	 	 }
	 	 else{
	 	 	return false;
	 	 }
 	 
 	}
 	function supprimer($reservation)
 	{

	 	 $st =	$this->db->prepare('delete from reservation where num=?');
	 	 if ($st->execute(array($reservation->getnums()))) {
	 	 	return true;
	 	 }
	 	 else{
	 	 	return false;
	 	 }
 	}
 	

 }

?>