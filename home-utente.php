<?php
	session_start();
    if(!isset($_SESSION['username'])){ 
		header('location: home.html');
	}
    $username = $_SESSION["username"];

?>