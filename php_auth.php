<?php

class Auth{
	static function isLogged(){
		if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['pseudo']) && isset($_SESSION['Auth']['email']) && isset($_SESSION['Auth']['password'])){
			return true;
		} else {
			return false;
		}
	}
}

class vendeur{
	static function isLogged(){
		if(isset($_SESSION['vendeur']) && isset($_SESSION['vendeur']['pseudo']) && isset($_SESSION['vendeur']['email']) && isset($_SESSION['vendeur']['password'])){
			return true;
		} else {
			return false;
		}
	}
}

class acheteur{
	static function isLogged(){
		if(isset($_SESSION['acheteur']) && isset($_SESSION['acheteur']['pseudo']) && isset($_SESSION['acheteur']['email']) && isset($_SESSION['acheteur']['password'])){
			return true;
		} else {
			return false;
		}
	}
}