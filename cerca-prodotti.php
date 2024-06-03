<?php
	session_start();
	//echo session_id();
    
	if(!isset($_SESSION['username'])){
		header('location: ../login.php');
	} 
	
	$username = $_SESSION["username"];
	//echo $username;

	require('../data/connessione_db.php');

	if(isset($_POST['cod_prodotto'])){
        foreach($_POST['cod_prodotto'] as $cod_prodotto) {
            
            $sql = "SELECT cod_prodotto FROM prodotti
                    WHERE cod_prodotto = '$cod_prodotto'";
            $conn->query($sql) or die("<p>Query fallita!</p>");
        }
    }	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Ricerca prodotto</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	
	<div class="contenuto">
		<h1 style="text-align: center; margin-top: 0px">Ricerca gioielli</h1>
		<p>Cerca il gioiello che desideri</p>
		<form method="post" action="">
			<table id="tab_dati_personali">
				<tr>
                    <td><input class="input_ricerca" type="text" name="nome_prodotto" placeholder="Cerca gioiello" id="nome_prodotto" value="<?php echo isset($_POST['nome_prodotto']) ? $_POST['nome_prodotto'] : ''; ?>"></td>
				</tr>
				
				<tr>
					<td style="text-align: center; padding-top: 10px" colspan="2"><input type="submit" value="Cerca"/></td>
				</tr>
			</table>
		</form>

		<p></p>