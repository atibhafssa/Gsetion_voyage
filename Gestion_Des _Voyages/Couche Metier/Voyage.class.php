<?php
/**
* 
*/
class Voyage

{
	private $datevoyage,$prix,$destination,$categories,$Tailledegroupe,$detaille,$image;
	function __construct($a,$b,$c,$d,$e,$f,$g)
	{
		$this->datevoyage = $a;
		$this->prix = $b;
		$this->destination = $c;
		$this->categories = $d;
		$this->Tailledegroupe = $e;
		$this->detaille = $f;
		$this->image = $g;
	}
	function getdatevoyage(){
		return $this->datevoyage;
	}
	function getprix(){
		return $this->prix;
	}
	function getdestination(){
		return $this->destination;
	}
	function getcategories(){
		return $this->categories;
	}
	function getTailledegroupe(){
		return $this->Tailledegroupe;
	}
	function getdetaille(){
		return $this->detaille;
	}
	function getimage(){
		return $this->image;
	}
	function setdatevoyage($a){
		 $this->datevoyage = $a;
	}
	function setprix($a){
		 $this->prix = $a;
	}
	function setdestination($a){
		 $this->destination = $a;
	}
	function setcategories($a){
		 $this->categories = $a;
	}
	function setTailledegroupe($a){
		 $this->Tailledegroupe = $a;
	}
	function setdetaille($a){
		 $this->detaille = $a;
	}
	function setimage($a){
		 $this->image = $a;
	}








}


?>