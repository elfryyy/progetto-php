<?php 
  $conn= new mysqli("localhost","root", "1234", "gioielli");
  if($conn->connect_error){
    die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
   }
?>