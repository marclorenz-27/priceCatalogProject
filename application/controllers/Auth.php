<?php
	class Auth
	{
		function hash($password){
			$salt = Auth::generate_salt();
			return bin2hex($salt).hash('sha256', $salt.$password);
		}
		function verify($password, $hash){
			$salt = pack('H*', substr($hash, 0, 12));
			$sha2 = substr($hash, 12);
			return hash('sha256', $salt.$password) == $sha2;
		}

		function generate_salt()
	    {
	        return Auth::generate_token(6);
	    }

	    function generate_password()
	    {
	        return Auth::generate_token(8);
	    }

	    function generate_token($len = 16)
	    {
	        $chars = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789';

	        for ($pass = '', $i = 0; $i < $len; $i++) {
	            $pass .= $chars[mt_rand(0,strlen($chars)-1)];
	        }
	        
	        return $pass;
	    }
		
		
	}
?>