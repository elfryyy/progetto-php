<?php
	session_start();
	//echo session_id();
    
	if(!isset($_SESSION['username'])){
		header('location: ../login.php');
	} 
	
	$username = $_SESSION["username"];
	//echo $username;

	require('data/connessione_db.php');

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
    <link rel="stylesheet" href="cerca.css">
</head>
<body>
    
	<div class="contenuto">
		<h1 style="text-align: center; margin-top: 0px">Ricerca gioielli</h1>
		<p>Cerca il gioiello che desideri</p>
		<form method="post" action="">
			<table id="tab_dati_personali">
				<tr>
                    <td><input class="input_ricerca" type="text" name="prodotti.nome" placeholder="Cerca gioiello" id="prodotti.nome" value="<?php echo isset($_POST['prodotti.nome']) ? $_POST['prodotti.nome'] : ''; ?>"></td>
				</tr>
				
				<tr>
					<td style="text-align: center; padding-top: 10px" colspan="2"><input type="submit" value="Cerca"/></td>
				</tr>
			</table>
		</form>

		<p></p>

        <form method="post" action="">
            <?php
                if (isset($_POST["prodotti.nome"]) ) {
                    $nome = $_POST["prodotti.nome"];
                    
                    $sql = "SELECT prodotti.cod_prodotto prodotti.nome, prodotti.prezzo, prodotti.categoria, prodotti.descrizione, prodotti.specifiche, prodotti.foto1, prodotti.foto2, prodotti.foto3, prodotti.foto4, prodotti.foto5, prodotti.sconto, prodotti.nuovo
                            FROM prodotti 
                            WHERE nome LIKE '%$nome%'
                               ";
                    //echo $_POST["titolo_da_cercare"];
                    $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "<p>Gioielli trovati: </p>";
                    
                        foreach($ris as $riga){
                            $cod_prodotto = $riga["cod_prodotto"];
                            $nome = $riga["nome"];
                            // $copertina = $riga["copertina"];
                            
                            echo <<<EOD
                                <div class="elenco_libri">
                                    <div class="card-libro">
                                        <div class="card-libro__img">
                                            <img src="../immagini/$foto1" alt="$foto1">
                                        </div>
                                        <div class="card-libro__testo">
                                            <div class="card-libro__testo__centrato">
                                                <p>Titolo: $nome</p>
                                                
                                                
                            EOD; 
                           
                            echo <<<EOD
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            EOD;
                    }
                    // else {
                    //     echo "<p>Nessun gioiello trovato</p>";
                    // }
                    echo "</table>";
                }
            }


            ?>
		</form>	

	</div>	
	
</body>
</html>
<?php
	$conn->close();
?>

