<?php
 /**
 * 
 */
 class Voyage_Service implements dao
 {
 	private $db;
 
 	function __construct()
 	{
 		$c = new Connexion();
 		$this->db = $c->getdb();
 	}
 	function add($voyage)
 	{
 		

 	 $st =	$this->db->prepare('insert into voyage value(NULL,?,?,?,?)');
 	 if ($st->execute(array($voyage->datevoyage(),$voyage->prix(),$voyage->destinationt(),$voyage->categories(),$voyage->Tailledegroupe(),$voyage->detaille(),$voyage->image()))) {
 	 	return true;
 	 }
 	 else{
 	 	return false;
 	 }
 	}
 	function findAll()
 	{

	 	 $st =	$this->db->prepare('select * from voyage');
	 	 if ($st->execute()) {
	 	 	return $st->fetchAll();
	 	 }
	 	 else{
	 	 	return null;
	 	 }
 	} 
 	function findById($id)
 	{
	 	 $st =	$this->db->prepare('SELECT * FROM voyage WHERE numvoyage=?');
	 	 if ($st->execute(array($id))) {
	 	 	$row = $st->fetch(PDO::FETCH_OBJ);
	 	 	
	 	 	return new voyage($row->datevoyage,$row->prix,$row->destination,$row->categories,$row->Tailledegroupe,$row->detaille,$row->image));
	 	 }
	 	 else{
	 	 	echo "Problème ";
	 	 	return null;
	 	 }
 	} 
 	function update($voyage)
 	{
 	 	 $st =$this->db->prepare('update voyage set datevoyage=? , prix=? , destinationt=? , categories=? ,Tailledegroupe=?,detaille=?,image=? where numvoyage=?');
	 	 if ($st->execute(array($voyage->datevoyage(),$voyage->prix(),$voyage->destinationt(),$voyage->categories(),$voyage->Tailledegroupe(),$voyage->detaille(),$voyage->image()))) {
	 	 	return true;
	 	 }
	 	 else{
	 	 	return false;
	 	 }
 	 
 	}
 	function supprimer($voyage)
 	{

	 	 $st =	$this->db->prepare('delete from voyage where numvoyage=?');
	 	 if ($st->execute(array($voyage->getnumvoyage()))) {
	 	 	return true;
	 	 }
	 	 else{
	 	 	return false;
	 	 }
 	}
 	

 }

?>