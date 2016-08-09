<?php
function genUser(){
	$allowed_chars = $_REQUEST['str_char'];
	$allowed_count = strlen($allowed_chars);
	$password = null;
	$password_length = $_REQUEST['num_user'];
		
		while($password === null || already_exists($password)) {
			$password = '';
			for($i = 0; $i < $password_length; ++$i) {
			$password .= $allowed_chars{mt_rand(0, $allowed_count - 1)};
			}
			return $password;
		}
}

function genPass(){
	$allowed_chars = $_REQUEST['str_char'];
	$allowed_count = strlen($allowed_chars);
	$password = null;
	$password_length = $_REQUEST['num_pass'];
		
		while($password === null || already_exists($password)) {
			$password = '';
			for($i = 0; $i < $password_length; ++$i) {
			$password .= $allowed_chars{mt_rand(0, $allowed_count - 1)};
			}
			return $password;
		}
}
	
?>