<?php

/**
* 
*/
class Reservation

{
	private $num,$dated,$datef,$voyage,$client;
	function __construct($b,$c,$v,$cl)
	{
		$this->dated = $b;
		$this->datef = $c;
		$this->voyage = $v;
		$this->client = $cl;
	}
	function getnums(){
		return $this->num;
	
	function getdated(){
		return $this->dated;
	}
	function getdatef(){
		return $this->datef;
	}
	function getnumvoyage(){
		return $this->voyage->getnumvoyage();
	}
	function getcins(){
		return $this->client->getcin();
	}
	function setnums($a){
		$this->num=$a;
	}
	function setdated($a){
		$this->dated=$a;
	}
	function setdatef($a){
		$this->datef=$a;
	}
	function setnumvoyage($a){
		$this->voyage->setnumvoyag($a);
	}
	function setcins($a){
		$this->client->setcin($a);
	}
    
	

}

?>