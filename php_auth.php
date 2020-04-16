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
?>