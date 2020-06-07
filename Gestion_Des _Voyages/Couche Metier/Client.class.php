<?php
/**
* 
*/
class Client
{
	private $cin,$nom,$telephone,$adresse,$email;
	function __construct($a,$b,$d,$e,$f,$g)
	{
		$this->cin = $a;
		$this->nom = $b;
		$this->telephone = $d;
		$this->adresse = $e;
		$this->$email = $f;
		
	}
	function getcin(){
		return $this->cin;
	}
	function getnom(){
		return $this->nom;
	}
	
	function gettelephone(){
		return $this->telephone;
	}
	function getadresse(){
		return $this->adresse;
	}
	function getemail(){
		return $this->email;
	}
	
	function setcin($a){
		 $this->cin = $a;
	}
	function setnom($a){
		 $this->nom = $a;
	}
	
	function settelephone($a){
		 $this->telephone = $a;
	}
	function setadresse($a){
		 $this->adresse = $a;
	}
	function setemail($a){
		 $this->email = $a;
	}
	








}


?>