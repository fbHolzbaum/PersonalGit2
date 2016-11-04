<?php
	//Creates a password and returns it
	
	
	function GenerateSalt()
	{
		return mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
	}
	
	function GenerateHash($password, $salt)
	{
		$options = [
			'salt' => $salt,
		];
		
		return password_hash($password, PASSWORD_DEFAULT, $options);
	}
?>