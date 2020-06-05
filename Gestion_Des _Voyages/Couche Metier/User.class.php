<?php
/**
* 
*/
class User 
{
	private $id,$nom,$email,$pass;
	function __construct()
	{   
		
	}
	function getid(){
		return $this->id;
	}
	function getnom(){
		return $this->nom;
	}
	function getemail(){
		return $this->email;
	}
	function getpass(){
		return $this->pass;
	}
	function setid($i){
		$this->id=$i;
	}
	function setnom($n){
		$this->nom=$n;
	}
	function setemail($e){
		$this->email=$e;
	}
	function setpass($p){
		$this->pass=$p;
	}
	function getuser1($n,$e,$p){
		$u= new User();
		$u->setnom($n);
		$u->setemail($e);
		$u->setpass($p);
		return $u;
	}
	function getuser2($i,$n,$e,$p){
		$u= new User();
		$u->setid($i);
		$u->setnom($n);
		$u->setemail($e);
		$u->setpass($p);
		return $u;
	}
	function getuser3($e,$p){
		$u= new User();
		$u->setemail($e);
		$u->setpass($p);
		return $u;
	}
}



?>