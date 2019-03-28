<?php
	
	if(session_id() == '' || !isset($_SESSION)) {
		session_start();
		if(!isset($_SESSION['usr'])){
			exit(header("Location: /index.php"));
		}
	}
	else{
		header("Location: /index.php");
		exit;
	}
?>